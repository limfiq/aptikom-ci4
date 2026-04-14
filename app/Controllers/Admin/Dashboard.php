<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\EventModel;
use App\Models\IndividualMemberModel;
use App\Models\ContactMessageModel;
use App\Models\EventRegistrationModel;
use App\Models\MemberInstitutionModel;
use App\Models\PartnerModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $eventModel = new EventModel();
        $memberModel = new IndividualMemberModel();
        $messageModel = new ContactMessageModel();
        $institutionModel = new MemberInstitutionModel();
        $partnerModel = new PartnerModel();

        $data = [
            'stats' => [
                'posts'        => $postModel->countAllResults(),
                'events'       => $eventModel->countAllResults(),
                'members'      => $memberModel->countAllResults(),
                'messages'     => $messageModel->where('isRead', 0)->countAllResults(),
                'institutions' => $institutionModel->countAllResults(),
                'partners'     => $partnerModel->countAllResults(),
            ],
            'recentActivity' => $this->getRecentActivity(),
            'topItems'       => $this->getTopItems(),
        ];

        return view('admin/dashboard', $data);
    }

    private function getRecentActivity()
    {
        $postModel = new PostModel();
        $memberModel = new IndividualMemberModel();
        $regModel = new EventRegistrationModel();

        $activities = [];

        // Latest 2 registrations
        $registrations = $regModel->orderBy('registered_at', 'DESC')->limit(2)->findAll();
        foreach ($registrations as $r) {
            $activities[] = [
                'icon' => '👤', 
                'title' => 'Pendaftaran Kegiatan', 
                'description' => esc($r['full_name']) . ' mendaftar', 
                'time' => $this->timeAgo($r['registered_at'])
            ];
        }

        // Latest 2 members
        $members = $memberModel->orderBy('createdAt', 'DESC')->limit(2)->findAll();
        foreach ($members as $m) {
            $activities[] = [
                'icon' => '🆔', 
                'title' => 'Anggota Baru', 
                'description' => esc($m['name']), 
                'time' => $this->timeAgo($m['createdAt'])
            ];
        }

        // Latest 2 news
        $news = $postModel->where('category', 'Berita')->orderBy('createdAt', 'DESC')->limit(2)->findAll();
        foreach ($news as $n) {
            $activities[] = [
                'icon' => '📝', 
                'title' => 'Berita Baru', 
                'description' => esc($n['title']), 
                'time' => $this->timeAgo($n['createdAt'])
            ];
        }

        // Catch-all if empty
        if (empty($activities)) {
            $activities[] = ['icon' => '🏠', 'title' => 'Portal Aktif', 'description' => 'Sistem siap digunakan', 'time' => 'Sekarang'];
        }

        return $activities;
    }

    private function getTopItems()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('event_registrations er');
        $builder->select('e.title as name, COUNT(er.id) as value, e.status');
        $builder->join('events e', 'e.id = er.event_id');
        $builder->groupBy('er.event_id');
        $builder->orderBy('value', 'DESC');
        $builder->limit(5);
        $results = $builder->get()->getResultArray();

        // Map status
        foreach ($results as &$r) {
            if ($r['status'] == 'open') $r['status'] = 'active';
            if ($r['status'] == 'closed') $r['status'] = 'completed';
        }

        return $results ?: [['name' => 'Belum ada data', 'value' => 0, 'status' => 'pending']];
    }

    private function timeAgo($timestamp)
    {
        if (!$timestamp) return '-';
        $time = strtotime($timestamp);
        $diff = time() - $time;
        
        if ($diff < 60) return 'Baru saja';
        if ($diff < 3600) return round($diff / 60) . ' menit lalu';
        if ($diff < 86400) return round($diff / 3600) . ' jam lalu';
        return round($diff / 86400) . ' hari lalu';
    }
}

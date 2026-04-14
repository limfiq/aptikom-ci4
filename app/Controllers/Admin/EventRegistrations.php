<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\EventRegistrationModel;

class EventRegistrations extends BaseController
{
    protected $eventModel;
    protected $regModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->regModel   = new EventRegistrationModel();
    }

    /** Daftar semua event beserta jumlah pendaftar */
    public function index()
    {
        $events = $this->eventModel->orderBy('date', 'DESC')->findAll();

        // Tambahkan total_reg ke setiap event
        foreach ($events as &$ev) {
            $ev['total_reg'] = $this->regModel->where('event_id', $ev['id'])->countAllResults();
        }

        return view('admin/event_registrations/index', [
            'events' => $events,
            'title'  => 'Pendaftaran Kegiatan',
        ]);
    }

    /** Daftar pendaftar untuk event tertentu */
    public function participants($eventId)
    {
        $event = $this->eventModel->find((int) $eventId);
        if (!$event) {
            return redirect()->to('/admin/event-registrations')->with('error', 'Event tidak ditemukan.');
        }

        $status = $this->request->getGet('status');
        $builder = $this->regModel->where('event_id', $eventId)->orderBy('registered_at', 'DESC');
        if ($status) {
            $builder->where('status', $status);
        }

        return view('admin/event_registrations/participants', [
            'event'        => $event,
            'participants' => $builder->findAll(),
            'active_status'=> $status,
            'counts'       => [
                'pending'   => $this->regModel->where('event_id', $eventId)->where('status', 'pending')->countAllResults(),
                'confirmed' => $this->regModel->where('event_id', $eventId)->where('status', 'confirmed')->countAllResults(),
                'cancelled' => $this->regModel->where('event_id', $eventId)->where('status', 'cancelled')->countAllResults(),
            ],
            'title' => 'Peserta: ' . $event['title'],
        ]);
    }

    /** Update status pendaftar */
    public function updateStatus($regId)
    {
        $status = $this->request->getPost('status');
        if (!in_array($status, ['pending', 'confirmed', 'cancelled'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }
        $reg = $this->regModel->find((int) $regId);
        $this->regModel->update((int) $regId, ['status' => $status]);
        return redirect()->to('/admin/event-registrations/' . $reg['event_id'] . '/participants')
                         ->with('success', 'Status pendaftar berhasil diperbarui.');
    }

    /** Hapus pendaftaran */
    public function delete($regId)
    {
        $reg = $this->regModel->find((int) $regId);
        if ($reg) {
            $this->regModel->delete((int) $regId);
            return redirect()->to('/admin/event-registrations/' . $reg['event_id'] . '/participants')
                             ->with('success', 'Data pendaftar berhasil dihapus.');
        }
        return redirect()->to('/admin/event-registrations');
    }

    /** Export participants to CSV */
    public function export($eventId)
    {
        $event = $this->eventModel->find((int) $eventId);
        if (!$event) return redirect()->to('/admin/event-registrations')->with('error', 'Event tidak ditemukan.');

        $participants = $this->regModel->where('event_id', $eventId)->orderBy('registered_at', 'DESC')->findAll();

        $filename = 'Pendaftar_' . str_replace(' ', '_', $event['title']) . '_' . date('YmdHis') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        
        // CSV Header
        fputcsv($output, ['No', 'Nama Lengkap', 'Email', 'No. HP', 'Institusi', 'Program Studi', 'Peran', 'Catatan', 'Status', 'Waktu Daftar']);

        foreach ($participants as $i => $p) {
            fputcsv($output, [
                $i + 1,
                $p['full_name'],
                $p['email'],
                $p['phone'],
                $p['institution'],
                $p['study_program'],
                $p['role'],
                $p['notes'],
                $p['status'],
                $p['registered_at']
            ]);
        }

        fclose($output);
        exit;
    }
}

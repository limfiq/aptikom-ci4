<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\EventModel;
use App\Models\AchievementModel;
use App\Models\PartnerModel;
use App\Models\BannerModel;
use App\Models\ContactInfoModel;
use App\Models\BoardMemberModel;
use App\Models\IndividualMemberModel;
use App\Models\MemberInstitutionModel;

class Home extends BaseController
{
    public function index(): string
    {
        $postModel = new PostModel();
        $eventModel = new EventModel();
        $achievementModel = new AchievementModel();
        $partnerModel = new PartnerModel();
        $bannerModel = new BannerModel();
        $contactModel = new ContactInfoModel();
        $orgProfileModel = new \App\Models\OrganizationProfileModel();
        $orgProfile = $orgProfileModel->first();

        $boardModel = new BoardMemberModel();
        
        // Fetch Data
        $data = [
            'banners'        => $bannerModel->where('isActive', 1)->orderBy('order', 'ASC')->findAll(),
            'news'           => $postModel->orderBy('createdAt', 'DESC')->findAll(4),
            'events'         => $eventModel->where('date >=', date('Y-m-d'))->orderBy('date', 'ASC')->findAll(5),
            'achievements'   => $achievementModel->orderBy('date', 'DESC')->findAll(3),
            'partners'       => $partnerModel->orderBy('name', 'ASC')->findAll(),
            'profile'        => $orgProfile,
            'chairperson'    => $boardModel->where('position', 'Ketua Umum')->first(),
            'countIndividu'  => $orgProfile['totalMembers'] ?? 25000,
            'countInstitusi' => $orgProfile['totalInstitutions'] ?? 850,
            'countMitra'     => $partnerModel->countAllResults(),
        ];

        // Fallback for profile if empty
        if (!$data['profile']) {
            $data['profile'] = [
                'officeName' => 'APTIKOM Jatim',
                'abbreviation' => 'APTIKOM Jatim',
                'address' => 'Jakarta, Indonesia'
            ];
        }

        return view('home', $data);
    }
}

<?php

namespace App\Controllers;

class Management extends BaseController
{
    public function index(): string
    {
        $boardModel = new \App\Models\BoardMemberModel();
        $allMembers = $boardModel->orderBy('order', 'ASC')->findAll();

        $leaders = [];
        $departments = [];

        $leaderPositions = ['Ketua Umum', 'Wakil Ketua Umum', 'Ketua', 'Wakil Ketua', 'Sekretaris Jenderal', 'Sekretaris', 'Bendahara Umum', 'Bendahara'];

        foreach ($allMembers as $member) {
            $isLeader = false;
            foreach ($leaderPositions as $pos) {
                if (stripos($member['position'], $pos) !== false && stripos($member['position'], 'Departemen') === false) {
                    $isLeader = true;
                    break;
                }
            }

            if ($isLeader) {
                $leaders[] = $member;
            } else {
                $departments[] = $member;
            }
        }

        return view('management', [
            'leaders' => $leaders,
            'departments' => $departments,
            'allMembers' => $allMembers
        ]);
    }
}

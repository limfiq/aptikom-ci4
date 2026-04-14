<?php

namespace App\Cells;

use App\Models\ContactInfoModel;

class FooterCell
{
    public function address(): string
    {
        $model = new \App\Models\OrganizationProfileModel();
        $profile = $model->first();

        // Fallback data
        if (!$profile) {
            $profile = [
                'officeName' => 'APTIKOM Jatim',
                'address'    => 'Jl. AMIKOM No. 1, Condongcatur, Depok',
                'phone'      => '+62 274 884201',
                'email'      => 'sekretariat@aptikom.org'
            ];
        }

        return view('cells/footer_address', ['profile' => $profile]);
    }

    public function social(): string
    {
        $model = new \App\Models\OrganizationProfileModel();
        $profile = $model->first();

        return view('cells/footer_social', ['profile' => $profile]);
    }
}

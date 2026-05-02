<?php

namespace App\Cells;

use App\Models\OrganizationProfileModel;

class FooterCell
{
    protected $model;

    public function __construct()
    {
        $this->model = new OrganizationProfileModel();
    }

    public function address(): string
    {
        $profile = $this->model->first();

        // Fallback data if DB is empty
        if (!$profile) {
            $profile = [
                'name'    => 'APTIKOM Jatim',
                'address' => 'Jl. AMIKOM No. 1, Condongcatur, Depok',
                'phone'   => '+62 274 884201',
                'email'   => 'sekretariat@aptikom.org'
            ];
        }

        return view('cells/footer_address', ['profile' => $profile]);
    }

    public function social(): string
    {
        $profile = $this->model->first();

        return view('cells/footer_social', ['profile' => $profile]);
    }
}

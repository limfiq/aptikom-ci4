<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('OrganizationProfileSeeder');
        $this->call('AddDepartemenMembersSeeder');
        $this->call('BrandingUpdateSeeder');
        $this->call('DatabaseCorrectionSeeder');
        $this->call('DemoSeeder');
        $this->call('OrganizeBoardSeeder');
    }
}

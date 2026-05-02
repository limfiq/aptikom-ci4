<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddChairpersonPhotoToOrganizationProfile extends Migration
{
    public function up()
    {
        $this->forge->addColumn('OrganizationProfile', [
            'chairpersonPhoto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'chairperson'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('OrganizationProfile', 'chairpersonPhoto');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrganizationProfileFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('organization_profile', [
            'fullName' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'abbreviation' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'establishedDate' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'legalStatus' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'registrationNumber' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'province' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'postalCode' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'facebook' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'twitter' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'instagram' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'linkedin' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'youtube' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'chairperson' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'secretary' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'treasurer' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'totalMembers' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'totalInstitutions' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'history' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'goals' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'objectives' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'structure' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('organization_profile', [
            'fullName',
            'abbreviation',
            'establishedDate',
            'legalStatus',
            'registrationNumber',
            'city',
            'province',
            'postalCode',
            'website',
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'youtube',
            'chairperson',
            'secretary',
            'treasurer',
            'totalMembers',
            'totalInstitutions',
            'history',
            'goals',
            'objectives',
            'structure',
        ]);
    }
}
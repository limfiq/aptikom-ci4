<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToEvents extends Migration
{
    public function up()
    {
        $this->forge->addColumn('events', [
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'open',
                'after'      => 'link',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('events', 'status');
    }
}

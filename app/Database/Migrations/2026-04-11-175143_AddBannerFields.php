<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBannerFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('banners', [
            'subtitle' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => true,
                'after'      => 'title',
            ],
            'backgroundImage' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'subtitle',
            ],
            'buttonText' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'backgroundImage',
            ],
            'buttonLink' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'buttonText',
            ],
            'order' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
                'after'      => 'buttonLink',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('banners', ['subtitle', 'backgroundImage', 'buttonText', 'buttonLink', 'order']);
    }
}

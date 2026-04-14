<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugToPosts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'title',
            ],
            'excerpt' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'content',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'published',
                'after'      => 'excerpt',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('posts', ['slug', 'excerpt', 'status']);
    }
}

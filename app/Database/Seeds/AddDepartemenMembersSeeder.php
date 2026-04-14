<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddDepartemenMembersSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $now = date('Y-m-d H:i:s');

        $db->table('board_members')->insertBatch([
            [
                'name'        => 'Dr. Agus Santoso, M.T.',
                'position'    => 'Ketua Departemen Kurikulum',
                'department'  => 'Kurikulum',
                'image'       => 'https://randomuser.me/api/portraits/men/32.jpg',
                'description' => 'Ahli kurikulum informatika.',
                'order'       => 10,
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
            [
                'name'        => 'Dr. Linda Sari, M.Kom.',
                'position'    => 'Ketua Departemen Kerjasama Internasional',
                'department'  => 'Kerjasama',
                'image'       => 'https://randomuser.me/api/portraits/women/32.jpg',
                'description' => 'Fokus pada kerjasama global.',
                'order'       => 11,
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
            [
                'name'        => 'Ir. Bambang Wijaya, Ph.D.',
                'position'    => 'Ketua Departemen Riset dan Inovasi',
                'department'  => 'Riset',
                'image'       => 'https://randomuser.me/api/portraits/men/44.jpg',
                'description' => 'Mendorong inovasi teknologi.',
                'order'       => 12,
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
        ]);

        echo "✅ Added department members.\n";
    }
}

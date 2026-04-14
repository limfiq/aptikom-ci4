<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrganizeBoardSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        
        // Cleanup Duplicates (Keep IDs 3 and 4 which are likely newer or more complete)
        $db->table('board_members')->whereIn('id', [1, 2])->delete();

        // 1. Mark Leaders
        $db->table('board_members')
            ->whereIn('position', ['Ketua Umum', 'Wakil Ketua Umum', 'Ketua', 'Wakil Ketua', 'Sekretaris Jenderal', 'Sekretaris', 'Bendahara Umum', 'Bendahara'])
            ->update(['department' => 'Leader']);

        // 2. Mark Departments for the rest (if department is empty)
        $db->table('board_members')
            ->where('department', '')
            ->update(['department' => 'Departemen']);
            
        // Also handling the case where department might be NULL
        $db->table('board_members')
            ->where('department', null)
            ->update(['department' => 'Departemen']);

        echo "✅ Board members organized into Leader and Departemen.\n";
    }
}

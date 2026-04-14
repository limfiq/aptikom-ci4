<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BrandingUpdateSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        $tables = [
            'posts' => ['title', 'content', 'excerpt'],
            'events' => ['title', 'description'],
            'banners' => ['title', 'subtitle'],
            'achievements' => ['title', 'description'],
            'board_members' => ['position', 'description'],
            'contact_info' => ['officeName'],
            'individual_members' => ['affiliation'],
            'member_institutions' => ['name'],
            'documents' => ['title', 'description'],
        ];

        foreach ($tables as $table => $columns) {
            foreach ($columns as $column) {
                // Use REPLACE to update "APTIKOM" to "APTIKOM Jatim"
                // but avoid doubling it if it's already "APTIKOM Jatim"
                $sql = "UPDATE {$table} SET {$column} = REPLACE({$column}, 'APTIKOM Jatim', 'APTIKOM') WHERE {$column} LIKE '%APTIKOM Jatim%'";
                $db->query($sql);
                
                $sql = "UPDATE {$table} SET {$column} = REPLACE({$column}, 'APTIKOM', 'APTIKOM Jatim') WHERE {$column} LIKE '%APTIKOM%'";
                $db->query($sql);
            }
        }

        // Clean up duplicates from DemoSeeder if any
        // Assuming IDs 3 and 4 were the ones added by my previous seeder run
        // Better to check if they are exact duplicates
        
        echo "✅ Branding updated in database tables.\n";
    }
}

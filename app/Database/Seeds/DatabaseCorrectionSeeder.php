<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseCorrectionSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        $tables = [
            'posts' => ['title', 'content', 'excerpt', 'slug'],
            'events' => ['title', 'description', 'link'],
            'banners' => ['title', 'subtitle'],
            'achievements' => ['title', 'description'],
            'board_members' => ['position', 'description'],
            'contact_info' => ['officeName', 'address', 'city', 'email', 'facebook', 'twitter', 'instagram', 'linkedin'],
            'individual_members' => ['affiliation'],
            'member_institutions' => ['name', 'website'],
            'documents' => ['title', 'description'],
        ];

        foreach ($tables as $table => $columns) {
            foreach ($columns as $column) {
                // 1. First, temporarily protect URLs and emails
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'aptikom.org', '###URL1###')");
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'aptikom-jatim.id', '###URL2###')");
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'sekretariat@aptikom', '###EMAIL1###')");
                
                // 2. Normalize: remove any double tagging "APTIKOM Jatim Jatim"
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'APTIKOM Jatim Jatim', 'APTIKOM Jatim')");
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'APTIKOM JAWA TIMUR', 'APTIKOM Jatim')");
                
                // 3. Perform the replace "APTIKOM" -> "APTIKOM Jatim"
                // Using binary to be precise or just standard replace
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'APTIKOM', 'APTIKOM Jatim') WHERE {$column} NOT LIKE '%###%'");
                
                // 4. One more normalize in case Step 3 created duplicates
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, 'APTIKOM Jatim Jatim', 'APTIKOM Jatim')");

                // 5. Restore URLs and emails
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, '###URL1###', 'aptikom.org')");
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, '###URL2###', 'aptikom-jatim.id')");
                $db->query("UPDATE {$table} SET {$column} = REPLACE({$column}, '###EMAIL1###', 'sekretariat@aptikom')");
            }
        }

        // Special fix for contact_info email which might have been corrupted already
        $db->query("UPDATE contact_info SET email = 'sekretariat@aptikom.org' WHERE email LIKE '%aptikom%'");
        $db->query("UPDATE contact_info SET officeName = 'APTIKOM Jatim' WHERE officeName LIKE 'APTIKOM%'");
        
        // Ensure "Sejarah APTIKOM" becomes "Sejarah APTIKOM Jatim"
        $db->query("UPDATE posts SET content = REPLACE(content, 'Sejarah APTIKOM', 'Sejarah APTIKOM Jatim')");

        echo "✅ Database corruption fixed and branding refined.\n";
    }
}

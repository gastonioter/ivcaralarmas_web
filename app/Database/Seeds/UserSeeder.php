<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        

        for ($i=1; $i <= 5; $i++) { 
            $data = [
                'user_name' => "gaston $i",
                'user_email' => "gaston$i@gmail.com"
                'user_category_id'    => '5'
            ];
            $this->db->table('users')->insert($data);
        }
        
    }
}

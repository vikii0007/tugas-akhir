<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data user yang akan diinsert
        $data = [
            'username' => 'viky',
            'password' => password_hash('123456', PASSWORD_DEFAULT), // Hashing password
        ];

        // Insert data ke tabel users
        $this->db->table('users')->insert($data);
    }
}

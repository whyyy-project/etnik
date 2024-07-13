<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Data seeder Admin
        $data = [
            [
                'name' => 'Wahyu Nur Cahyo',
                'email' => 'wahyu.nur.cahyo.id@gmail.com',
                'password' => password_hash('wahyunur', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cahyo Admin',
                'email' => 'wahyu241200@gmail.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel 'users'
        $this->db->table('users')->insertBatch($data);
    }
}

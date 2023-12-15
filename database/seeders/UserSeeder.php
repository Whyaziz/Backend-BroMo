<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data to be inserted into the "users" table
        $usersData = [
            [
                'nama_lengkap' => 'muhammad Rizky aziz',
                'username' => 'whyaziz',
                'password' => '$2y$10$aQWXJSSKXmG42gDLAOCxyOMRyRbl9JJDIFJx9et5Xuya.gkgQ9soW', // bcrypt('your_password')
                'status' => 'owner',
                'email' => 'rizkyaziz214@gmail.com',
                'no_telepon' => '087738536722',
            ],
            [
                'nama_lengkap' => 'Bima Bayu Sofana',
                'username' => 'bimacst',
                'password' => '$2y$10$deuoI1GmNP3Y29Y3jGOcSuIpDQXnsJrj5I45h30d4pDk3OvDmQrrS', // bcrypt('your_password')
                'status' => 'anak kandang',
                'email' => 'bimacst@gmail.com',
                'no_telepon' => '087738526722',
            ],
            [
                'nama_lengkap' => 'Wildan Dzaki Ramadanie',
                'username' => 'wildancst',
                'password' => '$2y$10$2vDvqamzywxWqh5F3wduK.dB7m43Ack7VWkW7fbabN8Senyd8S4W2', // bcrypt('your_password')
                'status' => 'anak kandang',
                'email' => 'wildan@gmail.com',
                'no_telepon' => '087738526722',
            ],
            [
                'nama_lengkap' => 'Yuda Mahendra',
                'username' => 'yudacst',
                'password' => '$2y$10$ivTo7JJ1otE4foLL.roG0eFfkcq3n0RBkbtJPvKmSUANG3F7MlnsW', // bcrypt('your_password')
                'status' => 'anak kandang',
                'email' => 'yuda@gmail.com',
                'no_telepon' => '087738526722',
            ],
            [
                'nama_lengkap' => 'Bruno Frenandesh',
                'username' => 'bruno',
                'password' => '$2y$10$xHe0tryOFwdu6mhf4VWTY.9XzwDcrbElK0vnPI8OUAfrYiDEhOEHi', // bcrypt('your_password')
                'status' => 'anak kandang',
                'email' => 'yuda@gmail.com', // Note: This email is duplicated in the provided data
                'no_telepon' => '087738526722',
            ],
        ];

        // Insert data into the "users" table
        DB::table('users')->insert($usersData);
    }
}

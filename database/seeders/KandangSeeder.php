<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KandangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data to be inserted into the "kandangs" table
        $kandangsData = [
            [
                'id_user' => 2,
                'nama_kandang' => 'Kandang Sleman Ngaglik',
                'luas_kandang' => 120,
                'alamat_kandang' => 'Jl. Klaseman I No.15, Ngabean Wetan, Sinduharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581',
                'tanggal_mulai' => '2023-12-10',
                'rehat' => 'aktif',
            ],
            [
                'id_user' => 3,
                'nama_kandang' => 'Kandang Sleman Mlati',
                'luas_kandang' => 320,
                'alamat_kandang' => 'Jl. Magelang No.5,2, Kutu Dukuh, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284',
                'tanggal_mulai' => '2023-12-10',
                'rehat' => 'rehat',
            ],
            [
                'id_user' => 4,
                'nama_kandang' => 'Kandang Sleman Depok',
                'luas_kandang' => 240,
                'alamat_kandang' => 'Jl. Affandi No.1, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281',
                'tanggal_mulai' => '2023-12-10',
                'rehat' => 'aktif',
            ],
            [
                'id_user' => 5,
                'nama_kandang' => 'Kandang Bantul Kasihan',
                'luas_kandang' => 440,
                'alamat_kandang' => 'Jl. Kasongan No.3, Kajen, Bangunjiwo, Kec. Kasihan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55184',
                'tanggal_mulai' => '2023-12-10',
                'rehat' => 'aktif',
            ],
            [
                'id_user' => 2,
                'nama_kandang' => 'kandang sleman tempel',
                'luas_kandang' => 300,
                'alamat_kandang' => 'Tempel, Sleman, Yogyakarta',
                'tanggal_mulai' => '2023-12-15',
                'rehat' => 'aktif',
            ],
        ];

        // Insert data into the "kandangs" table
        DB::table('kandangs')->insert($kandangsData);
    }
}

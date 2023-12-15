<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKandangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data to be inserted into the "data_kandangs" table
        $dataKandangsData = [
            [
                'id_kandang' => 1,
                'pakan' => 100.00,
                'minum' => 20.00,
                'bobot' => 25.00,
                'date' => '2023-12-10 05:12:52',
                'populasi' => 998,
                'jumlah_kematian' => 2,
            ],
            [
                'id_kandang' => 2,
                'pakan' => 240.00,
                'minum' => 40.00,
                'bobot' => 25.00,
                'date' => '2023-12-10 05:13:36',
                'populasi' => 1988,
                'jumlah_kematian' => 12,
            ],
            [
                'id_kandang' => 3,
                'pakan' => 140.00,
                'minum' => 30.00,
                'bobot' => 25.00,
                'date' => '2023-12-10 05:14:21',
                'populasi' => 128,
                'jumlah_kematian' => 2,
            ],
            [
                'id_kandang' => 3,
                'pakan' => 140.00,
                'minum' => 30.00,
                'bobot' => 25.00,
                'date' => '2023-12-10 05:14:22',
                'populasi' => 128,
                'jumlah_kematian' => 2,
            ],
            [
                'id_kandang' => 4,
                'pakan' => 160.00,
                'minum' => 34.00,
                'bobot' => 25.00,
                'date' => '2023-12-10 05:14:40',
                'populasi' => 128,
                'jumlah_kematian' => 2,
            ],
            [
                'id_kandang' => 1,
                'pakan' => 100.00,
                'minum' => 50.00,
                'bobot' => 250.00,
                'date' => '2023-12-15 08:01:27',
                'populasi' => 769,
                'jumlah_kematian' => 3,
            ],
        ];

        // Insert data into the "data_kandangs" table
        DB::table('data_kandangs')->insert($dataKandangsData);
    }
}

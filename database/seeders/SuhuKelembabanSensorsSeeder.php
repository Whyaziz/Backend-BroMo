<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuhuKelembabanSensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data to be inserted into the "suhu_kelembaban_sensors" table
        $suhuKelembabanSensorsData = [
            [
                'id_kandang' => 1,
                'suhu' => 30,
                'kelembaban' => 70,
                'time' => '2023-12-10 05:06:35',
            ],
            [
                'id_kandang' => 2,
                'suhu' => 32,
                'kelembaban' => 77,
                'time' => '2023-12-10 05:06:35',
            ],
            [
                'id_kandang' => 3,
                'suhu' => 33,
                'kelembaban' => 68,
                'time' => '2023-12-10 05:06:35',
            ],
            [
                'id_kandang' => 4,
                'suhu' => 29,
                'kelembaban' => 76,
                'time' => '2023-12-10 05:06:35',
            ],
        ];

        // Insert data into the "suhu_kelembaban_sensors" table
        DB::table('suhu_kelembaban_sensors')->insert($suhuKelembabanSensorsData);
    }
}

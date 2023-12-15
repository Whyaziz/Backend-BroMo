<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmoniakSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data to be inserted into the "amoniak_sensors" table
        $amoniakSensorsData = [
            [
                'id_kandang' => 1,
                'time' => '2023-12-10 05:04:07',
                'amoniak' => 25,
            ],
            [
                'id_kandang' => 2,
                'time' => '2023-12-10 05:04:07',
                'amoniak' => 28,
            ],
            [
                'id_kandang' => 3,
                'time' => '2023-12-10 05:04:07',
                'amoniak' => 36,
            ],
            [
                'id_kandang' => 4,
                'time' => '2023-12-10 05:04:07',
                'amoniak' => 25,
            ],
        ];

        // Insert data into the "amoniak_sensors" table
        DB::table('amoniak_sensors')->insert($amoniakSensorsData);
    }
}

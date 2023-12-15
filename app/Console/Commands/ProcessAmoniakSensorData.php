<?php

namespace App\Console\Commands;

use App\Models\AmoniakSensor;
use App\Models\RekapData;
use App\Models\RekapDataHarian;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ProcessAmoniakSensorData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-amoniak-sensor-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $latestDate = AmoniakSensor::max('date');

        $sensorData = AmoniakSensor::select('date', DB::raw('AVG(amoniak) as average_amoniak'))
        ->groupBy('date')
        ->orderBy('date','desc')
        ->first();

        RekapDataHarian::create([
            'date' => $latestDate,
            'amoniak' => $sensorData->average_amoniak, // Corrected line
            'id_kandang' => 1,
            'suhu' => 10,
            'kelembaban' => 20,
        ]);

        $this->info($sensorData->average_amoniak); // Corrected line
    }
}

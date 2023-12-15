<?php

namespace App\Listeners;

use App\Events\AmoniakProccess;
use App\Models\AmoniakSensor;
use App\Models\RekapData;
use App\Models\RekapDataHarian;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AmoniakProccessListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AmoniakProccess $event): void
    {
        //
        $date = $event->date;
        $average = AmoniakSensor::whereDate('date',$date)
        ->avg('amoniak');


        RekapDataHarian::create([
            'id_kandang'=>1,
            'date'=>$date,
            'amoniak'=> $average,
            'suhu'=>10,
            'kelembaban'=>20,
        ]);
    }
}

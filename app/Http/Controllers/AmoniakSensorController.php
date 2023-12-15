<?php

namespace App\Http\Controllers;

use App\Http\Resources\AmoniakResource;
use App\Models\AmoniakSensor;
use App\Http\Requests\StoreAmoniakSensorRequest;
use App\Http\Requests\UpdateAmoniakSensorRequest;
use Exception;

class AmoniakSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_kandang)
    {
        try {
            // Retrieve the latest amoniak data for the given kandang
            $amoniak = AmoniakSensor::where('id_kandang', $id_kandang)
                ->orderBy('time', 'desc')  
                ->limit(1)
                ->get();

            return AmoniakResource::collection($amoniak);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e
            ], 400);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAmoniakSensorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AmoniakSensor $amoniakSensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AmoniakSensor $amoniakSensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAmoniakSensorRequest $request, AmoniakSensor $amoniakSensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmoniakSensor $amoniakSensor)
    {
        //
    }
}

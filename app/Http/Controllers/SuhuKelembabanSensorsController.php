<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuhuKelembabanResource;
use App\Models\SuhuKelembabanSensor;
use Exception;
use Illuminate\Http\Request;

class SuhuKelembabanSensorsController extends Controller
{

    //GET semua data suhu kelembaban dari suatu kandang
    public function index($id_kandang)
{
    try {
        // Menggunakan latest() untuk mengurutkan data berdasarkan created_at secara descending
        $latestSuhuKelembaban = SuhuKelembabanSensor::where('id_kandang', $id_kandang)
            ->latest('time')
            ->first();

        // Memeriksa apakah data ditemukan sebelum memberikannya ke resource
        if ($latestSuhuKelembaban) {
            return new SuhuKelembabanResource($latestSuhuKelembaban);
        } else {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        }
    } catch (Exception $e) {
        return response()->json([
            'error' => $e,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuhuKelembabanSensorsController $suhuKelembabanSensors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuhuKelembabanSensorsController $suhuKelembabanSensors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuhuKelembabanSensorsController $suhuKelembabanSensors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuhuKelembabanSensorsController $suhuKelembabanSensors)
    {
        //
    }
}
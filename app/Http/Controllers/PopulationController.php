<?php

namespace App\Http\Controllers;

use App\Models\Population;
use App\Http\Requests\StorePopulationRequest;
use App\Http\Requests\UpdatePopulationRequest;
use App\Models\DataKematian;
use Exception;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try{
            $request->validate([
                'id_kandang' => 'required|integer|exists:kandangs,id',
                'populasi' => 'required|integer',
                'total_kematian' => 'required|integer',
            ]);

            $populasi = Population::create($request->all());

            return response()->json([
                'message' => 'Population has been created succesfully',
                'data' => $populasi,
            ], 201);

        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Population $population)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Population $population)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Population $population, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kandang)
    {
        try{
            $population = Population::where('id_kandang', $id_kandang);
            $dataKematian = DataKematian::where('id_population', $population->id);
            $dataKematian->delete();
            $population->delete();

            return response()->json([
                "status" => "Success"
            ],200);
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ], 400);
        }
    }
}
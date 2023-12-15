<?php

namespace App\Http\Controllers;

use App\Models\DataKematian;
use App\Http\Requests\StoreDataKematianRequest;
use App\Http\Requests\UpdateDataKematianRequest;
use App\Models\Population;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataKematianController extends Controller
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
                'jam' => 'required|integer',
                'kematian' => 'required|integer',
                'id_population'=>'required|exists:populations,id'
            ]);



            $populasiTerkini = Population::first();

            $kematian=((int)$request->kematian);

            $pop=(int)$populasiTerkini->populasi;

            $seconds =(int) $request->jam;
            $hour=$seconds*3600;
            $time = Carbon::createFromTimestamp($hour)->format('H:i:s');

            if ($pop>$kematian)
            {
                $populasiTerkini->populasi -= $request->kematian;
                $populasiTerkini->total_kematian += $request->kematian;
                $populasiTerkini->save();

                $dataKematian = DataKematian::create($request->all());

                return response()->json([
                    'message' => 'Data Kematian created successfully',
                    'data' => $dataKematian,
                ], 201);
            }else{
                return response()->json([
                    'message'=> 'tolol dikit ga ngaruh',
                ],400 );
            }
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataKematian $dataKematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataKematian $dataKematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataKematianRequest $request, DataKematian $dataKematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKematian $dataKematian)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Validation\ValidationException;
use App\Models\DataKandang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDataKandangRequest;
use App\Http\Resources\DataKandangResource;
use App\Models\Kandang;
use Carbon\Carbon;

class DataKandangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            $dataKandang = DataKandang::with('Kandang')->find($id);

            if (!$dataKandang) {
                return response()->json([
                    'error' => [
                        'message' => 'Data not found',
                    ],
                ], 404);
            }
            
            $formatedDataKandang = [
                "id" => $dataKandang->id,
                "id_kandang" => $dataKandang->id_kandang,
                'kandang' => $dataKandang->Kandang ? $dataKandang->Kandang->nama_kandang : null,
                "date" => $dataKandang->date,
                "pakan" => $dataKandang->pakan,
                "minum" => $dataKandang->minum,
                "bobot" => $dataKandang->date,
                "populasi" => $dataKandang->populasi,
                "jumlah_kematian" => $dataKandang->jumlah_kematian,
            ];

            return response()->json([
                'message' => 'Data Kandang retrieved successfully',
                'data' => $formatedDataKandang,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ], 500);
        }
    }

    public function getAllDataKandang()
    {
        try {
            $dataKandang = DataKandang::with('Kandang')->get();
            
            $formatedDataKandang = $dataKandang->map(function ($dataDaily) {
                return [
                    "id" => $dataDaily->id,
                    "id_kandang" => $dataDaily->id_kandang,
                    'kandang' => $dataDaily->Kandang ? $dataDaily->Kandang->nama_kandang : null,
                    "date" => $dataDaily->date,
                    "pakan" => $dataDaily->pakan,
                    "minum" => $dataDaily->minum,
                    "bobot" => $dataDaily->date,
                    "populasi" => $dataDaily->populasi,
                    "jumlah_kematian" => $dataDaily->jumlah_kematian,
                ];
            });

            return response()->json([
                'message' => 'Data Kandang retrieved successfully',
                'data' => $formatedDataKandang,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ], 500);
        }
    }

    public function getDataKandangLatestDate($id)
    {
        try {
            // Find the latest data for the specified kandang ID
            $latestDataKandang = DataKandang::where('id_kandang', $id)
                ->orderBy('date', 'desc')
                ->first();

            if (!$latestDataKandang) {
                return response()->json([
                    'error' => [
                        'message' => 'Data not found for the specified kandang ID',
                    ],
                ], 404);
            }

            $formattedDataKandang = [
                "id" => $latestDataKandang->id,
                "id_kandang" => $latestDataKandang->id_kandang,
                "date" => $latestDataKandang->date,
                "pakan" => $latestDataKandang->pakan,
                "minum" => $latestDataKandang->minum,
                "bobot" => $latestDataKandang->bobot,
                "populasi" => $latestDataKandang->populasi,
                "jumlah_kematian" => $latestDataKandang->jumlah_kematian,
            ];

            return response()->json([
                'message' => 'Latest data for the specified kandang retrieved successfully',
                'data' => $formattedDataKandang,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ], 500);
        }
    }

    public function search($tanggal_mulai, $tanggal_panen, $nama_kandang)
    {
    $tanggal_panen = $tanggal_panen ? $tanggal_panen : Carbon::now()->toDateString();

        try {
            $dataKandang = DataKandang::with('Kandang')
            ->whereDate('date', '<=', $tanggal_panen)
            ->whereDate('date', '>=', $tanggal_mulai);

            if ($nama_kandang == "none") {
                
            }else{
                $dataKandang->whereHas('Kandang', function ($query) use ($nama_kandang) {
                    $query->where('nama_kandang', 'like', '%' . $nama_kandang . '%');
                });
            }

            $dataKandang = $dataKandang->orderBy('date', 'asc')
            ->get();
            
            $formatedDataKandang = $dataKandang->map(function ($dataDaily) {
                return [
                    "id" => $dataDaily->id,
                    "id_kandang" => $dataDaily->id_kandang,
                    'kandang' => $dataDaily->Kandang ? $dataDaily->Kandang->nama_kandang : null,
                    "date" => $dataDaily->date,
                    "pakan" => $dataDaily->pakan,
                    "minum" => $dataDaily->minum,
                    "bobot" => $dataDaily->date,
                    "populasi" => $dataDaily->populasi,
                    "jumlah_kematian" => $dataDaily->jumlah_kematian,
                ];
            });

            return response()->json([
                'data' => $formatedDataKandang,
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
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
        try {
            $request->validate([
                "pakan" => "required|numeric",
                "id_kandang" => "required|exists:kandangs,id",
                "minum" => "required|numeric",
                "bobot" => "required|numeric",
                "populasi" => "required|numeric",
                "jumlah_kematian" => "required|numeric",
            ], [
                'required' => 'The :attribute field is required.',
                'numeric' => 'The :attribute field must be a number.',
                'exists' => 'The selected :attribute is invalid.',
            ]);

            $dataKandang = DataKandang::create($request->all());

            return response()->json([
                'message' => 'Data Kandang created successfully',
                'data' => $dataKandang,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->validator->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataKandang $dataKandang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataKandang $dataKandang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataKandangRequest $request, DataKandang $dataKandang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKandang $dataKandang)
    {
        //
    }
}
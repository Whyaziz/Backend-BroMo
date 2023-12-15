<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataPanenResource;
use App\Models\Kandang;
use App\Models\Panen;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePanenRequest;
use Carbon\Carbon;
use Exception;

class PanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $panen = Panen::with('Kandang')->get();
            
            $formattedPanen = $panen->map(function ($panenItem) {
                return [
                    "id" => $panenItem->id,
                    "id_kandang" => $panenItem->id_kandang,
                    'kandang' => $panenItem->Kandang ? $panenItem->Kandang->nama_kandang : null,
                    "tanggal_mulai" => $panenItem->tanggal_mulai,
                    "tanggal_panen" => $panenItem->tanggal_panen,
                    "jumlah_panen" => $panenItem->jumlah_panen,
                    "bobot_total" => $panenItem->bobot_total,
                ];
            });

            return response()->json([
                'data' => $formattedPanen,
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 400);
        }
    }
    public function search($tanggal_mulai, $tanggal_panen, $nama_kandang)
    {
        $tanggal_panen = $tanggal_panen ? $tanggal_panen : Carbon::now()->toDateString();

        try {
            $panen = Panen::with('Kandang')
            ->whereDate('tanggal_panen', '<=', $tanggal_mulai)
            ->whereDate('tanggal_panen', '>=', $tanggal_panen);

            if ($nama_kandang == "none") {
                
            }else{
                $panen->whereHas('Kandang', function ($query) use ($nama_kandang) {
                    $query->where('nama_kandang', 'like', '%' . $nama_kandang . '%');
                });
            }
            $panen = $panen->orderBy('tanggal_mulai', 'asc')
            ->get();
            
            $formattedPanen = $panen->map(function ($panenItem) {
                return [
                    "id" => $panenItem->id,
                    "id_kandang" => $panenItem->id_kandang,
                    'kandang' => $panenItem->Kandang ? $panenItem->Kandang->nama_kandang : null,
                    "tanggal_mulai" => $panenItem->tanggal_mulai,
                    "tanggal_panen" => $panenItem->tanggal_panen,
                    "jumlah_panen" => $panenItem->jumlah_panen,
                    "bobot_total" => $panenItem->bobot_total,
                ];
            });

            return response()->json([
                'data' => $formattedPanen,
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

        try{
            $request->validate([
                "id_kandang"=> "required|exists:kandangs,id",
                "tanggal_mulai"=> "required|date",
                "jumlah_panen"=> "required|integer",
                "bobot_total"=> "required|integer",
                "tanggal_panen"=> "nullable|date",
            ]);

            $panen = Panen::create($request->all());

            return response()->json([
                'message' => 'Data successfully added.',
                'data' => new DataPanenResource($panen),
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
    public function show(Panen $panen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panen $panen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePanenRequest $request, Panen $panen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panen $panen)
    {
        //
    }
}

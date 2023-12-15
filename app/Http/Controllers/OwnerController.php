<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Kandang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\KandangDetailResource;

class OwnerController extends Controller
{
    //GET semua kandang yang ada
    public function index()
    {
        try{
            $kandang = Kandang::with('User:id,username')->get();
            return KandangDetailResource::collection($kandang);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ]);
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
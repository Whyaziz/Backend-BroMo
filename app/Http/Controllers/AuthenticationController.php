<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|max:50',
                'password' => 'required',
            ]);
        
            $user = User::where('username', $request->username)->first();
        
            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['The provided credentials are incorrect.'],
                ]);
            }
            
            $token = $user->createToken($user->username)->plainTextToken;
            $status = $user->status;
            $nama = $user->nama_lengkap;
            $id = $user->id;

            return response()->json([
                "token" => $token,
                "level" => $status,
                "id" => $id,
                "nama" => $nama
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
        
    }

    public function registerAnakKandang(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|max:50',
            'no_telepon' => 'required'
        ]);
   
        try{
            $user = User::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'status' => 'anak kandang',
                'password' => Hash::make($validated['password']),
                'no_telepon' => $validated['no_telepon']
            ]);
            return response()->json([
                'username' => $user->username,
                'status' => 'Success'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'error' => $e
            ],400);
        } 
    }

    public function registerOwner(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|max:50',
            'no_telepon' => 'required'
        ]);
   
        try{
            $user = User::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'status' => 'owner',
                'password' => Hash::make($validated['password']),
                'no_telepon' => $validated['no_telepon']
            ]);
            return response()->json([
                'username' => $user->username,
                'status' => 'Success'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'error' => $e
            ],400);
        } 
    }

    public function logout(Request $request)
    {
        try{
            $username = $request->user()->username;
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                "username" => $username,
                "status" => "Berhasil Logout"
            ],200);
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ]);
        }
    }
}
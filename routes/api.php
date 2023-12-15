<?php

use App\Http\Controllers\AmoniakSensorController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DataKandangController;
use App\Http\Controllers\DataKematianController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\SuhuKelembabanSensorsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//API Login
Route::post('/login', [AuthenticationController::class, 'login']);

// Register akun dibagi 2, buat anak kandang sama owner
Route::post('/register-anak-kandang', [AuthenticationController::class, 'registerAnakKandang']);
Route::post('/register-owner', [AuthenticationController::class, 'registerOwner']);


Route::middleware(['auth:sanctum'])->group( function () {
    /**
     * API Kandang(Anak Kandang)
     */
    //API Index anak kandang cuman buat nampilin kandang yang dia jagain
    Route::get('/kandangByUser/{id}', [KandangController::class, 'index']);
    //API buat liat kandang spesifik
    Route::get('/kandang/{id}', [KandangController::class, 'show']);


    /**
     * API Data Kandang
     */
    // Route::get('/kandang/{id}/data-kandang', [DataKandangController::class, 'index']);
    Route::post('/anak-kandang/data-kandang',[DataKandangController::class,'store']);
    Route::get('/data-kandang',[DataKandangController::class,'getAllDataKandang']);
    Route::get('/data-kandang/{id}',[DataKandangController::class,'index']);
    Route::get('/data-kandang-search/{tanggal_mulai}/{tanggal_panen}/{nama_kandang}',[DataKandangController::class,'search']);
    Route::get('/data-kandang-by-kandang/{id}',[DataKandangController::class,'getDataKandangLatestDate']);
    
    Route::get('/notification/{id}',[NotificationController::class,'index']);
    Route::get('/notificationById/{id}',[NotificationController::class,'searchById']);
    Route::get('/notification-all',[NotificationController::class,'show']);
    Route::post('/notification',[NotificationController::class,'store']);
    /**
     * API Population
     */
    Route::post('/population', [PopulationController::class, 'store']);
    Route::delete('/population/{id_kandang}', [PopulationController::class, 'destroy']);
    
    /**
     * API Account
     */
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::patch('/pekerja/{id}', [UserController::class, 'updatePekerja']);
    Route::middleware(['pemilik-akun'])->group(function () {
        //API user mengupdate informasi diri
        Route::patch('/user/{id}', [UserController::class, 'update']);
    });
    //API Logout
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    //API Panen
    Route::get('/panen', [PanenController::class, 'index']);
    Route::post('/panen', [PanenController::class, 'store']);
    Route::get('/panen/{tanggal_mulai}/{tanggal_panen}/{nama_kandang}', [PanenController::class, 'search']);

    //API Sensor
    Route::get('/sensor-suhu-kelembaban/{id}', [SuhuKelembabanSensorsController::class, 'index']);
    Route::get('/sensor-amoniak/{id}', [AmoniakSensorController::class, 'index']);

    /**
     * API Owner
     */
    Route::middleware(['owner-access'])->group(function () {
        /**
         * API Kandang
         */
        //API buat kandang baru
        Route::post('/owner/kandang', [KandangController::class, 'store']);
        //API untuk update kandang
        Route::patch('/owner/kandang/{id}', [KandangController::class, 'update']);
        Route::patch('/owner/kandang-rehat/{id}', [KandangController::class, 'rehat']);
        // API untuk delete kandang
        Route::delete('/owner/kandang/{id}', [KandangController::class, 'destroy']);
        //Owner access bisa melihat semua kandang
        Route::get('/owner/kandang', [OwnerController::class, 'index']);

        Route::delete('/user/{id}', [UserController::class, 'destroy']);
        /**
         * API User
         */
        //Owner bisa melihat semua user yang statusnya anak kandang
        Route::get('/owner/user', [UserController::class, 'index']);
        Route::delete('/owner/delete-user/{id}', [UserController::class, 'deleteUserById']);
        //Owner bisa melihat anak kandang berdasarkan ID
        Route::get('/owner/user/{id}', [UserController::class, 'show']);
    });

    Route::middleware(['anak-kandang-access'])->group(function () {

        
        Route::post('/anak-kandang/data-kematian', [DataKematianController::class,'store']);

    });
});
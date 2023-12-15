<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use Exception;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            // Assuming Notification is your model
            $latestNotif = Notification::where('id_kandang', $id)
            ->with('Kandang')
            ->latest('date')
            ->first();
            
            if (!$latestNotif) {
                return response()->json([
                    'message' => 'No notification found for the specified barn ID.',
                ], 404);
            }
    
            $formattedNotif = [
                "id" => $latestNotif->id,
                "id_kandang" => $latestNotif->id_kandang,
                'kandang' => $latestNotif->Kandang ? $latestNotif->Kandang->nama_kandang : null,
                "date" => $latestNotif->date,
                "message" => $latestNotif->message,
                "prediksi" => $latestNotif->prediksi,
            ];

            return response()->json([
                'data' => $formattedNotif,
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 400);
        }
    }

    public function searchById($id)
    {
        try {
            // Assuming Notification is your model
            $latestNotif = Notification::where('id', $id)
            ->with('Kandang')
            ->latest('date')
            ->first();
            
            if (!$latestNotif) {
                return response()->json([
                    'message' => 'No notification found for the specified barn ID.',
                ], 404);
            }
    
            $formattedNotif = [
                "id" => $latestNotif->id,
                "id_kandang" => $latestNotif->id_kandang,
                'kandang' => $latestNotif->Kandang ? $latestNotif->Kandang->nama_kandang : null,
                "date" => $latestNotif->date,
                "message" => $latestNotif->message,
                "prediksi" => $latestNotif->prediksi,
            ];

            return response()->json([
                'data' => $formattedNotif,
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
                "id_kandang" => "required|exists:kandangs,id",
                "message" => 'required',
                "prediksi" => 'required|integer',
            ]);

            $notif = Notification::create($request->all());

            return response()->json([
                'message' => 'Data successfully added.',
                'data' => new NotificationResource($notif),
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
    public function show()
    {
        try {
            // Assuming Notification is your model
            $allNotifications = Notification::where('prediksi', '>=', 10)
                ->with('Kandang')
                ->get();
            
            if ($allNotifications->isEmpty()) {
                return response()->json([
                    'message' => 'No notifications found for the specified barn ID.',
                ], 404);
            }
    
            $formattedNotifications = $allNotifications->map(function ($notification) {
                return [
                    "id" => $notification->id,
                    "id_kandang" => $notification->id_kandang,
                    'kandang' => $notification->Kandang ? $notification->Kandang->nama_kandang : null,
                    "date" => $notification->date,
                    "message" => $notification->message,
                    "prediksi" => $notification->prediksi,
                ];
            });
    
            return response()->json([
                'data' => $formattedNotifications,
            ]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}

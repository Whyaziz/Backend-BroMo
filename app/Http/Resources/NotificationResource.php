<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "id_kandang" => $this->id_kandang,
            'kandang' => $this->whenLoaded('Kandang'),
            "message" => $this->message,
            "date" => $this->date,
            "prediksi" => $this->prediksi,
        ];
    }
}

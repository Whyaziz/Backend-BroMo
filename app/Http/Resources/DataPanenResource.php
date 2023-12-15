<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataPanenResource extends JsonResource
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
            "tanggal_mulai" => $this->tanggal_mulai,
            "tanggal_panen" => $this->tanggal_panen,
            "jumlah_panen" => $this->jumlah_panen,
            "bobot_total" => $this->bobot_total,
        ];
    }
}

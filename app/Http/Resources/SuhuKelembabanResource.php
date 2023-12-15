<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuhuKelembabanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_kandang" => $this->id_kandang,
            "suhu" => $this->suhu,
            "kelembaban" => $this->kelembaban,
            "time" => $this->time,
        ];
    }
}
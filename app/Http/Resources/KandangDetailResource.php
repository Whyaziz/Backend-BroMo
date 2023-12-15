<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KandangDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'anak_kandang' => $this->whenLoaded('User'),
            'nama_kandang' => $this->nama_kandang,
            'luas_kandang' => $this->luas_kandang,
            'tanggal_mulai' => $this->tanggal_mulai,
            'alamat_kandang' => $this->alamat_kandang,
            'rehat' => $this->rehat,
        ];
    }
}

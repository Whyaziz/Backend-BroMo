<?php

namespace App\Models;

use App\Models\Kandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panen extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_kandang',
        'tanggal_mulai',
        'jumlah_panen',
        'bobot_total',
        'tanggal_panen'
    ];

    protected $guarded = [
        'id_panen',
    ];

    public function Kandang(){
        return $this->belongsTo(Kandang::class, 'id_kandang', 'id');
    }
}
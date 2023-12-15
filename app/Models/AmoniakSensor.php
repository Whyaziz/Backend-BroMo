<?php

namespace App\Models;

use App\Models\Kandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmoniakSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'amoniak',
        'id_kandang',
    ];
    public $timestamps = false;

    public function Kandang(){
        return $this->belongsTo(Kandang::class);
    }
}
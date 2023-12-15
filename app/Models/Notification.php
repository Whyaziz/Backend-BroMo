<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_kandang',
        'message',
        'prediksi',
    ];

    protected $guarded = [
        'date',
    ];

    public function Kandang(){
        return $this->belongsTo(Kandang::class, 'id_kandang', 'id');
    }
}

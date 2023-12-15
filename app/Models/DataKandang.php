<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kandang;
use App\Models\DataKematian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKandang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kandang',
        'pakan',
        'minum',
        'bobot',
        'populasi',
        'jumlah_kematian'
    ];

    protected $guarded = [
        'id_data_kandang'
    ];

    public $timestamps=false;

    public function Kandang(){
        return $this->belongsTo(Kandang::class, 'id_kandang', 'id');
    }
    

    public function DataKematian(){
        return $this->hasMany(DataKematian::class);
    }
}

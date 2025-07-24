<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kemasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kemasan',
        'tanggal_produksi',
        'tanggal_kadaluarsa',
        'petunjuk_penyimpanan',
    ];

    public function obats(){
    return $this->hasMany(Obat::class);
    }
}
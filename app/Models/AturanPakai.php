<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AturanPakai extends Model
{
    use HasFactory;

    protected $fillable = [
        'frekuensi_pemakaian',
        'waktu_pemakaian',
        'deskripsi',
    ];

    public function obats(){
    return $this->hasMany(Obat::class);
    }
}
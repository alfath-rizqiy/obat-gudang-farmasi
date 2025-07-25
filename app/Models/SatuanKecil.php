<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SatuanKecil extends Model
{
    use HasFactory;

    protected $table = 'satuan_kecils';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];
}
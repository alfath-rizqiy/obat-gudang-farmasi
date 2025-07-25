<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SatuanBesar extends Model
{
    protected $table = 'satuan_besars';

    protected $fillable = [
        'nama',
        'deskripsi',
        'jumlah_satuankecil',
    ];
}

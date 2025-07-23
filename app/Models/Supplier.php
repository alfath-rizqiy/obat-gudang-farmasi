<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_supplier',
        'telepon',
        'alamat',
        'produksi',
    ];

    public function obats()
{
    return $this->hasMany(Obat::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'stok',
        'harga',
        'supplier_id',
    ];

    public function suppliers()
{
    return $this->belongsTo(Supplier::class);
}

}

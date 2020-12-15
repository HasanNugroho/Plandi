<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $tables = 'produks';
    protected $fillable = [
        'foto',
        'slug',
        'nama_produk',
        'visitor',
        'harga',
        'berat_barang',
        'berat_volume',
        'diameter_luar',
        'diameter_dalam',
        'panjang_tali',
        'diskripsi',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

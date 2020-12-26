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
        'foto_utama',
        'slug',
        'nama_produk',
        'visitor',
        'kategori',
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

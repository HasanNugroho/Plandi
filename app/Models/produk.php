<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class produk extends Model
{
    use Searchable;
    use HasFactory;
    protected $tables = 'produks';
    protected $fillable = [
        'foto',
        'keyword',
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
    // Search ke table produks
    public function searchableAs()
    {
        return 'produks';
    }
    // search untuk apa saja
    public function toSearchableArray()
    {
        return [
            'id'=>$this->id,
            'nama_produk'=>$this->nama_produk,
            'kategori'=>$this->kategori,
            'harga'=>$this->harga,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $tables = 'contacts';
    protected $fillable = [
        'kontak',
        'jenis_kontak',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

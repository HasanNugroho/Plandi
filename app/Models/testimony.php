<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimony extends Model
{
    use HasFactory;
    protected $tables = 'testimonies';
    protected $fillable = [
        'foto',
        'nama',
        'komentar',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

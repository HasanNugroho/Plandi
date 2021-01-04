<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keyword extends Model
{
    use HasFactory;
    protected $tables = 'keywords';
    protected $fillable = [
        'keyword',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

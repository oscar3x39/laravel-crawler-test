<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    use HasFactory;

    protected $table = 'crawler';
    protected $hidden = ['id', 'updated_at', 'status'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
    ];
}

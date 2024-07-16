<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'grups';

    protected $fillable  = [
        'image', 'name', 'description', 'provinsi', 'negara', 'status'
    ];
}

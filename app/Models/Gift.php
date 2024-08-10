<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $table = 'gifts';

    protected $fillable  = [
        'image', 'slug', 'name', 'description', 'point'
    ];
}

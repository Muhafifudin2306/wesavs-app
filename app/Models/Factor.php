<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $table = 'factors';

    protected $fillable  = [
        'content'
    ];
}

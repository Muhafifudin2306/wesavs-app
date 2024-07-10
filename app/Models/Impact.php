<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    protected $table = 'impacts';

    protected $fillable  = [
        'content'
    ];
}

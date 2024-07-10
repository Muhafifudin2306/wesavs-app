<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitigation extends Model
{
    protected $table = 'mitigations';

    protected $fillable  = [
        'content'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasGrup extends Model
{
    protected $table = 'user_has_grups';

    protected $fillable = [
        'id_user', 'id_grup'
    ];
}

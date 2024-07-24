<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasPoint extends Model
{
    protected $table = "user_has_points";

    protected $fillable = [
        'id_user',
        'point',
        'expire_date'
    ];
}

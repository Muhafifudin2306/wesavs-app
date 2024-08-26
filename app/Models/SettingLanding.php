<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingLanding extends Model
{
    protected $table = "setting_landings";

    protected $fillable = [
        'name',
        'description'
    ];
}

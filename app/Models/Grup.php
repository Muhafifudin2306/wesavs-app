<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'grups';

    protected $fillable  = [
        'slug','image', 'name', 'description', 'provinsi', 'negara', 'status', 'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable  = [
        'cover', 'slug', 'title', 'content', 'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

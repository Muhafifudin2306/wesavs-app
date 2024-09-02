<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Psikiater extends Model
{
    protected $table = 'psikiaters';

    protected $fillable  = [
        'image', 'name', 'description', 'buka', 'tutup', 'entry', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

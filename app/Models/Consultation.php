<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table = 'consultations';

    protected $fillable  = [
        'id_psikiater','date', 'id_user', 'start', 'finish', 'status', 'number', 'problem', 'solving'
    ];

    public function psikiater()
    {
        return $this->belongsTo(Psikiater::class, 'id_psikiater');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

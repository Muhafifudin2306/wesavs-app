<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable  = [
        'id_product','number', 'id_user', 'location', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Gift::class, 'id_product');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

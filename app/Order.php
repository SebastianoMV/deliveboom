<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function foods()
    {
        return $this->belongsToMany('App\Food');
    }

    protected $fillable = [
        'total_price', 'name', 'address', 'email', 'phone', 'status_payment'
    ];
}
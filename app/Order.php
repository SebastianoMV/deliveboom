<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function foods(){
        return $this->belongsToMany('App\Food');
    }

    protected $fillable = [
        'total_price', 'status_payment', 'name', 'address', 'email', 'phone'
    ];
}

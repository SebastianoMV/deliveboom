<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price', 'status_payment', 'name', 'address', 'email', 'phone'
    ];
}

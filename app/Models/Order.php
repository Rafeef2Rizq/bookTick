<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['user_id', 'customer_name', 
   'customer_address', 'customer_phone', 'total_price', 'status'];
public function items(){
    return $this->hasMany(OrderItem::class);
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
   protected $fillable = ['order_id', 'book_id', 'quantity', 'price_at_purchase'];
 public function book()
    {
        return $this->belongsTo(Book::class);
    }
   public function order(){

    return $this->belongsTo(Order::class);
   }
}

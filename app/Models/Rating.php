<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
   protected $fillable=['user_id','book_id','rating'];

   public function book(){
    return $this->belongsTo(Book::class);
   }
   public function user(){
    return $this->BelongsTo(User::class);
   }
}

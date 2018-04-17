<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    //
    protected $fillable = array('order_id','product_id','user_id','rating','review','created_at','updated_at');
    protected $table = 'user_review';
}

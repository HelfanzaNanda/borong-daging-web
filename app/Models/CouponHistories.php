<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponHistories extends Model
{
    protected $table = 'coupon_histories';
    protected $fillable = [ 'coupon_code', 'user_id',  'order_id' , 'date'];
    protected $dates = [ 'date' ];
}

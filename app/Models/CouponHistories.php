<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponHistories extends Model
{
    protected $table = 'coupon_histories';
    protected $fillable = [ 'coupon_code',  'order_id' ];
    protected $dates = [ 'date' ];
}

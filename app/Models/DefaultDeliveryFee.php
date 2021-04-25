<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultDeliveryFee extends Model
{
    public $fillable = [
        'min_weight',
        'city',
        'price',
        'multiple'
    ];
}

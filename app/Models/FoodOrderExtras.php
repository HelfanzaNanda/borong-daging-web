<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $food_order_id
 * @property int        $extra_id
 * @property float      $price
 */
class FoodOrderExtras extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'food_order_extras';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'food_order_id', 'extra_id', 'price'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'food_order_id' => 'int', 'extra_id' => 'int', 'price' => 'double'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}

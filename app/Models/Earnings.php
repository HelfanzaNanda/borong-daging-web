<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $restaurant_id
 * @property int        $total_orders
 * @property float      $total_earning
 * @property float      $admin_earning
 * @property float      $restaurant_earning
 * @property float      $delivery_fee
 * @property float      $tax
 * @property int        $created_at
 * @property int        $updated_at
 */
class Earnings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'earnings';

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
        'restaurant_id', 'total_orders', 'total_earning', 'admin_earning', 'restaurant_earning', 'delivery_fee', 'tax', 'created_at', 'updated_at'
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
        'restaurant_id' => 'int', 'total_orders' => 'int', 'total_earning' => 'double', 'admin_earning' => 'double', 'restaurant_earning' => 'double', 'delivery_fee' => 'double', 'tax' => 'double', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
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

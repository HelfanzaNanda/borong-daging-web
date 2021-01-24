<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $user_id
 * @property int        $order_status_id
 * @property float      $tax
 * @property float      $delivery_fee
 * @property string     $hint
 * @property boolean    $active
 * @property int        $driver_id
 * @property int        $delivery_address_id
 * @property int        $payment_id
 * @property int        $created_at
 * @property int        $updated_at
 */
class Orders extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
        'user_id', 'order_status_id', 'tax', 'delivery_fee', 'hint', 'active', 'driver_id', 'delivery_address_id', 'payment_id', 'created_at', 'updated_at'
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
        'user_id' => 'int', 'order_status_id' => 'int', 'tax' => 'double', 'delivery_fee' => 'double', 'hint' => 'string', 'active' => 'boolean', 'driver_id' => 'int', 'delivery_address_id' => 'int', 'payment_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

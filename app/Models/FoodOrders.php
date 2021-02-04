<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float      $price
 * @property int        $quantity
 * @property int        $food_id
 * @property int        $order_id
 * @property int        $created_at
 * @property int        $updated_at
 */
class FoodOrders extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'food_orders';

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
        'price', 'quantity', 'food_id', 'order_id', 'created_at', 'updated_at'
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
        'price' => 'double', 'quantity' => 'int', 'food_id' => 'int', 'order_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

    public function food()
    {
        return $this->belongsTo(Foods::class);
    }
}

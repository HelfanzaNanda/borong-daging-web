<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $cuisine_id
 * @property int        $restaurant_id
 */
class RestaurantCuisines extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'restaurant_cuisines';

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
        'cuisine_id', 'restaurant_id'
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
        'cuisine_id' => 'int', 'restaurant_id' => 'int'
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

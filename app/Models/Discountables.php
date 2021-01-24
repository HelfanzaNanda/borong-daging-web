<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $coupon_id
 * @property string     $discountable_type
 * @property int        $discountable_id
 */
class Discountables extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discountables';

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
        'coupon_id', 'discountable_type', 'discountable_id'
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
        'coupon_id' => 'int', 'discountable_type' => 'string', 'discountable_id' => 'int'
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

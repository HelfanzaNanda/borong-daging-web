<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property string     $description
 * @property string     $address
 * @property string     $latitude
 * @property string     $longitude
 * @property string     $phone
 * @property string     $mobile
 * @property string     $information
 * @property float      $admin_commission
 * @property float      $delivery_fee
 * @property float      $delivery_range
 * @property float      $default_tax
 * @property boolean    $closed
 * @property boolean    $active
 * @property boolean    $available_for_delivery
 * @property int        $created_at
 * @property int        $updated_at
 */
class Restaurants extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'restaurants';

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
        'name', 'description', 'address', 'latitude', 'longitude', 'phone', 'mobile', 'information', 'admin_commission', 'delivery_fee', 'delivery_range', 'default_tax', 'closed', 'active', 'available_for_delivery', 'created_at', 'updated_at'
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
        'name' => 'string', 'description' => 'string', 'address' => 'string', 'latitude' => 'string', 'longitude' => 'string', 'phone' => 'string', 'mobile' => 'string', 'information' => 'string', 'admin_commission' => 'double', 'delivery_fee' => 'double', 'delivery_range' => 'double', 'default_tax' => 'double', 'closed' => 'boolean', 'active' => 'boolean', 'available_for_delivery' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

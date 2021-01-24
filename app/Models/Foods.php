<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property float      $price
 * @property float      $discount_price
 * @property string     $description
 * @property string     $ingredients
 * @property float      $package_items_count
 * @property float      $weight
 * @property string     $unit
 * @property boolean    $featured
 * @property boolean    $deliverable
 * @property int        $restaurant_id
 * @property int        $category_id
 * @property int        $created_at
 * @property int        $updated_at
 * @property int        $stock
 */
class Foods extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'foods';

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
        'name', 'price', 'discount_price', 'description', 'ingredients', 'package_items_count', 'weight', 'unit', 'featured', 'deliverable', 'restaurant_id', 'category_id', 'created_at', 'updated_at', 'stock'
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
        'name' => 'string', 'price' => 'double', 'discount_price' => 'double', 'description' => 'string', 'ingredients' => 'string', 'package_items_count' => 'double', 'weight' => 'double', 'unit' => 'string', 'featured' => 'boolean', 'deliverable' => 'boolean', 'restaurant_id' => 'int', 'category_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp', 'stock' => 'int'
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

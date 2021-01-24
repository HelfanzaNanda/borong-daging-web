<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $order
 * @property string     $text
 * @property string     $button
 * @property string     $text_position
 * @property string     $text_color
 * @property string     $button_color
 * @property string     $background_color
 * @property string     $indicator_color
 * @property string     $image_fit
 * @property int        $food_id
 * @property int        $restaurant_id
 * @property boolean    $enabled
 * @property int        $created_at
 * @property int        $updated_at
 */
class Slides extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slides';

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
        'order', 'text', 'button', 'text_position', 'text_color', 'button_color', 'background_color', 'indicator_color', 'image_fit', 'food_id', 'restaurant_id', 'enabled', 'created_at', 'updated_at'
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
        'order' => 'int', 'text' => 'string', 'button' => 'string', 'text_position' => 'string', 'text_color' => 'string', 'button_color' => 'string', 'background_color' => 'string', 'indicator_color' => 'string', 'image_fit' => 'string', 'food_id' => 'int', 'restaurant_id' => 'int', 'enabled' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

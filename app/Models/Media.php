<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $model_type
 * @property string     $collection_name
 * @property string     $name
 * @property string     $file_name
 * @property string     $mime_type
 * @property string     $disk
 * @property int        $size
 * @property string     $manipulations
 * @property string     $custom_properties
 * @property string     $responsive_images
 * @property int        $order_column
 * @property int        $created_at
 * @property int        $updated_at
 */
class Media extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media';

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
        'model_type', 'model_id', 'collection_name', 'name', 'file_name', 'mime_type', 'disk', 'size', 'manipulations', 'custom_properties', 'responsive_images', 'order_column', 'created_at', 'updated_at'
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
        'model_type' => 'string', 'collection_name' => 'string', 'name' => 'string', 'file_name' => 'string', 'mime_type' => 'string', 'disk' => 'string', 'size' => 'int', 'manipulations' => 'string', 'custom_properties' => 'string', 'responsive_images' => 'string', 'order_column' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

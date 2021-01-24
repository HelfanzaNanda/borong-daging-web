<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property string     $type
 * @property string     $values
 * @property boolean    $disabled
 * @property boolean    $required
 * @property boolean    $in_table
 * @property int        $bootstrap_column
 * @property int        $order
 * @property string     $custom_field_model
 * @property int        $created_at
 * @property int        $updated_at
 */
class CustomFields extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_fields';

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
        'name', 'type', 'values', 'disabled', 'required', 'in_table', 'bootstrap_column', 'order', 'custom_field_model', 'created_at', 'updated_at'
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
        'name' => 'string', 'type' => 'string', 'values' => 'string', 'disabled' => 'boolean', 'required' => 'boolean', 'in_table' => 'boolean', 'bootstrap_column' => 'int', 'order' => 'int', 'custom_field_model' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

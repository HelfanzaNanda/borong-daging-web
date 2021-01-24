<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $value
 * @property string     $view
 * @property int        $custom_field_id
 * @property string     $customizable_type
 * @property int        $customizable_id
 * @property int        $created_at
 * @property int        $updated_at
 */
class CustomFieldValues extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_field_values';

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
        'value', 'view', 'custom_field_id', 'customizable_type', 'customizable_id', 'created_at', 'updated_at'
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
        'value' => 'string', 'view' => 'string', 'custom_field_id' => 'int', 'customizable_type' => 'string', 'customizable_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

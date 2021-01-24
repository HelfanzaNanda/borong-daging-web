<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $extra_id
 * @property int        $favorite_id
 */
class FavoriteExtras extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'favorite_extras';

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
        'extra_id', 'favorite_id'
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
        'extra_id' => 'int', 'favorite_id' => 'int'
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

<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property string     $description
 * @property int        $created_at
 * @property int        $updated_at
 */
class Cuisines extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuisines';

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
        'name', 'description', 'created_at', 'updated_at'
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
        'name' => 'string', 'description' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
    protected $appends = ['media'];

    public function getMediaAttribute()
    {
        $media = Media::where('model_id', $this->id)->where('model_type', 'App\\Models\\Cuisine')->first();
        return $media; 
    }
}

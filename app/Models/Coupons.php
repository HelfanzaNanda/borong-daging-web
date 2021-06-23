<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $code
 * @property float      $discount
 * @property string     $discount_type
 * @property string     $description
 * @property DateTime   $expires_at
 * @property boolean    $enabled
 * @property int        $created_at
 * @property int        $updated_at
 */
class Coupons extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

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
        'code', 'discount', 'discount_type', 'description', 'expires_at', 'enabled', 'created_at', 'updated_at'
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
        'code' => 'string', 'discount' => 'double', 'discount_type' => 'string', 'description' => 'string', 'expires_at' => 'datetime', 'enabled' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expires_at', 'created_at', 'updated_at'
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

	public function medias()
	{
		return $this->morphMany(Media::class, 'model', 'model_type', 'model_id');
	}
}

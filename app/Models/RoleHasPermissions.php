<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $permission_id
 * @property int        $role_id
 */
class RoleHasPermissions extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role_has_permissions';

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
        'permission_id', 'role_id'
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
        'permission_id' => 'int', 'role_id' => 'int'
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

    public function permission()
    {
        return $this->belongsTo(Permissions::class);
    }

    public function role()
    {
       return $this->belongsTo(Roles::class);
    }

    // Scopes...

    // Functions ...

    // Relations ...
}

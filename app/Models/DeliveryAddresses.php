<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $description
 * @property string     $address
 * @property string     $latitude
 * @property string     $longitude
 * @property boolean    $is_default
 * @property int        $user_id
 * @property int        $created_at
 * @property int        $updated_at
 */
class DeliveryAddresses extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_addresses';

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
        'description', 'address', 'latitude', 'longitude', 'is_default', 'user_id', 'created_at', 'updated_at'
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
        'description' => 'string', 'address' => 'string', 'latitude' => 'string', 'longitude' => 'string', 'is_default' => 'boolean', 'user_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...

    public static function createOrUpdate($params, $method, $request)
    {
        dd($params);
        if (!Session::get('_id')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Silahkan Login Terlebih Dahulu!'
            ]);
        }

        $params['user_id'] = Session::get('_id');

        DB::beginTransaction();
        $filename = null;

        if (isset($params['_token']) && $params['_token']) {
            unset($params['_token']);
        }

        if (isset($params['id']) && $params['id']) {
            $id = $params['id'];
            unset($params['id']);

            $update = self::where('id', $id)->update($params);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diubah!'
            ]);
        }

        $insert = self::create($params);
// description
// address
// latitude
// longitude
// is_default
// user_id
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }
}

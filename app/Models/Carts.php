<?php

namespace App\Models;

use App\Models\MeatForSale;
use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

/**
 * @property int        $food_id
 * @property int        $user_id
 * @property int        $quantity
 * @property int        $created_at
 * @property int        $updated_at
 */
class Carts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carts';

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
        'food_id', 'user_id', 'quantity', 'created_at', 'updated_at'
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
        'food_id' => 'int', 'user_id' => 'int', 'quantity' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

    protected $appends = ['meat_for_sale'];

    public function getMeatForSaleAttribute()
    {
        $meat = MeatForSale::where('id', $this->food_id)->first();
        return $meat; 
    }

    public static function createOrUpdate($params, $method, $request)
    {
        $product = MeatForSale::find($params['food_id']);

        if(!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unknown Product!'
            ]);
        }

        if ($params['quantity'] < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Isikan Quantity!'
            ]);
        }

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

        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }
}

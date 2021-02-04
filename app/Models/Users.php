<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property string     $email
 * @property string     $password
 * @property string     $device_token
 * @property string     $stripe_id
 * @property string     $card_brand
 * @property string     $card_last_four
 * @property int        $trial_ends_at
 * @property string     $braintree_id
 * @property string     $paypal_email
 * @property string     $remember_token
 * @property int        $created_at
 * @property int        $updated_at
 */
class Users extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'name','phone', 'email', 'password', 'api_token', 'device_token', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at', 'braintree_id', 'paypal_email', 'remember_token', 'created_at', 'updated_at'
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
        'name' => 'string', 'email' => 'string', 'password' => 'string', 'device_token' => 'string', 'stripe_id' => 'string', 'card_brand' => 'string', 'card_last_four' => 'string', 'trial_ends_at' => 'timestamp', 'braintree_id' => 'string', 'paypal_email' => 'string', 'remember_token' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'trial_ends_at', 'created_at', 'updated_at'
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
    public static function createOrUpdate($params, $method, $request)
    {
        $filename = null;

        if ($request->hasFile('files')) {
            $allowedfileExtension=['jpg','png'];
            $files = $request->file('files');

            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = md5(uniqid(rand(), true).time()).'.'.$extension;

                $files->storeAs('media/avatars', $filename);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Only upload jpg and png'
                ]);
            }
        }

        if (isset($params['_token']) && $params['_token']) {
            unset($params['_token']);
        }

        if (isset($params['id']) && $params['id']) {
            $id = $params['id'];
            unset($params['id']);
            if (isset($params['password']) && $params['password']) {
                $params['password'] = bcrypt($params['password']);
            } else {
                unset($params['password']);
            }

            $user = self::where('id', $id)->first();

            if (isset($params['old_password']) && $params['old_password']) {
                if (!Hash::check($params['old_password'], $user->password)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'GAGAL! Password Lama Tidak Sesuai!'
                    ]);
                }

                unset($params['old_password']);
            }

            $update = self::where('id', $id)->update($params);

            return response()->json([
                'status' => 'success',
                'message' => 'User Sukses Diubah!'
            ]);
        }

        $validation = self::customValidation($params);

        if (!$validation['status']) {
            return response()->json([
                'status' => 'error',
                'message' => $validation['message']
            ]);
        }

        $users = self::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'phone' => $params['phone'],
            'address' => $params['address'],
            'role_id' => 2,
            'password' => bcrypt($params['password'])
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User successfully registered'
        ]);
    }

    public static function memberLogins($params, $method, $request)
    {
        if(Auth::attempt(['email' => $params['email'], 'password' => $params['password']])){
            $user = Auth::user();

            $request->session()->flush();
            $request->session()->put('_login', true);
            $request->session()->put('_id', $user['id']);
            $request->session()->put('_name', $user['name']);
            $request->session()->put('_email', $user['email']);
            $request->session()->put('_api_token', $user['api_token']);
            $request->session()->put('_address', $user['address']);
            $request->session()->put('_role_id', $user['role_id']);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Login',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Kombinasi password ataupun email tidak benar',
                'data' => null
            ], 200);
        }
    }
}

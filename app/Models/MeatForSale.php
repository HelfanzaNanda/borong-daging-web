<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property float      $price
 * @property float      $discount_price
 * @property float      $partner_buy_price
 * @property string     $description
 * @property string     $filepath
 * @property string     $filename
 * @property boolean    $featured
 * @property boolean    $is_active
 * @property int        $created_at
 * @property int        $updated_at
 * @property int        $category_id
 */
class MeatForSale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meat_for_sale';

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
        'name', 'price', 'discount_price', 'partner_buy_price', 'description', 'filepath', 'filename', 'featured', 'is_active', 'created_at', 'updated_at', 'category_id'
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
        'name' => 'string', 'price' => 'double', 'discount_price' => 'double', 'partner_buy_price' => 'double', 'description' => 'string', 'filepath' => 'string', 'filename' => 'string', 'featured' => 'boolean', 'is_active' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp', 'category_id' => 'int'
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
        $media = Media::where('model_id', $this->id)->where('model_type', 'App\\Models\\MeatForSale')->first();
        return $media;
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public static function getAll()
    {
        $foods = Foods::all();
        $res = [];
        foreach ($foods as $food) {
            $featured_product = self::where('name', $food->name)->where('featured', 1)->first();
            if ($featured_product) {
                array_push($res, $featured_product);
            }
        }
        return collect($res);
    }

    public static function byCategory($id)
    {
        $foods = Foods::all();
        $res = [];
        foreach ($foods as $food) {
            $featured_product = self::where('name', $food->name)
            ->where('category_id', $id)->where('featured', 1)->first();
            if ($featured_product) {
                array_push($res, $featured_product);
            }
        }
        return collect($res);
    }
}

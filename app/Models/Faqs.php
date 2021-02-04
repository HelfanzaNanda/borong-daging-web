<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $question
 * @property string     $answer
 * @property int        $faq_category_id
 * @property int        $created_at
 * @property int        $updated_at
 */
class Faqs extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

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
        'question', 'answer', 'faq_category_id', 'created_at', 'updated_at'
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
        'question' => 'string', 'answer' => 'string', 'faq_category_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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

    public function faq_category()
    {
        return $this->belongsTo(FaqCategories::class);
    }

    // Scopes...

    // Functions ...

    // Relations ...
}

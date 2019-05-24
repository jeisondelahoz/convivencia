<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Padres
 * @package App\Models
 * @version May 24, 2019, 7:45 am UTC
 *
 * @property boolean es_acudiente
 * @property integer user_id
 */
class Padres extends Model
{
    use SoftDeletes;

    public $table = 'padres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'es_acudiente',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'es_acudiente' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

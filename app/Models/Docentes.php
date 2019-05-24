<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Docentes
 * @package App\Models
 * @version May 24, 2019, 6:57 am UTC
 *
 * @property integer user_id
 */
class Docentes extends Model
{
    use SoftDeletes;

    public $table = 'docentes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grupos
 * @package App\Models
 * @version May 24, 2019, 7:00 am UTC
 *
 * @property integer nombre
 * @property integer docentes_id
 */
class Grupos extends Model
{
    use SoftDeletes;

    public $table = 'grupos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'docentes_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'docentes_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

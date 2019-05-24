<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Observaciones
 * @package App\Models
 * @version May 24, 2019, 8:02 am UTC
 *
 * @property boolean motivacion
 * @property string descripcion
 * @property integer visibilidad
 * @property integer tipoobservaciones_id
 * @property integer estudiantes_id
 * @property integer user_id
 */
class Observaciones extends Model
{
    use SoftDeletes;

    public $table = 'observaciones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'motivacion',
        'descripcion',
        'visibilidad',
        'tipoobservaciones_id',
        'estudiantes_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'motivacion' => 'boolean',
        'descripcion' => 'string',
        'visibilidad' => 'integer',
        'tipoobservaciones_id' => 'integer',
        'estudiantes_id' => 'integer',
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

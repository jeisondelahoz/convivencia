<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoObservaciones
 * @package App\Models
 * @version May 24, 2019, 7:55 am UTC
 *
 * @property string nombre
 */
class TipoObservaciones extends Model
{

    public $table = 'tipo_observaciones';
    


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

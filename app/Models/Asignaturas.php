<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Asignaturas
 * @package App\Models
 * @version May 24, 2019, 7:29 am UTC
 *
 * @property string nombre
 * @property string descripcion
 * @property integer areas_id
 * @property integer grados_id
 */
class Asignaturas extends Model
{
    use SoftDeletes;

    public $table = 'asignaturas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'areas_id',
        'grados_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'areas_id' => 'integer',
        'grados_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personas
 * @package App\Models
 * @version May 11, 2019, 7:20 am UTC
 *
 * @property integer tipo_documentos_id
 * @property string documento
 * @property string primerNombre
 * @property string segundoNombre
 * @property string primerApellido
 * @property string segundoApellido
 * @property string fechaNacimiento
 * @property string telefonoFijo
 * @property string telefonoCelular
 * @property string direccion
 * @property integer users_id
 * @property integer municipios_id
 */
class Personas extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipo_documentos_id',
        'documento',
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'fechaNacimiento',
        'telefonoFijo',
        'telefonoCelular',
        'direccion',
        'users_id',
        'municipios_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_documentos_id' => 'integer',
        'documento' => 'string',
        'primerNombre' => 'string',
        'segundoNombre' => 'string',
        'primerApellido' => 'string',
        'segundoApellido' => 'string',
        'fechaNacimiento' => 'date',
        'telefonoFijo' => 'string',
        'telefonoCelular' => 'string',
        'direccion' => 'string',
        'users_id' => 'integer',
        'municipios_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_documentos_id' => 'required',
        'documento' => 'required',
        'primerNombre' => 'required',
        'primerApellido' => 'required',
        'fechaNacimiento' => 'required',
        'telefonoCelular' => 'required',
        'direccion' => 'required',
        'users_id' => 'required',
        'municipios_id' => 'required'
    ];

    
}

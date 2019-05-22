<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Municipios
 * @package App\Models
 * @version May 11, 2019, 7:08 am UTC
 *
 * @property \App\Models\Departamentos departamentos
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property string nombre
 * @property integer departamentos_id
 */
class Municipios extends Model
{
    use SoftDeletes;

    public $table = 'municipios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'departamentos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'departamentos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'departamentos_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamentos()
    {
        return $this->belongsTo(\App\Models\Departamentos::class, 'departamentos_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function personas()
    {
        return $this->hasMany(\App\Models\Personas::class);
    }
}

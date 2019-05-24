<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsignaturasDocentes
 * @package App\Models
 * @version May 24, 2019, 7:34 am UTC
 *
 * @property string year
 * @property integer asignaturas_id
 * @property integer docentes_id
 * @property integer grupos_id
 */
class AsignaturasDocentes extends Model
{
    use SoftDeletes;

    public $table = 'asignaturas_docentes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'year',
        'asignaturas_id',
        'docentes_id',
        'grupos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'date',
        'asignaturas_id' => 'integer',
        'docentes_id' => 'integer',
        'grupos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

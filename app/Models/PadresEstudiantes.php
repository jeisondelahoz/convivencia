<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PadresEstudiantes
 * @package App\Models
 * @version May 24, 2019, 7:51 am UTC
 *
 * @property integer padres_id
 * @property integer estudiantes_id
 */
class PadresEstudiantes extends Model
{
    use SoftDeletes;

    public $table = 'padres_estudiantes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'padres_id',
        'estudiantes_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'padres_id' => 'integer',
        'estudiantes_id' => 'integer',
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

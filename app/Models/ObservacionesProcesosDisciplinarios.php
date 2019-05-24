<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ObservacionesProcesosDisciplinarios
 * @package App\Models
 * @version May 24, 2019, 8:22 am UTC
 *
 * @property integer observaciones_id
 * @property integer procesodisciplinario_id
 */
class ObservacionesProcesosDisciplinarios extends Model
{
    use SoftDeletes;

    public $table = 'observaciones_prodisciplinarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'observaciones_id',
        'procesodisciplinario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'observaciones_id' => 'integer',
        'procesodisciplinario_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

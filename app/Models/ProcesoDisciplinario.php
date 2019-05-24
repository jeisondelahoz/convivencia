<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProcesoDisciplinario
 * @package App\Models
 * @version May 24, 2019, 8:18 am UTC
 *
 * @property string descripcion
 * @property integer tipofalta_id
 * @property integer user_id
 */
class ProcesoDisciplinario extends Model
{
    use SoftDeletes;

    public $table = 'proceso_disciplinarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'tipofalta_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'tipofalta_id' => 'integer',
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

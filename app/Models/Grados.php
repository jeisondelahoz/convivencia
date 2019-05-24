<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grados
 * @package App\Models
 * @version May 24, 2019, 7:15 am UTC
 *
 * @property \App\Models\Grupos grupos
 * @property string nombre
 * @property integer grupos_id
 */
class Grados extends Model
{
    use SoftDeletes;

    public $table = 'grados';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'grupos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'grupos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grupos()
    {
        return $this->belongsTo(\App\Models\Grupos::class, 'grupos_id', 'id');
    }
}

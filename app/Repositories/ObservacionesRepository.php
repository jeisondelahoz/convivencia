<?php

namespace App\Repositories;

use App\Models\Observaciones;
use App\Repositories\BaseRepository;

/**
 * Class ObservacionesRepository
 * @package App\Repositories
 * @version May 24, 2019, 8:02 am UTC
*/

class ObservacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'motivacion',
        'descripcion',
        'visibilidad',
        'tipoobservaciones_id',
        'estudiantes_id',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Observaciones::class;
    }
}

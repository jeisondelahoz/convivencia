<?php

namespace App\Repositories;

use App\Models\TipoObservaciones;
use App\Repositories\BaseRepository;

/**
 * Class TipoObservacionesRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:55 am UTC
*/

class TipoObservacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return TipoObservaciones::class;
    }
}

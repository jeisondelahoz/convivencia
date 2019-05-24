<?php

namespace App\Repositories;

use App\Models\AsignaturasDocentes;
use App\Repositories\BaseRepository;

/**
 * Class AsignaturasDocentesRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:34 am UTC
*/

class AsignaturasDocentesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'asignaturas_id',
        'docentes_id',
        'grupos_id'
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
        return AsignaturasDocentes::class;
    }
}

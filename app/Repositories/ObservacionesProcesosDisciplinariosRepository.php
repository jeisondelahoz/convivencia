<?php

namespace App\Repositories;

use App\Models\ObservacionesProcesosDisciplinarios;
use App\Repositories\BaseRepository;

/**
 * Class ObservacionesProcesosDisciplinariosRepository
 * @package App\Repositories
 * @version May 24, 2019, 8:22 am UTC
*/

class ObservacionesProcesosDisciplinariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'observaciones_id',
        'procesodisciplinario_id'
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
        return ObservacionesProcesosDisciplinarios::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\Asignaturas;
use App\Repositories\BaseRepository;

/**
 * Class AsignaturasRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:29 am UTC
*/

class AsignaturasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'areas_id',
        'grados_id'
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
        return Asignaturas::class;
    }
}

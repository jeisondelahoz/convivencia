<?php

namespace App\Repositories;

use App\Models\Grupos;
use App\Repositories\BaseRepository;

/**
 * Class GruposRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:00 am UTC
*/

class GruposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'docentes_id'
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
        return Grupos::class;
    }
}

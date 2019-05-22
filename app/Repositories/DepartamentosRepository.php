<?php

namespace App\Repositories;

use App\Models\Departamentos;
use App\Repositories\BaseRepository;

/**
 * Class DepartamentosRepository
 * @package App\Repositories
 * @version May 11, 2019, 6:56 am UTC
*/

class DepartamentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'paises_id'
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
        return Departamentos::class;
    }
}

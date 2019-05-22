<?php

namespace App\Repositories;

use App\Models\Paises;
use App\Repositories\BaseRepository;

/**
 * Class PaisesRepository
 * @package App\Repositories
 * @version May 11, 2019, 6:51 am UTC
*/

class PaisesRepository extends BaseRepository
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
        return Paises::class;
    }
}

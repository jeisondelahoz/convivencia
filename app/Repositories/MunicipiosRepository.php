<?php

namespace App\Repositories;

use App\Models\Municipios;
use App\Repositories\BaseRepository;

/**
 * Class MunicipiosRepository
 * @package App\Repositories
 * @version May 11, 2019, 7:08 am UTC
*/

class MunicipiosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'departamentos_id'
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
        return Municipios::class;
    }
}

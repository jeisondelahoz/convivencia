<?php

namespace App\Repositories;

use App\Models\Grados;
use App\Repositories\BaseRepository;

/**
 * Class GradosRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:15 am UTC
*/

class GradosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
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
        return Grados::class;
    }
}

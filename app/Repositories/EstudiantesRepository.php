<?php

namespace App\Repositories;

use App\Models\Estudiantes;
use App\Repositories\BaseRepository;

/**
 * Class EstudiantesRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:42 am UTC
*/

class EstudiantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
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
        return Estudiantes::class;
    }
}

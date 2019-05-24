<?php

namespace App\Repositories;

use App\Models\PadresEstudiantes;
use App\Repositories\BaseRepository;

/**
 * Class PadresEstudiantesRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:51 am UTC
*/

class PadresEstudiantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'padres_id',
        'estudiantes_id'
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
        return PadresEstudiantes::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\Docentes;
use App\Repositories\BaseRepository;

/**
 * Class DocentesRepository
 * @package App\Repositories
 * @version May 24, 2019, 6:57 am UTC
*/

class DocentesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id'
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
        return Docentes::class;
    }
}

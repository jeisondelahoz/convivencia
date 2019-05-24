<?php

namespace App\Repositories;

use App\Models\Areas;
use App\Repositories\BaseRepository;

/**
 * Class AreasRepository
 * @package App\Repositories
 * @version May 24, 2019, 6:59 am UTC
*/

class AreasRepository extends BaseRepository
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
        return Areas::class;
    }
}

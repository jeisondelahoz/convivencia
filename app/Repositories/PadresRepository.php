<?php

namespace App\Repositories;

use App\Models\Padres;
use App\Repositories\BaseRepository;

/**
 * Class PadresRepository
 * @package App\Repositories
 * @version May 24, 2019, 7:45 am UTC
*/

class PadresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'es_acudiente',
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
        return Padres::class;
    }
}

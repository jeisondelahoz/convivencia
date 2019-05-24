<?php

namespace App\Repositories;

use App\Models\TipoFalta;
use App\Repositories\BaseRepository;

/**
 * Class TipoFaltaRepository
 * @package App\Repositories
 * @version May 24, 2019, 8:11 am UTC
*/

class TipoFaltaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
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
        return TipoFalta::class;
    }
}

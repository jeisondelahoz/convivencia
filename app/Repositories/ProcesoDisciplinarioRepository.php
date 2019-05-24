<?php

namespace App\Repositories;

use App\Models\ProcesoDisciplinario;
use App\Repositories\BaseRepository;

/**
 * Class ProcesoDisciplinarioRepository
 * @package App\Repositories
 * @version May 24, 2019, 8:18 am UTC
*/

class ProcesoDisciplinarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'tipofalta_id',
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
        return ProcesoDisciplinario::class;
    }
}

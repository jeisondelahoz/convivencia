<?php

namespace App\Repositories;

use App\Models\TipoDocumentos;
use App\Repositories\BaseRepository;

/**
 * Class TipoDocumentosRepository
 * @package App\Repositories
 * @version May 11, 2019, 7:11 am UTC
*/

class TipoDocumentosRepository extends BaseRepository
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
        return TipoDocumentos::class;
    }
}

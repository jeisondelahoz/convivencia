<?php

namespace App\Repositories;

use App\Models\Personas;
use App\Repositories\BaseRepository;

/**
 * Class PersonasRepository
 * @package App\Repositories
 * @version May 11, 2019, 7:20 am UTC
*/

class PersonasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_documentos_id',
        'documento',
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'fechaNacimiento',
        'telefonoFijo',
        'telefonoCelular',
        'direccion',
        'users_id',
        'municipios_id'
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
        return Personas::class;
    }
}

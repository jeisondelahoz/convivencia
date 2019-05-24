<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoFaltaAPIRequest;
use App\Http\Requests\API\UpdateTipoFaltaAPIRequest;
use App\Models\TipoFalta;
use App\Repositories\TipoFaltaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TipoFaltaController
 * @package App\Http\Controllers\API
 */

class TipoFaltaAPIController extends AppBaseController
{
    /** @var  TipoFaltaRepository */
    private $tipoFaltaRepository;

    public function __construct(TipoFaltaRepository $tipoFaltaRepo)
    {
        $this->tipoFaltaRepository = $tipoFaltaRepo;
    }

    /**
     * Display a listing of the TipoFalta.
     * GET|HEAD /tipoFaltas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoFaltas = $this->tipoFaltaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoFaltas->toArray(), 'Tipo Faltas retrieved successfully');
    }

    /**
     * Store a newly created TipoFalta in storage.
     * POST /tipoFaltas
     *
     * @param CreateTipoFaltaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoFaltaAPIRequest $request)
    {
        $input = $request->all();

        $tipoFalta = $this->tipoFaltaRepository->create($input);

        return $this->sendResponse($tipoFalta->toArray(), 'Tipo Falta saved successfully');
    }

    /**
     * Display the specified TipoFalta.
     * GET|HEAD /tipoFaltas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipoFalta $tipoFalta */
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            return $this->sendError('Tipo Falta not found');
        }

        return $this->sendResponse($tipoFalta->toArray(), 'Tipo Falta retrieved successfully');
    }

    /**
     * Update the specified TipoFalta in storage.
     * PUT/PATCH /tipoFaltas/{id}
     *
     * @param int $id
     * @param UpdateTipoFaltaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoFaltaAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoFalta $tipoFalta */
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            return $this->sendError('Tipo Falta not found');
        }

        $tipoFalta = $this->tipoFaltaRepository->update($input, $id);

        return $this->sendResponse($tipoFalta->toArray(), 'TipoFalta updated successfully');
    }

    /**
     * Remove the specified TipoFalta from storage.
     * DELETE /tipoFaltas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipoFalta $tipoFalta */
        $tipoFalta = $this->tipoFaltaRepository->find($id);

        if (empty($tipoFalta)) {
            return $this->sendError('Tipo Falta not found');
        }

        $tipoFalta->delete();

        return $this->sendResponse($id, 'Tipo Falta deleted successfully');
    }
}

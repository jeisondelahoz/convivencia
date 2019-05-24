<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoObservacionesAPIRequest;
use App\Http\Requests\API\UpdateTipoObservacionesAPIRequest;
use App\Models\TipoObservaciones;
use App\Repositories\TipoObservacionesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TipoObservacionesController
 * @package App\Http\Controllers\API
 */

class TipoObservacionesAPIController extends AppBaseController
{
    /** @var  TipoObservacionesRepository */
    private $tipoObservacionesRepository;

    public function __construct(TipoObservacionesRepository $tipoObservacionesRepo)
    {
        $this->tipoObservacionesRepository = $tipoObservacionesRepo;
    }

    /**
     * Display a listing of the TipoObservaciones.
     * GET|HEAD /tipoObservaciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoObservaciones = $this->tipoObservacionesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoObservaciones->toArray(), 'Tipo Observaciones retrieved successfully');
    }

    /**
     * Store a newly created TipoObservaciones in storage.
     * POST /tipoObservaciones
     *
     * @param CreateTipoObservacionesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoObservacionesAPIRequest $request)
    {
        $input = $request->all();

        $tipoObservaciones = $this->tipoObservacionesRepository->create($input);

        return $this->sendResponse($tipoObservaciones->toArray(), 'Tipo Observaciones saved successfully');
    }

    /**
     * Display the specified TipoObservaciones.
     * GET|HEAD /tipoObservaciones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipoObservaciones $tipoObservaciones */
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            return $this->sendError('Tipo Observaciones not found');
        }

        return $this->sendResponse($tipoObservaciones->toArray(), 'Tipo Observaciones retrieved successfully');
    }

    /**
     * Update the specified TipoObservaciones in storage.
     * PUT/PATCH /tipoObservaciones/{id}
     *
     * @param int $id
     * @param UpdateTipoObservacionesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoObservacionesAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoObservaciones $tipoObservaciones */
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            return $this->sendError('Tipo Observaciones not found');
        }

        $tipoObservaciones = $this->tipoObservacionesRepository->update($input, $id);

        return $this->sendResponse($tipoObservaciones->toArray(), 'TipoObservaciones updated successfully');
    }

    /**
     * Remove the specified TipoObservaciones from storage.
     * DELETE /tipoObservaciones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipoObservaciones $tipoObservaciones */
        $tipoObservaciones = $this->tipoObservacionesRepository->find($id);

        if (empty($tipoObservaciones)) {
            return $this->sendError('Tipo Observaciones not found');
        }

        $tipoObservaciones->delete();

        return $this->sendResponse($id, 'Tipo Observaciones deleted successfully');
    }
}

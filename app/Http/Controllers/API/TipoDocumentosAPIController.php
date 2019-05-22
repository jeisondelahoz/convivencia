<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoDocumentosAPIRequest;
use App\Http\Requests\API\UpdateTipoDocumentosAPIRequest;
use App\Models\TipoDocumentos;
use App\Repositories\TipoDocumentosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TipoDocumentosController
 * @package App\Http\Controllers\API
 */

class TipoDocumentosAPIController extends AppBaseController
{
    /** @var  TipoDocumentosRepository */
    private $tipoDocumentosRepository;

    public function __construct(TipoDocumentosRepository $tipoDocumentosRepo)
    {
        $this->tipoDocumentosRepository = $tipoDocumentosRepo;
    }

    /**
     * Display a listing of the TipoDocumentos.
     * GET|HEAD /tipoDocumentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoDocumentos = $this->tipoDocumentosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoDocumentos->toArray(), 'Tipo Documentos retrieved successfully');
    }

    /**
     * Store a newly created TipoDocumentos in storage.
     * POST /tipoDocumentos
     *
     * @param CreateTipoDocumentosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDocumentosAPIRequest $request)
    {
        $input = $request->all();

        $tipoDocumentos = $this->tipoDocumentosRepository->create($input);

        return $this->sendResponse($tipoDocumentos->toArray(), 'Tipo Documentos saved successfully');
    }

    /**
     * Display the specified TipoDocumentos.
     * GET|HEAD /tipoDocumentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipoDocumentos $tipoDocumentos */
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            return $this->sendError('Tipo Documentos not found');
        }

        return $this->sendResponse($tipoDocumentos->toArray(), 'Tipo Documentos retrieved successfully');
    }

    /**
     * Update the specified TipoDocumentos in storage.
     * PUT/PATCH /tipoDocumentos/{id}
     *
     * @param int $id
     * @param UpdateTipoDocumentosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDocumentosAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoDocumentos $tipoDocumentos */
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            return $this->sendError('Tipo Documentos not found');
        }

        $tipoDocumentos = $this->tipoDocumentosRepository->update($input, $id);

        return $this->sendResponse($tipoDocumentos->toArray(), 'TipoDocumentos updated successfully');
    }

    /**
     * Remove the specified TipoDocumentos from storage.
     * DELETE /tipoDocumentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipoDocumentos $tipoDocumentos */
        $tipoDocumentos = $this->tipoDocumentosRepository->find($id);

        if (empty($tipoDocumentos)) {
            return $this->sendError('Tipo Documentos not found');
        }

        $tipoDocumentos->delete();

        return $this->sendResponse($id, 'Tipo Documentos deleted successfully');
    }
}

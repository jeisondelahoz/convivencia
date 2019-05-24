<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProcesoDisciplinarioAPIRequest;
use App\Http\Requests\API\UpdateProcesoDisciplinarioAPIRequest;
use App\Models\ProcesoDisciplinario;
use App\Repositories\ProcesoDisciplinarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProcesoDisciplinarioController
 * @package App\Http\Controllers\API
 */

class ProcesoDisciplinarioAPIController extends AppBaseController
{
    /** @var  ProcesoDisciplinarioRepository */
    private $procesoDisciplinarioRepository;

    public function __construct(ProcesoDisciplinarioRepository $procesoDisciplinarioRepo)
    {
        $this->procesoDisciplinarioRepository = $procesoDisciplinarioRepo;
    }

    /**
     * Display a listing of the ProcesoDisciplinario.
     * GET|HEAD /procesoDisciplinarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $procesoDisciplinarios = $this->procesoDisciplinarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($procesoDisciplinarios->toArray(), 'Proceso Disciplinarios retrieved successfully');
    }

    /**
     * Store a newly created ProcesoDisciplinario in storage.
     * POST /procesoDisciplinarios
     *
     * @param CreateProcesoDisciplinarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProcesoDisciplinarioAPIRequest $request)
    {
        $input = $request->all();

        $procesoDisciplinario = $this->procesoDisciplinarioRepository->create($input);

        return $this->sendResponse($procesoDisciplinario->toArray(), 'Proceso Disciplinario saved successfully');
    }

    /**
     * Display the specified ProcesoDisciplinario.
     * GET|HEAD /procesoDisciplinarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProcesoDisciplinario $procesoDisciplinario */
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            return $this->sendError('Proceso Disciplinario not found');
        }

        return $this->sendResponse($procesoDisciplinario->toArray(), 'Proceso Disciplinario retrieved successfully');
    }

    /**
     * Update the specified ProcesoDisciplinario in storage.
     * PUT/PATCH /procesoDisciplinarios/{id}
     *
     * @param int $id
     * @param UpdateProcesoDisciplinarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProcesoDisciplinarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProcesoDisciplinario $procesoDisciplinario */
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            return $this->sendError('Proceso Disciplinario not found');
        }

        $procesoDisciplinario = $this->procesoDisciplinarioRepository->update($input, $id);

        return $this->sendResponse($procesoDisciplinario->toArray(), 'ProcesoDisciplinario updated successfully');
    }

    /**
     * Remove the specified ProcesoDisciplinario from storage.
     * DELETE /procesoDisciplinarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProcesoDisciplinario $procesoDisciplinario */
        $procesoDisciplinario = $this->procesoDisciplinarioRepository->find($id);

        if (empty($procesoDisciplinario)) {
            return $this->sendError('Proceso Disciplinario not found');
        }

        $procesoDisciplinario->delete();

        return $this->sendResponse($id, 'Proceso Disciplinario deleted successfully');
    }
}

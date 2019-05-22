<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartamentosAPIRequest;
use App\Http\Requests\API\UpdateDepartamentosAPIRequest;
use App\Models\Departamentos;
use App\Repositories\DepartamentosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DepartamentosController
 * @package App\Http\Controllers\API
 */

class DepartamentosAPIController extends AppBaseController
{
    /** @var  DepartamentosRepository */
    private $departamentosRepository;

    public function __construct(DepartamentosRepository $departamentosRepo)
    {
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * Display a listing of the Departamentos.
     * GET|HEAD /departamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $departamentos = $this->departamentosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($departamentos->toArray(), 'Departamentos retrieved successfully');
    }

    /**
     * Store a newly created Departamentos in storage.
     * POST /departamentos
     *
     * @param CreateDepartamentosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentosAPIRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        return $this->sendResponse($departamentos->toArray(), 'Departamentos saved successfully');
    }

    /**
     * Display the specified Departamentos.
     * GET|HEAD /departamentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError('Departamentos not found');
        }

        return $this->sendResponse($departamentos->toArray(), 'Departamentos retrieved successfully');
    }

    /**
     * Update the specified Departamentos in storage.
     * PUT/PATCH /departamentos/{id}
     *
     * @param int $id
     * @param UpdateDepartamentosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError('Departamentos not found');
        }

        $departamentos = $this->departamentosRepository->update($input, $id);

        return $this->sendResponse($departamentos->toArray(), 'Departamentos updated successfully');
    }

    /**
     * Remove the specified Departamentos from storage.
     * DELETE /departamentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError('Departamentos not found');
        }

        $departamentos->delete();

        return $this->sendResponse($id, 'Departamentos deleted successfully');
    }
}

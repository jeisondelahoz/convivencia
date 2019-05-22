<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaisesAPIRequest;
use App\Http\Requests\API\UpdatePaisesAPIRequest;
use App\Models\Paises;
use App\Repositories\PaisesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PaisesController
 * @package App\Http\Controllers\API
 */

class PaisesAPIController extends AppBaseController
{
    /** @var  PaisesRepository */
    private $paisesRepository;

    public function __construct(PaisesRepository $paisesRepo)
    {
        $this->paisesRepository = $paisesRepo;
    }

    /**
     * Display a listing of the Paises.
     * GET|HEAD /paises
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $paises = $this->paisesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($paises->toArray(), 'Paises retrieved successfully');
    }

    /**
     * Store a newly created Paises in storage.
     * POST /paises
     *
     * @param CreatePaisesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaisesAPIRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        return $this->sendResponse($paises->toArray(), 'Paises saved successfully');
    }

    /**
     * Display the specified Paises.
     * GET|HEAD /paises/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return $this->sendError('Paises not found');
        }

        return $this->sendResponse($paises->toArray(), 'Paises retrieved successfully');
    }

    /**
     * Update the specified Paises in storage.
     * PUT/PATCH /paises/{id}
     *
     * @param int $id
     * @param UpdatePaisesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaisesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return $this->sendError('Paises not found');
        }

        $paises = $this->paisesRepository->update($input, $id);

        return $this->sendResponse($paises->toArray(), 'Paises updated successfully');
    }

    /**
     * Remove the specified Paises from storage.
     * DELETE /paises/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return $this->sendError('Paises not found');
        }

        $paises->delete();

        return $this->sendResponse($id, 'Paises deleted successfully');
    }
}

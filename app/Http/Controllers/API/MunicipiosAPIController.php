<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMunicipiosAPIRequest;
use App\Http\Requests\API\UpdateMunicipiosAPIRequest;
use App\Models\Municipios;
use App\Repositories\MunicipiosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MunicipiosController
 * @package App\Http\Controllers\API
 */

class MunicipiosAPIController extends AppBaseController
{
    /** @var  MunicipiosRepository */
    private $municipiosRepository;

    public function __construct(MunicipiosRepository $municipiosRepo)
    {
        $this->municipiosRepository = $municipiosRepo;
    }

    /**
     * Display a listing of the Municipios.
     * GET|HEAD /municipios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $municipios = $this->municipiosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($municipios->toArray(), 'Municipios retrieved successfully');
    }

    /**
     * Store a newly created Municipios in storage.
     * POST /municipios
     *
     * @param CreateMunicipiosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipiosAPIRequest $request)
    {
        $input = $request->all();

        $municipios = $this->municipiosRepository->create($input);

        return $this->sendResponse($municipios->toArray(), 'Municipios saved successfully');
    }

    /**
     * Display the specified Municipios.
     * GET|HEAD /municipios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Municipios $municipios */
        $municipios = $this->municipiosRepository->find($id);

        if (empty($municipios)) {
            return $this->sendError('Municipios not found');
        }

        return $this->sendResponse($municipios->toArray(), 'Municipios retrieved successfully');
    }

    /**
     * Update the specified Municipios in storage.
     * PUT/PATCH /municipios/{id}
     *
     * @param int $id
     * @param UpdateMunicipiosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipiosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Municipios $municipios */
        $municipios = $this->municipiosRepository->find($id);

        if (empty($municipios)) {
            return $this->sendError('Municipios not found');
        }

        $municipios = $this->municipiosRepository->update($input, $id);

        return $this->sendResponse($municipios->toArray(), 'Municipios updated successfully');
    }

    /**
     * Remove the specified Municipios from storage.
     * DELETE /municipios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Municipios $municipios */
        $municipios = $this->municipiosRepository->find($id);

        if (empty($municipios)) {
            return $this->sendError('Municipios not found');
        }

        $municipios->delete();

        return $this->sendResponse($id, 'Municipios deleted successfully');
    }
}

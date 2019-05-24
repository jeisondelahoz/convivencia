<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAreasAPIRequest;
use App\Http\Requests\API\UpdateAreasAPIRequest;
use App\Models\Areas;
use App\Repositories\AreasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AreasController
 * @package App\Http\Controllers\API
 */

class AreasAPIController extends AppBaseController
{
    /** @var  AreasRepository */
    private $areasRepository;

    public function __construct(AreasRepository $areasRepo)
    {
        $this->areasRepository = $areasRepo;
    }

    /**
     * Display a listing of the Areas.
     * GET|HEAD /areas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $areas = $this->areasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully');
    }

    /**
     * Store a newly created Areas in storage.
     * POST /areas
     *
     * @param CreateAreasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAreasAPIRequest $request)
    {
        $input = $request->all();

        $areas = $this->areasRepository->create($input);

        return $this->sendResponse($areas->toArray(), 'Areas saved successfully');
    }

    /**
     * Display the specified Areas.
     * GET|HEAD /areas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Areas $areas */
        $areas = $this->areasRepository->find($id);

        if (empty($areas)) {
            return $this->sendError('Areas not found');
        }

        return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully');
    }

    /**
     * Update the specified Areas in storage.
     * PUT/PATCH /areas/{id}
     *
     * @param int $id
     * @param UpdateAreasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Areas $areas */
        $areas = $this->areasRepository->find($id);

        if (empty($areas)) {
            return $this->sendError('Areas not found');
        }

        $areas = $this->areasRepository->update($input, $id);

        return $this->sendResponse($areas->toArray(), 'Areas updated successfully');
    }

    /**
     * Remove the specified Areas from storage.
     * DELETE /areas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Areas $areas */
        $areas = $this->areasRepository->find($id);

        if (empty($areas)) {
            return $this->sendError('Areas not found');
        }

        $areas->delete();

        return $this->sendResponse($id, 'Areas deleted successfully');
    }
}

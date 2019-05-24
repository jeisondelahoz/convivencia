<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGruposRequest;
use App\Http\Requests\UpdateGruposRequest;
use App\Repositories\GruposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GruposController extends AppBaseController
{
    /** @var  GruposRepository */
    private $gruposRepository;

    public function __construct(GruposRepository $gruposRepo)
    {
        $this->gruposRepository = $gruposRepo;
    }

    /**
     * Display a listing of the Grupos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $grupos = $this->gruposRepository->paginate(10);

        return view('grupos.index')
            ->with('grupos', $grupos);
    }

    /**
     * Show the form for creating a new Grupos.
     *
     * @return Response
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Store a newly created Grupos in storage.
     *
     * @param CreateGruposRequest $request
     *
     * @return Response
     */
    public function store(CreateGruposRequest $request)
    {
        $input = $request->all();

        $grupos = $this->gruposRepository->create($input);

        Flash::success('Grupos saved successfully.');

        return redirect(route('grupos.index'));
    }

    /**
     * Display the specified Grupos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            Flash::error('Grupos not found');

            return redirect(route('grupos.index'));
        }

        return view('grupos.show')->with('grupos', $grupos);
    }

    /**
     * Show the form for editing the specified Grupos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            Flash::error('Grupos not found');

            return redirect(route('grupos.index'));
        }

        return view('grupos.edit')->with('grupos', $grupos);
    }

    /**
     * Update the specified Grupos in storage.
     *
     * @param int $id
     * @param UpdateGruposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGruposRequest $request)
    {
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            Flash::error('Grupos not found');

            return redirect(route('grupos.index'));
        }

        $grupos = $this->gruposRepository->update($request->all(), $id);

        Flash::success('Grupos updated successfully.');

        return redirect(route('grupos.index'));
    }

    /**
     * Remove the specified Grupos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            Flash::error('Grupos not found');

            return redirect(route('grupos.index'));
        }

        $this->gruposRepository->delete($id);

        Flash::success('Grupos deleted successfully.');

        return redirect(route('grupos.index'));
    }
}

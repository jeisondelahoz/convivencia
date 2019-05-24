<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsignaturasRequest;
use App\Http\Requests\UpdateAsignaturasRequest;
use App\Repositories\AsignaturasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AsignaturasController extends AppBaseController
{
    /** @var  AsignaturasRepository */
    private $asignaturasRepository;

    public function __construct(AsignaturasRepository $asignaturasRepo)
    {
        $this->asignaturasRepository = $asignaturasRepo;
    }

    /**
     * Display a listing of the Asignaturas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $asignaturas = $this->asignaturasRepository->paginate(10);

        return view('asignaturas.index')
            ->with('asignaturas', $asignaturas);
    }

    /**
     * Show the form for creating a new Asignaturas.
     *
     * @return Response
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created Asignaturas in storage.
     *
     * @param CreateAsignaturasRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaturasRequest $request)
    {
        $input = $request->all();

        $asignaturas = $this->asignaturasRepository->create($input);

        Flash::success('Asignaturas saved successfully.');

        return redirect(route('asignaturas.index'));
    }

    /**
     * Display the specified Asignaturas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            Flash::error('Asignaturas not found');

            return redirect(route('asignaturas.index'));
        }

        return view('asignaturas.show')->with('asignaturas', $asignaturas);
    }

    /**
     * Show the form for editing the specified Asignaturas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            Flash::error('Asignaturas not found');

            return redirect(route('asignaturas.index'));
        }

        return view('asignaturas.edit')->with('asignaturas', $asignaturas);
    }

    /**
     * Update the specified Asignaturas in storage.
     *
     * @param int $id
     * @param UpdateAsignaturasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaturasRequest $request)
    {
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            Flash::error('Asignaturas not found');

            return redirect(route('asignaturas.index'));
        }

        $asignaturas = $this->asignaturasRepository->update($request->all(), $id);

        Flash::success('Asignaturas updated successfully.');

        return redirect(route('asignaturas.index'));
    }

    /**
     * Remove the specified Asignaturas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignaturas = $this->asignaturasRepository->find($id);

        if (empty($asignaturas)) {
            Flash::error('Asignaturas not found');

            return redirect(route('asignaturas.index'));
        }

        $this->asignaturasRepository->delete($id);

        Flash::success('Asignaturas deleted successfully.');

        return redirect(route('asignaturas.index'));
    }
}

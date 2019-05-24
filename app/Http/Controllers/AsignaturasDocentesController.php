<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsignaturasDocentesRequest;
use App\Http\Requests\UpdateAsignaturasDocentesRequest;
use App\Repositories\AsignaturasDocentesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AsignaturasDocentesController extends AppBaseController
{
    /** @var  AsignaturasDocentesRepository */
    private $asignaturasDocentesRepository;

    public function __construct(AsignaturasDocentesRepository $asignaturasDocentesRepo)
    {
        $this->asignaturasDocentesRepository = $asignaturasDocentesRepo;
    }

    /**
     * Display a listing of the AsignaturasDocentes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $asignaturasDocentes = $this->asignaturasDocentesRepository->paginate(10);

        return view('asignaturas_docentes.index')
            ->with('asignaturasDocentes', $asignaturasDocentes);
    }

    /**
     * Show the form for creating a new AsignaturasDocentes.
     *
     * @return Response
     */
    public function create()
    {
        return view('asignaturas_docentes.create');
    }

    /**
     * Store a newly created AsignaturasDocentes in storage.
     *
     * @param CreateAsignaturasDocentesRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaturasDocentesRequest $request)
    {
        $input = $request->all();

        $asignaturasDocentes = $this->asignaturasDocentesRepository->create($input);

        Flash::success('Asignaturas Docentes saved successfully.');

        return redirect(route('asignaturasDocentes.index'));
    }

    /**
     * Display the specified AsignaturasDocentes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            Flash::error('Asignaturas Docentes not found');

            return redirect(route('asignaturasDocentes.index'));
        }

        return view('asignaturas_docentes.show')->with('asignaturasDocentes', $asignaturasDocentes);
    }

    /**
     * Show the form for editing the specified AsignaturasDocentes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            Flash::error('Asignaturas Docentes not found');

            return redirect(route('asignaturasDocentes.index'));
        }

        return view('asignaturas_docentes.edit')->with('asignaturasDocentes', $asignaturasDocentes);
    }

    /**
     * Update the specified AsignaturasDocentes in storage.
     *
     * @param int $id
     * @param UpdateAsignaturasDocentesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaturasDocentesRequest $request)
    {
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            Flash::error('Asignaturas Docentes not found');

            return redirect(route('asignaturasDocentes.index'));
        }

        $asignaturasDocentes = $this->asignaturasDocentesRepository->update($request->all(), $id);

        Flash::success('Asignaturas Docentes updated successfully.');

        return redirect(route('asignaturasDocentes.index'));
    }

    /**
     * Remove the specified AsignaturasDocentes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignaturasDocentes = $this->asignaturasDocentesRepository->find($id);

        if (empty($asignaturasDocentes)) {
            Flash::error('Asignaturas Docentes not found');

            return redirect(route('asignaturasDocentes.index'));
        }

        $this->asignaturasDocentesRepository->delete($id);

        Flash::success('Asignaturas Docentes deleted successfully.');

        return redirect(route('asignaturasDocentes.index'));
    }
}

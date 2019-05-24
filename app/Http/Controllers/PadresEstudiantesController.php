<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePadresEstudiantesRequest;
use App\Http\Requests\UpdatePadresEstudiantesRequest;
use App\Repositories\PadresEstudiantesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PadresEstudiantesController extends AppBaseController
{
    /** @var  PadresEstudiantesRepository */
    private $padresEstudiantesRepository;

    public function __construct(PadresEstudiantesRepository $padresEstudiantesRepo)
    {
        $this->padresEstudiantesRepository = $padresEstudiantesRepo;
    }

    /**
     * Display a listing of the PadresEstudiantes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $padresEstudiantes = $this->padresEstudiantesRepository->paginate(10);

        return view('padres_estudiantes.index')
            ->with('padresEstudiantes', $padresEstudiantes);
    }

    /**
     * Show the form for creating a new PadresEstudiantes.
     *
     * @return Response
     */
    public function create()
    {
        return view('padres_estudiantes.create');
    }

    /**
     * Store a newly created PadresEstudiantes in storage.
     *
     * @param CreatePadresEstudiantesRequest $request
     *
     * @return Response
     */
    public function store(CreatePadresEstudiantesRequest $request)
    {
        $input = $request->all();

        $padresEstudiantes = $this->padresEstudiantesRepository->create($input);

        Flash::success('Padres Estudiantes saved successfully.');

        return redirect(route('padresEstudiantes.index'));
    }

    /**
     * Display the specified PadresEstudiantes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            Flash::error('Padres Estudiantes not found');

            return redirect(route('padresEstudiantes.index'));
        }

        return view('padres_estudiantes.show')->with('padresEstudiantes', $padresEstudiantes);
    }

    /**
     * Show the form for editing the specified PadresEstudiantes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            Flash::error('Padres Estudiantes not found');

            return redirect(route('padresEstudiantes.index'));
        }

        return view('padres_estudiantes.edit')->with('padresEstudiantes', $padresEstudiantes);
    }

    /**
     * Update the specified PadresEstudiantes in storage.
     *
     * @param int $id
     * @param UpdatePadresEstudiantesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePadresEstudiantesRequest $request)
    {
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            Flash::error('Padres Estudiantes not found');

            return redirect(route('padresEstudiantes.index'));
        }

        $padresEstudiantes = $this->padresEstudiantesRepository->update($request->all(), $id);

        Flash::success('Padres Estudiantes updated successfully.');

        return redirect(route('padresEstudiantes.index'));
    }

    /**
     * Remove the specified PadresEstudiantes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $padresEstudiantes = $this->padresEstudiantesRepository->find($id);

        if (empty($padresEstudiantes)) {
            Flash::error('Padres Estudiantes not found');

            return redirect(route('padresEstudiantes.index'));
        }

        $this->padresEstudiantesRepository->delete($id);

        Flash::success('Padres Estudiantes deleted successfully.');

        return redirect(route('padresEstudiantes.index'));
    }
}

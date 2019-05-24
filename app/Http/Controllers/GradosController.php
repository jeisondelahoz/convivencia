<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGradosRequest;
use App\Http\Requests\UpdateGradosRequest;
use App\Repositories\GradosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GradosController extends AppBaseController
{
    /** @var  GradosRepository */
    private $gradosRepository;

    public function __construct(GradosRepository $gradosRepo)
    {
        $this->gradosRepository = $gradosRepo;
    }

    /**
     * Display a listing of the Grados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $grados = $this->gradosRepository->paginate(10);

        return view('grados.index')
            ->with('grados', $grados);
    }

    /**
     * Show the form for creating a new Grados.
     *
     * @return Response
     */
    public function create()
    {
        return view('grados.create');
    }

    /**
     * Store a newly created Grados in storage.
     *
     * @param CreateGradosRequest $request
     *
     * @return Response
     */
    public function store(CreateGradosRequest $request)
    {
        $input = $request->all();

        $grados = $this->gradosRepository->create($input);

        Flash::success('Grados saved successfully.');

        return redirect(route('grados.index'));
    }

    /**
     * Display the specified Grados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            Flash::error('Grados not found');

            return redirect(route('grados.index'));
        }

        return view('grados.show')->with('grados', $grados);
    }

    /**
     * Show the form for editing the specified Grados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            Flash::error('Grados not found');

            return redirect(route('grados.index'));
        }

        return view('grados.edit')->with('grados', $grados);
    }

    /**
     * Update the specified Grados in storage.
     *
     * @param int $id
     * @param UpdateGradosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradosRequest $request)
    {
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            Flash::error('Grados not found');

            return redirect(route('grados.index'));
        }

        $grados = $this->gradosRepository->update($request->all(), $id);

        Flash::success('Grados updated successfully.');

        return redirect(route('grados.index'));
    }

    /**
     * Remove the specified Grados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grados = $this->gradosRepository->find($id);

        if (empty($grados)) {
            Flash::error('Grados not found');

            return redirect(route('grados.index'));
        }

        $this->gradosRepository->delete($id);

        Flash::success('Grados deleted successfully.');

        return redirect(route('grados.index'));
    }
}

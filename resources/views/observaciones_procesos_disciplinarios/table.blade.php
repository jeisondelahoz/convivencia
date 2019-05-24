<table class="table table-responsive-sm table-striped" id="observacionesProcesosDisciplinarios-table">
    <thead>
        <th>Observaciones Id</th>
        <th>Procesodisciplinario Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($observacionesProcesosDisciplinarios as $observacionesProcesosDisciplinarios)
        <tr>
            <td>{!! $observacionesProcesosDisciplinarios->observaciones_id !!}</td>
            <td>{!! $observacionesProcesosDisciplinarios->procesodisciplinario_id !!}</td>
            <td>
                {!! Form::open(['route' => ['observacionesProcesosDisciplinarios.destroy', $observacionesProcesosDisciplinarios->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('observacionesProcesosDisciplinarios.show', [$observacionesProcesosDisciplinarios->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('observacionesProcesosDisciplinarios.edit', [$observacionesProcesosDisciplinarios->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
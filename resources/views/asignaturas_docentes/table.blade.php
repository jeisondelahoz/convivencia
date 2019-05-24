<table class="table table-responsive-sm table-striped" id="asignaturasDocentes-table">
    <thead>
        <th>Year</th>
        <th>Asignaturas Id</th>
        <th>Docentes Id</th>
        <th>Grupos Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($asignaturasDocentes as $asignaturasDocentes)
        <tr>
            <td>{!! $asignaturasDocentes->year !!}</td>
            <td>{!! $asignaturasDocentes->asignaturas_id !!}</td>
            <td>{!! $asignaturasDocentes->docentes_id !!}</td>
            <td>{!! $asignaturasDocentes->grupos_id !!}</td>
            <td>
                {!! Form::open(['route' => ['asignaturasDocentes.destroy', $asignaturasDocentes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asignaturasDocentes.show', [$asignaturasDocentes->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asignaturasDocentes.edit', [$asignaturasDocentes->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
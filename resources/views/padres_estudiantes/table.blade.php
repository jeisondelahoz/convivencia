<table class="table table-responsive-sm table-striped" id="padresEstudiantes-table">
    <thead>
        <th>Padres Id</th>
        <th>Estudiantes Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($padresEstudiantes as $padresEstudiantes)
        <tr>
            <td>{!! $padresEstudiantes->padres_id !!}</td>
            <td>{!! $padresEstudiantes->estudiantes_id !!}</td>
            <td>
                {!! Form::open(['route' => ['padresEstudiantes.destroy', $padresEstudiantes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('padresEstudiantes.show', [$padresEstudiantes->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('padresEstudiantes.edit', [$padresEstudiantes->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
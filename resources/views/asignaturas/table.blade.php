<table class="table table-responsive-sm table-striped" id="asignaturas-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Areas Id</th>
        <th>Grados Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($asignaturas as $asignaturas)
        <tr>
            <td>{!! $asignaturas->nombre !!}</td>
            <td>{!! $asignaturas->descripcion !!}</td>
            <td>{!! $asignaturas->areas_id !!}</td>
            <td>{!! $asignaturas->grados_id !!}</td>
            <td>
                {!! Form::open(['route' => ['asignaturas.destroy', $asignaturas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asignaturas.show', [$asignaturas->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asignaturas.edit', [$asignaturas->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
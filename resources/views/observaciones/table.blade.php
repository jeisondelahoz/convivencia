<table class="table table-responsive-sm table-striped" id="observaciones-table">
    <thead>
        <th>Motivacion</th>
        <th>Descripcion</th>
        <th>Visibilidad</th>
        <th>Tipoobservaciones Id</th>
        <th>Estudiantes Id</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($observaciones as $observaciones)
        <tr>
            <td>{!! $observaciones->motivacion !!}</td>
            <td>{!! $observaciones->descripcion !!}</td>
            <td>{!! $observaciones->visibilidad !!}</td>
            <td>{!! $observaciones->tipoobservaciones_id !!}</td>
            <td>{!! $observaciones->estudiantes_id !!}</td>
            <td>{!! $observaciones->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['observaciones.destroy', $observaciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('observaciones.show', [$observaciones->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('observaciones.edit', [$observaciones->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
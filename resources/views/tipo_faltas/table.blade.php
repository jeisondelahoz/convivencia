<table class="table table-responsive-sm table-striped" id="tipoFaltas-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tipoFaltas as $tipoFalta)
        <tr>
            <td>{!! $tipoFalta->nombre !!}</td>
            <td>{!! $tipoFalta->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoFaltas.destroy', $tipoFalta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoFaltas.show', [$tipoFalta->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('tipoFaltas.edit', [$tipoFalta->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
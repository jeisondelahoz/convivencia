<table class="table table-responsive-sm table-striped" id="municipios-table">
    <thead>
        <th>Nombre</th>
        <th>Departamentos Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($municipios as $municipios)
        <tr>
            <td>{!! $municipios->nombre !!}</td>
            <td>{!! $municipios->departamentos_id !!}</td>
            <td>
                {!! Form::open(['route' => ['municipios.destroy', $municipios->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('municipios.show', [$municipios->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('municipios.edit', [$municipios->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
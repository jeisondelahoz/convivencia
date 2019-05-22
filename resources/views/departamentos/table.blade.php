<table class="table table-responsive-sm table-striped" id="departamentos-table">
    <thead>
        <th>Nombre</th>
        <th>Paises Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($departamentos as $departamentos)
        <tr>
            <td>{!! $departamentos->nombre !!}</td>
            <td>{!! $departamentos->paises_id !!}</td>
            <td>
                {!! Form::open(['route' => ['departamentos.destroy', $departamentos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departamentos.show', [$departamentos->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('departamentos.edit', [$departamentos->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
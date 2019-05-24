<table class="table table-responsive-sm table-striped" id="grados-table">
    <thead>
        <th>Nombre</th>
        <th>Grupos Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($grados as $grados)
        <tr>
            <td>{!! $grados->nombre !!}</td>
            <td>{!! $grados->grupos_id !!}</td>
            <td>
                {!! Form::open(['route' => ['grados.destroy', $grados->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grados.show', [$grados->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('grados.edit', [$grados->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
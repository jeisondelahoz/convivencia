<table class="table table-responsive-sm table-striped" id="tipoDocumentos-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tipoDocumentos as $tipoDocumentos)
        <tr>
            <td>{!! $tipoDocumentos->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoDocumentos.destroy', $tipoDocumentos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoDocumentos.show', [$tipoDocumentos->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('tipoDocumentos.edit', [$tipoDocumentos->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
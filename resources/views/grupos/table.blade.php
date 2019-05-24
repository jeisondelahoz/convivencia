<table class="table table-responsive-sm table-striped" id="grupos-table">
    <thead>
        <th>Nombre</th>
        <th>Docentes Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($grupos as $grupos)
        <tr>
            <td>{!! $grupos->nombre !!}</td>
            <td>{!! $grupos->docentes_id !!}</td>
            <td>
                {!! Form::open(['route' => ['grupos.destroy', $grupos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grupos.show', [$grupos->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('grupos.edit', [$grupos->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
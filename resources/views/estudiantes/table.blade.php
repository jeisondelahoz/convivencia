<table class="table table-responsive-sm table-striped" id="estudiantes-table">
    <thead>
        <th>User Id</th>
        <th>Grupos Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiantes)
        <tr>
            <td>{!! $estudiantes->user_id !!}</td>
            <td>{!! $estudiantes->grupos_id !!}</td>
            <td>
                {!! Form::open(['route' => ['estudiantes.destroy', $estudiantes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estudiantes.show', [$estudiantes->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('estudiantes.edit', [$estudiantes->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
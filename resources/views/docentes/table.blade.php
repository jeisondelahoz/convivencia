<table class="table table-responsive-sm table-striped" id="docentes-table">
    <thead>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($docentes as $docentes)
        <tr>
            <td>{!! $docentes->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['docentes.destroy', $docentes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('docentes.show', [$docentes->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('docentes.edit', [$docentes->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
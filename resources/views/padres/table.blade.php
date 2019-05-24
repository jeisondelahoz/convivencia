<table class="table table-responsive-sm table-striped" id="padres-table">
    <thead>
        <th>Es Acudiente</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($padres as $padres)
        <tr>
            <td>{!! $padres->es_acudiente !!}</td>
            <td>{!! $padres->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['padres.destroy', $padres->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('padres.show', [$padres->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('padres.edit', [$padres->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
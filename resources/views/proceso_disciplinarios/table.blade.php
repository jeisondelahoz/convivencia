<table class="table table-responsive-sm table-striped" id="procesoDisciplinarios-table">
    <thead>
        <th>Descripcion</th>
        <th>Tipofalta Id</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($procesoDisciplinarios as $procesoDisciplinario)
        <tr>
            <td>{!! $procesoDisciplinario->descripcion !!}</td>
            <td>{!! $procesoDisciplinario->tipofalta_id !!}</td>
            <td>{!! $procesoDisciplinario->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['procesoDisciplinarios.destroy', $procesoDisciplinario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('procesoDisciplinarios.show', [$procesoDisciplinario->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('procesoDisciplinarios.edit', [$procesoDisciplinario->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
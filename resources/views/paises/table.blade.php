<table class="table table-responsive-sm table-striped" id="paises-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($paises as $paises)
        <tr>
            <td>{!! $paises->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['paises.destroy', $paises->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paises.show', [$paises->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('paises.edit', [$paises->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
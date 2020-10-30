@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table">
    <thead>
        <th width="10%">ID</th>
        <th width="20%">Nombre</th>
        <th width="30%">E-mail</th>
        <th width="20%">Rol</th>
        <th width="20%">Acciones</th>
      </thead>
    <tbody>
        @foreach ($users as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->roles->implode('name', ', ') }}</td>
                <td class="text-center">
                    @can('user.update')
                        <a href="{{ URL::action('UsersController@edit',encrypt($usuario->id)) }}">
                            {{ Form::button(
                                '<i class="fa fa-edit"></i>',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary btn-sm',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Editar'
                                    ]
                            )}}
                        </a>
                    @endcan
                    @can('user.delete')
                        <a href="#"
                            data-target="#modal-delete-{{ $usuario->id }}"
                            data-toggle="modal" >
                            {{ Form::button(
                                '<i class="fa fa-trash"></i>',
                                    [
                                        'class' => 'btn btn-warning btn-sm',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Eliminar'
                                    ]
                            )}}
                        </a>

                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@foreach ($users as $usuario)
    <div class="modal modal-warning fade" id="modal-delete-{{ $usuario->id }}">
        {!!  Form::open(['method'=>'delete', 'route'=>['usuarios.destroy', encrypt($usuario->id)]])  !!}
            {{  Form::token() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title">Eliminar usuario</h4>
                        </div>
                        <div class="modal-body">
                            <p>Confirme si desea Eliminar el Usuario <strong>{{ $usuario->name }}</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline">Eliminar</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
        {!!  Form::close() !!}
        <!-- /.modal-dialog -->
    </div>
@endforeach

@push('scripts')
<script src="{{ asset('/plugins/DataTable/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('.data-table').DataTable( {
            fixedHeader: true
        } );
    } );
</script>
@endpush

@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table">
    <thead>
        <th width="10%">ID</th>
        <th width="25%">Permiso</th>
        <th width="25%">Descripción</th>
        <th width="20%">Modulo</th>
        <th width="20%">Acciones</th>        
    </thead>
    <tbody>
        @foreach ($permissions as $permiso)
            <tr>
                <td>{{ $permiso->id }}</td>
                <td>{{ $permiso->name }}</td>
                <td>{{ $permiso->description }}</td>
                <td>{{ $permiso->module }}</td>
                <td class="text-center">
                    @can('permission.update')
                        <a href="{{ URL::action('PermissionsController@edit', encrypt($permiso->id)) }}">
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
                    @can('permission.delete')
                        <a href="#"
                            data-target="#modal-delete-{{ $permiso->id }}"
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

@foreach ($permissions as $permiso)
    <div class="modal modal-warning fade" id="modal-delete-{{ $permiso->id }}">
        {!!  Form::open(['method'=>'delete', 'route'=>['permisos.destroy', encrypt($permiso->id)]])  !!}
            {{  Form::token() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title">Eliminar Rol</h4>
                        </div>
                        <div class="modal-body">
                            <p>Confirme si desea Eliminar el permiso <strong>{{ $permiso->name }}</strong></p>
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

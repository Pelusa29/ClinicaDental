@extends('theme.backoffice.layouts.admin')

@section('title', $role->name)

@section('head')
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.role.index') }}">Roles del Sitema</a></li>
<li>{{ $role->name }}</li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Rol: </strong>{{ $role->name }}</p>
<div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">{{ $role->name }}</span>
                        <p><strong>slug:</strong> {{ $role->slug }}</p>
                        <p><strong>Descripción:</strong> {{ $role->description }}</p>
                    </div>
                    <div class="card-action">
                        <div class="col s12 m4 l2">
                            <a href="#" class="btn btn-danger" onclick="enviar_formulario()"><span class="material-icons">
                                cancel
                                </span></a>
                        </div>
                        <div class="col s12 m4 l2">
                            <a href="{{ route('backoffice.role.index')}}" class="btn btn-small blue"><span class="material-icons">
                                save
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Permisos del Rol</span>
                        <div class="card material-table">
                            <div class="table-header">
                                <span class="table-title">Lista de Roles</span>
                                <div class="actions">
                                <a href="#addClientes" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
                                <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                                </div>
                            </div>
                            <table id="datatable">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Descripción</th>

                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td><a href="{{ route('backoffice.permission.show', $permission) }}">{{ $permission->name }}</a></td>
                                            <td>{{ $permission->slug }}</td>
                                            <td>{{ $permission->description }}</td>

                                            <td>{{ $permission->slug }}</td>
                                            <td><a href="{{ route('backoffice.permission.edit', $permission) }}" class="btn btn-small blue"><span class="material-icons">edit</span></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('backoffice.role.destroy', $role) }}" name="delete_form">
    {{ csrf_field() }}
    {{method_field('DELETE') }}
</form>
@endsection

@section('foot')
    <script>
        function enviar_formulario(){
            swal({
                title: "¿Que deseas hacer?",
                text: "Esta acción no puede deshacerse",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if(result.value){
                    document.delete_form.submit();
                }else{
                    swal(
                        "Operación Cancelada",
                        "Registro no Eliminado",
                        "error"
                    );
                }
            });
        }
    </script>
@endsection

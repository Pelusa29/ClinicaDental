@extends('theme.backoffice.layouts.admin')

@section('title', $permission->name)

@section('head')
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li>{{ $permission->name }}</li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Permiso: </strong>{{ $permission->name }}</p>
<div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">{{ $permission->name }}</span>
                        <p><strong>slug:</strong> {{ $permission->slug }}</p>
                        <p><strong>Descripción:</strong> {{ $permission->description }}</p>
                    </div>
                    <div class="card-action">
                        <div class="col s12 m4 l2">
                            <a href="#" class="btn btn-danger" onclick="enviar_formulario()"><span class="material-icons">
                                cancel
                                </span></a>
                        </div>
                        <div class="col s12 m4 l2">
                            <a href="{{ route('backoffice.permission.index')}}" class="btn btn-small blue"><span class="material-icons">
                                save
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('backoffice.permission.destroy', $permission) }}" name="delete_form">
    {{ csrf_field() }}
    {{method_field('DELETE') }}
</form>
@endsection

@section('foot')
    <script>
        function enviar_formulario(){
            swal({
                title: "¿Desea Eliminar este permiso?",
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

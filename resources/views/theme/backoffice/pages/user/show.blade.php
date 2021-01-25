@extends('theme.backoffice.layouts.admin')

@section('title', $user->name)

@section('head')
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li>{{ $user->name }}</li>
@endsection

@section('dropdown_settings')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{route('backoffice.user.edit', $user)}}" class="grey-text text-darken-2">Editar Usuario</a></li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Usuario: {{ $user->name }}</strong></p>
<div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">{{ $user->name }}</span>
                        <p><strong>Edad: </strong>{{ $user->age() }}</p>
                    </div>
                    <div class="card-action">
                        <div class="col s12 m4 l2">
                            <a href="#" class="btn btn-danger" onclick="enviar_formulario()"><span class="material-icons">
                                cancel
                                </span></a>
                        </div>
                        <div class="col s12 m4 l2">
                            <a href="{{ route('backoffice.user.index')}}" class="btn btn-small blue"><span class="material-icons">
                                save
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{----}}
            <div class="col s12 m4">
                @include('theme.backoffice.pages.user.includes.user_nav')
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('backoffice.user.destroy', $user) }}" name="delete_form">
    {{ csrf_field() }}
    {{method_field('DELETE') }}
</form>
@endsection

@section('foot')
    <script>
        function enviar_formulario(){
            swal({
                title: "¿Desea Eliminar este Usuario?",
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

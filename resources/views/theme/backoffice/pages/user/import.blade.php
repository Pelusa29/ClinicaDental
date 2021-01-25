@extends('theme.backoffice.layouts.admin')

@section('title', 'Importar Usuarios')

@section('head')
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
<li>Importar Usuario</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Seleccionar un archivo de Excel</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card-panel">
                            <h4 class="header2">Importar Usuarios</h4>
                            <div class="row">
                                <form class="col s12" method="POST" action="{{route('backoffice.user.make_import')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="file" name="excel" required>
                                            @error('excel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light right" type="submit">Importar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('foot')
@endsection

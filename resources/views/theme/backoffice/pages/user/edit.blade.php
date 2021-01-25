@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar ' . $user->name)

@section('head')
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
<li>Editar {{ $user->name }}</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Actualiza datos del Usuario</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card-panel">
                            <h4 class="header2">Actualizar Usuario</h4>
                            <div class="row">
                                <form class="col s12" method="POST" action="{{ route('backoffice.user.update', [$user, 'view=frontoffice']) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="name" value="{{ $user->name }}">
                                            <label for="name">Nombre del Usuario</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="dob" type="date" name="dob" value="{{  Carbon\Carbon::parse($user->dob)->format('Y-m-d') }}">
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" type="email" name="email" value="{{ $user->email }}">
                                            <label for="email">Correo Electronico</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light right" type="submit">Guardar
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

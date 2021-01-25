@extends('theme.backoffice.layouts.admin')

@section('title', 'Alta de Usuario')

@section('head')
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
<li>Crear Usuario</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Introduce los datos para crear un nuevo Usuario.</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card-panel">
                            <h4 class="header2">Crear Usuario</h4>
                            <div class="row">
                                <form class="col s12" method="POST" action="{{ route('backoffice.user.store') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="name">
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
                                            <input id="dob" type="date" name="dob">
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" type="email" name="email">
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
                                            <input id="password" type="password" name="password">
                                            <label for="name">Contraseña</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password_confirmation" type="password" name="password_confirmation">
                                            <label for="password_confirmation">Confirmar Contraseña</label>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="role" id="role" required>
                                                <option value="" disabled="" selected="">-- Seleccionar Rol --</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="email">Rol</label>
                                            @error('role')
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

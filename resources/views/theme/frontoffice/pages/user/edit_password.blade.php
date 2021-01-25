@extends('theme.frontoffice.layouts.main')

@section('title','Modificar Contraseña')

@section('head')
@endsection

@section('nav')
@endsection

@section('content')
<div class="container">
    <div class="row">
        {{-- Menu lateral --}}
        @include('theme.frontoffice.pages.user.includes.nav')
        {{--Seccion principal--}}
        <div class="col s12 m8">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">@yield('title','')</span>
                    <div class="row">
                        <form class="col s12" method="POST" action="{{ route('frontoffice.user.change_password') }}">
                            {{ @csrf_field() }}
                            {{ @method_field('PUT') }}

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="old_password" type="password" name="old_password">
                                    <label for="old_password">Contraseña actual:</label>
                                    @if($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" name="password">
                                    <label for="password">Nueva contraseña:</label>
                                    @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password-confirm" type="password" name="password_confirmation">
                                    <label for="password-confirm">Confirmar contraseña:</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn btn-waves-effect waves-light right" type="submit">Actualizar <i class="material-icons right">send</i></button>
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

@extends('theme.backoffice.layouts.admin')

@section('title','Agendar una Cita para: ' .$user->name)

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.time.css') }}">
@endsection


@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
<li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
<li>Agendar Cita</li>
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
                        <span class="card-title">@yield('title','')</span>
                        <form action="#" method="POST">

                            {{ csrf_field() }}
                            @if(Auth::user()->has_role(config('app.medico_role')))
                                <input type="hidden" name="speciality" value="">
                                <input type="hidden" name="doctor" value="{{ Auth::id() }}">
                            @else
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">people</i>
                                        <select name="medico">
                                            <option value="1">Raul Castro</option>
                                            <option value="2">Edgar alonso</option>
                                            <option value="3">Gilberto Paño</option>
                                        </select>
                                        <label for="lblMedico">Médico</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">people</i>
                                        <select name="speciality">
                                            <option value="1">Internista</option>
                                            <option value="2">Pediatra</option>
                                            <option value="3">Ódontologo</option>
                                        </select>
                                        <label for="lblEspecialidad">Especialidad</label>
                                    </div>
                                </div>
                            @endif
                           <div class="row">
                               <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">today</i>
                                    <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona fecha">

                               </div>
                               <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona una fecha">

                               </div>
                           </div>
                           <div class="row">
                               <button class="btn waves-effect weves-light" type="submit">Agendar <i class="material-icons right">send</i></button>
                           </div>
                        </form>
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

@endsection

@section('foot')
<script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/picker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/picker.date.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/picker.time.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/legacy.js') }}"></script>
<script>
    $('select').material_select();

    var input_date =  $('.datepicker').pickadate({
        min:true
    });
    var input_time = $('.timepicker').pickatime({
        min:4
    });


    var date_picker = input_date.pickadate('picker');
    var time_picker = input_time.pickadate('picker');
    //disable days
    date_picker.set('disable',[
        1
    ]);


</script>
@endsection

@extends('theme.backoffice.layouts.admin')

@section('title', 'Citas de '. $user->name )

@section('head')
@endsection

@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.user.index')}}">Usuarios</a></li>
<li><a href="{{ route('backoffice.user.show', $user)}}">{{ $user->name }}</a></li>
<li class="active"><a href="{{ route('backoffice.pacient.appointments', $user)}}">{{ 'Citas de '. $user->name }}</a></li>
@endsection

@section('dropdown_settings')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.pacient.schedule',$user) }}" class="grey-text text-darken-2">Agendar una cita</a></li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>{{'Citas de'. $user->name}}</strong></p>
<div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div id="man" class="col s12 m8">
                <div class="card material-table">
                    <div class="table-header">
                      <span class="table-title">Lista de Usuarios</span>
                      <div class="actions">
                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                      </div>
                    </div>
                    <table id="datatable">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Día</th>
                          <th>Hora</th>
                          <th>Estatus</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>56</td>
                            <td>25/ 06/ 2020</td>
                            <td>15:30</td>
                            <td>En Progreso</td>
                            <td><a href="#" class="btn btn-flat blue"><span class="material-icons">edit</span></a></td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col s12 m4">
                @include('theme.backoffice.pages.user.includes.user_nav')
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
@endsection

@extends('theme.backoffice.layouts.admin')

@section('title', 'Usuarios del Sistema')

@section('head')
@endsection

@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.user.index')}}">Usuarios del Sistema</a></li>
@endsection

@section('dropdown_settings')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{route('backoffice.user.create')}}" class="grey-text text-darken-2">Crear Usuario</a></li>
<li><a href="{{route('backoffice.user.import')}}" class="grey-text text-darken-2">Importar Usuarios</a></li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Usuarios del Sistema</strong></p>
<div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div id="man" class="col s12 m8 offset-m2">
                <div class="card material-table">
                    <div class="table-header">
                      <span class="table-title">Lista de Usuarios</span>
                      <div class="actions">
                        {{--<a href="#addUsers" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>--}}
                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                      </div>
                    </div>
                    <table id="datatable">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>email</th>
                          <th>Edad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($users as $user)
                            <tr>
                                <td><a href="{{route('backoffice.user.show', $user)}}">{{$user->name}}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->age() }}</td>
                                <td><a href="{{route('backoffice.user.edit', $user)}}" class="btn btn-small blue"><span class="material-icons">edit</span></a></td>
                            </tr>
                       @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
@endsection

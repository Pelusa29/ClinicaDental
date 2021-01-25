@extends('theme.backoffice.layouts.admin')

@section('title', 'Roles del Sistema')

@section('head')
@endsection

@section('breadcums')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.role.index') }}">Roles del Sitema</a></li>
@endsection

@section('dropdown_settings')
{{-- <li><a href="#"></a></li> --}}
<li><a href="{{ route('backoffice.role.create') }}" class="grey-text text-darken-2">Crear Role</a></li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Roles del Sistema</strong></p>
<div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div id="man" class="col s12 m8 offset-m2">
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
                       @foreach($roles as $role)
                            <tr>
                                <td><a href="{{ route('backoffice.role.show', $role) }}">{{ $role->name }}</a></td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ $role->description }}</td>
                                <td><a href="{{ route('backoffice.role.edit', $role) }}" class="btn btn-small blue"><span class="material-icons">edit</span></a></td>
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

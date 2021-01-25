@extends('theme.frontoffice.layouts.main')

@section('title','Historial')

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
                    <table id="historial" class="table-header" >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Eduardo F.</td>
                            <td>15 de julio 2019</td>
                            <td>18:15</td>
                            <td>Pagado</td>

                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Garret Winters</td>
                            <td>16 Agosto 2018</td>
                            <td>13:35</td>
                            <td>Pendiente</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/dataTable/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script>
        $("#historial").DataTable({
            dom: "<'row'<'col-sm-2'l><'col-sm-2 text-center'B><'col-sm-2'f>>tp",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [
                /*{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}*/
            ]
        });
        $("select").val('10'); //seleccionar valor por defecto del select
        $('select').addClass("browser-default col s2"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
        $('select').material_select(); //inicializar el select de materialize
    </script>
@endsection

@extends('theme.frontoffice.layouts.main')

@section('title','Prescripciones')

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
                    <table id="prescripciones" class="table-header">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Especialista</th>
                            <th>Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Dra. Guajardo Arteaga</td>
                            <td><a href="#modal" class="btn btn-danger modal-trigger" data-prescripcion="1"><i class="material-icons prefix">view_carousel</i></a></td>

                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Dr. Ernesto Roman</td>
                            <td><a href="#modal" class="btn btn-danger modal-trigger" data-prescripcion="2"><i class="material-icons prefix">view_carousel</i></a></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal">
        <div class="modal-content">
            <h4>Título</h4>
            <p>hola mundo</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-green btn-flat">Cerrar</a>
        </div>
    </div>
</div>
@endsection

@section('foot')
<script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/dataTable/jquery.dataTables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script>
    $("#prescripciones").DataTable({
        dom: "<'row'<'col-sm-2'l><'col-sm-2 text-center'B><'col-sm-2'f>>tp",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            /*{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}*/
        ]
    });
    $("select").val('10'); //seleccionar valor por defecto del select
    $('select').addClass("browser-default col s2"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
    $('select').material_select(); //inicializar el select de materialize
    //Modal
    $(".modal").modal();
</script>
@endsection

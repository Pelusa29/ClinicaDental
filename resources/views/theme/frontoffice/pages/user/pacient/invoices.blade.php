@extends('theme.frontoffice.layouts.main')

@section('title','Datos Fiscales')

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
                        <p><strong>Razón fiscal Solcial o Moral:</strong>ROVT5678Y</p>
                        <p><strong>Registro de contribuyentes:</strong></p>
                    </div>
                    <div class="row">
                        <span>Domicilio Fiscal de Contribuyentes</span>
                        <p><strong>Calle y Número:</strong>Villa Ricardo Margain 132</p>
                        <p><strong>colonia:</strong>Los geraneos</p>
                        <p><strong>Ciudad:</strong>Monterrey</p>
                        <p><strong>Estado:</strong>Nuevo Leon</p>
                        <p><strong>Código Postal:</strong>66052</p>
                        <p><strong>Email:</strong>juanito@hotmail.com</p>
                    </div>
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

</script>
@endsection

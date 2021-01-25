<div class="col s12 m4">
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="card-image">
                    <img src="http://lorempixel.com/400/200/" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
            </div>
            <div class="card-content">
                <div class="card-content-member">
                    <h4 class="m-t-0">Vanessa</h4>
                    <p class="m-0"><i class="pe-7s-map-marker"></i>Paciente</p>
                </div>
            </div>
        </div>
    </div>
    <div class="collection">
        <a href="{{ route('frontoffice.user.profile') }}" class="collection-item {!! active_class(route('frontoffice.user.profile')) !!}">Perfil</a>
        @if( auth()->user()->has_role(config('app.patient_role')) || auth()->user()->has_role(config('app.asistente_role')) || auth()->user()->has_role(config('app.admin_role'))  )
                <a href="{{ route('frontoffice.pacient.schedule') }}" class="collection-item {!! active_class(route('frontoffice.pacient.schedule')) !!}">Agendar Cita</a>
                <a href="{{ route('frontoffice.pacient.appointments') }}" class="collection-item {!! active_class(route('frontoffice.pacient.appointments')) !!}">Historial Clinico</a>
                <a href="{{ route('frontoffice.pacient.prescripciones') }}" class="collection-item {!! active_class(route('frontoffice.pacient.prescripciones')) !!}">Prescripciones</a>
                <a href="{{ route('frontoffice.pacient.invoices') }}" class="collection-item {!! active_class(route('frontoffice.pacient.invoices')) !!}">Datos Fiscales</a>
        @endif
        <a href="{{ route('frontoffice.user.edit', [Auth::user(), 'view=frontoffice'] ) }}" class="collection-item {!! active_class( route('frontoffice.user.edit', Auth::user())) !!}">Editar Perfil</a>
        <a href="{{ route('frontoffice.user.edit_password') }}" class="collection-item {!! active_class( route('frontoffice.user.edit_password')) !!}">Modificar Contraseña</a>
    </div>
</div>

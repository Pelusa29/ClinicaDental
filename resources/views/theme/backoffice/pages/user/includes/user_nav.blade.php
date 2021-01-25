<div class="collection">
   {{--<a href="#!" class="collection-item active">Alvin</a>--}}
   <a href="{{ route('backoffice.user.show', $user) }}" class="collection-item active">{{ $user->name }}</a>
   @if( auth()->user()->has_any_roles([
    config('app.asistente_role'),
    config('app.admin_role'),
    config('app.medico_role')
   ]))
        @if($user->has_role(config('app.patient_role')))
            <a href="{{ route('backoffice.pacient.schedule',$user) }}" class="collection-item">Agendar Cita</a>
            <a href="{{ route('backoffice.pacient.appointments',$user) }}" class="collection-item">Citas</a>
            <a href="{{ route('backoffice.pacient.facturas',$user) }}" class="collection-item">Facturas</a>
        @endif
   @endif
   @if( auth()->user()->has_role(config('app.admin_role'))  )
        <a href="{{ route('backoffice.user.assing_role',$user) }}" class="collection-item">Asignar roles</a>
        <a href="{{ route('backoffice.user.assign_permission',$user)}}" class="collection-item">Asignar Permisos</a>
   @endif
</div>

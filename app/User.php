<?php

namespace App;

use App\Role;
use App\Permission;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dob' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     //para campos de fechas
     protected $dates = [
         'dob'
     ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




     //Relaciones
    public function permissions(){
       //Un usuario puede tener muchos permisos
       return $this->belongsToMany('App\Permission');
    }

    public function roles(){
       //Un usuario puede tener muchos roles
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function specialities(){
        
    }

    //Almacenamiento

    public function store($request) {

        $user =  self::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $roles = [$request->role];
        $user->role_assignment(null,$roles);
        alert('Éxito','Usuario Creado con éxito','success');
        return $user;
    }

    public function my_update($request){
        self::update($request->all());
        alert('Éxito','Usuario actualizado','success');
    }

    //Funcion principal
    public function role_assignment($request, array $roles = null){

        $roles = (is_null($roles)) ? $request->roles : $roles;

        //1.-Verificamos que roles tenemos y que roles no
        $this->permission_mass_assignment($roles);
        //2.- Asignamos masivamente
        $this->roles()->sync($roles);
        //3.- Verificamos que permisos debemos conservar y cuales debemos eliminar
        $this->verify_permission_integrity($roles);

        alert('Éxito', 'Roles asignados', 'success');
    }

    //validaciones
    public function is_admin(){
        $admin =  config('app.admin_role');

        if ($this->has_role($admin)) {
            return true;
        }else{
            return false;
        }
    }

    public function has_role($id) {

        foreach ($this->roles  as $role) {
            //dd($role->id .'-'.$id);
            //echo $id.'<br>';
            if($role->id == $id  ||  $role->slug == $id ) {
                return true;
            }

        }
        return false;
        //exit();
    }

    //funcion para verificar si un usuarios tiene algun rol
    public function has_any_roles(array $roles){
        //dd($roles);
        foreach ($roles as $role) {
            //echo $role.'<br>';
            if($this->has_role($role)){
                return true;
            }
            //return false;
        }
        return false;
    }


    public function has_permission($id) {
        foreach ($this->permissions as $permission) {
            if($permission->id == $id || $permission->slug == $id){
                return true;
            }
        }
        return false;
    }
    //Recuperacion de informacion

    public function age(){
        if(!is_null($this->dob)){
            $age =  $this->dob->age;
            $years = ($age == 1) ?  'año' : 'años';
            $msj = $age . ' ' . $years;
        }else{
            $msj = 'Indefinido';
        }

        return $msj;
    }

    public function visible_users(){
        if($this->has_role(config('app.admin_role'))) $users = self::all();
        if($this->has_role(config('app.asistente_role'))) {
            $users = self::whereHas('roles',function($q){
                $q->whereIn('slug',[
                    config('app.medico_role'),
                    config('app.patient_role'),
                ]);
            })->get();
        }

        if($this->has_role(config('app.medico_role'))) {
            $users = self::whereHas('roles',function($q){
                $q->whereIn('slug',[
                    config('app.patient_role'),
                ]);
            })->get();
        }

        return $users;
    }


    public function visible_roles(){
        if($this->has_role(config('app.admin_role'))) $roles = Role::all();

        if($this->has_any_roles([config('app.asistente_role'),config('app.medico_role')])){
            $roles = Role::where('slug',config('app.patient_role'))
                            //->orWhere('slug',config('app.medico_role'))
                            ->get();
        }

        return $roles;
    }

    //otras operaciones

    public function verify_permission_integrity(array $roles){
        $permissions =  $this->permissions;
        foreach ($permissions as $permission) {
            if(!in_array($permission->role->id, $roles)){
                $this->permissions()->detach($permission->id);
            }
        }
    }


    //Aqui nos va a permitir hacer una asignacion masiva de permisos al rol
    public function permission_mass_assignment(array $roles){
        foreach ($roles as $role) {
            if(!$this->has_role($role)){
                $role_object = Role::findOrFail($role);
                $permission = $role_object->permissions;
                $this->permissions()->syncWithoutDetaching($permission);
            }
        }
    }

    //VISTAS
    public function edit_view($view = null){
        $auth = auth()->user();

        if(!is_null($view) &&  $view == 'frontoffice'){
            return 'theme.frontoffice.pages.user.edit';
        }else if($auth->has_any_roles([config('app.admin_role'), config('app.asistente_role')])){
            return 'theme.backoffice.pages.user.edit';
        }else{
            return 'theme.frontoffice.pages.user.edit';
        }
    }


    //funcion para redirigir cuando editamos en el fronoffice
    public function user_show($view = null){
        $auth =  auth()->user();

        if(!is_null($view) &&  $view == 'frontoffice'){
            return 'frontoffice.user.profile';
        }else if($auth->has_any_roles([config('app.admin_role'), config('app.asistente_role')])){
            return 'backoffice.user.show';
        }else{
            return 'frontoffice.user.profile';
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Fecades\Excel;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $this->authorize('index', User::class);
        return \view('theme.backoffice.pages.user.index',[
            'users' => auth()->user()->visible_users()//User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', User::class);
        $roles = Role::all();
        return view('theme.backoffice.pages.user.create',[
            'roles' => auth()->user()->visible_roles()//$roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, User $user)
    {
        //
        $user =  $user->store($request);
        return redirect()->route('backoffice.user.show',$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //

        $this->authorize('view', $user);
        return \view('theme.backoffice.pages.user.show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        $this->authorize('update', $user);
        $view = (isset($_GET['view'])) ? $_GET['view'] : null;

        return view($user->edit_view($view),[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        //dd($request);
        //
        $user->my_update($request);
        $view = (isset($_GET['view'])) ? $_GET['view'] : null;
        //return redirect()->route('backoffice.user.show', $user);
        return redirect()->route($user->user_show(),$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete', $user);
        $user->delete();
        alert('Éxito','Usuario eliminado correctamente','success');
        return redirect()->route('backoffice.user.index');
    }

    /*nuevas funcionalidades*/
    public function assing_role(User $user) {
        $this->authorize('assign_role', $user);
        return \view('theme.backoffice.pages.user.assing_role', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /* Asignar roles en la tabla pivote de la base de datos*/
    public function role_assignment(Request $request, User $user){

        $this->authorize('assign_role', $user);
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show',$user);
    }

    public function assign_permission(User $user){

        $this->authorize('assign_permission', $user);
        return \view('theme.backoffice.pages.user.assign_permission',[
            'user'=>$user,
            'roles' => $user->roles
        ]);
    }

    /*Asignar permisos en tabla pivote de la base de datos*/
    public function permission_assignment(Request $request, User $user ){

        $this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        alert('Éxito','Permisos asignados','success');
        return redirect()->route('backoffice.user.show',$user);
    }

    public function import(User $user){
        $this->authorize('import', $user);
        return view('theme.backoffice.pages.user.import');
    }

    //funcion para importar usuarios desde excel
    public function make_import(Request $request){
        $this->authorize('import', $user);
        \Excel::import(new UsersImport,$request->file('excel'));
        alert('Éxito','Usuarios Importados','success');
        return redirect()->route('backoffice.user.index');
    }

    public function profile(){
        $user = auth()->user();
        //dd($user->dob);
        return view('theme.frontoffice.pages.user.profile',[
            'user' => $user
        ]);
    }

    public function edit_password(){
        $this->authorize('update_password',auth()->user());
        return view('theme.frontoffice.pages.user.edit_password');
    }

    public function change_password(ChangePasswordRequest $request){
        //$this->authorize('update_password',auth()->user());

        //dd('validacion correcta');

        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        alert('Éxito','Contraseña actualizada correctamente','success');
        return redirect()->back();
    }


}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//prueba
/*
Route::get('test', function(){
    return 'Permiso concebido';
})->middleware('role');*/

/*Route::get('/', function(){
    return view('welcome');
});*/
Route::view('/','welcome');

Route::get('home', function() {
    return view('home');
})->middleware('auth');

Auth::routes(['verify' => true]);
//Creamos las rutas


//Grupo de rutas para backoffice
//Estructura: Definimos el grupo con : 'middleware' => [solo autenticados], 'as' solo para => 'backoffice.' => todo lo que venga de backoffice,
//luego el clousure(nuestra funcion)
Route::group(['middleware' => ['auth'],'as' => 'backoffice.'], function () {
    //Rutas nuevas
    Route::get('admin','AdminController@show')->name('admin.show');
    //Rutas especificas para importacion de usuarios
    Route::get('user/import','UserController@import')->name('user.import');

    //Resource para usuarios del sistema
    Route::resource('user','UserController');
    //Rutas especificas user para asignar roles al usuario
    Route::get('user/{user}/assing_role','UserController@assing_role')->name('user.assing_role');
    Route::post('user/{user}/role_assignment','UserController@role_assignment')->name('user.role_assignment');

    //Rutas especificas para asignar permisos a los usuarios
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment','UserController@permission_assignment')->name('user.permission_assignment');
    Route::post('user/make_import','UserController@make_import')->name('user.make_import');

    ######################################PACIENT
    //Ruta para agendar citas en el back
    Route::get('pacient/{user}/schedule','PacientController@back_schedule')->name('pacient.schedule');
    Route::get('pacient/{user}/appointments','PacientController@back_appointments')->name('pacient.appointments');
    Route::get('pacient/{user}/facturas','PacientController@back_invoices')->name('pacient.facturas');



    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});

//Rutas para frontOffice
Route::group(['as' => 'frontoffice.'], function () {

    Route::get('profile','UserController@profile')->name('user.profile');
    //Ruta para edicion profile paciente
    Route::get('profile/{user}/edit','UserController@edit')->name('user.edit');
    Route::put('profile/{user}/update','UserController@update')->name('user.update');

    //Rutas para edicion de password
    Route::get('profile/edit_password','UserController@edit_password')->name('user.edit_password');
    Route::put('profile/change_password','UserController@change_password')->name('user.change_password');

    //Ruta para citas
    Route::get('pacient/schedule','PacientController@schedule')->name('pacient.schedule');
    Route::get('pacient/appointments','PacientController@appointments')->name('pacient.appointments');
    Route::get('pacient/prescripciones','PacientController@prescripciones')->name('pacient.prescripciones');
    Route::get('pacient/invoices','PacientController@invoices')->name('pacient.invoices');
});

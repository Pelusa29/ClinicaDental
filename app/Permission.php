<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    protected $fillable = [
        'name','slug','role_id','description'
    ];


     //Relaciones
    public function role(){
        //Un permiso puede pertenecer solo a un solo Rol
        return $this->belongsTo('App\Role');
    }

    public function users(){
        //Un Permiso puede pertenecer a muchos usuarios
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    //Almacenamiento
    public function store($request) {

            $slug = str_slug($request->name, '-');
            alert('Éxito','El permiso se ha guardado','success')->showConfirmButton('confirm','#3085d6');
            return self::create($request->all()+ ['slug'=> $slug]);
    }



    public function my_update($request) {
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug' => $slug
        ]);
        alert("Éxito","El permiso se ha actualizado", "success")->showConfirmButton();
    }
    //validaciones


    //Recuperacion de informacion


    //otras operaciones

}

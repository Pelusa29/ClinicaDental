<?php

namespace App;
Use Alert;
use App\Permission;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected  $fillable = [
        'name','description','slug'
    ];


    //Relaciones
    public function permissions(){
        return $this->hasMany('App\Permission');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    //Almacenamiento
    public function store($request){
        //obtenemos parametros
        $slug = str_slug($request->name, '-');
        alert('Éxito','El rol se ha guardado','success')->showConfirmButton('confirm','#3085d6');
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request){
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug' => $slug
        ]);
        alert("Éxito","El rol se ha actualizado", "success")->showConfirmButton();
    }
    //validaciones


    //Recuperacion de informacion


    //otras operaciones




}

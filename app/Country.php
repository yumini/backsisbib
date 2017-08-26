<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];
    public static $rules = [
        'name' => 'required|unique:countries|min:4|max:255'
    ];
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre del Pais.',
        'name.unique' => 'Nombre ya existe en la base de datos.',
        'name.min' => 'Minimo 4 caracteres'
    ];
    
    public function editorials()
    {
        return $this->hasMany('App\Editorial');
    }
}

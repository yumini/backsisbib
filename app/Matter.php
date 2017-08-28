<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable = ['name'];
    public static $rules = [
        'name' => 'required|unique:countries|min:4|max:255'
    ];
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre del Autor.',
        'name.unique' => 'Nombre ya existe en la base de datos.',
        'name.min' => 'Minimo 4 caracteres'
    ];
}

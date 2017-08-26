<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = ['name', 'country_id','name_city'];
    
    public static $rules = [
        'name' => 'required|min:4|max:255',
        'country_id'=>'required'
    ];

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre de la Editorial.',
        'name.min' => 'Minimo 4 caracteres',
        'country_id.required'=>'Es necesario selecionar un País'
    ];
    /*
    public static $rules2 = [
        'editorial_name' => 'required|min:4|max:255',
        'country_id2'=>'required'
    ];

    public static $messages2 = [
        'editorial_name.required' => 'Es necesario ingresar un nombre de la Editorial.',
        'editorial_name.min' => 'Minimo 4 caracteres',
        'country_id2.required'=>'Es necesario selecionar un País'
    ];
    */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}

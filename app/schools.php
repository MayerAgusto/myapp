<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schools extends Model
{
    //
     protected $fillable = [
        'name', 'departament', 'province',
    ];

    public function scopeName($query, $name){
    	if($name)
    		return $query->orWhere('name', 'LIKE', "%$name%");
    }

    public function scopeDepartament($query, $departament){
    	if($departament)
    		return $query->orWhere('departament', 'LIKE', "%$departament%");
    }

    public function scopeProvince($query, $province){
    	if($province)
    		return $query->orWhere('province', 'LIKE', "%$province%");
    }

    public function scopeCity($query, $city){
    	if($city)
    		return $query->orWhere('city', 'LIKE', "%$city%");
    }

}



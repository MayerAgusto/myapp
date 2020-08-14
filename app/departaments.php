<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departaments extends Model
{
    //
    
    public static function towns($id){
    	return departaments::select('province')->distinct()
    	        ->where('departaments','LIKE', $id)->get();
    	
    }
    
    public static function city($id){
    	return departaments::select('city')->distinct()
    	        ->where('province','LIKE', $id)->get();
    }
}

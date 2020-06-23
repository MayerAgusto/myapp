<?php

namespace App\Services;

use App\departaments;


class Departaments {
    public function get(){
        $provincias = departaments::get();
        $arrayprovincia[''] = "provincias";
        foreach ($prvincias as $provincia) {
             $arrayprovincia[$provincia->province]  =$provincia->province; 
         } 
         return $arrayprovincia;
    }
}
    
   

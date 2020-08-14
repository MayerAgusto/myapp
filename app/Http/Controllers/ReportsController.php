<?php

namespace App\Http\Controllers;

use App\schools;
use App\departaments;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['mayores']=schools::select('departament',schools::raw('count(departament)'))
                     ->groupBy('departament')
                     ->orderBy(schools::raw('count(departament)'),'desc')
                     ->take(6)->get();
                     
        $datos['mapeos']=schools::select('departament',schools::raw('count(departament)'))
                     ->groupBy('departament')
                     ->orderBy(schools::raw('count(departament)'))
                     ->take(5)->get();


        $data['entrenos']=users::select('departament',users::raw('count(departament)'))
                     ->groupBy('departament')
                     ->orderBy(users::raw('count(departament)'),'desc')
                     ->take(6)->get(); 

        $datos['menores']=users::select('departament',users::raw('count(departament)'))
                     ->groupBy('departament')
                     ->orderBy(users::raw('count(departament)'))
                     ->take(5)->get(); 

        //return response()->json([$data,$datos,$train]);
         return view('reports.reports',$data,$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function show(schools $schools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

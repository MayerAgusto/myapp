<?php

namespace App\Http\Controllers;

use App\schools;
use App\departaments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['schools']=schools::paginate(5);
        return view('schools.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $depa = request('departament');
        $pro = request('province');
        $ci = request('city');

       $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Amazonas%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Bagua%")->get();
       
      // return response()->json($provincias);
       return view('schools.create',compact(['departamentos','provincias','distritos']));

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
        $escuela=request()->only(['name','ruc','departament','province','city','address','image','status']);
        if($request->hasFile('image')){
            $escuela['image']=$request->file('image')->store('uploads','public');
        }
        schools::insert($escuela);
        //return response()->json($escuela);
        return redirect('schools');
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
        $data=schools::findOrFail($id);
         $depa = request('departament');
        $pro = request('province');
        $ci = request('city');
         $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Amazonas%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Bagua%")->get();
        return view('schools.edit',compact(['data','departamentos','provincias','distritos']));
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
        $escuela=request()->only(['name','ruc','departament','province','city','address','image','status']);

        if($request->hasFile('image')){
            $data=schools::findOrFail($id);
            Storage::delete('public/'.$data->image);
            $escuela['image']=$request->file('image')->store('uploads','public');
        }

        schools::where('id','=',$id)->update($escuela);

        $data=schools::findOrFail($id);

        $depa = request('departament');
        $pro = request('province');
        $ci = request('city');
         $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Amazonas%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Bagua%")->get();
        return view('schools.edit',compact(['data','departamentos','provincias','distritos']));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data=schools::findOrFail($id);
        if(Storage::delete('public/'.$data->image)){
            schools::destroy($id);
        }
        return redirect('schools');
    }
}

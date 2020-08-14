<?php

namespace App\Http\Controllers;

use App\schools;
use App\departaments;
use App\vehiculos;
use App\users;
use Illuminate\Support\Facades\Auth;
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

        $data['schools']=schools::paginate(5);
        return view('schools.index',$data);

    }
     public function busqueda(Request $request)
    {
       $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Arequipa%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Arequipa%")->get();

       $name = $request->get('name');
       $departamento = $request->get('departament');
       $provincia = $request->get('province');
       $ciudad = $request->get('city');

       $escuelas = schools::orderBy('id', 'DESC')
                   ->name($name)
                   ->departament($departamento)
                   ->province($provincia)
                   ->city($ciudad)
                   ->paginate(9);
        return view('schools.buscador',compact(['departamentos','provincias','distritos','escuelas']));

    }

    public function vista($id)
    {
        $data=schools::findOrFail($id);
        return view('schools.vista',compact('data'));
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


//->where('departaments','LIKE',"%Amazonas%")

       $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Arequipa%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Arequipa%")->get();

      
       
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
        $escuela=request()->only(['name','ruc','departament','province','city','address','image']);
        $user = Auth::user();

        if($user->rules_id == 1){
            $escuela['status']=0;
        }else{
            $escuela['status']=1;
        }

        if($request->hasFile('image')){
            $escuela['image']=$request->file('image')->store('uploads','public');
        }
        
        $vehiculo=vehiculos::select('departament','province','city','ruc','name')
        ->where('ruc','=',$escuela['ruc'])
        ->where('departament','like','%'.$escuela['departament'].'%')
        ->where('province','like','%'.$escuela['province'].'%')
        ->where('city','like','%'.$escuela['city'].'%')
        ->where('name','like','%'.$escuela['name'].'%')
        ->get();

        $contar=0;

        foreach ($vehiculo as $vei) {
            $contar=$contar+1;
        }

       if($contar==0){
        
         return redirect('schools/create')->with('alertas', 'Datos Invalidos no concuerdan con los datos del Ministerio de Transportes');
       }else{
        schools::insert($escuela);
        if($user->rules_id == 1){
            return redirect('schools')->with('alertas', 'Los datos fueron correctamente ingresados, seran evaluados para añadirlo al sistema');
        }else{

            $usuarios = users::select('departament','province','city','email')
                  ->where('departament','like','%'.$escuela['departament'].'%')
                  ->where('province','like','%'.$escuela['province'].'%')
                  ->where('city','like','%'.$escuela['city'].'%')->get();
    
            foreach ($usuarios as $usuario){
                \Mail::to($usuario['email'])->send(new \App\Mail\TestMail($escuela));
            }

            return redirect('schools')->with('alertas', 'Los datos fueron correctamente almacenados');
        }
       }
        //
       
       //  return response()->json($vehiculo);
        //return redirect('schools');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schools  $schools
     * @return \Illuminate\Http\Response
     */
     public function getTowns(Request $request,$id)
    {
        //
         $provincias=departaments::towns($id);
        if($request->ajax()){
            $provincias=departaments::towns($id);
            return response()->json($provincias);
            
        }
         
    }
     public function getCity(Request $request,$id)
    {
        //
         $city=departaments::city($id);
        if($request->ajax()){
            $city=departaments::city($id);
            return response()->json($city);
        }
       
       return response()->json($city);  
    }

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
       $provincias = departaments::select('province')->distinct()->get();
       $distritos = departaments::select('city')->distinct()->get();
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
        return redirect('schools');
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

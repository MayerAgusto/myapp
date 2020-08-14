<?php

namespace App\Http\Controllers;

use App\users;
use App\rules;
use App\departaments;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['users']=users::paginate(5);
        return view('users.index',$data);
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
        $rules= rules::all();
        return view('register.create',compact(['rules','departamentos','provincias','distritos']));

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
         $users=request()->only(['departament','name','email','password','province','city','image']);
         $users['rules_id']=1;
         $users['password']=Hash::make($users['password']);
        // $users['password']=Crypt::encryptString($users['password']);
         if($request->hasFile('image')){
            $users['image']=$request->file('image')->store('uploads','public');
        }
       users::insert($users);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=users::findOrFail($id);
         $rules= rules::all();
         $depa = request('departament');
        $pro = request('province');
        $ci = request('city');
         $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Amazonas%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Bagua%")->get();
        return view('users.edit',compact(['rules','data','departamentos','provincias','distritos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $users=request()->only(['rules_id','departament','name','email','password','province','city','image']);


         if($request->hasFile('image')){
             $data=users::findOrFail($id);
             Storage::delete('public/'.$data->image);

            $users['image']=$request->file('image')->store('uploads','public');
        }

         users::where('id','=',$id)->update($users);

        $data=users::findOrFail($id);
        $rules= rules::all();

        $depa = request('departament');
        $pro = request('province');
        $ci = request('city');
         $departamentos = departaments::select('departaments')->distinct()->get();
       $provincias = departaments::select('province')->distinct()->where('departaments','LIKE',"%Amazonas%")->get();
       $distritos = departaments::select('city')->distinct()->where('province','LIKE',"%Bagua%")->get();
        return view('users.edit',compact(['rules','data','departamentos','provincias','distritos']));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=users::findOrFail($id);
          if(Storage::delete('public/'.$data->image)){
                users::destroy($id);
          }   
        return redirect('users');
    }
}

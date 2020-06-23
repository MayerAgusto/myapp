<?php

namespace App\Http\Controllers;

use App\rules;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['rules']=rules::paginate(5);
         return view('rules.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('rules.create');
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
       //$rol=request()->all();
        $rol=request()->only('rule');
        rules::insert($rol);
        return redirect('rules');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function show(rules $rules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=rules::findOrFail($id);
        return view('rules.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rol=request()->only('rule');
        rules::where('id','=',$id)->update($rol);

        $data=rules::findOrFail($id);
        return view('rules.edit',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        rules::destroy($id);
        return redirect('rules');
    }
}

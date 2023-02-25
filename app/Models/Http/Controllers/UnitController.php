<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Pharmcie;
use Session;
use DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=DB::table('states')->join('cityes','states.id_city','=','cityes.id')->select('states.*','cityes.name_city')->get();
        $users=User::all();
      
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        return view('unit.create',compact('pharmc','hospitals','users','states','citys','specials','hospitals'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
            'adress'=>'required'
        ]);
    $states=new State;
    $states->adress=$request->adress;
    $states->id_city=$request->id_city;
    $states->save();
    session::flash('success','تم الادخال بنجاح');
    
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $states=State::find($id)->delete();
        session::flash('delete',' تم الحزف بنجاح');
        return back();
    }
}

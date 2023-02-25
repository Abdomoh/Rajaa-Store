<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Pharmcie;
use App\Time;
use Session;
use DB;

class TimeController extends Controller
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
        $times=DB::table('times')->latest()->get();
        $users=User::all();
      
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        return view('time.create',compact('pharmc','hospitals','users','times','citys','specials','hospitals'));
      
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
            'from_time'=>'required|min:5|unique:times',
            'to_time'=>'required|min:5|unique:times',
            'today'=>'required|min:5|unique:times',
            
        ]);
       $time=new Time;
       $time->from_time=$request->from_time;
       $time->to_time=$request->to_time;
       $time->today=$request->today;
       $time->save();
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
        //
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
        $time=Time::find($id)->delete();
        session::flash('delete',' تم الحزف بنجاح');
        return back();
    }
}

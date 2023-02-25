<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Citye;
use App\State;
use App\Hospitale;
use App\Post;
use App\Pharmcie;
use App\Specializtion;
use Session;
use DB;

class CityController extends Controller
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
        $users=User::all();
        $states=DB::table('cityes')->get();
        $citys=Citye::all();
       
        $hospitals=Hospitale::all();
        $specials=Specializtion::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
      return view('city.create',compact('citys','users','hospitals','posts','pharmcmenue','pharmc','specials'));
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
            'name_city'=>'required|min:5|unique:cityes',
            
        ]);

            $city = new Citye;
            $city->name_city=$request->name_city;
          
            $city->save();
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
        $city=Citye::find($id);
        $users=User::all();
        $states=State::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar

       
        return view('city.edit',compact('city','users','states','id','hospitals','posts','pharmcmenue','pharmc')); 
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
      
        $city=Citye::find($id);
        $city->update($request->all());
       
       
        return redirect('../city/create')->with('success','تم التعديل بنجاج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=Citye::find($id);
        $city->delete();
        return back()->with('delete','تم الحزف بنجاح ');
    }
}

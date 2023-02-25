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
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $states=DB::table('states')->join('cityes','states.id_city','=','cityes.id')->select('states.*','cityes.name_city')
        ->get();
        $citys=Citye::all();
       
        $hospitals=Hospitale::all();
        $specials=Specializtion::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
      return view('state.create',compact('states','users','citys','hospitals','posts','pharmcmenue','pharmc','specials'));
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
            'adress'=>'required|min:5|unique:states',
            
        ]);

            $states = new State;
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
      
      ///  
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

       
        return view('../state.edit',compact('city','users','states','id','hospitals','posts','pharmcmenue','pharmc')); 
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
       
        $citys=Citye::find($id);
        $citys->name_city=$request->name_city;
        $citys->save();
       
        return view('state.create',compact('citys'))->with('success','تم التعديل بنجاج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $city=Citye::find($id);
        $city->delete();
        return back()->with('delete','تم الحزف بنجاح ');
    }


    
}

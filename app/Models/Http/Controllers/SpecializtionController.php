<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Pharmcie;
use App\Post;
use Session;
use DB;

class SpecializtionController extends Controller
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
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
         $pharmcmenue=Pharmcie::all();//// menue sidepar
         $pharmc=Pharmcie::all();//// menue sidepar
        
        return view('specializtions.create',compact( 'hospitals','users','states','citys','specials','pharmcmenue','pharmc','posts'));
      
    
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
            'name_special'=>'required|min:5|unique:specializtions',
            
        ]);
        $specials=new Specializtion;

        $specials->name_special=$request->name_special;
        $specials->save();
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
        $special=Specializtion::find($id);
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        //$specials=Specializtion::all();
        $hospitals=Hospitale::all();
         $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        
        return view('specializtions.edit',compact('special','hospitals','users','states','citys','hospitals','post','pharmcmenue','pharmc','posts'));
      
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
        $special=Specializtion::find($id);
        $special->update($request->all());
        session::flash('success','تم التعديل بنجاح');
        return redirect('../specializtions/create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp=Specializtion::find($id);
        $sp->delete();
        session::flash('delete',' تم الحزف بنجاح');
        return back();
    }

    public function reportspecial()
    {
        $spicals=Specializtion::orderby('created_at','desc')->paginate(3);
        return view('report.reportspecial',compact('spicals'));
    }
}

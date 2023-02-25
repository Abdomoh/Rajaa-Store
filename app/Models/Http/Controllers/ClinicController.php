<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Clinice;
use App\Post;
use App\Pharmcie;
use App\dectore;
use Session;
use DB;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clinc=DB::table('clinices')->join('specializtions','clinices.id_special','=','specializtions.id')
        ->join('cityes','clinices.id_city','=','cityes.id')->
        select('clinices.*','specializtions.name_special','cityes.name_city')->get();

         $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
 
      return view('clinc.index',compact('clinc','hospitales','users','states','citys','specials','hospitals','posts','pharmc','pharmcmenue'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $clinc=DB::table('clinices')->join('specializtions','clinices.id_special','=','specializtions.id')
        ->join('cityes','clinices.id_city','=','cityes.id')->
        select('clinices.*','specializtions.name_special','cityes.name_city')->get();
        $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
      return view('clinc.create',compact('clinc','hospitales','users','states','citys','specials','hospitals','posts','pharmc','pharmcmenue'));
       
    }

    ////despliy 


    public function despliy()
    {

        $clinc=DB::table('clinices')->join('specializtions','clinices.id_special','=','specializtions.id')
        ->join('cityes','clinices.id_city','=','cityes.id')->
        select('clinices.*','specializtions.name_special','cityes.name_city')->get();
        $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
 
      return view('clinc.despliy',compact('clinc','hospitales','users','states','citys','specials','hospitals','posts','pharmc','pharmcmenue'));
       

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                /*$this->validate(request(),[
                    'name_clinc'=>'requierd|min:5'
                ]);*/
        $this->validate(request(),[
         'name_clinc'=>'required|unique:clinices',
         'id_special'=>'required',
         'id_city'=>'required',
         'from_time'=>'required',
         'to_time'=>'required',
         'email'=>'required|email',
         'phone'=>'required',
         'url'=>'required|mimes:jpg,jpeg,png,JPG,PNG,GIF',
         'detiles'=>'required|min:30',
        ]);


                $clinc=DB::table('clinices')->join('specializtions','clinices.id_special','=','specializtions.id')
                ->join('cityes','clinices.id_city','=','cityes.id')->
                select('clinices.*','specializtions.name_special','cityes.name_city')->get();
                $hospitales=Hospitale::all();
                $users=User::all();
                $states=State::all();
                $citys=Citye::all();
                $specials=Specializtion::all();
                $hospitals=Hospitale::all();
                  $posts=Post::all();
                  $pharmcmenue=Pharmcie::all();//// menue sidepar
                  $pharmc=Pharmcie::all();//// menue sidepar
             
                $img_name= time() . '.' .$request->url->getClientOriginalExtension();
                $clin=new Clinice();
                $clin->name_clinc=$request->name_clinc;
                $clin->id_special=$request->id_special;
                $clin->id_city=$request->id_city;
                $clin->from_time=$request->from_time;
                $clin->to_time=$request->to_time;
                $clin->email=$request->email;
                $clin->phone=$request->phone;
                $clin->url=$img_name;

                $clin->detiles=$request->detiles;
                $request->url->move(public_path('upload'),$img_name);
                $clin->save();
                session::flash('success','تم الادخال بنجاح');
                return view('clinc.despliy',compact('clinc','hospitales','users','states','citys','specials','hospitals','posts','pharmcmenue','pharmc'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $clin=Clinice::find($id);
        $hospitals=Hospitale::all();
        $users=User::all();
        $citys=Citye::all();
        $states=State::all();
        $posts=Post::all();
        $pharmc=Pharmcie::all();
         $clinc=Clinice::all();
        return view('clinc.show',compact('clin','hospital','hospitals','id','users','citys','states','posts','pharmc','clinc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinc=Clinice::find($id);
        $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
         $posts=Post::all();
         $pharmcmenue=Pharmcie::all();//// menue sidepar
         $pharmc=Pharmcie::all();//// menue sidepar
      return view('clinc.edit',compact('clinc','hospitales','users','states','citys','specials','hospitals','posts','pharmcmenue','pharmc'));
      
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
        $clinc=Clinice::find($id);
        
       
        $clinc->update($request->all());
  
        session::flash('success','تم التعديل بنجاج');
        return redirect('../despliy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinc=Clinice::find($id)->delete();
        return back()->with('delete','تم الحزف بنجاح ');

    }


    public function reportclinc()
    {
        $clincs=Clinice::orderby('created_at','desc')->get();
        $clincskh=Clinice::orderby('created_at','desc')->where('id_city',3)->get();
        $clincsph=Clinice::orderby('created_at','desc')->where('id_city',2)->get();
        
        return view('report.reportclinc',compact('clincs','clincskh','clincsph'));
    }
}

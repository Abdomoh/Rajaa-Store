<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resption;
use App\Dectore;
use App\Clinice;
use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Post;
use App\Time;
use App\Pharmaticale;
use App\Pharmcie;
use App\Today;
use App\Stat_clince;
use Session;
use DB;
use Auth;
use App\Dector;

class ResptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
              $id=Dectore::find(Auth::user()->id);

              $resptions=Resption::orderby('created_at','desc')->where('id_stat_value',1)->get();
        
        return view('resption.index',compact('resptions','done','notdone'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   



         $resptions=DB::table('resptions')->
        join('times','resptions.id_time','=','times.id')->
        join('todays','resptions.id_today','=','todays.id')->
        join('dectores','resptions.id_dector','=','dectores.id')->
        join('clinices','resptions.id_clinc','=','clinices.id')->
        select('resptions.*','times.to_time','todays.today','dectores.name','clinices.name_clinc')->
        
        orderby('created_at','desc')->paginate(1);

         $users=User::all();
         $dectors=Dectore::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $times=Time::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        $todys=Today::all();
        $state_clinc=Stat_clince::all();
      return view('resption.create',compact('resptions','users','clincs','dectors','citys','states','specials','hospitals','times','post','pharmcmenue','pharmc','posts','todys','state_clinc'));
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
         'name'=>'required|unique:resptions|min:5',
         'id_time'=>'required',
         'id_today'=>'required',
         'id_dector'=>'required',
         'id_clinc'=>'required',        
      
        ]);

        $resption=new Resption;
        $resption->name=$request->name;
        $resption->date_clinc=$request->date_clinc;
        $resption->id_time=$request->id_time;
        $resption->id_today=$request->id_today;
        $resption->id_dector=$request->id_dector;
        $resption->id_clinc=$request->id_clinc;
        $resption->body=$request->body;
        $resption->id_stat_value=rand(1,2);
        $resption->save();  
        session::flash('success','done resption ');

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
        Resption::find($id)->delete();
      
        return back()->with('delete','تم الغاء الحجز ');
    }




        public function resption_not()
    { 


         
        $resptions=DB::table('resptions')->
        join('times','resptions.id_time','=','times.id')-> 
        join('todays','resptions.id_today','=','todays.id')->
        join('dectores','resptions.id_dector','=','dectores.id')->
        join('clinices','resptions.id_clinc','=','clinices.id')->
        join('stat_clinces','resptions.id_stat_value','=','stat_clinces.id')->
        where('id_stat_value',2)->
        select('resptions.*','times.to_time','todays.today','dectores.name','clinices.name_clinc','stat_clinces.stat_name')->orderby('created_at','desc')->paginate(4);
      

            return view('resption.resption-not',compact('resptions'));

    }





        public function resption_all()
    { 

             //$date=date('y-m-d');
            //dd($date);
         
       
             $resptions=Resption::orderby('created_at','desc')->get();
        
 

            return view('resption.resption-today',compact('resptions'));

    }




        public function resption_today()
    { 

            $date=date('y-m-d');
            //dd($date);
         
       
             $resptions=Resption::orderby('created_at','desc')->where('date_clinc',$date)->get();
        
 

            return view('resption.resption-today',compact('resptions'));

    }



    public function reportresption()

    {

           $resptions=Resption::orderby('created_at','desc')->get();
         $done=Resption::orderby('created_at','desc')->where('id_stat_value',1)->get();
        $notdone=Resption::orderby('created_at','desc')->where('id_stat_value',2)->get();
        return view('report.reportresption',compact('resptions','done','notdone'));
    }
   
      
}

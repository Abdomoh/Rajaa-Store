<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Suport\Str;

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
use Session;
use DB;
use Str;
use Auth;
use App\Dector;
use App\Message;
use App\Replye;

class DectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dectores=DB::table('dectores')->join('specializtions','dectores.id_special','=','specializtions.id')
        ->join('cityes','dectores.id_city','=','cityes.id')->join('clinices','dectores.id_clinc','=','clinices.id')->
        select('dectores.*','specializtions.name_special','cityes.name_city','clinices.name_clinc')->where('dectores.id_special','=','1')->get();
        $hospitales=Hospitale::all();

         $posts=Post::all();
         $pharmc=Pharmaticale::all();
         $clinc=Clinice::all();
         $hospitals=Hospitale::all();
        return view('dector.index',compact('dectores','hospitales','posts','pharmc','clinc','hospitals'));
    }
      //// search
 

      

    //////end search

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dectors=DB::table('dectores')
        ->join('cityes','dectores.id_city','=','cityes.id')
        ->join('specializtions','dectores.id_special','=','specializtions.id')
        ->join('clinices','dectores.id_clinc','=','clinices.id')
        ->select('dectores.*','cityes.name_city','specializtions.name_special','clinices.name_clinc')->orderby('created_at','desc')->get();
        $users=User::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $times=Time::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        $clinc=Clinice::all();

      return view('dector.create',compact('dectors','users','clincs','citys','states','specials','hospitals','times','posts','pharmcmenue','pharmc','posts','clinc'));
      
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
         'name'=>'required|unique:dectores',
         'adress'=>'required',
         'id_city'=>'required',
         'id_city'=>'required',
         'id_clinc'=>'required',
         'email'=>'required|email',
         
         'phone'=>'required',
   
         'id_hospital'=>'required',
         'url'=>'required|mimes:jpg,jpeg,png,JPG,PNG,GIF',
        ]);
     
         $dectors=new Dectore;
         $img_name = time() .'.' . $request->url->getClientOriginalExtension();
     
         $dectors->name=$request->name;
         $dectors->adress=$request->adress;
         $dectors->id_city=$request->id_city;
         //$dectors->lateud=$request->lateud;
         //$dectors->longe=$request->longe;

         $dectors->id_special=$request->id_special;
         $dectors->id_clinc=$request->id_clinc;
         $dectors->email=$request->email;
         $dectors->phone=$request->phone;
         $dectors->unvirest=$request->unvirest;
         $dectors->unvirestspacial=$request->unvirestspacial;
         $dectors->id_hospital=$request->id_hospital;
         $dectors->experince=$request->experince;
         
         $dectors->from_time=$request->from_time;
         $dectors->at_time=$request->at_time;
         $dectors->url=$img_name;
         
        $request->url->move(public_path('upload'),$img_name);
        
        $dectors->save();
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
        $dectores=Dectore::find($id);
        $users=User::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $times=Time::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        $clinc=Clinice::all();
        return view('dector.show',compact('dectores','hospitals','id','users','citys','states','posts','pharmc','clinc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dector=Dectore::find($id);
        $users=User::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmc=Pharmcie::all();
      return view('dector.edit',compact('dector','users','clincs','citys','states','specials','hospitals','posts','pharmc'));
      
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
        $dector=Dectore::find($id);
        $dector->update($request->all());
        session::flash('success','تم التعديل بنجاج');
        return redirect('dector/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Dectore::find($id)->delete();
        return back()->with('delete','تم الحزف بنجاح ');
    }

    public function master()
    {
          $count=Dectore::all();
          $users=User::all();
          return view('master',compact('count','users'));
    }

    public function dectorspacial2()
    {  

         $dectores=DB::table('dectores')->
         join('specializtions','dectores.id_special','=','specializtions.id')
        ->join('cityes','dectores.id_city','=','cityes.id')->
        select('dectores.*','specializtions.name_special','cityes.name_city')->where('id_special','=','2')->get();
        $hospitales=Hospitale::all();

         $posts=Post::all();
         $pharmc=Pharmaticale::all();
         $clinc=Clinice::all();
         $hospitals=Hospitale::all();
        return view('dector.dectorspacial2',compact('dectores','hospitales','posts','pharmc','clinc','hospitals'));

      
    }

    public function dectorspacial3()
    {  

         $dectores=DB::table('dectores')->
         join('specializtions','dectores.id_special','=','specializtions.id')
        ->join('cityes','dectores.id_city','=','cityes.id')->
        select('dectores.*','specializtions.name_special','cityes.name_city')->where('id_special','=','3')->paginate(4);
        $hospitales=Hospitale::all();

         $posts=Post::all();
         $pharmc=Pharmaticale::all();
         $clinc=Clinice::all();
         $hospitals=Hospitale::all();
        return view('dector.dectorspacial3',compact('dectores','hospitales','posts','pharmc','clinc','hospitals'));

      
    }



    //// report 
    public function reportdector()
    {
     
        $dectores=DB::table('dectores')
        ->join('cityes','dectores.id_city','=','cityes.id')
        ->join('specializtions','dectores.id_special','=','specializtions.id')
        ->join('clinices','dectores.id_clinc','=','clinices.id')
        ->join('hospitales','dectores.id_hospital','=','hospitales.id')
        ->select('dectores.*','cityes.name_city','specializtions.name_special','clinices.name_clinc','hospitales.name_hospital')->orderby('dectores.id','created_at')->get();


         $spcial1=DB::table('dectores')->
         join('specializtions','dectores.id_special','=','specializtions.id')
        ->
        select('dectores.*','specializtions.name_special')->where('id_special','=','1')->get();

         $spcial2=DB::table('dectores')->
         join('specializtions','dectores.id_special','=','specializtions.id')
        ->
        select('dectores.*','specializtions.name_special')->where('id_special','=','2')->get();

 $spcial3=DB::table('dectores')->
         join('specializtions','dectores.id_special','=','specializtions.id')
        ->
        select('dectores.*','specializtions.name_special')->where('id_special','=','3')->get();




        return view('report.reportdector',compact('dectores','spcial1','spcial2','spcial3'));
    }



    //// message

    public function message()
    {    $id=auth::user()->id;
        /*$messages=DB::table('messages')->
        join('users','messages.id_user','=','users.id')
        ->where('messages.id_user',$id)->
        paginate(1);*/


        $messages=Replye::orderby('created_at','asc')->get();



        $users=User::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $times=Time::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        $clinc=Clinice::all();

      return view('dector.message',compact('messages','dectors','users','clincs','citys','states','specials','hospitals','times','post','pharmcmenue','pharmc','posts','clinc'));
       
    }

    public function storemessage(Request $request)
    {

       

        $message=new Message;
     
         $message->message=$request->message;
         //$message->id_user=auth::user()->id;
         $message->to_id=2;

        $message->save();
        return back();
    }


   /// replay dector


    public function createreplay()
    {   

        $id=auth::user()->id;
        $message=Message::orderby('created_at','desc')->paginate(3);


        $users=User::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $times=Time::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        $clinc=Clinice::all();

      return view('dector.replay',compact('message','dectors','users','clincs','citys','states','specials','hospitals','times','post','pharmcmenue','pharmc','posts','clinc'));
       
    }



    public function storereplay(Request $request)
    {

       

        $reply=new Replye;
     
         $reply->reply=$request->reply;
         $reply->id_user=auth::user()->id;
         $reply->id_message=rand(1,2);

        $reply->save();
        return back();
    }

    





    
}

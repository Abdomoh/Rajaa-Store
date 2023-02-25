<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Dectore;
use App\Post;
use App\Type;
use App\Clinice;

use App\Pharmcie;


use Session;
use DB;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals=DB::table('hospitales')->
        join('specializtions','hospitales.id_special','=','specializtions.id')->
        select('hospitales.*','specializtions.name_special')->
        where('hospitales.id_type','=','1')->
        orderby('created_at','hospitales.id')->paginate(4);

        $users=DB::table('users')->get();
        $citys=Citye::all();
        $posts=Post::all();
        $pharmc=Pharmcie::all();
        $hos=Hospitale::all();
        $clinc=Clinice::all();
        return view('hospital.index',compact('hospitals','users','citys','posts','pharmc','hos','clinc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      $hospitales=DB::table('hospitales')->paginate(11);

        $hospitals=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        
        $types=Type::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
      return view('hospital.create',compact('hospitales','users','states','citys','specials','hospitals','types','posts','pharmcmenue','pharmc'));
       
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
         'name_hospital'=>'required|unique:hospitales|min:5',
         'id_special'=>'required',
         'email'=>'required|email',
         'id_type'=>'required',
         'phone'=>'required',
         'url'=>'required|mimes:jpg,jpeg,png,JPG,PNG,GIF',
        ]);
    $img_name = time() .'.' . $request->url->getClientOriginalExtension();
        

        $hospital=new Hospitale();
       
        $hospital->name_hospital=$request->name_hospital;
      
        $hospital->id_city=$request->id_city;
        $hospital->id_special=$request->id_special ;
        $hospital->id_state=$request->id_state;
        $hospital->id_type=$request->id_type;
        $hospital->phone=$request->phone;
        $hospital->email=$request->email;
        //$hospital->lateud=$request->lateud;
        //$hospital->longe=$request->longe;
        //$hospital->from_time=$request->from_time;
        //$hospital->to_time=$request->to_time;
       
        $hospital->url=$img_name;
     
    	$request->url->move(public_path('upload'),$img_name);

        $hospital->detles=$request->detles;

       

        $hospital->save();
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
        $hospital=Hospitale::find($id);
        $hospitals=Hospitale::all();
        $users=User::all();
        $citys=Citye::all();
        $states=State::all();
         $posts=Post::all();
         $pharmc=Pharmcie::all();
         $clinc=Clinice::all();
        return view('hospital.show',compact('hospital','hospitals','id','users','citys','states','posts','pharmc','clinc'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        
        $hospital=Hospitale::find($id);
        $users=User::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        return view('hospital.edit',compact('hospital','id','users','hospitals','posts','pharmcmenue','pharmc'));
    }


    /** */

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hospital=Hospitale::find($id);
        $hospital->name_hospital=$request->name_hospital;

        $hospital->phone=$request->phone;
        $hospital->email=$request->email;
           

        $hospital->save();
        session::flash('success','تم التعديل بنجاج');
        return redirect('hospital/create');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Hospitale::find($id)->delete();
          session::flash('delete',' تم الحزف بنجاح');
          return back();
    }


    ///// go to parmiters master
    public function master()
    {
          $hospitals=Hospitale::all();
          $count=Dectore::count();
          $users=User::all();
          return view('master',compact('hospitals','count','users'));
    }

    public function welcome()
    {
          $hospitals=Hospitale::all();
          $count=Dectore::count();
          $users=User::all();
          return view('master',compact('hospitals','count','users'));
    }

     public function privethospital()
     { 
        $hospitals=DB::table('hospitales')->
        join('specializtions','hospitales.id_special','=','specializtions.id')->
        select('hospitales.*','specializtions.name_special')->
        where('hospitales.id_type','=','2')->
        orderby('created_at','id_hospital')->get();
        $citys=Citye::all();

        $posts=Post::all();
        $pharmc=Pharmcie::all();
         $hos=Hospitale::find(8);
         $clinc=Clinice::all();


          $menue=DB::table('hospitales')->
        join('specializtions','hospitales.id_special','=','specializtions.id')->
        select('hospitales.*','specializtions.name_special')->
        where('hospitales.id_type','=','2')->
        orderby('created_at','id_hospital')->orderby('created_at','desc')->get();
        $citys=Citye::all();
        return view('hospital.privethospital',compact('hospitals','users','citys','posts','pharmc','hos','menue','clinc'));


      
     }



     public function searchdirect()
     {   

       

           $hospitales=Hospitale::all();
            $users=User::all();
            $states=State::all();
            $citys=Citye::all();
            $specials=Specializtion::all();
            $hospitals=Hospitale::all();
            $posts=Post::all();
            $pharmcmenue=Pharmcie::all();//// menue sidepar
            $pharmc=Pharmcie::all();
            $clinc=Clinice::all();
           
            return view('direct.searchdirect',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue'));
         
     }



     public function searchhospital()

     {



           $hospitales=Hospitale::all();
            $users=User::all();
            $states=State::all();
            $citys=Citye::all();
            $specials=Specializtion::all();
            $hospitals=Hospitale::all();
            $posts=Post::all();
            $pharmcmenue=Pharmcie::all();//// menue sidepar
            $pharmc=Pharmcie::all();
            $clinc=Clinice::all();
           
            return view('hospital.searchhospital',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue'));
         
     }



     public function reporthospital()
     {   
        $type=DB::table('hospitales')->
        join('specializtions','hospitales.id_special','=','specializtions.id')->
        select('hospitales.*','specializtions.name_special')->
        where('hospitales.id_type','=','1')->get();

        $gaver=DB::table('hospitales')->
        join('specializtions','hospitales.id_special','=','specializtions.id')->
        select('hospitales.*','specializtions.name_special')->
        where('hospitales.id_type','=','2')->get();

        $hospitals=Hospitale::orderby('created_at','desc')->get();
        return view('report.reporthospital',compact('hospitals','type','gaver'));
     }
}

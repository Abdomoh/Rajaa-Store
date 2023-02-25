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
use App\Clinice;
use Session;
use DB;


class PharmciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
       
        return view('pharmcies.index',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue'));
         
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pharmc=Pharmcie::orderby('created_at','desc')->paginate(4);
        $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
         $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();
        
        return view('pharmcies.create',compact('pharmc','hospitals','users','states','citys','specials','hospitals','posts','pharmcmenue','pharmc'));
      
        
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
         'name_pharmc'=>'required|unique:pharmcies',
         'id_city'=>'required',
         'id_state'=>'required',
         'email'=>'required|email',
         'phone'=>'required',
         'url'=>'required|mimes:jpg,jpeg,png,JPG,PNG,GIF',
         'detiles'=>'required|min:30',
        ]);


        $img_name = time() .'.' . $request->url->getClientOriginalExtension();
      
        $pharmc=new Pharmcie;
        $pharmc->name_pharmc=$request->name_pharmc;
        $pharmc->id_city=$request->id_city;
        //$pharmc->lateud=$request->lateud;
        //$pharmc->longe=$request->longe;
        $pharmc->id_state=$request->id_state;
        $pharmc->email=$request->email;
        $pharmc->phone=$request->phone;
        $pharmc->url=$img_name;
    
        $pharmc->detiles=$request->detiles;
        $request->url->move(public_path('upload'),$img_name);
        $pharmc->save();
    
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
        $pharm=Pharmcie::find($id);
        $pharmc=Pharmcie::all();
        $posts=Post::all();
        return view('pharmcies.show',compact('pharm','pharmc','posts'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

        {  
        $pharm=Pharmcie::find($id);  
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();
        
        
        return view('pharmcies.edit',compact('pharm','hospitals','users','states','citys','specials','hospitals','posts','pharmcmenue','pharmc'));
      
  
        
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

      
        $pharm=Pharmcie::find($id); 
        $pharm->update($request->all());
        
    
        session::flash('success','تم التعديل بنجاح');
        return redirect('/pharmcies/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phar=Pharmcie::find($id);
        $phar->delete();
        session::flash('delete',' تم الحزف بنجاح');
        return back();  
    } 

    /*public function del(Pharmcie $pharmc )
    {
       $pharmc->delete();
       session::flash('delete',' تم الحزف بنجاح');
       return back();  

    }*/

    public function master()
    {
          $hospitals=Hospitale::all();
          $users=User::all();
          return view('master',compact('hospitals','users'));
    }





    public function reportpharmcies()
    {

        $Pharmcies=Pharmcie::orderby('created_at','desc')->paginate(1);
         
        $citykh=Pharmcie::orderby('created_at','desc')->where('id_city',1)->get();
         $cityph=Pharmcie::orderby('created_at','desc')->where('id_city',2)->get();
        
        return view('report.reportpharmcies',compact('Pharmcies','citykh','cityph'));
    }




    /*public function searchhome()

    {    $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();
        $clinc=Clinice::all();
       
        return view('pharmcies.searchhome',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue'));
    }*/

  
}

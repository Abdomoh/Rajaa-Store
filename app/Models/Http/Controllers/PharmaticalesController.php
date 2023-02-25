<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Pharmcie;
use App\Pharmaticale;
use App\Post;
use Session;
use DB;

class PharmaticalesController extends Controller
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
        $pharmactical=DB::table('pharmaticales')->join('pharmcies','pharmaticales.id_pharmc','=','pharmcies.id')
    ->select('pharmaticales.*','pharmcies.name_pharmc')->orderby('created_at','desc')->paginate(5);
        $pharmc=Pharmcie::all();
        $hospitales=Hospitale::all();
        $users=User::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmc=Pharmcie::all();
        $pharmcmenue=Pharmcie::all();
        
        return view('pharmaticales.create',compact('pharmactical','pharmc','hospitals','users','states','citys','specials','hospitals','posts','pharmc','pharmcmenue'));
      
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
            'name_pharmatical'=>'required|min:5|unique:pharmaticales',
            'date_role'=>'required|max:10',
            'date_end'=>'required|max:10',
            'id_pharmc'=>'required|',
            'company'=>'required|min:5',

            
            
            ]);

            $pharmatical = new  Pharmaticale;
            $pharmatical->name_pharmatical=$request->name_pharmatical;
            $pharmatical->date_role=$request->date_role;
            $pharmatical->date_end=$request->date_end;
            $pharmatical->id_pharmc=$request->id_pharmc;
            $pharmatical->company=$request->company;
            
            $pharmatical->save();
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
        $pharmactical=Pharmaticale::find($id);
    
            $pharmc=Pharmcie::all();
            $hospitales=Hospitale::all();
            $users=User::all();
            $states=State::all();
            $citys=Citye::all();
            $specials=Specializtion::all();
            $hospitals=Hospitale::all();
             $posts=Post::all();
        $pharmc=Pharmcie::all();
        $pharmcmenue=Pharmcie::all();
            
            return view('pharmaticales.edit',compact('pharmactical','pharmc','hospitals','users','states','citys','specials','hospitals','posts','pharmcmenue','pharmc'));
        
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
       
         $pharmaticals=Pharmaticale::find($id); 

        $pharmaticals->name_pharmatical=$request->name_pharmatical;
        $pharmaticals->date_role=$request->date_role;
        $pharmaticals->id_pharmc=$request->id_pharmc;
        $pharmaticals->date_end=$request->date_end;
        $pharmaticals->id_pharmc=$request->id_pharmc;
        
        $pharmaticals->company=$request->company;
     
        $pharmaticals->save();
    
        session::flash('success','تم التعديل بنجاح');
        return redirect('/pharmaticales/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharmactical=Pharmaticale::find($id)->delete();
        session::flash('delete',' تم الحزف بنجاح');
        return back();  
    }


    public function reportmidical()
    {

        $pharmactical=Pharmaticale::orderby('created_at','desc')->paginate(1);
        return view('report.reportmidical',compact('pharmactical'));
    }
}

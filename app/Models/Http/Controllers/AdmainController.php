<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

use DB;
use Auth;

use App\Dectore;
use App\Clinice;

use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Post;
use App\Time;
use App\Pharmaticale;
use App\Pharmcie;
use Session;
use App\Dector;

class AdmainController extends Controller
{
    public function admain()
    {
        
        
        $dectors=Dectore::all();
        $hospitals=Hospitale::all();
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
         return view('admain.contoraladmain',compact('dectors','users','clincs','citys','states','specials','hospitals','times','posts','pharmcmenue','pharmc','posts','clinc'));
            
    }

    public function dector()
    {

        $dectors=Dectore::all();
        $hospitals=Hospitale::all();
        $users=User::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $times=Time::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmcies=Pharmcie::all();//// menue sidepar
        $clinc=Clinice::all();
         return view('admain.controaldector',compact('dectors','users','clincs','citys','states','specials','hospitals','times','post','pharmcmenue','pharmcies','posts','clinc'));

        
    }




     public function clinc()
    {

        $dectors=Dectore::all();
        $hospitals=Hospitale::all();
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
         return view('admain.controalclinc',compact('dectors','users','clincs','citys','states','specials','hospitals','times','post','pharmcmenue','pharmc','posts','clinc'));

        
    }


    public function addrole(Request $request)
    {
        $user=User::where('email',$request['email'])->first();
        $user->roles()->detach();

         if($request['role_clinc'])
        {
            $user->roles()->attach(Role::where('name','clinc')->first());
        }

        if($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','user')->first());
        }
         if($request['role_dector'])
        {
            $user->roles()->attach(Role::where('name','dector')->first());
        }

         if($request['role_admain'])
        { 
            $user->roles()->attach(Role::where('name','admain')->first());
        }
        return redirect()->back();
    }
   

    public function accessdenid()
    {
        return view('admain.access-denid');
    }




    /*public function add()
    {

        if(Auth::user()->role ==1)
        {
            
       $users=User::all();
       $hospitals=Hospitale::all();
        return view('admain.contoraladmain',compact('users','hospitals'));

            
        }

        return redirect('/pro'); 
        
       
    }*/


    

    
}

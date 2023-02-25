<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Response;
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
use App\Dector;

class TestController extends Controller
{
    //

    public function show()
    {
        $memberes=User::all();

        return view('register.test',compact('memberes'));
    }
    public function  homee()
    {
        $memberes=User::all();

        return view('index',compact('memberes'));
    }
   
   

    public function admain()
    {
        return view('register.admain');
    }


    public function user()
    {
        $users=User::all();

        return view('master',compact('users'));
    }

    public function doc()
    {
        $users=User::all();

        return view('doc',compact('users'));
        

    }

    public function ui()
    {
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
      return view('ui',compact('users','clincs','citys','states','specials','hospitals','times','post','pharmcmenue','pharmc','posts'));
        

    }
   

}

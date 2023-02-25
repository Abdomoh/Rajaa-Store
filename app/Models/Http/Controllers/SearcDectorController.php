<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dectore;
use App\Clinice;
use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Pharmcie;
use App\Post;
use Session;
use DB;
use App\Dector;

class SearcDectorController extends Controller
{
      /**
     * Search dectors.
     *
     * 
     */
    public function search(Request $request)
    {
       
    
      $search=$request->search;
      $dds=Dectore::where('dectoers','like','%' .$search. '%')->get();
      if($dds->count() < 0)
      {

          return redirect('../create')->with('dds','st','not rusult');
          
          
      }
      else
      {
          return view('/dector.create',compact('dds')); 
    
      }
      
  
        
    }
}

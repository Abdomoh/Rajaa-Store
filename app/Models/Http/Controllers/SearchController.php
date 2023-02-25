<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Pharmaticale;
use App\Clinice;

use App\User;
use App\Citye;
use App\state;
use App\Specializtion;
use App\Hospitale;
use App\Pharmcie;
use App\Post;
use App\Dectore;
use DB;


class SearchController extends Controller
{
       public function search(Request $request)
    {   
          $clinc=Clinice::all();
        $pharmc=Pharmaticale::all();
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
        $q=$request->q;
        $posts=Post::where('body','like','%' .$q. '%')->orWhere('title','like','%' .$q. '%')->get();
        if($posts->count() > 0)
        {  

        return view('post.index',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'));
        
            
        } else{
               return view('post.index',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'))->withMessage('لايوجد المقال الذي تبحث عنه. اعد البحث مرة اخري !');
        }

        
     
    }




     public function search_dector(Request $request)
    {   
          $clinc=Clinice::all();
        $pharmc=Pharmaticale::all();
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
        $q=$request->q;
        $dectores=Dectore::where('name','like','%' .$q. '%')->orWhere('id','like','%' .$q. '%')->get();
        if($dectores->count() > 0)
        {  

        return view('dector.index',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'));
        
            
        } else{
               return view('dector.index',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'))->withMessage('لايوجد دكتور بهة البيانات  اعد البحث مرة اخري !');
        }

        
     
    }





     public function search_dector2(Request $request)
    {   
          $clinc=Clinice::all();
        $pharmc=Pharmaticale::all();
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
        $q=$request->q;
        $dectores=Dectore::where('name','like','%' .$q. '%')->orWhere('id','like','%' .$q. '%')->get();
        if($dectores->count() > 0)
        {  

        return view('dector.dectorspacial2',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'));
        
            
        } else{
               return view('dector.dectorspacial2',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'))->withMessage('لايوجد دكتور بهة البيانات  اعد البحث مرة اخري !');
        }

        
     
    }







     public function search_dector3(Request $request)
    {   
          $clinc=Clinice::all();
        $pharmc=Pharmaticale::all();
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
        $q=$request->q;
        $dectores=Dectore::where('name','like','%' .$q. '%')->orWhere('id','like','%' .$q. '%')->get();
        if($dectores->count() > 0)
        {  

        return view('dector.dectorspacial3',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'));
        
            
        } else{
               return view('dector.dectorspacial3',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'))->withMessage('لايوجد دكتور بهة البيانات  اعد البحث مرة اخري !');
        }

        
     
    }








    public function searchselect(Request $request)
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

        $loc  = $request->city;
        $q = $request->text;


        $medicines = Pharmaticale::where('name_pharmatical', 'LIKE', '%' . $q . '%')->whereHas('pharmacy.city',
         function (Builder $query) use ($loc) {
            $query->where('name_city', $loc);
        })->get();

        //$medicines = Medicine::where('name', 'LIKE', '%' . $q . '%')->get();

        $citys = Citye::all();

        if (count($medicines) > 0) {

            return view('pharmcies.index',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue'))->withDetails($medicines)->withQuery($q)->withCitys($citys);
        } else {
            return view('pharmcies.index',compact('pharmc','hospitals','users','states','citys','specials','posts','pharmcmenue','clinc'))->withMessage('هذا الدواء غير متوفر في جميع الصيدليات . الرجاء البحث عن  دواء اخر  !')->withCitys($citys)->withQuery($q);
        }
      
    }



    
     
  
     public function public()
     {
        $clinc=Clinice::all();
        $pharmc=Pharmaticale::all();
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
        return view('public-search',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'));
     }



     public function public_search(Request $request)
    {   
        $clinc=Clinice::all();
        $pharmc=Pharmaticale::all();
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
        $q=$request->q;
        $details=Dectore::where('name','like','%' .$q. '%')->orWhere('id','like','%' .$q. '%')->paginate(1);
        if($details->count() > 0)
        {  

        return view('public-search',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','details'));
        
            
        } else{
               return view('public-search',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','details'))->withMessage('لايوجد دكتور بهة البيانات  اعد البحث مرة اخري !');
        }

        
     
    }













    public function searchdirect(Request $request)
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

            $dectores=DB::table('dectores')->join('specializtions','dectores.id_special','=','specializtions.id')
        ->join('cityes','dectores.id_city','=','cityes.id')->join('clinices','dectores.id_clinc','=','clinices.id')->
        select('dectores.*','specializtions.name_special','cityes.name_city','clinices.name_clinc')->where('dectores.id_special','=','1')->orderby('created_at','desc')->paginate(4);
    
            $loc = $request->city;
            $spacial =$request->spacial;
            $q = $request->searchdirect;
    
    
            $dector =Dectore::
            where('name', 'LIKE', '%' . $q . '%')->orWhere('id', 'LIKE', '%' . $q . '%')->
           whereHas('hospital.city',
             function (Builder $query) use ($loc) {
                $query->where('name_city', $loc);
            })->paginate(1);
    
            //$medicines = Medicine::where('name', 'LIKE', '%' . $q . '%')->get();
    
            $citys = Citye::all();
    
            if (count($dector) > 0) {
    
                return view('direct.searchdirect',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'))->withDetails($dector)->withQuery($q)->withCitys($citys);
            } else {
                return view('direct.searchdirect',compact('pharmc','hospitals','users','states','citys','specials','posts','pharmcmenue','clinc','dectores'))->withMessage('هذا الطبيب غير متوفر في هذه المنطقة . الرجاء البحث عن   طبيب اخر  !')->withCitys($citys)->withQuery($q);
            }
          
        
    
    
    
    }
    



    public function searchhospital(Request $request)
    {


            $hospitales=Hospitale::all();
            $users=User::all();
            $states=State::all();
            $citys=Citye::all();
            $specials=Specializtion::all();
            $dectores=Dectore::all();
            $posts=Post::all();
            $pharmcmenue=Pharmcie::all();//// menue sidepar
            $pharmc=Pharmcie::all();
            $clinc=Clinice::all();

             $hospitals=DB::table('hospitales')->
        join('specializtions','hospitales.id_special','=','specializtions.id')->join('cityes','hospitales.id_city','=','cityes.id')->
        select('hospitales.*','specializtions.name_special','cityes.name_city')->
        where('hospitales.id_type','=','1')->
        orderby('created_at','hospitales.id')->paginate(4);
    
            $loc = $request->city;
            $spacial =$request->spacial;
            $q = $request->searchhospital;
    
    
            $hospittal =Hospitale::
            where('name_hospital', 'LIKE', '%' . $q . '%')
           ->
           whereHas('city',
             function (Builder $query) use ($loc) {
                $query->where('name_city', $loc);
            })->paginate(1);
    
            //$medicines = Medicine::where('name', 'LIKE', '%' . $q . '%')->get();
    
            $citys = Citye::all();
    
            if (count($hospittal) > 0) {
    
                return view('hospital.searchhospital',compact('pharmc','hospitals','users','states','citys','specials','clinc','posts','pharmcmenue','dectores'))->withDetails($hospittal)->withQuery($q)->withCitys($citys);
            } else {
                return view('hospital.searchhospital',compact('pharmc','hospitals','users','states','citys','specials','posts','pharmcmenue','clinc','dectores'))->withMessage('هذا المشفي الذي تبحث عنة غير متوفر في المنطقة . الرجاء البحث عن   مشفي ا خر  !')->withCitys($citys)->withQuery($q);
            } 
    }


}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class SesstionController extends Controller
{
    public function show()
    {
    	return view('register.login');
    }




    public function create()
    {
        if(! auth()->attempt(request(['email','password'])))
        {

     return back()->withErrors([
        'massage'=>'كلمة المرور او الايميل خطأ'


              ]);
        }

        if(Auth::user()->hasRole('admain'))
    {
       return redirect('../welcomeadmain');  
    }  
    elseif(Auth::user()->hasRole('user')){
         return redirect('../uiuser');
    

    } elseif(Auth::user()->hasRole('dector')){
         return redirect('../controaldector');
    

    }elseif(Auth::user()->hasRole('clinc')){
         return redirect('../controalclinc');

       
         
    }else{
            return redirect('../login');
      }

      
    }

    public function destroy()
    {
    	auth()->logout();
	return redirect('../login');
    }




}

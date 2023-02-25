<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Contracts\Auth\Authenticatable;

use App\Auth;
//use App\Session;
use App\User;
use App\Role;
use App\Post;
use App\Dectore;
use App\Hospitale;
use App\Pharmcie;
use App\Clinice;
use App\Specializtion;
use DB;
use Session;

class RegisterController extends Controller
{
    protected $members;
    public function show()
    {
        return view('register.register');

    }

    public function create(Request $request)
    {
         $this->validate(request(),[
         'full_name'=>'required|min:5',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:4',
         'full_name'=>'required|min:5',
         'url'=>'required|mimes:jpg,jpeg,png',
       ]);
   
         /// CREATE Users
        $user = new User;
        $img_name = time() .'.' . $request->url->getClientOriginalExtension();
        
        $user->full_name=$request->full_name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->url=$img_name;
        $user->state_value=rand(1,2);
        $user->jop=$request->jop;
     
       
    	$request->url->move(public_path('upload'),$img_name);


         $user->save();
         session::flash('success','تم التسجيل بنجاح');

         $user->roles()->attach(Role::where('name','user')->first());

        /// LOGIN

        auth()->login($user);

        /// REDIRECT
        return back();
    }

    //// show profial

    public function showprofial()
    {
        $users=User::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $dectors=Dectore::all();
        $pharmcies=Pharmcie::all();
        $clinc=Clinice::all();
        $specials=Specializtion::all();
        $posts=Post::all();
         $pharmc=Pharmcie::all();
      

        return view('register.profial',compact('posts','users','hospitals','pharmc','clinc'));
    }


    ///// edited to profial

    public function editeprofial(User $users)
    {
        $users=User::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        $clinc=Clinice::all();
        return view('register.editeprofial',compact('users','hospitals','posts','pharmcmenue','pharmc','clinc'));
    }



    public function update(Request $request, User $users)

{
   	$users->update($request->all());
   	return redirect('../profial'); 

 }
 ////end edite profial

    




///// report from userr

public function reportuser()
{


    $users=DB::table('user_role')->join('users','user_role.user_id','users.id')->join('roles','user_role.role_id','roles.id')->select('users.*','roles.name')->orderby('users.id','desc')->get();
    return view('report.reportuser',compact('users'));
}
   
   
}
///// end update user   

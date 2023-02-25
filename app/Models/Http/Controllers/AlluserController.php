<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\State;
use App\Citye;
use Session;

class AlluserController extends Controller
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
       $users=DB::table('user_role')->join('users','user_role.user_id','users.id')->join('roles','user_role.role_id','roles.id')->select('users.*','roles.name')->orderby('users.id','desc')->get();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $dectors=Dectore::all();
        $pharmcies=Pharmcie::all();
        $clinc=Clinice::all();
        $specials=Specializtion::all();
        $posts=Post::all();
         $pharmc=Pharmcie::all();
      

        return view('user.create',compact('posts','users','hospitals','pharmc','clinc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::find($id);
        $dector=Dectore::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmc=Pharmcie::all();
      return view('user.show',compact('dector','users','clincs','citys','states','specials','hospitals','posts','pharmc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $dector=Dectore::all();
        $clincs=Clinice::all();
        $states=State::all();
        $citys=Citye::all();
        $specials=Specializtion::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmc=Pharmcie::all();
      return view('user.edit',compact('dector','user','clincs','citys','states','specials','hospitals','posts','pharmc'));
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
        $user=User::find($id); 
        $user->update($request->all());
        session::flash('success','تم التعديل بنجاج');
        return redirect('user/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user=User::find($id);
        $user->delete();
        session::flash('delete',' تم الحزف بنجاح');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Session;
use DB;
use App\User;
use App\Clinice;
use App\Catogre;
use App\Hospitale;
use App\Pharmaticale;
use App\Pharmcie;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
      $posts=DB::table('posts')->join('catogres','posts.catgore_id','=','catogres.id')->select('posts.*','catogres.name_cat')->orderby('created_at','desc')->paginate(3);
      
        $cat=Catogre::all();
        $users=DB::table('users')->get();
        $hospitals=Hospitale::all();
        $pharmc=Pharmaticale::all();
        $clinc=Clinice::all();
       return view('post.index',compact('posts','cat','users','hospitals','pharmc','clinc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $posts=DB::table('posts')->join('catogres','posts.catgore_id','=','catogres.id')->select('posts.*','catogres.name_cat')->paginate(3);
         $cat=Catogre::all();
        $users=User::all();
        $hospitals=Hospitale::all();
        $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
         return view('post.create',compact('posts','cat','users','hospitals','posts','pharmcmenue','pharmc'));
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
         'title'=>'required|min:5',
         'body'=>'required|min:30',
         'url'=>'required|mimes:jpg,jpeg,png',
     ]);
        
    
    $post = new Post;
    $post->title=$request->title;
    $post->body=$request->body;
    $post->catgore_id=$request->catgore_id;
    $img_name = time() .'.' . $request->url->getClientOriginalExtension();
    $post->url=$img_name;
 

    $request->url->move(public_path('upload'),$img_name);


     $post->save();


        session::flash('success','تم الادخال بنجاح');
        return redirect('post/create');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $users=User::all();  
         $posts=DB::table('posts')->orderby('created_at','asc');  
        $hospitals=Hospitale::all(); 

         $pos=DB::table('posts')->join('catogres','posts.catgore_id','=','catogres.id')->select('posts.*','catogres.name_cat')->paginate(3);
            $pharmc=Pharmcie::all();
            $clinc=Clinice::all();
       return view('post.show',compact('posts','post','users','hospitals','pos','pharmc','clinc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    { 
        $users=User::all();
        $cat=Catogre::all();
        $hospitals=Hospitale::all();
         $posts=Post::all();
        $pharmcmenue=Pharmcie::all();//// menue sidepar
        $pharmc=Pharmcie::all();//// menue sidepar
        return view('../post.edit',compact('post','users','cat','hospitals','posts','pharmcmenue','pharmc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        $posts=Post::all();
        $users=User::all();
        $hospitals=Hospitale::all();

        session::flash('success','تم التعديل بنجاج');
        return view('../post.create',compact('post','posts','users','hospitals'));
         

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post)
    {
        $post->delete();
        return back()->with('delete','تم الحزف بنجاح ');
    }

    
    //// reoprts from post


    public function reportpost()
    {
         $cat=Catogre::all();
         $pos=DB::table('posts')->join('catogres','posts.catgore_id','=','catogres.id')->select('posts.*','catogres.name_cat')->paginate(1);    
        return view('report.reportpost',compact('pos','cat'));
    }

    //// end reports
 
}

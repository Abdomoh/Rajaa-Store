<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;
use DB;
class CommentController extends Controller
{
    public function addcomment(Post $post)
    {

        Comment::create([
            'body'=>request('body'),
            'post_id'=>$post->id
        ]);
        return back();
    }

    public function deletcomment(Comment $comment)
    {
        $comment->delete();
        session::flash('delete','تم الحزف بنجاح');
      return back();
        
    }


    public function edite(Comment $comment)
    {
        $post=Post::all();
      return view('post.editcomment',compact('comment','post'));    
     
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        $post=Post::find($comment);

        return view('post.show',compact('comment','post'));
    }
}

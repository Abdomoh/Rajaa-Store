<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'user_id' => 'integer',
            'post' => 'required|string',
            'url' => 'required|image|mimes:jpeg,jpg,gif,png|max:10240',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return back()->withErrors($message);
        }
        $input['user_id'] =  Auth::user()->id;
        $post = Post::create($input);
        if ($request->file('url')) {
            $image_name = md5($post->id . "app" . $post->id . rand(1, 1000));

            $image_ext = $request->file('url')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('url')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $post->url = $image_full_name;
        }
        $post->save();
        session::flash('success', 'تم الادخال بنجاح');
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
        //
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'user_id' => 'integer',
            'post' => 'required|string',
            'url' => 'required|image|mimes:jpeg,jpg,gif,png|max:10240',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return back()->withErrors($message);
        }
        $input['user_id'] =  Auth::user()->id;
        $post = Post::find($id);
        $post->update($input);
        if ($request->file('url')) {
            $image_name = md5($post->id . "app" . $post->id . rand(1, 1000));

            $image_ext = $request->file('url')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('url')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $post->url = $image_full_name;
        }
        $post->save();
        session::flash('info', ' تم  التعديل بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->url) {
            File::delete(public_path() . "/uploads/" . $post->url);
        }
        $post->delete();
        session::flash('delete', 'تم الحزف بنجاح');
        return back();
    }
}

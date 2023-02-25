<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryies = Category::orderBy('created_at', 'desc')->paginate('12');
        return view('admin.category.index', ['categoryies' => $categoryies]);
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
    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();

        $validator = $request->validated();

    
        $category = Category::create($input);
        if ($request->file('image')) {
            $image_name = md5($category->id . "app" . $category->id . rand(1, 1000));

            $image_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('image')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $category->image = $image_full_name;
        }
        $category->save();
        session::flash('success', 'تم اضافة الصنف  بنجاح');
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
            'name' => 'required',
            'image' => 'image|mimes:jpeg,jpg,gif,png|max:10240',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return back()->withErrors($message);
        }
        $category = Category::find($id);
        $category->update($input);
        if ($request->file('image')) {
            $image_name = md5($category->id . "app" . $category->id . rand(1, 1000));

            $image_ext = $request->file('image')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('image')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $category->image = $image_full_name;
        }
        $category->save();
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
        $category = Category::find($id);
        if ($category->image) {
            File::delete(public_path() . "/uploads/" . $category->image);
        }
        $category->delete();
        session::flash('delete', 'تم الحزف بنجاح');
        return back();
    }
}

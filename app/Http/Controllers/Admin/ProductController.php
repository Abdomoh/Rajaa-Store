<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.product.index', ['products' => Product::all(), 'categoryies' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.product.create', ['categoryies' => Category::all()]);
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
            'name' => 'required|unique:products,name',
            'category_id' => 'required|integer',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required',
            'description' => 'string',
            'img1' => 'required|image|mimes:jpeg,jpg,gif,png|max:10240',
            'img2' => 'image|mimes:jpeg,jpg,gif,png|max:10240',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return back()->withErrors($message)->withInput();
        }

        $product = Product::create($input);
        if ($request->file('img1')) {
            $image_name = md5($product->id . "app" . $product->id . rand(1, 1000));

            $image_ext = $request->file('img1')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('img1')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $product->img1 = $image_full_name;
        }
        if ($request->file('img2')) {
            $image_name = md5($product->id . "app" . $product->id . rand(1, 1000));

            $image_ext = $request->file('img2')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('img2')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $product->img2 = $image_full_name;
        }
        $product->save();
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
            'name' => 'required',
            'category_id' => 'integer',
            'description' => 'string',
            'quantity' => 'required|integer',
            'price' => 'required',
            'description' => 'string',
            'img1' => 'image|mimes:jpeg,jpg,gif,png|max:10240',
            'img2' => 'image|mimes:jpeg,jpg,gif,png|max:10240',
        ]);

        if ($validator->fails()) {
            $message = implode("\n", $validator->errors()->all());
            return back()->withErrors($message);
        }
        $product = Product::find($id);
        $product->update($input);
        if ($request->file('img1')) {
            $image_name = md5($product->id . "app" . $product->id . rand(1, 1000));

            $image_ext = $request->file('img1')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('img1')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $product->img1 = $image_full_name;
        }
        if ($request->file('img2')) {
            $image_name = md5($product->id . "app" . $product->id . rand(1, 1000));

            $image_ext = $request->file('img2')->getClientOriginalExtension(); // example: png, jpg ... etc

            $image_full_name = $image_name . '.' . $image_ext;

            $uploads_folder =  getcwd() . '/uploads/';

            if (!file_exists($uploads_folder)) {
                mkdir($uploads_folder, 0777, true);
            }
            $request->file('img2')->move($uploads_folder, $image_name  . '.' . $image_ext);
            $product->img2 = $image_full_name;
        }
        $product->save();
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
        $product = Product::find($id);
        if ($product->img1) {
            File::delete(public_path() . "/uploads/" . $product->img1);
        }
        if ($product->img2) {
            File::delete(public_path() . "/uploads/" . $product->img2);
        }
        $product->delete();
        session::flash('delete', 'تم الحزف بنجاح');
        return back();
    }
}

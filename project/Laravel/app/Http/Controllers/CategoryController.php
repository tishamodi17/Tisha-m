<?php

namespace App\Http\Controllers;

use App\Models\category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=category::all();
        return view('website.categories',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'cate_name' => 'required|unique:categories|alpha:ascii|max:255',
            'cate_img' => 'required|image',
        ]);

        $data=new category;
        $data->cate_name=$request->cate_name;
        // img upload
        $file=$request->file('cate_img');		
        $filename=time().'_img.'.$request->file('cate_img')->getClientOriginalExtension();
        $file->move('admin/upload/category/',$filename);  // use move for move image in public/images
        $data->cate_img=$filename;

        $data->save();
        return redirect('/add_categories');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        $data=category::all();
        return view('admin.manage_categories',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category,$id)
    {
        $data= category::find($id)->delete();
        return redirect('/manage_categories');
    }
} 
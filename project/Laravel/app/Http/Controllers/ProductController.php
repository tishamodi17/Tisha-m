<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data=product::where('cate_id',$id)->where('status','Instock')->get();
        return view('website.product_details',['data'=>$data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=category::all();
        return view('admin.add_products',['data'=>$data]);
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
            'cate_id'=> 'required',
            'prod_price'=> 'required',
            'qty'=> 'required',
            'description'=> 'required',
            'prod_name' => 'required|unique:products|alpha:ascii|max:255',
            'prod_img' => 'required|image',
        ]);
        $data=new product;
        $data->cate_id=$request->cate_id;
        $data->prod_name=$request->prod_name;
        $data->prod_price=$request->prod_price	;
        $data->qty=$request->qty;
        $data->description=$request->description;
    
        // img upload
        $file=$request->file('prod_img');		
        $filename=time().'_img.'.$request->file('prod_img')->getClientOriginalExtension();
        $file->move('admin/upload/product/',$filename);  // use move for move image in public/images
        $data->prod_img=$filename;

        $data->save();
        return redirect('/add_products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
     public function show(product $product)
    {
        $data=product::join('categories','products.cate_id','=','categories.id')->get(['products.*','categories.cate_name']);
        return view('admin.manage_products',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product,$id)
    {
        $data=product::find($id)->delete();
        return redirect('/manage_products');
    }
}
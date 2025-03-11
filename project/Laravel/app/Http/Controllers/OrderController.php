<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\user;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=product::all();
        $user=user::all();
       
        return view('admin.add_orders', ['data' => $data], ['user' => $user]);

        
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
           'prod_id'=>'required',
           'user_id'=>'required',
            'qty'=> 'required',
            'total_ammount'=> 'required',
            
        ]);
        $data=new order;
        $data->prod_id=$request->prod_id;
       echo "<script>
        alert('$data->prod_id');
        </script>";
        $data->user_id=$request->user_id;
        $data->qty=$request->qty;
       
        $data->total_ammount=$request->total_ammount;

        $data->save();
        return redirect('/add_orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        $data=order::all();
        
        return view('admin.manage_orders',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order,$id)
    {
        
        $data=order::find($id)->delete();
        return redirect('/manage_order');
    }
} 
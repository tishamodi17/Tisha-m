<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\emailWelcome;
use Mail;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('website.login');
    }

    public function user_auth(Request $request)
    {
       $data=user::where('email',$request->email)->first();
       if($data)
       {
            if(Hash::check($request->password,$data->password))
            {
                if($data->status=="Unblock")
                {
                    //session create
                    session()->put('uname',$data->name);
                    session()->put('uid',$data->id); 
                    // get session()->get('uname');
                    //delete session()->pull('uname');

                    Alert::success('Login Success', "User Login Successful");
                    return redirect('/');
                }
                else
                {
                    Alert::error('Login Failed', "Blocked Account");
                    return redirect('/login');
                }
            }
            else
            {
                Alert::error('Login Failed', "Password Doesn't Not Match");
                return redirect('/login');
            }
       }
       else
       {
            Alert::error('Login Failed', "Email Doesn't Exist");
            return redirect('/login');
       }
    }

    function user_logout(){
        session()->pull('uname');
        session()->pull('uid');
        Alert::success('Logout Success', "User Logout Successful");
        return redirect('/');
    }

    function user_profile(){
        $data=user::where('id',session()->get('uid'))->first();
        return view('website.user_profile',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new user;
        $name=$data->name=$request->name;
        $email=$data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->lag=implode(",",$request->lag);
        $data->gender=$request->gender;
        
        // img upload
        $file=$request->file('img');		
        $filename=time().'_img.'.$request->file('img')->getClientOriginalExtension();
        $file->move('website/upload/users/',$filename);  // use move for move image in public/images
        $data->img=$filename;

        $data->save();

        $email_data=array("name"=>$request->name,"email"=>$request->email);
       
        Mail::to($email)->send(new emailWelcome($email_data));

        Alert::success('Signup Success', "User Signup Successful");
        return redirect('/signup');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $data=user::all(); // fetch all data of user
        return view('admin.manage_users',["data"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user,$id)
    {
        $data=user::find($id);
        return view('website.edit_user',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user,$id)
    {
        $data=user::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->lag=implode(",",$request->lag);
        $data->gender=$request->gender;

        if($request->hasFile('img')) 
        {
            unlink('website/upload/users/'.$data->img);
            $file=$request->file('img');		
            $filename=time().'_img.'.$request->file('img')->getClientOriginalExtension();
            $file->move('website/upload/users/',$filename);  // use move for move image in public/images
            $data->img=$filename;
        }
        $data->update();
        Alert::success('Update Success', "User Update Successful");
        return redirect('/user_profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user,$id)
    {
        $data=user::find($id)->delete();
        Alert::success('Delete Success', "User Delete Successful");
        return redirect('/manage_users');
    }
}
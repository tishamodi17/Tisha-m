@extends('website.layout.structure')

@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Edit profile</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Edit profile</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Edit profile</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                       
                        <form method="post" action="{{ url('/update_user/'.$data->id) }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control p-4" id="email" placeholder="Your Name"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <input type="email" name="email" value="{{$data->email}}" class="form-control p-4" id="email" placeholder="Your Email"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                             
                            </div>
                            <div class="control-group">
                            <?php $gender=$data->gender;?>
                                Gender :<br> 
                                Male :<input type="radio" name="gender" value="Male" <?php if($gender=="Male"){ echo "checked";}?> class="p-4" />
                                Female<input type="radio" name="gender" value="Female" <?php if($gender=="Female"){ echo "checked";}?> class="p-4" />
                                <br> <br> 
                            </div>
                            <div class="control-group">
                            <?php 
                            $lag=$data->lag;
                            $lag_arr=explode(",",$lag);
                            ?>

                                Lag :<br> 
                                Hindi :<input type="checkbox" name="lag[]" <?php if(in_array("Hindi",$lag_arr)){ echo "checked";}?>  value="Hindi" class="p-4" />
                                English<input type="checkbox" name="lag[]" <?php if(in_array("English",$lag_arr)){ echo "checked";}?> value="English" class="p-4" />
                                Gujarati<input type="checkbox" name="lag[]" <?php if(in_array("Gujarati",$lag_arr)){ echo "checked";}?> value="Gujarati" class="p-4" />
                                <br> <br> 
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <input type="file" name="img" class="form-control p-4" id="email" placeholder="Your Image" />
                                    <img src="{{ url('website/upload/users/'.$data->img)}}" style="width:50px;object-fit: cover;">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Save</button>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <a href="{{url('user_profile')}}">Back</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
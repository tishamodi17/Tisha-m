@extends('website.layout.structure')

@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Signup</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Signup</p>
            </div>
        </div>
    </div>
    <!-- Header End --> 


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Signup Us For Any Query</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                       
                        <form method="post" action="{{ url('/insert_signup') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <input type="text" name="name" class="form-control p-4" id="email" placeholder="Your Name"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <input type="email" name="email" class="form-control p-4" id="email" placeholder="Your Email"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <input type="password" name="password" class="form-control p-4" id="name" placeholder="Your password"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                Gender :<br> 
                                Male :<input type="radio" name="gender" value="Male" class="p-4" />
                                Female<input type="radio" name="gender" value="Female" class="p-4" />
                                <br> <br> 
                            </div>
                            <div class="control-group">
                                Lag :<br> 
                                Hindi :<input type="checkbox" name="lag[]" value="Hindi" class="p-4" />
                                English<input type="checkbox" name="lag[]" value="English" class="p-4" />
                                Gujarati<input type="checkbox" name="lag[]" value="Gujarati" class="p-4" />
                                <br> <br> 
                            </div>
                            <div class="col-sm-12 control-group p-3">
                                    <input type="file" class="form-control p-4" name="img" placeholder="Image" />
                                    @error('img')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                           
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Submit</button>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <a href="login">If you alreday Registered then Login Here</a>
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
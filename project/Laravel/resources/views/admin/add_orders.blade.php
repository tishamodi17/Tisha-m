@extends('admin.layout.structur')

@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Add Orders</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i> 
                <p class="m-0">Add Orders</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Add Orders</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                     @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{url('/insert_orders')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <select class="form-control" name="prod_id">
                                        <option value="" style="color:black">Select product</option>
                                        @foreach($data as $d)
                                        <option value="{{$d->id}}">{{$d->prod_name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-row">
                                <div class="col-sm-12 control-group">
                                    <select class="form-control" name="user_id">
                                        <option value="" style="color:black">Select users</option>
                                        @foreach($user as $d)
                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="col-sm-12 control-group">
                                    <input type="number" class="form-control p-4" value="{{old('qty')}}" name="qty" placeholder="Order Quantity"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-12 control-group">
                                    <textarea class="form-control p-4" name="total_ammount" value="{{old('total_ammount')}}" placeholder="Total Amount" ></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
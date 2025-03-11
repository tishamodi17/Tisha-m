@extends('admin.layout.structur')

@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Add Product</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Add Product</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Add Product</h1>
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
                        <form method="post" action="{{url('/insert_product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row"> 
                                <div class="col-sm-12 control-group">
                                    <select class="form-control" name="cate_id">
                                        <option value="" style="color:black">Select Categories</option>
                                        @foreach($data as $d)
                                        <option value="{{$d->id}}">{{$d->cate_name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="col-sm-12 control-group">
                                    <input type="text" class="form-control p-4" value="{{old('prod_name')}}" name="prod_name" placeholder="Product Name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-12 control-group">
                                    <input type="file" class="form-control p-4" name="prod_img" placeholder="Product Image"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-12 control-group">
                                    <input type="number" class="form-control p-4" value="{{old('prod_price')}}" name="prod_price" placeholder="Product Price"  />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-12 control-group">
                                    <input type="number" class="form-control p-4" value="{{old('qty')}}" name="qty" placeholder="Product Quantity"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-12 control-group">
                                    <textarea class="form-control p-4" name="description" value="{{old('description')}}" placeholder="Product Description" ></textarea>
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
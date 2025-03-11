@extends('website.layout.structure')


@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Edit User Profile</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">User Profile</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Profile Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="section-title position-relative text-center mb-5">Edit User Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 py-5">
                    <h4 class="font-weight-bold mb-3">Edit User Profile</h4>
                    <h5 class="text-muted mb-3">ID : {{$data->id}}</h5>
                    <h5 class="text-muted mb-3">Name : {{$data->name}}</h5>
                    <p>Gender : {{$data->gender}}</p>
                    <p>Launguages : {{$data->lag}}</p>
                    <a href="{{url('user_profile/'.$data->id)}}" class="btn btn-primary mt-2">Edit Profile</a>
                </div>
                <div class="col-lg-4" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="{{ url('website/upload/users/'.$data->img)}}" style="object-fit: cover;">
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Profile End -->


@endsection
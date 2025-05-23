@extends('admin.layout.structur')

@section('content')
<!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Manage User</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Manage User</p>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="section-title position-relative text-center mb-5">Manage User</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="contact-form bg-light rounded p-5">
                   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Gender</th>
                                    <th>Launguages</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d) 
                                <tr>
                                    <td><?php echo $d->id;?></td>
                                    <td><?php echo $d->name;?></td>
                                    <td><?php echo $d->email;?></td>
                                    <td><?php echo $d->password;?></td>
                                    <td><?php echo $d->gender;?></td>
                                    <td><?php echo $d->lag;?></td>
                                    <td><img src="{{url('website/upload/users/'.$d->img)}}" width="60px" height="50px"></td>
                                    <td>
                                        <a href="edit_categories" class="btn btn-primary">Edit</a>
                                        <a href="{{url('manage_users/'.$d->id)}}" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End --> 
@endsection
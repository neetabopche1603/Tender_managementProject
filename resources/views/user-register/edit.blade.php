@extends('layout.app')
@section('title','User Update')
@section('content')
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <i class='bx bx-search'></i>
        </div>
        <div class="profile-details">
            <img src="{{asset('admin/images/profile.jpg')}}" alt="">
            <span class="admin_name">{{session()->get('name')}}</span>
            <i class='bx bx-chevron-down'></i>
        </div>
    </nav>


    <div class="home-content">


        <!-- Notification -->
        <div class="row mt-2">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
                    <span class="font-weight-bold">{!! session()->get('success') !!}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('faild'))
                <div class="alert alert-danger alert-dismissible fade show alert-custom" role="alert">
                    <span class="font-weight-bold">{!! session()->get('faild') !!}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <!-- End Notification -->
        <div class="container">
            <div class="card">
                <div class="card-header" style="background-color: #0a2558;">
                    <h3 class="float-left text-light">Edit User</h3>
                    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-info btn-sm float-right"><i class="fa fa-backward"></i> Back</a>
                </div>
                <div class="card-body shadow p-3 mb-5 bg-white rounded">
                    <form action="{{route('user.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$editUsers->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Employee Name<span class="text-danger text-bold">*</span> :</label>
                                    <input type="text" name="emp_name" id="" class="form-control" placeholder="Enter Employee Name" value="{{$editUsers->emp_name}}">
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Id<span class="text-danger text-bold">*</span> :</label>
                                    <input type="email" name="email" value="{{$editUsers->email}}" id="" class="form-control" placeholder="Email Id">
                                   
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                                                <label for="">Password <span class="text-danger text-bold">*</span>:</label>
                                                                <input type="password" name="password" class="form-control" id="" placeholder="Enter Password">
                                                                
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Comfirm Password <span class="text-danger text-bold">*</span>:</label>
                                                                <input type="password" name="password_confirm" class="form-control" id="" placeholder="Comfirm Password">
                                                               
                                                            </div>

                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contact Number<span class="text-danger text-bold">*</span> :</label>
                                    <input type="number" name="contact_no" id="" class="form-control" placeholder="Contact Number" value="{{$editUsers->contact_no}}">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Designation<span class="text-danger text-bold">*</span> :</label>
                                    <input type="text" name="designation" id="" class="form-control" value="{{$editUsers->designation}}" placeholder="Designation">
                                   
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Address :</label>
                                    <input type="text" name="address" id="" value="{{$editUsers->address}}" class="form-control" placeholder="Address">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('script')


@endpush
@extends('layout.app')
@section('title','User Registration')
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
    <div class="row mt-2 mb-5">
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
          <h4 class="float-left text-light">Users</h4>
          <a href="{{route('user.register.form')}}" class="btn btn-warning btn-sm float-right mb-2"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body shadow p-3 mb-5 bg-white rounded">
          <div class="table-responsive table-responsive-lg table-responsive-sm table-responsive-md">
            <table class="table table-bordered text-center" id="user_register" style="width: 100%;">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Employee Name</th>
                  <th>Email Id</th>
                  <th>Contact No.</th>
                  <th>Designation</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach ($users as $user)


                <tr>
                  <td scope="row">{{$i++}}</td>
                  <td>{{$user->emp_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->contact_no }}</td>
                  <td>{{$user->designation}}</td>
                  <td>{{$user->address}}</td>
                  <td>
                    <a href="{{url('admin/user/edit-user')}}/{{$user->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure Delete this User')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
</section>
@endsection

@push('script')
<script>
  $(document).ready(function() {
    $('#user_register').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>

@endpush
@extends('layout.app')
@section('title','Dashboard')
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

    <div class="overview-boxes">
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total User</div>
          <div class="number">{{$users}}</div>
         
        </div>
        <i class='bx bx-cart-alt cart'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Tender</div>
          <div class="number">{{$alltender}}</div>
        </div>
        <i class='bx bxs-cart-add cart two'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Tender Fee</div>
          <div class="number">{{$tender_fee}}</div>
         
        </div>
        <i class='bx bx-cart cart three'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total EMD Fee</div>
          <div class="number">{{$total_emd}}</div>
          
        </div>
        <i class='bx bxs-cart-download cart four'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total PO Received</div>
          <div class="number">0</div>
         
        </div>
        <i class='bx bxs-cart-download cart four'></i>
      </div>
    </div>
  </div>
</section>
@endsection
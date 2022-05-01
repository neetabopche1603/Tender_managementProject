@extends('auth.app')
@section('title','User Login')
@section('authContent')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="{{route('user.login.post')}}" method="POST">
    @csrf
    <h3>User Login</h3>
  <!-- Notification -->
  <div class="row mt-2">
                                <div class="col-md-12">
                                    @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
                                        <span class="font-weight-bold text-success">{!! session()->get('success') !!}</span>
                                        <!-- <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </a> -->
                                    </div>
                                    @elseif (session()->has('faild'))
                                    <div class="alert alert-danger alert-dismissible fade show alert-custom" role="alert">
                                        <span class="font-weight-bold text-danger">{!! session()->get('faild') !!}</span>
                                        <!-- <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </a> -->
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- End Notification -->

    <label for="username">Username</label>
    <input type="text" placeholder="Email" name="email" id="username">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password">

    <button>Log In</button>
    <!-- <div class="social">
      <div class="go"><i class="fab fa-google"></i> Google</div>
      <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
    </div> -->
</form>

@endsection
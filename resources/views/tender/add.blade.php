@extends('layout.app')
@section('title','Tender Form')
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
                    <h4 class="float-left text-light">Add Tender</h4>
                    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-info btn-sm float-right"><i class="fa fa-backward"></i> Back</a>
                </div>
                <div class="card-body shadow p-3 mb-5 bg-white rounded">
                    <form action="{{route('store.tendor')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tender No<span class="text-danger text-bold">*</span> :</label>
                                    <input type="text" name="tender_no" id="" class="form-control" placeholder="Enter Tender No">
                                    <span class="text-danger font-weight-bold">
                                        @error('tender_no')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Client Name <span class="text-danger text-bold">*</span>:</label>
                                <input type="text" name="client_name" class="form-control" id="" placeholder="Enter Client Name">
                                <span class="text-danger font-weight-bold">
                                    @error('client_name')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tender Publish Date<span class="text-danger text-bold">*</span> :</label>
                                    <input type="date" name="tender_publish_date" id="" class="form-control" placeholder="">
                                    <span class="text-danger font-weight-bold">
                                        @error('tender_publish_date')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tender Type<span class="text-danger text-bold">*</span> :</label>
                                    <select name="tender_type" id="" class="form-control">
                                        <option value="Open Tender">Open Tender</option>
                                        <option value="Limited Tender">Limited Tender</option>
                                        <option value="Single Tender">Single Tender</option>
                                        <option value="Physical Tender">Physical Tender</option>
                                        <option value="GEM Tender">GEM Tender</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="text-danger font-weight-bold">
                                        @error('tender_type')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">BID Submitted Date<span class="text-danger text-bold">*</span> :</label>
                                    <input type="date" name="bid_submitted_date" id="" class="form-control" placeholder="">
                                    <span class="text-danger font-weight-bold">
                                        @error('bid_submitted_date')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">BID Opening Date<span class="text-danger text-bold">*</span> :</label>
                                    <input type="date" name="bid_opening_date" id="" class="form-control" placeholder="">
                                    <span class="text-danger font-weight-bold">
                                        @error('bid_opening_date')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tender Fee<span class="text-danger text-bold">*</span>:</label>
                                    <input type="text" name="tender_fee" id="" class="form-control" placeholder="Enter Tender Fee">
                                    <span class="text-danger font-weight-bold">
                                        @error('tender_fee')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">EMD Fee :</label>
                                    <input type="text" name="emd_fee" id="" class="form-control" placeholder="Enter EMD Fee">
                                    <span class="text-danger font-weight-bold">
                                        @error('emd_fee')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tender Status<span class="text-danger text-bold">*</span>:</label>
                                    <select name="tender_status" id="" class="form-control">
                                        <option value="Not Opening">Not Opening</option>
                                        <option value="Under Technical Evalution">Under Technical Evalution</option>
                                        <option value="Under Commercial Evalution">Under Commercial Evalution</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Rejected Commercial">Rejected Commercial</option>
                                        <option value="admitted">admitted</option>
                                        <option value="admitted &Poreceived">admitted &Poreceived</option>
                                    </select>
                                    <span class="text-danger font-weight-bold">
                                        @error('tender_status')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Quoted Value<span class="text-danger text-bold">*</span>:</label>
                                    <input type="text" name="quoted_value" id="" class="form-control" placeholder="Enter Quoted Value">
                                    <span class="text-danger font-weight-bold">
                                        @error('quoted_value')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Work Details<span class="text-danger text-bold">*</span>:</label>
                                    <input type="text" name="work_details" id="" class="form-control" placeholder="Enter Work Details">
                                    <span class="text-danger font-weight-bold">
                                        @error('work_details')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Remark<span class="text-danger text-bold">*</span>:</label>
                                    <input type="text" name="remark" id="" class="form-control" placeholder="remark">
                                    <span class="text-danger font-weight-bold">
                                        @error('remark')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Client Address<span class="text-danger text-bold">*</span>:</label>
                                <input type="text" name="client_address" class="form-control" id="" placeholder="">
                                <span class="text-danger font-weight-bold">
                                    @error('client_address')
                                    {{$message}}
                                    @enderror
                                </span>
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
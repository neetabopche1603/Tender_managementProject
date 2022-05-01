@extends('layout.app')
@section('title','Tender')
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
          <h4 class="float-left text-light">Tender's</h4>
          <a href="{{route('tender.add.form')}}" class="btn btn-warning btn-sm float-right mb-2"><i class="fa fa-plus"></i> Add Tender</a>
        </div>
        <div class="card-body shadow p-3 mb-5 bg-white rounded">
          <div class="table-responsive table-responsive-lg table-responsive-sm table-responsive-md">
            <table class="table table-bordered text-center" id="user_register" style="width: 100%;">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Quotation No</th>
                  <th>Tender No</th>
                  <th>Tender Publish Date</th>
                  <th>Tender Type</th>
                  <th>Client Name</th>
                  <th>Client Address</th>
                  <th>Bid Submitted Date</th>
                  <th> Bid Opening Date</th>
                  <th>Tender Fee</th>
                  <th>Emd Fee</th>
                  <th>Tender Status</th>
                  <th>Quoted Value</th>
                  <th>Work Details</th>
                  <th>Remark</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach ($tenders as $tender)
                <tr>
                  <td scope="row">{{$i++}}</td>
                  <td>{{$tender->quotation_no}}</td>
                  <td>{{$tender->tender_no}}</td>
                  <td>{{ \Carbon\Carbon::parse($tender->tender_publish_date)->format('d M Y')}}</td>
                  <td>{{$tender->tender_type}}</td>
                  <td>{{$tender->client_name}}</td>
                  <td>{{$tender->client_address}}</td>
                  <td>{{ \Carbon\Carbon::parse($tender->bid_submitted_date)->format('d M Y')}}</td>

                  <td>{{\Carbon\Carbon::parse($tender->bid_opening_date)->format('d M Y')}}</td>

                  <td>{{$tender->tender_fee}}</td>
                  <td>{{$tender->emd_fee}}</td>
                  <td>{{$tender->tender_status}}</td>
                  <td>{{$tender->quoted_value}}</td>
                  <td>{{$tender->work_details}}</td>
                  <td>{{$tender->remark}}</td>
                 <td>
                 <a href="{{route('tender.delete',$tender->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure Delete this Tender')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
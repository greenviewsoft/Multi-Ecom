@extends('dashboard')
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Return Order Page
                </div>
            </div>
        </div>
        <div class="page-content pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
<div class="row">

<!-- // Start Col md 3 menu -->
@include('frontend.body.dashboard_sidebar_menu')

<!-- // End Col md 3 menu -->




<div class="col-md-9">
<div class="tab-content account dashboard-content pl-50">
<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Your Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" style="background:#ddd;font-weight: 600;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Order Amount</th>
                            <th>Payment Method</th>
                            <th>Invoice</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key=> $order)

    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->amount }}</td>
         <td>{{ $order->payment_method }}</td>
       <td>{{ $order->invoice_no }}</td>
       <td>{{ $order->return_reason }}</td>
       <td>
@if($order->return_order == 0)

<span class="badge rounded-pill bg-warning">No Return Request</span>

@elseif($order->return_order == 1)
<span class="badge rounded-pill bg-danger">Pending</span>

@elseif($order->return_order == 2)

<span class="badge rounded-pill bg-success">Success</span>


@endif


       </td>
                            <td><a href="{{ url('user/orders_details/'.$order->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"> </i> View</a>
                             <a href="{{ url('user/invoice_download/'.$order->id) }}" class="btn-sm btn-danger"><i class="fa fa-download"> </i> Invoice</a>

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





                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection

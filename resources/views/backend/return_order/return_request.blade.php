@extends('admin.admin_dashboard')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Return Order</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Return Order</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
<tr>
    <th>Sl</th>
    <th>Date</th>
    <th>Invoice </th>
    <th>Amount </th>
    <th>Payment </th>
    <th>Status </th>
    <th>Reason </th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($order as $key => $item)
<tr>
    <td> {{ $key+1 }} </td>
    <td>{{ $item->order_date }}</td>
     <td>{{ $item->invoice_no ?? 'not-exist' }}</td>
     <td>{{ $item->amount }}</td>
      <td>{{ $item->payment_method }}</td>

  @if($item->return_order == 1)

  <td> <span class="badge rounded-pill bg-danger">Pending</span></td>

      @elseif($item->return_order == 2)
      <td> <span class="badge rounded-pill bg-succes">Succes</span></td>
      @endif
      <td>{{ $item->return_reason }}</td>
    <td>
<a href="{{ route('admin.order.details',$item->id) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"> </i></a>
<a href="{{ route ('return.request.approved',$item->id) }}" class="btn btn-danger" id="approved" title="Approved"><i class="fa-solid fa-person-circle-check"> </i></a>



    </td>
</tr>
@endforeach


</tbody>
<tfoot>

</tfoot>
</table>
            </div>
        </div>
    </div>



</div>




@endsection

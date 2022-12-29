@extends('admin.admin_dashboard')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All User</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
           <a href="{{ route('add.category') }}" class="btn btn-primary">Add User</a>
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
    <th> Name </th>
    <th> Image </th>
    <th>Email </th>
    <th>Phone</th>
    <th>Status </th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($AllUser as $key => $item)
<tr>
    <td> {{ $key+1 }} </td>
     <td> {{ $item->name }}  </td>
                    <td> 

<img src="{{ (!empty($item->photo)) ? url('upload/user_images/'.$item->photo):url('upload/no_image.jpg') }}"   alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

                    </td>
               
                <td> {{ $item->email }}  </td>
                <td> {{ $item->phone }}  </td>

     <td><span class="badge badge-pill bg-success">{{ $item->status }}</span> </td>

    <td>
<a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('delete.category',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>

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

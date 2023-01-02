@extends('admin.admin_dashboard')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Blog Post</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog Post</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
           <a href="{{ route('add.blog.Post') }}" class="btn btn-primary">Add Blog Post</a>
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
    <th>Post Category </th>
    <th>Post Image </th>
    <th>Post Title </th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($blogpost as $key => $item)
<tr>
    <td> {{ $key+1 }} </td>
    <td>{{ $item->category_id }}</td>
    <td> <img src="{{ asset($item->post_image) }}" style="width: 70px; height:40px;" >  </td>
 <td>{{ $item->post_title }}</td>
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

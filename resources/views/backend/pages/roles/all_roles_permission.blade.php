@extends('admin.admin_dashboard')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Role & Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Role & Permission
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
           <a href="{{ route('add.roles') }}" class="btn btn-primary">Add Role</a>
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
    <th>Role Name </th>
    <th>Premission</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($roles as $key => $item)
<tr>
    <td> {{ $key+1 }} </td>
    <td>{{ $item->name  }}</td>

    <td>
        @foreach($item->permissions as $perm)
        <span class="badge rounded-pill bg-danger"> {{ $perm->name }}</span>
        @endforeach

    </td>

    <td>
<a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('admin.delete.roles',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>

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

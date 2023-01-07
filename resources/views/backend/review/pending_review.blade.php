@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pending Review</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pending Review</li>
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
                <th>image </th>
                <th>Product </th>
                <th>User </th>
				<th>Comment </th>
				<th>Rating </th>
				<th>Status </th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	@foreach($review as $key => $item)
			<tr>
				<td> {{ $key+1 }} </td>
                <td>  <img src="{{ asset($item['product']['product_thambnail']) }}" style="width: 40px; height:40px;">  </td>
                <td>{{Str::limit($item['product']['product_name'], 48)  }}</td>
                <td>{{ $item['user']['name'] }}</td>
				<td>{{Str::limit($item->comment,25)  }}</td>
				<td>
			@if($item->rating == NULL)
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 1)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 3)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 3)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 4)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 5)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>

			@endif
					 </td>
					 <td>
					 	@if($item->status == 0)
 	<span class="badge rounded-pill bg-warning">Pending</span>
					 	@elseif($item->status == 1)
 <span class="badge rounded-pill bg-warning">Publish</span>
					 	@endif
					 </td>

				<td>
<a href="{{ route('review.aprove',$item->id) }}" class="btn btn-danger">Approve</a>


				</td>
			</tr>
			@endforeach


		</tbody>

	</table>
						</div>
					</div>
				</div>



			</div>




@endsection

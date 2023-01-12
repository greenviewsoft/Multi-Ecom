@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Roles Permission </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Roles Permission </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">

<div class="col-lg-10">
	<div class="card">
		<div class="card-body">

		<form id="myForm" method="post" action="{{ route('store.roles') }}">
			@csrf

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Roles Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<select class="form-select mb-3" aria-label="Default select example">
                        <option selected="">Open this select menu</option>
                        @foreach ($roles as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
				</div>
			</div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                <label class="form-check-label" for="flexCheckDefaultAll">Permission All</label>
            </div>

            <hr>
            @foreach($permission_groups as $group)
            <div class="row" >
                <div class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
                    </div>
                </div>
                <div class="col-9">
                    @php
$permissions = App\Models\User::getpermissionByGroupName($group->group_name);
@endphp

	@foreach($permissions as $permission)
   <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">{{ $permission->name }}</label>
                    </div>
                    @endforeach
		<br>
                </div>
            </div>
           {{-- // end row --}}
           @endforeach
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" value="Add Now" />
				</div>
			</div>
		</div>

		</form>



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>


            <script type="text/javascript">
                $('#flexCheckDefaultAll').click(function(){
                    if ($(this).is(':checked')) {
                        $('input[type = checkbox]').prop('checked',true);
                    }else{
                        $('input[type = checkbox]').prop('checked',false);
                    }
                });
            </script>
@endsection

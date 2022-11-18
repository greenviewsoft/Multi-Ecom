@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('update.product') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="{{ $products->id }}">
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border-3 rounded border p-4">

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="inputProductTitle">Product Name</label>
                                        <input class="form-control" id="inputProductTitle" name="product_name"
                                            type="text" value="{{ $products->product_name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputProductTitle">Product Tags</label>
                                        <input class="form-control visually-hidden" name="product_tags"
                                            data-role="tagsinput" type="text" value="{{ $products->product_tags }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputProductTitle">Product Size</label>
                                        <input class="form-control visually-hidden" name="product_size"
                                            data-role="tagsinput" type="text" value="{{ $products->product_size }} ">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputProductTitle">Product Color</label>
                                        <input class="form-control visually-hidden" name="product_color"
                                            data-role="tagsinput" type="text" value="{{ $products->product_color }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="inputProductDescription">Short Description</label>
                                        <textarea class="form-control" id="inputProductDescription" name="short_descp" rows="3">
        {{ $products->short_descp }}
				</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputProductDescription">Long Description</label>
                                        <textarea id="mytextarea" name="long_descp">
				 {!! $products->long_descp !!}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border-3 rounded border p-4">
                                    <div class="row g-3">

                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="inputPrice">Product Price</label>
                                            <input class="form-control" id="inputPrice" name="selling_price" type="text"
                                                value="{{ $products->selling_price }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputCompareatprice">Discount Price </label>
                                            <input class="form-control" id="inputCompareatprice" name="discount_price"
                                                type="text" value="{{ $products->discount_price }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="inputCostPerPrice">Product Code</label>
                                            <input class="form-control" id="inputCostPerPrice" name="product_code"
                                                type="text" value="{{ $products->product_code }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="inputStarPoints">Product Quantity</label>
                                            <input class="form-control" id="inputStarPoints" name="product_qty"
                                                type="text" value="{{ $products->product_qty }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label class="form-label" for="inputProductType">Product Brand</label>
                                            <select class="form-select" id="inputProductType" name="brand_id">
                                                <option></option>
                                                @foreach ($brands as $brand)
                                                    <option
                                                        value="{{ $brand->id }}"{{ $brand->id == $products->brand_id ? 'selected' : '' }}>
                                                        {{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label class="form-label" for="inputVendor">Product Category</label>
                                            <select class="form-select" id="inputVendor" name="category_id">
                                                <option></option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $cat->id == $products->category_id ? 'selected' : '' }}>
                                                        {{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label class="form-label" for="inputCollection">Product SubCategory</label>
                                            <select class="form-select" id="inputCollection" name="subcategory_id">
                                                <option></option>
                                                @foreach ($subcategory as $subcat)
                                                    <option value="{{ $subcat->id }}"
                                                        {{ $subcat->id == $products->subcategory_id ? 'selected' : '' }}>
                                                        {{ $subcat->subcategory_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label" for="inputCollection">Select Vendor</label>
                                            <select class="form-select" id="inputCollection" name="vendor_id">
                                                <option></option>
                                                @foreach ($activeVendor as $vendor)
                                                    <option value="{{ $vendor->id }}"
                                                        {{ $vendor->id == $products->vendor_id ? 'selected' : '' }}>
                                                        {{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">

                                            <div class="row g-3">

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="flexCheckDefault"
                                                            name="hot_deals" type="checkbox" value="1"
                                                            {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault"> Hot
                                                            Deals</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="flexCheckDefault"
                                                            name="featured" type="checkbox" value="1"
                                                            {{ $products->featured == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="flexCheckDefault">Featured</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="flexCheckDefault"
                                                            name="special_offer" type="checkbox" value="1"
                                                            {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">Special
                                                            Offer</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="flexCheckDefault"
                                                            name="special_deals" type="checkbox" value="1">
                                                        <input class="form-check-input" id="flexCheckDefault"
                                                            name="special_deals" type="checkbox" value="1"
                                                            {{ $products->special_deals == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div>

                                            </div> <!-- // end row  -->

                                        </div>

                                        <hr>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <input class="btn btn-primary px-4" type="submit" value="Update" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
            </div>

            </form>

        </div>

    </div>

    {{-- //// Main Thabonail Update Image //// --}}
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Update Main Image Thumbnail</h6>
        <hr>
        <div class="card">
            <form  method="post" action="{{ route('update.product.thobonail') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $products->id }}">
                <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="formFile">Chose Thobonail Image</label>
                    <input name="product_thambnail" class="form-control" id="formFile" type="file">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="formFile"></label>
                   <img src="{{ asset($products->product_thambnail) }}" style="width:100px; height:100px "> </img>
                </div>
                <input class="btn btn-primary px-4" type="submit" value="Update" />
            </div>
        </form>

        </div>

    </div>

    {{-- //// Main Thabonail Update end //// --}}


        {{-- //// Multi Image Update  Start  //// --}}
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Update Multi Image</h6>
            <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-striped">
                <thead>


                    <tr>
                        <th scope="col">#Sl</th>
                        <th scope="col">image</th>
                        <th scope="col">Change</th>
                        <th scope="col">Delete</th>
                    </tr>

                </thead>
                <tbody>

                    <form method="post" action="{{ route('update.product.multiimage') }}" enctype="multipart/form-data" >
                        @csrf
                    @foreach ($multyImg as $key => $item)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td><img src="{{ asset($item->photo_name) }}" style="width: "width="70px;" height="40px;"> </td>
            <td> <input type="file" class="form-group" name="multi_img[{{ $item->id }}]"> </td>


            <td>
                <input type="submit" class="btn btn-primary px-4" value="Update Image " />
<a href="{{ route('delete.product.multiimage',$item->id) }}" id="delete" class="btn btn-danger"> Delete </a>

            </td>
        </tr>
        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

        {{-- //// Multi Image Update end //// --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    product_name: {
                        required: true,
                    },
                    short_descp: {
                        required: true,
                    },
                    product_thambnail: {
                        required: true,
                    },
                    multi_img: {
                        required: true,
                    },
                    selling_price: {
                        required: true,
                    },
                    product_code: {
                        required: true,
                    },
                    product_qty: {
                        required: true,
                    },
                    brand_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    subcategory_id: {
                        required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please Enter Product Name',
                    },
                    short_descp: {
                        required: 'Please Enter Short Description',
                    },
                    product_thambnail: {
                        required: 'Please Select Product Thambnail Image',
                    },
                    multi_img: {
                        required: 'Please Select Product Multi Image',
                    },
                    selling_price: {
                        required: 'Please Enter Selling Price',
                    },
                    product_code: {
                        required: 'Please Enter Product Code',
                    },
                    product_qty: {
                        required: 'Please Enter Product Quantity',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection

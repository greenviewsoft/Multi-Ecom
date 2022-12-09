<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>My Shop Online Store</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
</head>

<body>
    <!-- Modal -->

    <!-- Quick view -->
   @include('frontend.body.quickview')
    <!-- Header  -->



@include('frontend.body.header')
   <!-- End Header  -->



    <main class="main">

        @yield('main')




    </main>

@include('frontend.body.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>






    <script type="text/javascript">

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        /// Start product view with Modal

        function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType: 'json',
            success:function(data){
                // console.log(data)

$('#pname').text(data.product.product_name);
$('#pprice').text(data.product.selling_price);
$('#pcode').text(data.product.product_code);
$('#pcategory').text(data.product.category.category_name);
$('#pbrand').text(data.product.brand.brand_name);
$('#pimage').attr('src','/'+data.product.product_thambnail );
$('#product_Id').val(id);
$('#qty').val(1);


// product price
if(data.product.discount_price == null ){
 $('#pprice').text('');
 $('#oldprice').text('');
 $('#pprice').text(data.product.selling_price);


}else{

 $('#pprice').text(data.product.discount_price);
 $('#oldprice').text(data.product.selling_price);

} // end else




/// start  stock options

if(data.product.product_qty > 0){
    $('#aviable').text('');
    $('#stockout').text('');
    $('#aviable').text('aviable');
}else {

    $('#aviable').text('');
    $('#stockout').text('');
    $('#stockout').text('stockout');
}
/// end  stock options


/// start   size options
$('select[name="size"]').empty();
$.each(data.size,function(key,value){

    $('select[name="size"]').append('<option value="'+value+' ">'+value+' </option ')
        if(data.size == ""){
  $('#sizeArea').hide();

        }else{

            $('#sizeArea').show();
        } //end else
}) // end size




/// start   color options
$('select[name="color"]').empty();
$.each(data.color,function(key,value){

    $('select[name="color"]').append('<option value="'+value+' ">'+value+' </option ')
        if(data.color == ""){
  $('#colorAreya').hide();

        }else{

            $('#colorAreya').show();
        } //end else
}) // end color


/// end  stock options


            }
        })
    }
// end product view with Modal

//// Start Add to Cart product

function addToCart(){
     var product_name = $('#pname').text();
     var id = $('#product_Id').val();
     var color = $('#color option:selected').text();
     var size = $('#size option:selected').text();
     var quantity = $('#qty').val();
     $.ajax({
        type: "POST",
        dataType : 'json',
        data:{
            color:color, size:size, quantity:quantity,product_name:product_name
        },
        url: "/cart/data/store/"+id,
        success:function(data){
            miniCart();
             $('#closeModal').click();
            console.log(data)



            /// start message

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        icon: 'success',
        showConfirmButton: false,
        timer: 3000
    })

    if ($.isEmptyObject(data.error)) {
        Toast.fire({
            type: 'success',
           title: data.success,
})

}else{
    Toast.fire({
        type: 'error',
        title: data.error,
})
}
 /// end message

        }
     })
    }

//// end Add to Cart product



//// Start Details Add to Cart product

function addToCartDetails(){
     var product_name = $('#dpname').text();
     var id = $('#dproduct_Id').val();
     var color = $('#dcolor option:selected').text();
     var size = $('#dsize option:selected').text();
     var quantity = $('#dqty').val();
     $.ajax({
        type: "POST",
        dataType : 'json',
        data:{
            color:color, size:size, quantity:quantity,product_name:product_name
        },
        url: "/dcart/data/store/"+id,
        success:function(data){
            miniCart();

            //console.log(data)



            /// start message

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        icon: 'success',
        showConfirmButton: false,
        timer: 3000
    })

    if ($.isEmptyObject(data.error)) {
        Toast.fire({
            type: 'success',
           title: data.success,
})

}else{
    Toast.fire({
        type: 'error',
        title: data.error,
})
}
 /// end message

        }
     })
    }

//// end  Details Add to Cart product


     </script>



////// Start Mini Cart ///////

<script type="text/javascript">


function miniCart(){
    $.ajax({
        type: 'GET',
        url: '/product/mini/cart',
        dataType: 'json',
        success:function(response){
            //  console.log(response)

            $('span[id="cartSubTotal"]').text(response.cartTotal);
            $('#cartQty').text(response.cartQty)

            var miniCart = ""
        $.each(response.carts, function(key,value){
           miniCart += ` <ul>
            <li>
                <div class="shopping-cart-img">
                    <a href="shop-product-right.html"><img alt="Nest" src="/${value.options.image} " style="width:50px;height:50px;" /></a>
                </div>
                <div class="shopping-cart-title" style="margin: -73px 74px 14px; width" 146px;>
                    <h4><a href="shop-product-right.html"> ${value.name} </a></h4>
                    <h4><span>${value.qty} × </span>${value.price}</h4>
                </div>
                <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"  ><i class="fi-rs-cross-small"></i></a>

                </div>
            </li>
        </ul>
        <hr><br>
               `
          });
            $('#miniCart').html(miniCart);
        }
    })
 }
  miniCart();


/// Mini Cart Remove Start
function miniCartRemove(rowId){
     $.ajax({
        type: 'GET',
        url: '/minicart/product/remove/'+rowId,
        dataType:'json',
        success:function(data){
        miniCart();
             // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }
              // End Message
        }
     })
   }
    /// Mini Cart Remove End

</script>


/// Wise List Start

<script type="text/javascript">

function addToWishList(product_id){
    $.ajax({
        type: 'POST',
        url: '/product/wishlist/add/'+product_id,
        dataType:'json',
        success:function(data){
             // Start Message
             const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message
        }
        })
    }

</script>

/// Wise List End





//// End Mini Cart ///////
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></scrip>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></scrip>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

</body>

</html>

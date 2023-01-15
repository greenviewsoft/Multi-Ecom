<!DOCTYPE html>
<html class="no-js" lang="en">

@php
$seo =  App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title>   @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_descripion }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/plugins/slider-range.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />

    <script src="https://js.stripe.com/v3/"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
$('#pvendor_id').text(data.product.vendor_id);
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
     var vendor = $('#pvendor_id').text();
     var color = $('#color option:selected').text();
     var size = $('#size option:selected').text();
     var quantity = $('#qty').val();
     $.ajax({
        type: "POST",
        dataType : 'json',
        data:{
            color:color, size:size, quantity:quantity,product_name:product_name,vendor:vendor
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
     var vendor = $('#vproduct_id').val();
     var quantity = $('#dqty').val();
     $.ajax({
        type: "POST",
        dataType : 'json',
        data:{
            color:color, size:size, quantity:quantity,product_name:product_name,vendor:vendor
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



{{-- Start Mini Cart --}}

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


// Mini Cart Remove Start

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



<!--Start Load MY Cart-->
<script type="text/javascript">
    function cart(){
   $.ajax({
       type: 'GET',
       url: '/get-cart-product',
       dataType: 'json',
       success:function(response){
           // console.log(response)
           cart();
           miniCart();
       var rows = ""
       $.each(response.carts, function(key,value){
          rows += `<tr class="pt-30">
           <td class="custome-checkbox pl-30">

           </td>
           <td class="image product-thumbnail pt-40"><img src="/${value.options.image} " alt="#"></td>
           <td class="product-des product-name">
               <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name} </a></h6>

           </td>
           <td class="price" data-title="Price">
               <h4 class="text-body">$${value.price} </h4>
           </td>
             <td class="price" data-title="Price">
             ${value.options.color == null
               ? `<span>.... </span>`
               : `<h6 class="text-body">${value.options.color} </h6>`
             }
           </td>
              <td class="price" data-title="Price">
             ${value.options.size == null
               ? `<span>.... </span>`
               : `<h6 class="text-body">${value.options.size} </h6>`
             }
           </td>
           <td class="text-center detail-info" data-title="Stock">
               <div class="detail-extralink mr-15">
                   <div class="detail-qty border radius">
                    <a type="submit" class="qty-down" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fi-rs-angle-small-down"></i></a>

     <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                       <a type="submit" class="qty-up"  id="${value.rowId}" onclick="cartIecrement(this.id)"><i class="fi-rs-angle-small-up"></i></a>
                   </div>
               </div>
           </td>
           <td class="price" data-title="Price">
               <h4 class="text-brand">$${value.subtotal} </h4>
           </td>
           <td class="action text-center" data-title="Remove">
            <a type="submit" class="text-body"  id="${value.rowId}" onclick="RemoveCart(this.id)"><i class="fi-rs-trash"></i></a></td>
       </tr>`
         });
           $('#cartPage').html(rows);
       }
   })
}
 cart();

// End Load MY Cart


// Cart Remove Start
function RemoveCart(id){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cart-remove/"+id,
                success:function(data){
                    cart();
                    couponCalculation();
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
// Cart Remove End



// Cart increment Start
function cartIecrement(rowId){
    $.ajax({
        type: 'GET',
        url: "/cart-increment/"+rowId,
        dataType: 'json',
        success:function(data){

            couponCalculation();
            cart();
            miniCart();
        }
    });
 }

// Cart increment end



// Cart Decrement Start
function cartDecrement(rowId){
    $.ajax({
        type: 'GET',
        url: "/cart-decrement/"+rowId,
        dataType: 'json',
        success:function(data){
            couponCalculation();
            cart();
            miniCart();
        }
    });
 }
// Cart Decrement End


</script>

{{-- Wishlist Start --}}

<script type="text/javascript">

function addToWishList(product_id){
    $.ajax({
        type: 'POST',
        url: '/product/wishlist/add/'+product_id,
        dataType:'json',
        success:function(data){
            wishlist();
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

{{-- Wishlist  End --}}


{{-- // Wishlist Data Load Start --}}

<script type="text/javascript">

function wishlist(){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product/",
                success:function(response){

                    $('#wishQty').text(response.wishQty);

                    var rows = ""
                   $.each(response.wishlist, function(key,value){
        rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">

                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`
                        }

                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`
                            }

                        </td>

                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"  ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `
       });
       $('#wishlist').html(rows);

                }
            })
        }
        wishlist();
     // Wishlist load data End




        // Wishlist Remove Start
function wishlistRemove(id){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/"+id,
                success:function(data){
                wishlist();
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
 // Wishlist Remove End
</script>




<!--  /// Start Compare Add -->
<script type="text/javascript">

    function addToCompare(product_id){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-compare/"+product_id,
            success:function(data){
                compare();

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
<!--  /// End Compare Add -->


<!--  /// Load Compare Data -->
<script type="text/javascript">

    function compare(){
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-compare-product/",
                    success:function(response){

                        $('#compareQty').text(response.compareQty);

                        var rows = ""
                       $.each(response.compare, function(key,value){
            rows += `<tr class="pt-30">
                            <td class="custome-checkbox pl-30">

                            </td>
                            <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                            ${value.product.discount_price == null
                            ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                            :`<h3 class="text-brand">$${value.product.discount_price}</h3>`
                            }

                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                ${value.product.product_qty > 0
                                    ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                                    :`<span class="stock-status out-stock mb-0">Stock Out </span>`
                                }

                            </td>

                            <td class="action text-center" data-title="Remove">
                                <a type="submit" class="text-body" id="${value.id}" onclick="RemoveCompare(this.id)"  ><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr> `
           });
           $('#Compare').html(rows);

                    }
                })
            }
    compare();

<!--  /// End  Load Compare Data -->

// Wishlist Remove Start
function RemoveCompare(id){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/compare-remove/"+id,
                success:function(data){
                    compare();
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
 // Wishlist Remove End
</script>


 {{-- End Mini Cart  --}}


<!-- applyCoupon Start-->


<script type="text/javascript">

function applyCoupon(){
     var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data:{coupon_name:coupon_name},
                url: "/cupon-apply/",
                success:function(data){
                    couponCalculation();
                    if (data.validity == true) {

                $('#couponField').hide();

                    }

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

<!-- applyCoupon End-->





 <!-- End Copun Calcalation Method-->

<script type="text/javascript">

 function couponCalculation(){
        $.ajax({
            type: 'GET',
            url: "/coupon-calculation",
            dataType: 'json',
            success:function(data){
            if (data.total) {

            $('#couponCalField').html(


                 `
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Subtotal</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.total}</h4>
                        </td>
                    </tr>

                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted"> Grand Total</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.total}</h4>
                        </td>
                    </tr>
                 `)

                  }else{
                   $('#couponCalField').html(

                    `

                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Subtotal</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.subtotal}</h4>
                        </td>
                    </tr>

                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted"> Coupon</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h6 class="text-brand text-end">${data.coupon_name}<a type="submit" onclick="couponRemove()" > <i class="fi-rs-trash">  </i> </a></h6>
                        </td>
                    </tr>

                     <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted"> Discount Amount</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.discount_amount}   </h4>
                        </td>
                    </tr>

                     <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted"> Grand Total</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.total_amount}</h4>
                        </td>
                    </tr>

                    `)



            }




            }
        })
     }


     couponCalculation();

</script>

<!-- End Copun Calcalation Method-->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></scrip>


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="assets/js/plugins/slider-range.js"></script>
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

<script type="text/javascript">
    // Coupon Remove Start
  function couponRemove(){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/coupon-remove",
                success:function(data){
                   $('#couponField').show();
                   couponCalculation();
                     // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,

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
// Coupon Remove End
</script>


</body>

</html>

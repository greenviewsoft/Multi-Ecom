 @php

 $SiteSetting = App\Models\siteSetting::find(1);

 @endphp

<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        {{-- <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span> --}}
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>

                            <li><a href="{{ url('/mycart') }}">My Cart</a></li>
                            <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('user.track.order') }}">Order Tracking</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>

                            <li>
                                <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-fr.png') }}" alt="" />Français</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-dt.png') }}" alt="" />Deutsch</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-ru.png') }}" alt="" />Pусский</a>
                                    </li>
                                </ul>
                            </li>

                             <li>Need help? Call Us:   <strong class="text-brand">   {{ $SiteSetting->support_phone }} </strong></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @php

 $SiteSetting = App\Models\siteSetting::find(1);

 @endphp

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{ asset($SiteSetting->logo) }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('product.search') }}" method="post">
                            @csrf

                            <select class="select-active">
                                <option>All Categories</option>
                                <option>Milks and Dairies</option>
                                <option>Wines & Alcohol</option>
                                <option>Clothing & Beauty</option>
                                <option>Pet Foods & Toy</option>
                                <option>Fast food</option>
                                <option>Baking material</option>
                                <option>Vegetables</option>
                                <option>Fresh Seafood</option>
                                <option>Noodles & Rice</option>
                                <option>Ice cream</option>
                            </select>
                            <input onfocus="search_result_show()" onblur="search_result_hide()" name="search" id="search" placeholder="Search for items..." />
                            <div id="searchProducts"></div>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                        <option>Bangladesh</option>
                                    </select>
                                </form>
                            </div>


                            <div class="header-action-icon-2">
                                <a href="{{ route('compare') }}">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                                    <span class="pro-count blue" id="compareQty">0</span>
                                </a>
                                <a href="{{ route('compare') }}"><span class="lable ml-0">Compare</span></a>
                            </div>

                <div class="header-action-icon-2">
                    <a href="{{ route('wishlist') }}">
                        <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                        <span class="pro-count blue"  id="wishQty">0</span>
                    </a>
                    <a href="{{ route('wishlist') }}"><span class="lable">Wishlist</span></a>
                </div>


                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('mycart') }}">
                                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue" id="cartQty" >0</span>
                                </a>
                                <a href="{{ route('mycart') }}"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                 <!--- start mini cart  with ajax--->

                                 <div id="miniCart">

                                </div>

                        <!--- end mini cart  with ajax--->

                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span id="cartSubTotal"> </span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ url('/mycart') }}" class="outline">View cart</a>
                                            <a href="{{ url('/checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>


                              @auth


                <a href="{{ url('/dashboard') }}"><span class="lable ml-0">Account</span></a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                        </li>
                        <li>
                            <a href="{{ route('user.track.order') }}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                        </li>
                        <li>
                            <a href="{{ route('user.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                        </li>
                    </ul>
                </div>



@else

<a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>
<span class="lable" style="margin-left: 2px; margin-right:2px;">|</span>
<a href="{{ route('register') }}"><span class="lable ml-0">Register</span></a>




                              @endauth




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@php
   $categories = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp



    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{ asset($SiteSetting->logo) }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span>AllCategories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach ($categories as $item)
                                  @if ($loop->index	< 5)



                                    <li>
                                        <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}"> <img src="{{ asset($item->category_image) }}" alt="" />{{$item->category_name  }}</a>

                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                <ul class="end">
                                    @foreach ($categories as $item)
                                    @if ($loop->index	> 4)

                                    <li>
                                        <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}"> <img src="{{ asset($item->category_image) }}" alt="" />{{$item->category_name  }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-1.svg') }}" alt="" />Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-2.svg') }}" alt="" />Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-3.svg') }}" alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>

                                <li>
                                    <a class="active" href="{{ url('/') }}">Home  </a>

                                </li>

                                {{-- mega menu category --}}
                                @php
                                $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
                                @endphp

                                @foreach ($categories as $item)
                                <li>
                                    <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}">{{ $item->category_name }} <i class="fi-rs-angle-down"></i></a>


                                    @php
                                    $subcategories = App\Models\SubCategory::where('category_id',$item->id)->orderBy('subcategory_name','ASC')->get();
                                    @endphp

                                            <ul class="sub-menu">
                                                @foreach($subcategories as $subcategory)
                                                <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach



                                <li>
                                    <a href="{{ url('/blog') }}"> Blog  </a>
                                </li>
                                <li>
                                    <a href="{{ url('/shop') }}"> Shop  </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>{{ $SiteSetting->support_phone }}<span>Main Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{ route('wishlist') }}">
                                <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count blue"  id="wishQty">0</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('mycart') }}">
                                <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count blue" id="cartQty2">0</span>
                            </a>
                            <a href="{{ route('mycart') }}"><span class="lable">Cart</span></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">

                             <!--- start mini cart  with ajax--->

                             <div id="miniCart2">

                            </div>

                    <!--- end mini cart  with ajax--->

                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span id="cartSubTotal"> </span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ url('/mycart') }}" class="outline">View cart</a>
                                        <a href="{{ url('/checkout') }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    #searchProducts{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>
<script>

function search_result_show(){
$('#searchProducts').slideDown();

}

function search_result_hide(){
    $('#searchProducts').slideUp();


}


</script>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="logo logo-width-1">
                <a href="/"><img src="{{ asset($SiteSetting->logo) }}" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="/">Home</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="/shop">shop</a>

                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">Mega menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Categorys</a>
                                    <ul class="dropdown">
                                        @php
                                                 $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
                                                 @endphp

                                                 @foreach ($categories as $item)
                                                 <li>
                                                     <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}">{{ $item->category_name }} <i class="fi-rs-angle-down"></i></a>


                                                     @php
                                                     $subcategories = App\Models\SubCategory::where('category_id',$item->id)->orderBy('subcategory_name','ASC')->get();
                                                     @endphp

                                                             <ul class="sub-menu">
                                                                 @foreach($subcategories as $subcategory)
                                                                 <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                                 @endforeach
                                                             </ul>
                                                         </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/blog') }}">Blog</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Personal Details</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/dashboard') }}">My Account</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                <li><a href="{{ url('/forgot-password') }}">Reset password</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            @php

            $SiteSetting = App\Models\siteSetting::find(1);

            @endphp

            <div class="mobile-header-info-wrap">

                <div class="single-mobile-header-info">
                    <a href="/register"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>{{ $SiteSetting->support_phone }} </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                    <a href="{{ $SiteSetting->facebook }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
    <a href="{{ $SiteSetting->twitter }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
        <a href="{{ $SiteSetting->youtube }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
            </div>
            <div class="site-copyright"> <strong class="text-brand">Green Shop</strong> -  {{ $SiteSetting->copyright }}</div>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>My Shop Reset Password</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" rel="shortcut icon" />
    <!-- Template CSS -->
    <link href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" rel="stylesheet" />
</head>

<body>

    @include('frontend.body.header')
    <!-- Header  -->

    <!-- End Header  -->

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                        <div class="row">
                            <div class="heading_s1">
                                <img class="border-radius-15"
                                    src="{{ asset('frontend/assets/imgs/page/reset_password.svg') }}" alt="" />
                                <h2 class="mb-15 mt-15">Password Reset </h2>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input name="token" type="hidden" value="{{ $request->route('token') }}">

                                            <div class="form-group">
                                                <input class="form-control" id="email_address" name="email"
                                                    type="text" value="{{ $request->email }}" required autofocus>

                                            </div>

                                            <div class="form-group">

                                                <input class="mt-1 block w-full" id="password" name="password"
                                                    type="password" type="password" placeholder="New Password" required autofocus />

                                            </div>

                                            <div class="form-group">

                                                <input id="password_confirmation" name="password_confirmation"
                                                    type="password" placeholder="Confram New Password" required autofocus/>

                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-heading btn-block hover-up" name="login"
                                                    type="submit">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('frontend.body.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/imgs/theme/loading.gif') }}" alt="" />
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
    <script src="{{ asset('frontend/') }}assets/js/shop.js?v=5.3"></script>
</body>

</html>

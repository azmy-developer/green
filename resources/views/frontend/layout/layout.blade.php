<!doctype html>
<html class="no-js"  lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl' :'ltr'}}">
@php($setting = \App\Models\Setting::first())
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if($setting && $setting->title !=null)
        <title>{{$setting->title}}</title>
    @else
        <title>{{'app'}}</title>
    @endif
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/assets/img/favicon.png')}}">
    @if($setting && $setting->image !=null)
        <link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->image)}}">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/assets/img/favicon.png')}}">
    @endif
    <!-- all css here -->
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">

    <script src="{{asset('front/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

    @if(app()->getLocale() == "ar")
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap-rtl.min.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body,.main-menu ul li a,
            .footer-title > h4,
            .banner-content > h4,
            h4,h3,h2,h1,h5,h6,p,a,span,
            .slider-content h1,
            .subscribe-form form .submit-button input{

                font-family: 'Cairo';
            }
            .shopping-cart-content{
                left:0;
                right:auto!important
            }
            .shopping-cart-total > h4 span{
                float:left
            }
            .subscribe-form form .submit-button input{
                left:0;
                right:auto
            }
            .main-menu nav > ul > li > ul.submenu{
                right:0;
                left:auto!important
            }
            .breadcrumb-content li::before {
                background-color: #aaaaaa;
                content: "";
                height: 2px;
                margin: 11px 0;
                position: absolute;
                right: auto;
                left: 0;
                top: 0;
                transform: rotate(-67deg);
                transition: all 0.4s ease 0s;
                width: 14px;
            }
            .breadcrumb-content li a {
                color: #fff;
                margin-inline-end: 20px;
            }
            .main-menu nav > ul > li:last-child {
                padding-right: 45px;
                padding-left: 0px;
            }
            .header-currency {
                display: inline-block;
                position: relative;
                padding: 0 63px;
            }
            .dollar-submenu,.main-menu ul li ul li a{
                text-align: right;
            }
        </style>
    @endif
    @stack('style')
</head>
<body>
<!-- header start -->
@include('frontend.layout.navbar')
<!-- header end -->
@yield('content')
<!-- Footer style Start -->
<footer class="footer-area pt-75 gray-bg-3">
    <div class="footer-top gray-bg-3 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>My Account</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="about-us.html">Order History</a></li>
                                <li><a href="wishlist.html">WishList</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="about-us.html">Order History</a></li>
                                <li><a href="#">International Orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Information</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Quick Links</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Term & Conditions</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">FAQS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget footer-widget-red footer-black-color mb-40">
                        <div class="footer-title mb-25">
                            <h4>{{__('front.contact')}}</h4>
                        </div>
                        <div class="footer-about">
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>{{$setting->phone1}}</li>
                                    <li>{{$setting->phone2}}</li>
                                </ul>
                            </div>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>{{$setting->email}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pb-25 pt-25 gray-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p class="copy-text"> © 2022 <strong>SabujCha</strong> Made With <i class="fa fa-heart" style="color:red" aria-hidden="true"></i> By <a class="company-name" href="https://themeforest.net/user/codecarnival/portfolio">
                                <strong> CodeCarnival</strong></a>.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-img f-right">
                        <a href="#">
                            <img alt="" src="{{asset('front/assets/img/icon-img/payment.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer style End -->

<!-- all js here -->
<script src="{{asset('front/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('front/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('front/assets/js/ajax-mail.js')}}"></script>
<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/assets/js/plugins.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>
@stack('script')
</body>
</html>

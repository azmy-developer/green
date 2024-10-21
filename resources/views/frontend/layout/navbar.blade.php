<!-- header start -->
<header class="header-area gray-bg clearfix">
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            @if($setting && $setting->image !=null)
                                <link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->image)}}">
                            @else
                                <img alt="" src="{{asset('front/assets/img/logo/logo.png')}}">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-6">
                    <div class="header-bottom-right">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="top-hover"><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                                    <li><a href="{{route('front.about')}}">{{__('front.about')}}</a></li>

                                    <li class="top-hover"><a href="{{route('front.company.index')}}">{{__('front.Company')}}</a>
                                        <ul class="submenu">
                                            @foreach(\App\Models\Company::all() as $company)
                                            <li><a href="{{route('front.company.product.show',$company->id)}}">{{$company->name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>

                                    <li class="top-hover"><a href="{{route('front.blog.index')}}">{{__('front.Blog')}}</a></li>

                                    <li><a href="{{route('front.contact.index')}}">{{__('front.contact')}}</a></li>
                                </ul>
                            </nav>
                        </div>
                        @php($lang = \App\Models\Language::where('code',App::getLocale())->first())

                        <div class="header-currency">
                            <span class="digit"><img id="header-lang-img" src="{{asset($lang->flag)}}" alt="Header Language" height="16"></span>

                            <div class="dollar-submenu">
                                @php($langs = \App\Models\Language::get())

                                <!-- item-->
                                @foreach($langs as $key => $lang)
                                    <li><a href="{{ route('language.change','locale='.$lang->code) }}" data-language="{{$lang->code}}" class="dropdown-item notify-item language" data-lang="{{$lang->code}}">
                                            <img src="{{asset($lang->flag)}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">{{$lang->name}}</span>
                                        </a></li>
                                @endforeach

                            </div>
                        </div>
                        <div class="header-cart">
                            <a href="#">
                                <div class="cart-icon">
                                    <i class="ti-shopping-cart"></i>
                                </div>
                            </a>
                            <div class="shopping-cart-content">
                                <ul>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Phantom Remote </a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="ion ion-close"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Phantom Remote</a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="ion ion-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-total">
                                    <h4>Shipping : <span>$20.00</span></h4>
                                    <h4>Total : <span class="shop-total">$260.00</span></h4>
                                </div>
                                <div class="shopping-cart-btn">
                                    <a href="cart-page.html">view cart</a>
                                    <a href="checkout.html">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                            <li><a href="{{route('front.about')}}">{{__('front.about')}}</a></li>

                            <li class="top-hover"><a href="{{route('front.company.index')}}">{{__('front.Company')}}</a>
                                <ul class="submenu">
                                    @foreach(\App\Models\Company::all() as $company)
                                        <li><a href="{{route('front.category.show',$company->id)}}">{{$company->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>

                            <li><a href="{{route('front.blog.index')}}">{{__('front.Blog')}}</a></li>

                            <li><a href="{{route('front.contact.index')}}">{{__('front.contact')}}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

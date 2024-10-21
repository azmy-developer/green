@extends('frontend.layout.layout')

@section('content')
    <!-- Slider Start -->
    <div class="slider-area">
        <div class="slider-active owl-dot-style owl-carousel">
            @foreach($sliders as $slider)
                <div class="single-slider ptb-240 bg-img" style="background-image:url({{asset('images/slider/'.$slider->image)}});">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated">{{$slider->title}}</h1>
                            {!! $slider->text !!}
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <!-- Slider End -->
    <!-- Product Area Start -->
    <div class="product-area bg-image-1 pt-100 pb-95">
        <div class="container">
            <div class="featured-product-active hot-flower owl-carousel product-nav">
                @foreach($companies as $company)
                    <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{route('front.company.show',$company->id)}}">
                            <img alt="" src="{{asset('company/'.$company->image)}}">
                        </a>
                    </div>
                    <div class="product-content text-left">
                        <div class="product-hover-style">
                            <div class="product-title">
                                <h4>
                                    <a href="{{route('front.company.show',$company->id)}}">{{$company->name}}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Product Area End -->
    <!-- Banner Start -->
    <div class="banner-area pt-100 pb-70">
        <div class="container">
            <div class="banner-wrap">
                <div class="row">
                    @foreach($offers as $offer)
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner img-zoom mb-30">
                            <a href="#">
                                <img src="{{asset('images/offer/'.$offer->image)}}" alt="">
                            </a>
                            <div class="banner-content">
                                <h4>-{{$offer->discount}}% {{__('front.Sale')}}</h4>
                                <h5>{{$offer->name}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- New Products Start -->
    <div class="product-area gray-bg pt-90 pb-65">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">{{__('front.NewProducts')}}</h3>
                </div>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active">
                    <div class="featured-product-active owl-carousel product-nav">
                        @foreach($products as $product)
                            <div class="product-wrapper-single">

                                <div class="product-wrapper mb-30">
                                    <div class="product-img">
                                        <a href="{{route('front.product.detail',$product->id)}}">
                                            <img alt="{{$product->name}}" src="{{asset('product/'.$product->image)}}">
                                        </a>
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="{{route('front.product.detail',$product->id)}}">{{$product->name}}</a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                <h4><a href="{{route('front.product.detail',$product->id)}}">+ Add to cart</a></h4>
                                            </div>
                                        </div>
                                        <div class="product-price-wrapper">
                                            <span>{{$product->price}} </span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- New Products End -->
    <!-- News Area Start -->
        <div class="blog-area bg-image-1 pt-90 pb-70">
            <div class="container">
                <div class="product-top-bar section-border mb-55">
                    <div class="section-title-wrap text-center">
                        <h3 class="section-title">{{__('front.LatestNews')}}</h3>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-single mb-30">
                                <div class="blog-thumb">
                                    <a href="#"><img src="{{asset('blogs/'.$blog->image)}}" alt="" /></a>
                                </div>
                                <div class="blog-content pt-25">
                                    <span class="blog-date">{{\Carbon\Carbon::parse($blog->created_at)->format('d M')}}</span>
                                    <h3><a href="{{route('front.blog.show',$blog->id)}}">{{$blog->title}}</a></h3>
                                    <p>{!! Str::limit(strip_tags($blog->desc), 100) !!}</p>
                                    <a href="{{route('front.blog.show',$blog->id)}}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- News Area End -->
        <!-- Team Area Start -->
        <div class="team-area pt-95 pb-70">
            <div class="container">
                <div class="product-top-bar section-border mb-50">
                    <div class="section-title-wrap style-two text-center">
                        <h3 class="section-title">{{__('front.TeamMembers')}}</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="team-wrapper mb-30">
                                <div class="team-img">
                                    <a href="#">
                                        <img src="{{asset('teams/'.$team->image)}}" alt="">
                                    </a>
                                    <div class="team-action">
                                        <a class="action-plus facebook" href="{{$team->fb}}">
                                            <i class="ion-social-facebook"></i>
                                        </a>
                                        <a class="action-heart twitter" title="Wishlist" href="{{$team->twitter}}">
                                            <i class="ion-social-twitter"></i>
                                        </a>
                                        <a class="action-cart instagram" href="{{$team->inst}}">
                                            <i class="ion-social-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="team-content text-center">
                                    <h4>{{$team->name}}</h4>
                                    <span>{{$team->job}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team Area End -->
        <!-- Newsletter Araea Start -->
        <div class="newsletter-area bg-image-2 pt-90 pb-100">
            <div class="container">
                <div class="product-top-bar section-border mb-45">
                    <div class="section-title-wrap text-center">
                        <h3 class="section-title">{{__('front.Newsletter')}}</h3>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-6 col-md-10 col-md-auto">
                        <div class="footer-newsletter">
                            <div id="mc_embed_signup" class="subscribe-form">
                                <form action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input type="email" value="" name="EMAIL" class="email" placeholder="{{__('front.EmailAddress')}}" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <div class="submit-button">
                                            <input type="submit" value="{{__('front.Subscribe')}}" name="subscribe" id="mc-embedded-subscribe" class="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Araea End -->
@endsection




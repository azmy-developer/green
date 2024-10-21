@extends('frontend.layout.layout')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>{{__('front.about')}} </h3>
                <ul>
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                    <li class="active">{{__('front.about')}} </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- About Us Area Start -->
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h4>{{__('front.our_vision')}}</h4>
                        <p class="peragraph-blog">{!! $about->vision !!}</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="overview-img text-center">
                        <a href="#">
                            <img src="{{asset('about/'.$about->vision_img)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h4>{{__('front.our_goals')}}</h4>
                        <p class="peragraph-blog">{!! $about->goals !!}</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="overview-img text-center">
                        <a href="#">
                            <img src="{{asset('about/'.$about->goals_img)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h4>{{__('front.our_messages')}}</h4>
                        <p class="peragraph-blog">{!! $about->message !!}</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="overview-img text-center">
                        <a href="#">
                            <img src="{{asset('about/'.$about->message_img)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h4>{{__('front.our_solutions')}}</h4>
                        <p class="peragraph-blog">{!! $about->solutions !!}</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="overview-img text-center">
                        <a href="#">
                            <img src="{{asset('about/'.$about->solutions_img)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h4>{{__('front.our_strategy')}}</h4>
                        <p class="peragraph-blog">{!! $about->strategy !!}</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="overview-img text-center">
                        <a href="#">
                            <img src="{{asset('about/'.$about->strategy_img)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- About Us Area End -->

@endsection

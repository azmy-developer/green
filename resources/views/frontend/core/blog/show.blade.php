@extends('frontend.layout.layout')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>{{__('front.Blog')}}</h3>
                <ul>
                    <li><a href="{{route('home')}}">{{__('front.Blog')}} </a></li>
                    <li><a href="{{route('front.blog.index')}}">{{__('front.Blog')}}</a></li>
                    <li class="active">{{$blog->name}} </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- blog-area start -->
    <div class="blog-page-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9 col-md-8">
                    <div class="blog-details-wrapper">
                        <div class="single-blog-wrapper">
                            <div class="blog-img mb-30">
                                <img src="{{asset('blogs/'.$blog->image)}}" alt="">
                            </div>
                            <div class="blog-content">
                                <h2>{{$blog->name}} </h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li>{{$blog->created_at->locale(app()->getLocale())->translatedFormat('F j, Y')}} </li>
                                        <li>Admin</li>
                                    </ul>
                                </div>
                            </div>

                            {!! $blog->desc !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- blog-area end -->

@endsection

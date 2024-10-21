@extends('frontend.layout.layout')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>{{__('front.Blog')}} </h3>
                <ul>
                    <li><a href="{{route('home')}}">{{__('front.home')}} </a></li>
                    <li class="active">{{__('front.Blog')}}  </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- blog-area start -->
    <div class="blog-page-area masonary-style ptb-100">
        <div class="container">
            <div class="row blog-grid">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 blog-grid-item">
                        <div class="single-blog-wrapper mb-40">
                            <div class="blog-img mb-30">
                                <a href="{{route('front.blog.show',$blog->id)}}">
                                    <img src="{{asset('blogs/'.$blog->image)}}" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h2><a href="{{route('front.blog.show',$blog->id)}}">{{$blog->name}}</a></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li>{{$blog->created_at->locale(app()->getLocale())->translatedFormat('F j, Y')}} </li>
                                        <li>Admin </li>
                                    </ul>
                                </div>
                            </div>
                            <p>{!! Str::limit(strip_tags($blog->desc), 100) !!}</p>
                            <div class="blog-btn-social mt-30">
                                <div class="blog-btn">
                                    <a href="{{route('front.blog.show',$blog->id)}}">{{__('front.readmore')}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-total-pages">
                <div class="pagination-style">
                    {{ $blogs->appends(request()->query())->links() }} <!-- Preserve query parameters -->
                </div>
                <div class="total-pages">
                    <p>{{__('front.Showing')}}  {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} {{__('front.of')}}  {{ $blogs->total() }} {{__('front.results')}} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->

@endsection

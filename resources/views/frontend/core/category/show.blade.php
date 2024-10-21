@extends('frontend.layout.layout')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>{{__('front.Categories')}}</h3>
                <ul>
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                    <li><a href="{{route('front.company.index')}}">{{__('front.Company')}}</a></li>
                    <li class="active">{{__('front.Categories')}} </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Shop Page Area Start -->
    <div class="shop-page-area ptb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">

                    <div class="grid-list-product-wrapper">
                        <div class="product-grid product-view pb-20">
                            <div class="row">
                                @foreach($categories as $category)

                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{route('front.product.show',$category->id)}}">
                                                    <img alt="" src="{{asset('category/'.$category->image)}}">
                                                </a>

                                            </div>
                                            <div class="product-content text-left">
                                                <div class="product-hover-style">
                                                    <div class="product-title">
                                                        <h4>
                                                            <a href="{{route('front.product.show',$category->id)}}">{{$category->name}}</a>
                                                        </h4>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="{{route('front.product.show',$category->id)}}">{{$category->name}}</a>
                                                </h4>

                                                <p>{!! Str::limit(strip_tags($category->desc), 100) !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{$categories->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Shop Page Area End -->

@endsection

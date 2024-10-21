@extends('frontend.layout.layout')
@push('style')
    <style>
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Adjust spacing between elements */
        }

        .filter-input {
            flex: 1;
            min-width: 200px; /* Ensure input field doesn't shrink too much */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .filter-button {
            padding: 10px 20px;
            background-color: #28a745; /* Bootstrap success color */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .filter-button:hover {
            background-color: #218838; /* Darker shade on hover */
        }
    </style>
@endpush
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>{{__('front.Company')}}</h3>
                <ul>
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                    <li class="active">{{__('front.Company')}} </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->



    <div class="breadcrumb-area ptb-90">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <form action="{{ route('front.filter.product.show') }}" method="GET" class="filter-form">
                    <input type="text" id="filter-name" name="name" placeholder="{{ __('front.productName') }}" class="filter-input" />
                    <button type="submit" class="filter-button">{{ __('front.Search') }}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Shop Page Area Start -->
    <div class="shop-page-area ptb-80">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">

                    <div class="grid-list-product-wrapper">
                        <div class="product-grid product-view pb-20">
                            <div class="row">
                                @foreach($companies as $company)

                                <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('front.company.product.show',$company->id)}}">
                                                <img alt="" src="{{asset('company/'.$company->image)}}">
                                            </a>

                                        </div>
                                        <div class="product-content text-left">
                                            <div class="product-hover-style">
                                                <div class="product-title">
                                                    <h4>
                                                        <a href="{{route('front.company.product.show',$company->id)}}">{{$company->name}}</a>
                                                    </h4>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="product-list-details">
                                            <h4>
                                                <a href="{{route('front.company.product.show',$company->id)}}">{{$company->name}}</a>
                                            </h4>

                                            <p>{!! Str::limit(strip_tags($company->desc), 100) !!}</p>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        {{$companies->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Shop Page Area End -->

@endsection




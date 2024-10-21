@extends('frontend.layout.layout')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>{{__('front.Products')}}</h3>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('front.category.show',request()->route('id') )}}">{{__('front.Products')}}</a></li>
                    <li class="active">{{$product->name}} </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Product Deatils Area Start -->
    <div class="product-details pt-100 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="product-details-img">
                        <img class="zoompro" src="{{ asset('products/'.$product->id.'/'.$product->images->first()->url) }}" data-zoom-image="{{ asset('products/'.$product->id.'/'.$product->images->first()->url) }}" alt="zoom"/>
                        <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
                            @foreach($product->images as $image)
                                <a data-image="{{ asset('products/'.$product->id.'/'.$image->url) }}" data-zoom-image="{{ asset('products/'.$product->id.'/'.$image->url) }}">
                                    <img src="{{ asset('products/'.$product->id.'/'.$image->url) }}" alt="product image">
                                </a>
                            @endforeach
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h4>{{$product->name}}</h4>
                        <div class="rating-review">
                            <div class="pro-dec-rating">
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline"></i>
                            </div>
                            <div class="pro-dec-review">
                                <ul>
                                    <li>32 Reviews </li>
                                    <li> Add Your Reviews</li>
                                </ul>
                            </div>
                        </div>
                        <span>{{$product->price}}</span>
                        <div class="in-stock">
                            <p>Available: <span>In stock</span></p>
                        </div>
                        {!! $product->desc !!}
                        <div class="pro-dec-feature">
                            <ul>
                                <li><input type="checkbox"> Protection Plan: <span> 2 year  $4.99</span></li>
                                <li><input type="checkbox"> Remote Holder: <span> $9.99</span></li>
                                <li><input type="checkbox"> Koral Alexa Voice Remote Case: <span> Red  $16.99</span></li>
                                <li><input type="checkbox"> Amazon Basics HD Antenna: <span>25 Mile  $14.99</span></li>
                            </ul>
                        </div>
                        <div class="quality-add-to-cart">
                            <div class="quality">
                                <label>Qty:</label>
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                            </div>
                            <div class="shop-list-cart-wishlist">
                                <a title="Add To Cart" href="#">
                                    <i class="ion-android-cart"></i>
                                </a>
                                <a title="Wishlist" href="#">
                                    <i class="ion-android-favorite-outline"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pro-dec-categories">
                            <ul>
                                <li class="categories-title">Categories:</li>
                                <li><a href="#">Green,</a></li>
                                <li><a href="#">Herbal, </a></li>
                                <li><a href="#">Loose,</a></li>
                                <li><a href="#">Mate,</a></li>
                                <li><a href="#">Organic </a></li>
                            </ul>
                        </div>
                        <div class="pro-dec-categories">
                            <ul>
                                <li class="categories-title">Tags: </li>
                                <li><a href="#"> Oolong, </a></li>
                                <li><a href="#"> Pu'erh,</a></li>
                                <li><a href="#"> Dark,</a></li>
                                <li><a href="#"> Special </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Deatils Area End -->
    <div class="description-review-area pb-70">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav text-center">
                    <a class="active" data-bs-toggle="tab" href="#des-details1">{{__('front.Description')}}</a>
                    <a data-bs-toggle="tab" href="#des-details2">{{__('front.Tags')}}</a>
                    <a data-bs-toggle="tab" href="#des-details3">{{__('front.Review')}}</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details1" class="tab-pane active">
                        {!! $product->desc !!}
                    </div>
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper">
                            <ul>
                                <li><span>Tags:</span></li>
                                <li><a href="#"> Green,</a></li>
                                <li><a href="#"> Herbal,</a></li>
                                <li><a href="#"> Loose,</a></li>
                                <li><a href="#"> Mate,</a></li>
                                <li><a href="#"> Organic ,</a></li>
                                <li><a href="#"> special</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="rattings-wrapper">
                            <div class="sin-rattings">
                                <div class="star-author-all">
                                    <div class="ratting-star f-left">
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="ratting-author f-right">
                                        <h3>Potanu Leos</h3>
                                        <span>12:24</span>
                                        <span>9 March 2018</span>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                            </div>
                            <div class="sin-rattings">
                                <div class="star-author-all">
                                    <div class="ratting-star f-left">
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="ratting-author f-right">
                                        <h3>Kahipo Khila</h3>
                                        <span>12:24</span>
                                        <span>9 March 2018</span>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                            </div>
                        </div>
                        <div class="ratting-form-wrapper">
                            <h3>Add your Comments :</h3>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="star-box">
                                        <h2>Rating:</h2>
                                        <div class="ratting-star">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Email" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <input type="submit" value="add review">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-100">
        <div class="container">
            <div class="product-top-bar section-border mb-35">
                <div class="section-title-wrap">
                    <h3 class="section-title section-bg-white">{{__('front.RelatedProducts')}}</h3>
                </div>
            </div>
            <div class="featured-product-active hot-flower owl-carousel product-nav">
                @foreach($products as $prod)
                    <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{ route('front.product.detail', $prod->id) }}">
                            <img alt="" src="{{ asset('product/'.$prod->image) }}">
                        </a>
                        <div class="product-action">
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="ion-ios-shuffle-strong"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-left">
                        <div class="product-hover-style">
                            <div class="product-title">
                                <h4><a href="{{ route('front.product.detail', $prod->id) }}">{{ $prod->name }}</a></h4>
                            </div>
                            <div class="cart-hover">
                                <h4><a href="product-details.html">+ Add to cart</a></h4>
                            </div>
                        </div>
                        <div class="product-price-wrapper">
                            <span>{{ $product->price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

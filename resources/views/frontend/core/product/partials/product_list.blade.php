<div class="product-view product-grid pb-20">
    <input type="hidden" id="company_id" value="{{ \Request::route('id') }}">
    <div class="row">
        @foreach($products as $product)
            <div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{ route('front.product.detail', $product->id) }}">
                            <img alt="" src="{{ asset('product/'.$product->image) }}">
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
                                <h4><a href="{{ route('front.product.detail', $product->id) }}">{{ $product->name }}</a></h4>
                            </div>
                            <div class="cart-hover">
                                <h4><a href="#">+ Add to cart</a></h4>
                            </div>
                        </div>
                        <div class="product-price-wrapper">
                            <span>{{ $product->price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@extends('frontend.layout.layout')
@push('style')
    <style>
        .product-list .pro-list-none {
            display: block!important;
        }

        .filter-input {
            flex: 1;
            min-width: 200px; /* Ensure input field doesn't shrink too much */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

    </style>
@endpush
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150" style=" background-image: url({{asset('images/covers/'.$cover->about_cover)}})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>Products</h3>
                <ul>
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>

                    @if(isset($companyName))
                        <li><a href="{{route('front.company.product.show',request()->route('id') )}}">{{__('front.Products')}}</a></li>
                        <li class="active">{{$companyName}} </li>
                    @else
                        <li><a href="#">{{__('front.Products')}}</a></li>
                    @endif


                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- Shop Page Area Start -->
    <div class="shop-page-area ptb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <input type="hidden" id="company_id" value="{{ \Request::route('id') }}">
                    <!-- Topbar with view mode, pagination details, sorting, and items per page -->
                    <div class="shop-topbar-wrapper">
                        <div class="shop-topbar-left">
                            <!-- View mode switching (grid/list) -->
                            <ul class="view-mode">
                                <li class="active"><a href="javascript:void(0);" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                <li><a href="javascript:void(0);" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                            </ul>
                            <p class="top-paginate">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results</p>
                        </div>

                        <!-- Sorting and items per page -->
                        <div class="product-sorting-wrapper">
                            <div class="product-shorting shorting-style">
                                <form id="filterForm" method="GET">
                                    <label>View:</label>
                                    <select name="pageSize" onchange="document.getElementById('filterForm').submit();">
                                        <option value="20" {{ request('pageSize') == '20' ? 'selected' : '' }}>20</option>
                                        <option value="23" {{ request('pageSize') == '23' ? 'selected' : '' }}>23</option>
                                        <option value="30" {{ request('pageSize') == '30' ? 'selected' : '' }}>30</option>
                                    </select>

                                    <label>Sort by:</label>
                                    <select name="sort" onchange="document.getElementById('filterForm').submit();">
                                        <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Product Grid/List Display -->
                    <div class="grid-list-product-wrapper">
                        <div class="product-view product-grid pb-20"> <!-- Initially load as grid view -->
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
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-total-pages">
                        <div class="pagination-style">
                            {{ $products->appends(request()->query())->links() }} <!-- Preserve query parameters -->
                        </div>
                        <div class="total-pages">
                            <p>Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                        <div class="shop-widget">
                            <h4 class="shop-sidebar-title">{{__('front.Filter_Name')}}</h4>
                            <div class="shop-catigory">
                                <div class="price_slider_amount">
                                    <div style="padding: 13px;">
                                        <input type="text" id="filter-name" class="filter-input" name="filter_name" placeholder="{{ __('front.productName') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                            <h4 class="shop-sidebar-title">{{__('front.Filter_By_Categories')}}</h4>
                            <div class="shop-catigory">
                                <ul id="faq">
                                    <li>
                                    <a href="javascript:void(0);" class="category-filter" data-category-id="0">
                                        {{__('front.All_Categories')}}
                                    </a>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="javascript:void(0);" class="category-filter" data-category-id="{{ $category->id }}">
                                                {{ $category->name }} <i class="ion-ios-arrow-down"></i>
                                            </a>
                                            @if ($category->subcategories->count() > 0)
                                                <ul id="shop-catigory-{{ $category->id }}" class="panel-collapse collapse">
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <li>
                                                            <a href="javascript:void(0);" class="category-filter" data-category-id="{{ $subcategory->id }}">
                                                                {{ $subcategory->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page Area End -->

@endsection

@push('script')
    <script>
        document.querySelectorAll('.view-mode a').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior

                // Get the view mode from the clicked element
                let view = this.getAttribute('data-view');

                // Remove active class from all view mode buttons
                document.querySelectorAll('.view-mode li').forEach(li => li.classList.remove('active'));

                // Add active class to the clicked view mode button
                this.parentNode.classList.add('active');

                // Find the product wrapper
                let productWrapper = document.querySelector('.product-view');

                // Remove both grid and list classes and add the new view class
                productWrapper.classList.remove('product-grid', 'product-list');
                productWrapper.classList.add(view);
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            const categoryLinks = document.querySelectorAll('.category-filter');
            const companyId = document.getElementById('company_id').value;
            categoryLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    const categoryId = this.dataset.categoryId;
                    filterProductsByCategory(categoryId,companyId);
                });
            });


            document.getElementById('filter-name').addEventListener('keyup', function() {
                // Get the name filter value
                const nameFilter = this.value;
                const companyId = document.getElementById('company_id').value;
                const sortElement = document.querySelector('#sort');
                const sort = sortElement ? sortElement.value : 'default'; // Use 'default' if element doesn't exist

                const pageSizeElement = document.querySelector('#pageSize');
                const pageSize = pageSizeElement ? pageSizeElement.value : 20; // Default to 20 items per page if missing
                // Get the company_id from the URL (you can adapt this if needed)

                // Make an AJAX request to filter products
                $.ajax({
                    url: '/filter-products', // Adjust this URL based on your routing
                    type: 'GET',
                    data: {
                        company_id: companyId, // Pass company_id from the URL
                        name: nameFilter, // Pass the name filter
                        sort: sort, // Pass the name filter
                        pageSize: pageSize, // Pass the name filter
                    },
                    success: function(response) {
                        // Update the product list with the filtered products
                        document.querySelector('.grid-list-product-wrapper').innerHTML = response.html;

                        // Update pagination (optional)

                        document.querySelector('.pagination-total-pages').innerHTML = response.pagination;
                        document.querySelector('.top-paginate').innerHTML = response.pagination;
                        },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            function filterProductsByCategory(categoryId,companyId) {
                const sortElement = document.querySelector('#sort');
                const sort = sortElement ? sortElement.value : 'default'; // Use 'default' if element doesn't exist

                const pageSizeElement = document.querySelector('#pageSize');
                const pageSize = pageSizeElement ? pageSizeElement.value : 20; // Default to 20 items per page if missing

                const url = `/filter-products?company_id=${companyId}&category=${categoryId}&sort=${sort}&pageSize=${pageSize}`;

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        // Replace the product grid with new filtered products
                        document.querySelector('.grid-list-product-wrapper').innerHTML = data.html;

                        // Update pagination (optional)
                        document.querySelector('.pagination-total-pages').innerHTML = data.pagination;
                        document.querySelector('.top-paginate').innerHTML = data.pagination;
                    })
                    .catch(error => console.error('Error fetching products:', error));
            }
        });

    </script>
@endpush

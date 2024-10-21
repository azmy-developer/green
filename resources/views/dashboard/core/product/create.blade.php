@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">المنتجات</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard/product') }}">المنتجات</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه منتج</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- Basic Vertical form layout section start -->
            <section id="basic-vertical-layouts">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <form class="form row" action="{{ route('dashboard.product.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">


                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Arabic Name</label>
                                            <input type="text" class="form-control" placeholder="Arabic Name" name="name_ar">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> English Name</label>
                                            <input type="text" class="form-control" placeholder="English Name" name="name_en">
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Description</label>
                                                <textarea rows="5" class="form-control" name="desc_ar"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Description</label>
                                                <textarea rows="5" class="form-control" name="desc_en"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Code Product</label>
                                            <input type="text" class="form-control" placeholder="Code Product" name="code">
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Price</label>
                                                <input class="form-control" type="number" min="0"  name="price">
                                            </div>
                                        </div>
                                        <!-- Company Select -->

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label for="company">Select Company</label>
                                                <select id="company" name="company_id" class="form-control">
                                                    <option value="">Select Company</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Category Select -->
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label for="category">Select Category</label>
                                                <select id="category" name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    <!-- Dynamic options will be loaded here -->
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Select File</label>
                                                <input id="complaintinput12" name="image" type="file" class="form-control round" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Vertical form layout section end -->

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#company').on('change', function () {
                var companyId = $(this).val();
                if (companyId) {
                    $.ajax({
                        url: '/dashboard/categories/' + companyId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#category').empty();
                            $('#category').append('<option value="">Select Category</option>');
                            $.each(data, function (key, value) {
                                $('#category').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#category').empty();
                    $('#category').append('<option value="">Select Category</option>');
                }
            });
        });
    </script>
@endpush

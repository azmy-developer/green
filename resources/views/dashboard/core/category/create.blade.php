@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">الاقسام</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard/category') }}">الاقسام</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه قسم</li>
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
                                <form class="form row" action="{{ route('dashboard.category.store') }}" method="post" enctype="multipart/form-data">
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

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">الشركات</label>
                                                <select class="form-select" name="company_id" id="basicSelect">
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
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

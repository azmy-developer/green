@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">الاعدادات</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard/setting') }}">الاعدادات</a>
                                </li>
                                <li class="breadcrumb-item active">الاعدادات </li>
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
                                <form class="form row" action="{{ route('dashboard.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Arabic Title</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="title_ar" value="{{$setting->title_ar}}" placeholder="Arabic Title" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">English Title</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="title_en" value="{{$setting->title_en}}" placeholder="English Title" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">First phone</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="phone1" value="{{$setting->phone1}}" placeholder="First phone" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Second phone</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="phone2" value="{{$setting->phone2}}" placeholder="Second phone" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Email</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="email" value="{{$setting->email}}" placeholder="Email" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Select File</label>
                                                <input id="complaintinput12" name="image" type="file" class="form-control round" value="{{$setting->image}}">
                                                <img src="{{ url('setting/' . $setting->image) }}" width="50" height="50" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Description</label>
                                                <textarea rows="5" class="form-control" name="description_ar">{{$setting->description_ar}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Description</label>
                                                <textarea rows="5" class="form-control" name="description_en">{{$setting->description_en}}</textarea>
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

@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">عن الشركه</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard/about') }}">عن الشركه</a>
                                </li>
                                <li class="breadcrumb-item active">تعديل </li>
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
                                <form class="form row" action="{{ route('dashboard.about.update', $about->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">{{__('messages.title')}}</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="title" value="{{$about->title}}" placeholder="{{__('messages.title')}}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Vision</label>
                                                <textarea rows="5" class="form-control" name="vision_ar">{{$about->vision_ar}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Vision</label>
                                                <textarea rows="5" class="form-control" name="vision_en">{{$about->vision_en}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Vision Img</label>
                                                <input id="complaintinput12" name="vision_img" type="file" class="form-control round" >
                                                <img src="{{ url('about/' . $about->vision_img) }}" width="50" height="50" alt="">

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Goals</label>
                                                <textarea rows="5" class="form-control" name="goals_ar">{{$about->goals_ar}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Goals</label>
                                                <textarea rows="5" class="form-control" name="goals_en">{{$about->goals_en}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Goals Img</label>
                                                <input id="complaintinput12" name="goals_img" type="file" class="form-control round" >
                                                <img src="{{ url('about/' . $about->goals_img) }}" width="50" height="50" alt="">

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Message</label>
                                                <textarea rows="5" class="form-control" name="message_ar">{{$about->message_ar}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Message</label>
                                                <textarea rows="5" class="form-control" name="message_en">{{$about->message_en}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Message Img</label>
                                                <input id="complaintinput12" name="message_img" type="file" class="form-control round" >
                                                <img src="{{ url('about/' . $about->message_img) }}" width="50" height="50" alt="">

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Solutions</label>
                                                <textarea rows="5" class="form-control" name="solutions_ar">{{$about->solutions_ar}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Solutions</label>
                                                <textarea rows="5" class="form-control" name="solutions_en">{{$about->solutions_en}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Solutions Img</label>
                                                <input id="complaintinput12" name="solutions_img" type="file" class="form-control round" >
                                                <img src="{{ url('about/' . $about->solutions_img) }}" width="50" height="50" alt="">

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Arabic Strategy</label>
                                                <textarea rows="5" class="form-control" name="strategy_ar">{{$about->strategy_ar}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">English Strategy</label>
                                                <textarea rows="5" class="form-control" name="strategy_en">{{$about->strategy_en}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="complaintinput2">Strategy Img</label>
                                                <input id="complaintinput12" name="strategy_img" type="file" class="form-control round" >
                                                <img src="{{ url('about/' . $about->strategy_img) }}" width="50" height="50" alt="">

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

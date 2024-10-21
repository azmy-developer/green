@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">فريق العمل</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard/team') }}">فريق العمل</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه فريق</li>
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
                                <form class="form row" action="{{ route('dashboard.team.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">


                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Arabic Name</label>
                                            <input type="text" class="form-control" placeholder="Arabic Name" name="name">
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone" name="phone">
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address">
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> Arabic Job</label>
                                            <input type="text" class="form-control" placeholder="Arabic Job" name="job_ar">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="donationinput1"> English Job</label>
                                            <input type="text" class="form-control" placeholder="Arabic Job" name="job_en">
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Facebook</label>
                                                <input class="form-control" type="text"  name="fb">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Twitter</label>
                                                <input class="form-control" type="text"  name="twitter">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="donationinput1">Instagram</label>
                                                <input class="form-control" type="text"  name="inst">
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

@extends('dashboard.layout.layout')
@section('content')

    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">غلاف</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard/cover') }}">غلاف</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="form-control-repeater">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    @if(!$cover = \App\Models\Cover::first())
                                        <form class="form row" action="{{ route('dashboard.cover.store') }}" method="post" enctype="multipart/form-data">
                                            @else
                                                <form class="form row" action="{{ route('dashboard.cover.update',$cover->id) }}" method="post" enctype="multipart/form-data">
                                                    @method('patch')

                                                    @endif

                                                    @csrf

                                                    <div class="form-group col-md-12 mb-2">
                                                        <label for="image" class="form-label">About cover</label>
                                                        <input type="file" id="about_cover" class="form-control"  name="about_cover">
                                                        @if($cover)
                                                            <img src="{{ url('images/covers/' . $cover->about_cover) }}" width="50" height="50" alt="">
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-12 mb-2">
                                                        <label for="image" class="form-label">Contact cover</label>
                                                        <input type="file" id="contact_cover" class="form-control"  name="contact_cover">
                                                        @if($cover)
                                                            <img src="{{ url('images/covers/' . $cover->contact_cover) }}" width="50" height="50" alt="">
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-12 mb-2">
                                                        <label for="image" class="form-label">Blog cover</label>
                                                        <input type="file" id="blog_cover" class="form-control"  name="blog_cover">
                                                        @if($cover)
                                                            <img src="{{ url('images/covers/' . $cover->blog_cover) }}" width="50" height="50" alt="">
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-12 mb-2">
                                                        <label for="image" class="form-label">Product cover</label>
                                                        <input type="file" id="product_cover" class="form-control"  name="product_cover">
                                                        @if($cover)
                                                            <img src="{{ url('images/covers/' . $cover->product_cover) }}" width="50" height="50" alt="">
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-12 mb-2">
                                                        <label for="image" class="form-label">Company cover</label>
                                                        <input type="file" id="company_cover" class="form-control"  name="company_cover">
                                                        @if($cover)
                                                            <img src="{{ url('images/covers/' . $cover->company_cover) }}" width="50" height="50" alt="">
                                                        @endif
                                                    </div>




                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                    </div>
                                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection



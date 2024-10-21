@extends('dashboard.layout.layout')
@section('content')

<div class="content-overlay"></div>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">سلايدر</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">الرئيسيه</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard/slider') }}">سلايدر</a>
                            </li>
                            <li class="breadcrumb-item active">اضافه سلايدر</li>
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

                                        <form class="form row" action="{{ route('dashboard.slider.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf



                                            <div class="form-group col-12 mb-2">
                                                <label for="body_ar" class="form-label">Arabic Title Body</label>
                                                <input type="text" class="form-control" id="exp_ar" name="title_ar" >
                                            </div>
                                            <div class="form-group col-12 mb-2">
                                                <label for="body_en" class="form-label">English Title Body</label>
                                                <input type="text" class="form-control" id="exp_en" name="title_en" >
                                            </div>

                                            <div class="form-group col-12 mb-2">
                                                <label for="body_ar" class="form-label">Arabic Body</label>
                                                <textarea class="form-control" id="body_ar"  name="text_ar" rows="5"></textarea>
                                            </div>
                                            <div class="form-group col-12 mb-2">
                                                <label for="body_en" class="form-label">English Body</label>
                                                <textarea class="form-control" id="body_en"  name="text_en" rows="5"></textarea>
                                            </div>

                                         <div class="form-group col-md-12 mb-2">
                                         <label for="image" class="form-label">Slider Image</label>
                                          <input type="file" id="image" class="form-control" required name="image">
                                           </div>

                                             <div class="form-group col-md-12 mb-2">
                                         <label for="image2" class="form-label">Slider Image 2</label>
                                          <input type="file" id="image2" class="form-control" required name="image2">
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



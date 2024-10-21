@extends('dashboard.layout.layout')
@section('content')

<div class="content-overlay"></div>
<div class="content-wrapper">
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
                        <li class="breadcrumb-item active">تعديل سلايدر</li>
                    </ol>
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
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <form class="form row" action="{{ route('dashboard.slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                               @method('put')
                                            <div class="form-group col-12 mb-2">
                                                <label for="body_ar" class="form-label">Arabic Title Body</label>
                                                <input type="text" class="form-control" id="exp_ar" name="title_ar" value="{{$slider->title_ar }}">
                                            </div>
                                            <div class="form-group col-12 mb-2">
                                                <label for="body_en" class="form-label">English Title Body</label>
                                                <input type="text" class="form-control" id="exp_en" name="title_en" value="{{$slider->title_en }}">
                                            </div>


                                            <div class="form-group col-12 mb-2">
                                                <label for="body_ar" class="form-label">Arabic Body</label>
                                                <textarea class="form-control" id="body_ar" name="text_ar" rows="5">{!!$slider->text_ar !!}</textarea>
                                            </div>
                                            <div class="form-group col-12 mb-2">
                                                <label for="body_en" class="form-label">English Body</label>
                                                <textarea class="form-control" id="body_en" name="text_en" rows="5">{!!$slider->text_en !!}</textarea>
                                            </div>



                                            <div class="form-group col-md-12 mb-2">
                                             <label for="image" class="form-label">Image</label>
                                             <input type="file" id="image"  value="{{$slider->image}}" class="form-control" name="image">
                                           <img src="{{asset('images/slider/' .  $slider->image) }}" width="50" height="50" alt="">
                                             </div>
                                             <div class="form-group col-md-12 mb-2">
                                             <label for="image2" class="form-label">Image2</label>
                                             <input type="file" id="image2"  value="{{$slider->image2}}" class="form-control" name="image2">
                                           <img src="{{asset('images/slider/' .  $slider->image2) }}" width="50" height="50" alt="">
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


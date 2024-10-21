
@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">سلايد</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item active">سلايدر
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <a href="{{ route('dashboard.slider.create') }}" class="btn btn-primary btn-round btn-sm">
                            اضافه جديد
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>الاسم</th>
                                    <th>{{__('messages.created_at')}}</th>
                                    <th>{{__('messages.operation')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->created_at->toDateString() }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.slider.edit', $slider->id) }}" class="btn btn-sm btn-warning"><i data-feather='edit'></i></a>
                                            <a data-href="{{ route('dashboard.slider.destroy', $slider->id) }}" data-id="{{$slider->id}}" class="btn btn-sm btn-danger btn-delete"><i data-feather='trash-2'></i></a>

                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->

        </div>
    </div>

@endsection

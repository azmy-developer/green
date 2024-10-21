@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">{{__('messages.setting')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('messages.setting')}}
                                </li>

                            </ol>
                        </div>
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
                                    <th>{{__('messages.title')}}</th>
                                    <th>{{__('messages.created_at')}}</th>
                                    <th>{{__('messages.operation')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $setting->id }}</td>
                                    <td>{{ $setting->title }}</td>
                                    <td>{{ $setting->created_at->toDateString() }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.setting.edit', $setting->id) }}" class="btn btn-sm btn-warning"><i data-feather='edit'></i></a>
                                    </td>

                                </tr>

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

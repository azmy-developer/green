@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">اتصل بنا</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item active">اتصل بنا
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
                                    <th>الاسم</th>
                                    <th>{{__('messages.created_at')}}</th>
                                    <th>{{__('messages.operation')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->con_name }}</td>
                                        <td>{{ $contact->con_email }}</td>
                                        <td>{{ $contact->created_at->toDateString() }}</td>
                                        <td>
                                            <a data-href="{{ route('dashboard.contact.destroy', $contact->id) }}" data-id="{{$contact->id}}" class="btn btn-sm btn-danger btn-delete"><i data-feather='trash-2'></i></a>

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

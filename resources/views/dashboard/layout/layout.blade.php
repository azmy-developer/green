@php
    $name = 'site_name_'.app()->getLocale();
    $msgs = [];
    if (session('errors')){
        foreach(session('errors')->getmessages() as $message){
            foreach ($message as $m){
              $msgs[] = $m;
            }
        }
    }

@endphp
<!DOCTYPE html>
<html class="loading" lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl' :'ltr'}}">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>	Green Planet </title>
    <link rel="apple-touch-icon" href="{{asset('dash/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dash/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/plugins/charts/chart-apex.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/plugins/extensions/ext-component-toastr.css')}}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/pages/ui-feather.css')}}">

    <link href="{{asset('dash/app-assets/js/scripts/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('dash/app-assets/js/scripts/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dash/app-assets/js/scripts/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/>


    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dash/assets/css/style-rtl.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('dashboard.layout.navbar')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('dashboard.layout.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @yield('content')
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('dash/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('dash/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('dash/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('dash/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('dash/app-assets/js/scripts/ui/ui-feather.js')}}"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
<script src="{{asset('dash/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<!-- BEGIN: Page JS-->
<script src="{{asset('dash/app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
<script src="{{ url('dash/app-assets/js/scripts/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script src="{{asset('dash/app-assets/js/scripts/sweetalerts/promise-polyfill.js')}}"></script>
<script src="{{asset('dash/app-assets/js/scripts/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('dash/app-assets/js/scripts/sweetalerts/custom-sweetalert.js')}}"></script>
<script src="{{asset('dash/app-assets/js/scripts/toastr/toastr.min.js')}}"></script>

<!-- END: Page JS-->
<!-- END: Page Vendor JS-->


<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

<script>
    $(document).ready(function () {

        let session = "{{session('success')}}"
        if (session) {
            swal.fire({
                title: "{{__('messages.successful_operation')}}",
                text: "{{__('messages.request_executed_successfully')}}",
                type: 'success',
                padding: '2em'
            })
        }
        let arr = [];
        <?php foreach ($msgs as $key => $val){ ?>
        arr.push('<?php echo $val; ?>');
        <?php } ?>
        if (arr[0]) {
            let text = '';
            for (let i = 0; i < arr.length; i++) {
                text += arr[i]
            }
            swal.fire({
                title: "{{__('dash.error')}}",
                html: text,
                type: 'error',
                padding: '2em'
            })
        }
    })
    $(document).on('click', '.btn-delete', function () {
        let id = $(this).data('id');
        let url = $(this).data('href')
        let that = $(this);
        swal.fire({
            title: "{{__('messages.Are_you_sure?')}}",
            text: "{{__("messages.You_won't_be_able_to_restore_it_again")}}",
            showCancelButton: true,
            confirmButtonText: "{{__('messages.Yes,delete')}}",
            cancelButtonText: "{{__('messages.No,cancel')}}"
        }).then((isConfirm) => {
            if (isConfirm.value) {
                $.post(url, {_method: 'DELETE', _token: '{{csrf_token()}}'}).done(function (response) {
                    if (response.success === true) {
                        swal.fire(
                            "{{__('messages.Deleted!')}}",
                            "{{__('messages.Your_file_has_been_deleted.')}}",
                            'success'
                        )
                        location.reload();
                    } else {
                        swal.fire(
                            "فشل الحذف",
                            "" + response.msg + "",
                            'error'
                        )
                    }
                })
            }
        });
    });

</script>
<script>
    tinymce.init({
        selector: 'textarea',
        convert_urls: false,
        plugins: "anchor autolink autosave  charmap  codesample directionality image emoticons help image insertdatetime link  lists media  nonbreaking pagebreak   searchreplace table  visualblocks visualchars wordcount",
        toolbar: "undo redo spellcheckdialog  | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | align lineheight checklist bullist numlist | indent outdent | removeformat typography",
        fontsize_formats:
            "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
        images_upload_url: "{{route('dashboard.uploadImage')}}", // Your server-side upload handler
        automatic_uploads: false,
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
                const file = this.files[0];
                const formData = new FormData();
                formData.append('file', file);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                fetch("{{route('dashboard.uploadImage')}}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData,
                })
                    .then(response => response.json())
                    .then(result => {
                        cb(result.location, { title: file.name });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            };

            input.click();
        }

    });
</script>
@stack('script')

</body>
<!-- END: Body-->

</html>

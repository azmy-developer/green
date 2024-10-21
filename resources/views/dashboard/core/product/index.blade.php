@extends('dashboard.layout.layout')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">المنتجات</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">الرئيسيه</a>
                                </li>
                                <li class="breadcrumb-item active">المنتجات
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <a href="{{ route('dashboard.product.create') }}" class="btn btn-primary btn-round btn-sm">
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
                                    <th>القسم</th>
                                    <th>السعر</th>
                                    <th>{{__('messages.created_at')}}</th>
                                    <th>{{__('messages.operation')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category?->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->created_at->toDateString() }}</td>
                                        <td>
                                            <button type="button"  data-id="{{ $product->id }}" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dropzoneModal">
                                                Upload Image
                                            </button>
                                            <a href="{{ route('dashboard.product.edit', $product->id) }}" class="btn btn-sm btn-warning"><i data-feather='edit'></i></a>
                                            <a data-href="{{ route('dashboard.product.destroy', $product->id) }}" data-id="{{$product->id}}" class="btn btn-sm btn-danger btn-delete"><i data-feather='trash-2'></i></a>

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

    <!-- Dropzone Modal (outside the foreach loop) -->
{{--    <div class="modal fade" id="dropzoneModal" tabindex="-1" role="dialog" aria-labelledby="dropzoneModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="dropzoneModalLabel">Upload Image for Gallery</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <!-- Dropzone Form -->--}}
{{--                    <form action="{{ route('dashboard.product.upload') }}" class="dropzone" id="galleryDropzone" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="dz-message">--}}
{{--                            <h4>Drag and Drop your images here or click to upload</h4>--}}
{{--                        </div>--}}
{{--                        <!-- Hidden input to hold the gallery ID -->--}}
{{--                        <input type="hidden" id="productId" name="product_id">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- add new card modal  -->
    <div class="modal fade" id="dropzoneModal" tabindex="-1" aria-labelledby="dropzoneModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h1 class="text-center mb-1" id="addNewCardTitle">Upload Image for Gallery</h1>
                    <!-- Dropzone Form -->
                    <form action="{{ route('dashboard.product.upload') }}" class="dropzone" id="galleryDropzone" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            <h4>Drag and Drop your images here or click to upload</h4>
                        </div>
                        <!-- Hidden input to hold the gallery ID -->
                        <input type="hidden" id="productId" name="product_id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ add new card modal  -->

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        // When the modal is triggered, capture the gallery ID and load existing images
        $('#dropzoneModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var galleryId = button.data('id'); // Extract info from data-* attributes
            var modal = $(this);

            // Insert the gallery ID into the hidden input
            modal.find('#productId').val(galleryId);

            // Fetch existing images from the server and display them in Dropzone
            fetchExistingImages(galleryId);
        });

        // Fetch existing images for the gallery and display them
        function fetchExistingImages(galleryId) {
            var url = "{{ route('dashboard.product.getImages', ':id') }}"; // Use named route
            url = url.replace(':id', galleryId); // Replace the placeholder with the actual ID

            // Clear any existing files from the Dropzone

            // Make an AJAX call to fetch the gallery details and images
            $.ajax({
                url: url, // URL to fetch gallery images
                method: 'GET',
                success: function(data) {
                    console.log(data.images)
                    if (data && Array.isArray(data.images) && data.images.length > 0) {

                        alert(data.images)
                        $("#galleryDropzone").html("");
                        var hiddenInput = $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'product_id') // Use array notation for multiple IDs
                            .val(galleryId); // Set the value to the uploaded image ID

                        // Append the hidden input to a form or specific container
                        $('#galleryDropzone').append(hiddenInput);


                        var dropzone = Dropzone.forElement('#galleryDropzone');
                        data.images.forEach(function(image) {
                            var mockFile = { name: image.url, size: 12345 }; // Adjust size as needed
                            dropzone.emit('addedfile', mockFile);
                            dropzone.emit('thumbnail', mockFile, '/products/' + galleryId + '/' + image.url); // URL of the image
                            dropzone.emit('complete', mockFile);

                            // Attach delete functionality to remove button
                            mockFile.previewElement.querySelector('.dz-remove').addEventListener('click', function() {
                                removeImage(image.id, image);
                            });
                        });
                    }else{
                        $('#galleryDropzone').html(`
        <div class="dz-message">
            <h4>Drag and Drop your images here or click to upload</h4>
        </div>
    `);
                        var hiddenInput = $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'product_id') // Use array notation for multiple IDs
                            .val(galleryId); // Set the value to the uploaded image ID

                        // Append the hidden input to a form or specific container
                        $('#galleryDropzone').append(hiddenInput);
                        const messageElement = document.querySelector('.dropzone .dz-message');
                        if (messageElement) {
                            messageElement.style.display = 'block'; // Show the message
                        }
                    }
                },
                error: function(err) {
                    console.error('Failed to fetch images', err);
                }
            });
        }

        // Remove image both from Dropzone preview and the server
        function removeImage(imageId, imageName) {


            if (confirm('Are you sure you want to remove this image?')) {
                var deleteUrl = "{{ route('dashboard.product.deleteImage', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', imageId); // Replace the placeholder with the gallery ID
                $.ajax({
                    url: deleteUrl, // Route to delete image
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        image: imageName
                    },
                    success: function(response) {
                        alert('Image removed successfully');
                        Dropzone.forElement('#galleryDropzone').removeFile(imageName); // Remove from Dropzone
                    },
                    error: function(err) {
                        console.error('Error removing image:', err);
                    }
                });
            }
        }

        // Initialize Dropzone
        var myDropzone = new Dropzone("#galleryDropzone", {
            maxFilesize: 2, // Maximum file size in MB
            acceptedFiles: 'image/*',
            addRemoveLinks: true, // Show the remove link
            autoDiscover:false,
            dictDefaultMessage: "Drag and Drop your images here or click to upload", // Custom message
            thumbnailWidth: 200, // Set the width of the thumbnail
            thumbnailHeight: 200, // Set the height of the thumbnail
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in headers
            },
            init: function() {
                var myDropzone = this;

                this.on("addedfile", function(file) {
                    // Hide the message when a file is added
                    const messageElement = document.querySelector('.dropzone .dz-message');
                    if (messageElement) {
                        messageElement.style.display = 'block'; // Show the message
                    }
                });

                // Handle file upload success
                this.on("success", function(file, response) {
                    // Assuming the response contains the ID of the newly uploaded image
                    console.log(response)
                    if (response.imageId) {

                        file.imageId = response.imageId; // Store image ID in the file object
                    }
                });


                // Handle the removal of newly uploaded images
                this.on("removedfile", function(file) {
                    if (file.status === 'success' && file.imageId) {
                        // Send the GalleryImage ID to the backend for removal
                        removeImage(file.imageId); // Pass the image ID instead of file name
                    }


                });
            }
        });

        function appendMessage() {
            var message = `
                <div class="dz-message">
                    <h4>Drag and Drop your images here or click to upload</h4>
                </div>`;
            $("#galleryDropzone").append(message); // Append custom message to the Dropzone
        }
    </script>
@endpush

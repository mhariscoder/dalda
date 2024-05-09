@extends('cms.layouts.master')

@push('styles')
    <link rel="stylesheet" href="/assets/vendors/datatable/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <main>
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                    </div>
                    <div>
                        Education - Counselling
                    </div>
                </div>
                <div class="page-title-actions">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            <b class="d-inline-block mr-auto">Counselling Categories</b>
                            <a href="/admin/pages/education/counselling-category/create" class="btn-shadow btn btn-primary">Add</a>
                        </div>
                        @if($counsellingCategories->count() > 0)
                            @foreach($counsellingCategories as $counsellingCategory)
                                <div id="counselling-category-{{ $counsellingCategory->id }}" class="alert alert-dark d-flex">
                                    <div class="mr-auto">{{ $counsellingCategory->title }}</div>
                                    <div>
                                        <a href="/admin/pages/education/counselling-category/{{ $counsellingCategory->id }}/edit" class="text-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Update"> <i class="fas fa-pen-square  ml-2 "></i> </a>
                                        <a href="#" class="text-danger" onclick="deleteCounsellingCategory({{ $counsellingCategory->id }})" data-toggle="tooltip" data-placement="bottom" title="Remove"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">No record found</div>
                        @endif
                    </div>
                </div>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            <b class="d-inline-block mr-auto">Counselling</b>
                            <a href="/admin/pages/education/counselling/create" class="btn-shadow btn btn-primary">Add</a>
                        </div>
                        @if($counsellings->count() > 0)
                            @foreach($counsellings as $counselling)
                                <div id="counselling-{{ $counselling->id }}" class="alert alert-dark">
                                    <div class="mb-2 d-flex">
                                        <div class="mr-auto">
                                            <b>Category: </b>{{ $counselling->counsellingCategory->title }}
                                        </div>
                                        <div>
                                            <a href="/admin/pages/education/counselling/{{ $counselling->id }}/edit" class="text-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Update"> <i class="fas fa-pen-square  ml-2 "></i> </a>
                                            <a href="#" class="text-danger" onclick="deleteCounselling({{ $counselling->id }})" data-toggle="tooltip" data-placement="bottom" title="Remove"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                        
                                    </div>
                                    <div>
                                        <p class="mb-0"><b>Question: </b>{{ $counselling->question }}</p>
                                        <p class="mb-0"><b>Answer: </b>{{ $counselling->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">No record found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script src="/assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('.table').DataTable();
        });

        function deleteService(input, serviceId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDismiss) => {
                if (willDismiss) {
                    axios.get(`/admin/pages/education/delete-services-list/${serviceId}`).then((response) => {
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((successBtn) => {
                            if (successBtn) {
                                $(input).parent().parent().remove();
                            }
                        });
                    }).catch(function(error) {
                        swal({
                            title: error.response.data.msg,
                            icon: "error",
                            dangerMode: true
                        });
                    });
                }
            });
        }

        $('#upload-directory').submit(function(event) {
            event.preventDefault();

            let form = document.querySelector('#upload-directory');
            let bodyFormData = new FormData(form);
            
            axios.post('/admin/pages/education/directory/upload', bodyFormData,{
                headers: {'Content-Type': 'multipart/form-data'}
            })
            .then(function (response) {
                if (response) {
                    $("input[type='button']").prop('disabled', false);
                    swal({
                        title: response.data.msg,
                        icon: "success",
                        closeOnClickOutside: false
                    }).then(successBtn => {
                        window.location.reload()
                    }).catch(error => {
                        
                    });
                }
            })
            .catch(function (error) {
                console.log('error', error)
                swal({
                    title: error.response.data.error,
                    icon: "error",
                    dangerMode: true,
                    closeOnClickOutside: false
                });
            });
        })

        function deleteCounsellingCategory(counsellingCategoryId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDelete) => {
                if (willDelete) {
                    // Perform deletion action, e.g., via Ajax
                    // Example:
                    axios.delete(`/admin/pages/education/counselling-category/${counsellingCategoryId}`)
                        .then((response) => {
                            // Handle success
                            swal("Poof! Counselling category has been deleted!", {
                                icon: "success",
                            });
                        })
                        .catch((error) => {
                            // Handle error
                            swal("Oops! Something went wrong!", {
                                icon: "error",
                            });
                        });
                    // Remove the corresponding DOM element upon successful deletion
                    $(`#counselling-category-${counsellingCategoryId}`).remove();
                    // window.location.reload();
                }
            });
        }

        function deleteCounselling(counsellingId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDelete) => {
                if (willDelete) {
                    // Perform deletion action, e.g., via Ajax
                    // Example:
                    axios.delete(`/admin/pages/education/counselling/${counsellingId}`)
                        .then((response) => {
                            // Handle success
                            swal("Poof! Counselling has been deleted!", {
                                icon: "success",
                            });
                        })
                        .catch((error) => {
                            // Handle error
                            swal("Oops! Something went wrong!", {
                                icon: "error",
                            });
                        });
                    // Remove the corresponding DOM element upon successful deletion
                    $(`#counselling-${counsellingId}`).remove();
                    // window.location.reload();
                }
            });
        }
    </script>
@endpush

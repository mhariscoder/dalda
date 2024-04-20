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
                        Education - Box Page
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="/admin/pages/education/add-education-box-list/{{ \App\Models\CMSEducation::EDUCATION_ID }}"
                            class="btn-shadow btn btn-primary">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-user-plus fa-w-20"></i>
                            </span>
                            Add
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h5 class="card-title">Box List</h5>
                        <div class="table-responsive">
                            <table class="table table-striped the-table">
                                <thead>
                                    <tr>
                                        <th style="max-width: 25px;">ID#</th>
                                        <th>Sort Order</th>

                                        <th>Box Heading</th>
                                        <th style="width: 350px;">Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($box) > 0)
                                        @foreach ($box as $key => $boxData)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $boxData->sort_order }}</td>

                                                <td>{{ $boxData->heading }}</td>
                                                <td>{{ $boxData->description }}</td>
                                                <td>
                                                    <a href="/admin/pages/education/box-data-update/{{ $boxData->id }}"
                                                        class="text-warning" data-toggle="tooltip" data-placement="bottom"
                                                        title="" data-original-title="Update"> <i
                                                            class="fas fa-pen-square  ml-2 "></i> </a>
                                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip"
                                                        data-placement="bottom" title="" data-original-title="Delete"
                                                        onclick="deleteDocument(this, '{{ $boxData->id }}')"><i
                                                            class="fas fa-trash-alt  ml-2 "></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
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

        function deleteDocument(input, boxId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDismiss) => {
                if (willDismiss) {
                    axios.get(`/admin/pages/education/delete-education-box-list/${boxId}`).then((response) => {
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
    </script>
@endpush

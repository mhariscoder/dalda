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
                        Heroes
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="/admin/pages/add-heroes-list/{{ \App\Models\CMSHome::HOME_ID }}"
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


                        <h5 class="card-title">Heroes List</h5>
                        <div class="table-responsive">
                            <table class="table table-striped the-table">
                                <thead>
                                    <tr>
                                        <th style="max-width: 25px;">ID#</th>
                                        <th>Sort Order</th>
                                        <th style="width: 70px;">Title</th>
                                        <th style="width: 100px;">Designation</th>
                                        <th style="width: 100px;">Department</th>
                                        <th style="width: 350px;">Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($heroes) > 0)
                                        @foreach ($heroes as $key => $hero)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $hero->sort_order }}</td>

                                                <td>{{ $hero->title }}</td>
                                                <td>{{ $hero->designation }}</td>
                                                <td>{{ $hero->department }}</td>

                                                <td>
                                                    <a href="{{ asset('assets/website/images/pages/landing/' . $hero->image) }}"
                                                        data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                                        <img src="{{ asset('assets/website/images/pages/landing/' . $hero->image) }}"
                                                            class="img-fluid rounded" width="250px">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="/admin/pages/heroes-update/{{ $hero->id }}"
                                                        class="text-warning" data-toggle="tooltip" data-placement="bottom"
                                                        title="" data-original-title="Update"> <i
                                                            class="fas fa-pen-square  ml-2 "></i> </a>
                                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip"
                                                        data-placement="bottom" title="" data-original-title="Delete"
                                                        onclick="deleteService(this, '{{ $hero->id }}')"><i
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

        function deleteService(input, heroId) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDismiss) => {
                if (willDismiss) {
                    axios.get(`/admin/pages/delete-heroes-list/${heroId}`).then((response) => {
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

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
                        Education - Directory
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
                        <form id="upload-directory">
                            <div class="form-group">
                                <label>Upload directory PDF</label>
                                <input class="form-control" type="file" name="file" />
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                        
                        @if(isset($data->file))
                            <div class="text-right">
                                <label>{{ $data->file ?? 'Empty File' }}</label>
                                <a download href="{{ url('storage/uploads') . '/' . $data->file }}" class="btn btn-primary"> Download</a>
                            </div>
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
    </script>
@endpush

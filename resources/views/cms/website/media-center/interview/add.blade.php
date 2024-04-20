@extends('cms.layouts.master')

@section('content')
    <main class="content">
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Add Interviews</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/pages/interviews" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form id="applyForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 form-errors"></div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="title">Title <span class="required-class">*</span></label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                       value="{{ old('title') }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="description">Description  <span class="required-class">*</span></label>
                                                <textarea name="description" id="description" class="form-control"
                                                          rows="3">{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Image File <span class="required-class">*</span></label>
                                                    <input type="file" id="image" name="file" accept=".jpg, .jpeg, .png">
                                                <div class="image_error text-dark">Supported formats are jpeg, png and jpg</div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary"
                                                onclick="submitFormData()">Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        function submitFormData() {
            $("input[type='button']").prop('disabled', true);
            const exts = ['jpeg','jpg','png'];

            let image = document.getElementById
            ('image');
            var errorCheck = false;

            if (image.files.length != 0) {
                image = image.files[0].name;
                let ext_image = image.substr(image.lastIndexOf('.') + 1);
                if (!exts.includes(ext_image)) {
                    $("input[type='button']").prop('disabled', false);
                    $(".image_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".image_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if(errorCheck === true)
            {
                return false;
            }

            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios({
                method: 'post',
                url: '/admin/pages/interviews/add',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data'}
            }).then(function (response) {
                if (response) {
                    $("input[type='button']").prop('disabled', false);
                    swal({
                        title: response.data.msg,
                        icon: "success",
                        closeOnClickOutside: false
                    }).then(successBtn => {
                        if (successBtn) {
                            window.location.href = "/admin/pages/interviews";
                        }
                    }).catch(error => {
                        swal({
                            title: error.response.data.msg,
                            icon: "error",
                            dangerMode: true,
                            closeOnClickOutside: false
                        });
                    });
                }
            })
                .catch(function (error) {
                    $("input[type='button']").prop('disabled', false);
                    $(".alert-danger").remove();
                    let html = `<div class="alert alert-danger"><strong>Whoops!</strong><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data.errors, function (k, v) {
                        html += `<li>${v[0]}</li>`;
                    });
                    html += `</ul></div>`;
                    $(".form-errors").append(html);
                    $('html,body').animate({
                            scrollTop: $(".content").offset().top
                        },
                        'slow');
                });
        }
    </script>
    @endpush

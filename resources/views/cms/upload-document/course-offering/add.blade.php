@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-info" style="color:#2b8540;"> </i>

            </div>
            <div>
                Course Offering Management
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Add Course</h5>
        <form id="applyForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="title">Title <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value="{{ old('title') }}" maxlength="55" required>
                        <div class="invalid-feedback">
                            Please provide a valid title.
                        </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Description <span class="required-class">*</span></label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    <div class="invalid-feedback">
                        Please provide a valid description.
                    </div>
                </div>

            </div>
            <input type="button" id="btnSubmit" class="btn btn-primary float-right" value="Save"
            onclick="submitFormData();">
        </form>
    </div>
</div>
    {{-- <main>
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Add Course</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/course-offering" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                    <label for="title">Title <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                           value="{{ old('title') }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description <span
                                                                class="required-class">*</span></label>
                                                    <textarea name="description" id="description" class="form-control"
                                                              rows="3">{{ old('description') }}</textarea>
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
            </div>
            <!-- END: Card DATA-->
        </div>
    </main> --}}
@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        function submitFormData() {
            $("input[type='button']").prop('disabled',true);
            this.disabled=true;
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios({
                method: 'post',
                url: '/admin/add-course-offering',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data'}
            })
                .then(function (response) {
                    if (response) {
                        $("input[type='button']").prop('disabled',false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/admin/course-offering";
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
                    $("#applyForm").addClass('was-validated');
                    $("input[type='button']").prop('disabled',false);
                    $(".alert-danger").remove();
                    var html = `<div class="alert alert-danger"><strong>Whoops!</strong><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data.errors, function (k, v) {
                        var splitKey = k.split('.');
                        $(`input[name="data[${splitKey[1]}][${splitKey[2]}]"]`).addClass('has-error');
                        html += `<li>${v[0]}</li>`;
                    });
                    html += `</ul></div>`;
                    // $(".form-errors").append(html);
                    // $('html,body').animate({
                    //         scrollTop: $(".content").offset().top
                    //     },
                    //     'slow');
                });
        }
    </script>
@endpush

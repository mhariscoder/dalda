@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                </div>
                <div>
                    High Achievers
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add Student</h5>
            <form id="applyForm">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-errors"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="student_id">Select Student <span class="required-class">*</span></label>
                        <select class="form-control student_id select2" name="student_id">
                            <option value="">Select</option>
                            @foreach ($students as $val)
                                <option value="{{ $val->id }}">{{ $val->student_id . ' - ' . $val->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="position">Position <span class="required-class">*</span></label>
                        <input type="number" name="position" min="0" id="position" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control editor" rows="6">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" class="form-control editor" rows="6">{{ old('details') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="organization">Organization</label>
                        <input type="text" name="organization" id="organization" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="uni_name">University Name</label>
                        <input type="text" name="uni_name" id="uni_name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Image <span class="required-class">*</span></label>
                        <input type="file" id="image" name="image" accept=".jpg, .jpeg, .svg, .png">
                        <div class="image_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
                <input type="button" onclick="submitFormData(this)" id="btnSubmit" class="btn btn-primary float-right"
                    value="Save">
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        const axiosInstance = axios.create();

        function submitFormData(button) {
            button.disabled = true;
            const exts = ['jpeg', 'jpg', 'png'];

            let banner = document.getElementById('image');
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
            if (errorCheck === true) {
                return false;
            }
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axiosInstance({
                    method: 'post',
                    url: '/admin/achievers-student',
                    data: bodyFormData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/admin/achievers-student";
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
                .catch(function(error) {
                    $("input[type='button']").prop('disabled', false);
                    $(".alert-danger").remove();
                    let html = `<div class="alert alert-danger"><strong>Whoops!</strong><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data.errors, function(k, v) {
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

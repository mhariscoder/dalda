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
            <h5 class="card-title">Update Student</h5>
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
                                <option value="{{ $val->id }}"
                                    {{ $val->id === $resultSet->student->id ? 'selected' : '' }}>
                                    {{ $val->student_id . ' - ' . $val->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="position">Position <span class="required-class">*</span></label>
                        <input type="number" name="position" min="0" id="position"
                            value="{{ $resultSet->position }}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control editor" rows="6">{{ $resultSet->description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" class="form-control editor" rows="6">{{ $resultSet->details ?? '' }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control" value="{{ $resultSet->designation ?? '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="organization">Organization</label>
                        <input type="text" name="organization" id="organization" class="form-control" value="{{ $resultSet->organization ?? '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="uni_name">University Name</label>
                        <input type="text" name="uni_name" id="uni_name" class="form-control" value="{{ $resultSet->uni_name ?? '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Image </label>
                        <div class="input-group">
                            @if ($resultSet->image)
                                <a href="{{ asset('assets/website/images/highAchievers/' . $resultSet->image) }}"
                                    data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/highAchievers/' . $resultSet->image) }}"
                                        class="img-fluid rounded" height="400" width="250">
                                </a>
                            @endif
                            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .svg, .png">
                            <div class="image_error text-dark">Supported formats are png, jpeg and jpg</div>
                        </div>
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
            bodyFormData.append('_method', 'put');
            axiosInstance.post('/admin/achievers-student/' + '{{ $resultSet->id }}', bodyFormData, {
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
                    console.log(error.response.data)
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

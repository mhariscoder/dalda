@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

            </div>
            <div>
                Screening Criteria Page
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Update</h5>
        <form id="applyForm">
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="heading">heading <span
                        class="required-class">*</span></label>
                    <input type="text" name="heading" id="heading" value="{{ $resultSet->heading }}" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control editor"
                                                          rows="6">{{ $resultSet->description ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="criteria_points">Criteria Points</label>
                    <textarea name="criteria_points" id="criteria_points" class="form-control editor"
                                                          rows="6">{{ $resultSet->criteria_points ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section2_heading">Section 2 Heading <span
                        class="required-class">*</span></label>
                    <input type="text" name="section2_heading" id="section2_heading" value="{{ $resultSet->section2_heading }}" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="section2_content">Section 2 Content</label>
                    <textarea name="section2_content" id="section2_content" class="form-control editor"
                                                          rows="6">{{ $resultSet->section2_content ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="section3_heading">Section 3 Heading</label>
                    <textarea name="section3_heading" id="section3_heading" class="form-control editor"
                                                          rows="6">{{ $resultSet->section3_heading ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="section3_description">Section 3 Description</label>
                    <textarea name="section3_description" id="section3_description" class="form-control editor"
                                                          rows="6">{{ $resultSet->section3_description ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="high_achievers_points">High Achievers Points</label>
                    <textarea name="high_achievers_points" id="high_achievers_points" class="form-control editor"
                                                          rows="6">{{ $resultSet->high_achievers_points ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Section 2 Image </label>
                    <div class="input-group">
                    @if ($resultSet->section2_image)
                            <a href="{{ asset('assets/website/images/pages/screening-criteria/' . $resultSet->section2_image) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/screening-criteria/' . $resultSet->section2_image) }}" class="img-fluid rounded" height="400" width="250">
                            </a>
                    @endif
                    <input type="file" id="section2_image" name="section2_image" accept=".jpg, .jpeg, .svg, .png">
                    <div class="section2_image_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <input type="button"  onclick="submitFormData(this)" id="btnSubmit" class="btn btn-primary float-right" value="Save">
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
            const exts = ['jpeg','jpg','png'];

            let section2_image = document.getElementById
            ('section2_image');
            var errorCheck = false;

            if (section2_image.files.length != 0) {
                section2_image = section2_image.files[0].name;
                let ext_section2_image = section2_image.substr(section2_image.lastIndexOf('.') + 1);
                if (!exts.includes(ext_section2_image)) {
                    $("input[type='button']").prop('disabled', false);
                    $(".section2_image_error_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".section2_image_error_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if(errorCheck === true)
            {
                return false;
            }
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            bodyFormData.append('_method', 'put');
            axiosInstance.post('/admin/pages/screening-criteria/'+'{{$resultSet->id}}', bodyFormData,{
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
                            window.location.href = "/admin/pages/screening-criteria/"+"{{$resultSet->id}}"+"/edit";
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
                    console.log(error.response.data)
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

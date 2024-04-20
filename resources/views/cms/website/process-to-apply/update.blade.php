@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

            </div>
            <div>
                Process To Apply Page
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
                    <label for="sub_heading">Sub Heading</label>
                    <textarea name="sub_heading" id="sub_heading" class="form-control editor"
                                                          rows="6">{{ $resultSet->sub_heading ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="description">Description </label>
                    <textarea name="description" id="description" class="form-control editor"
                                                          rows="6">{{ $resultSet->description ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="image_description1">Image Description 1 <span
                        class="required-class">*</span></label>
                        <textarea name="image_description1" id="image_description1" class="form-control editor"
                        rows="6">{{ $resultSet->image_description1 ?? '' }}</textarea>
                        {{-- <input type="text" name="image_description1" id="image_description1" value="{{ $resultSet->image_description1 }}" class="form-control" > --}}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="image_description2">Image Description 2 </label>

                    <textarea name="image_description2" id="image_description2" class="form-control editor"
                                                          rows="6">{{ $resultSet->image_description2 ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="apply_steps">Apply Steps</label>
                    <textarea name="apply_steps" id="apply_steps" class="form-control editor"
                                                          rows="6">{{ $resultSet->apply_steps ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Image </label>
                    <div class="input-group">
                    @if ($resultSet->image)
                            <a href="{{ asset('assets/website/images/pages/process-to-apply/' . $resultSet->image) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/process-to-apply/' . $resultSet->image) }}" class="img-fluid rounded" height="400" width="250">
                            </a>
                    @endif
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .svg, .png">
                    <div class="image_error text-dark">Supported formats are png, jpeg and jpg</div>
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

            let image = document.getElementById
            ('image');
            var errorCheck = false;

            if (image.files.length != 0) {
                image = image.files[0].name;
                let ext_image = image.substr(image.lastIndexOf('.') + 1);
                if (!exts.includes(ext_image)) {
                    $("input[type='button']").prop('disabled', false);
                    $(".image_error_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".image_error_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if(errorCheck === true)
            {
                return false;
            }
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            bodyFormData.append('_method', 'put');
            axiosInstance.post('/admin/pages/process-to-apply/'+'{{$resultSet->id}}', bodyFormData,{
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
                            window.location.href = "/admin/pages/process-to-apply/"+"{{$resultSet->id}}"+"/edit";
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

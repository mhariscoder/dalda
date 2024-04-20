@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

            </div>
            <div>
               About Page
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Update About Page</h5>
        <form id="applyForm">
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="banner_heading">Banner Heading <span class="required-class">*</span></label>
                    <textarea name="banner_heading" id="banner_heading" class="form-control editor">{{ old('banner_heading', $updateAbout->banner_heading) }}</textarea>

                    {{-- <input type="text" name="banner_heading" id="banner_heading" class="form-control"
                        value="{{ old('banner_heading', $updateAbout->banner_heading) }}"> --}}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section1_heading">Section 1 Heading <span class="required-class">*</span></label>
                    <input type="text" name="section1_heading" id="section1_heading" class="form-control"
                        value="{{ old('section1_heading', $updateAbout->section1_heading) }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section1_description">Section 1 Description <span class="required-class">*</span></label>
                    <textarea name="section1_description" id="section1_description" class="form-control editor">{{ old('section1_description', $updateAbout->section1_description) }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section2_content1">Section 2 Content 1<span class="required-class">*</span></label>
                    <textarea name="section2_content1" id="section2_content1" class="form-control editor">{{ old('section2_content1', $updateAbout->section2_content1) }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section2_content2">Section 2 Content 2<span class="required-class">*</span></label>
                    <textarea name="section2_content2" id="section2_content2" class="form-control editor">{{ old('section2_content2', $updateAbout->section2_content2) }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section3_heading">Section 3 Heading <span class="required-class">*</span></label>
                    <input type="text" name="section3_heading" id="section3_heading" class="form-control"
                        value="{{ old('section3_heading', $updateAbout->section3_heading) }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section3_description">Section 3 Description<span class="required-class">*</span></label>
                    <textarea name="section3_description" id="section3_description" class="form-control editor">{{ old('section3_description', $updateAbout->section3_description) }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section4_heading1">Section 4 Heading 1<span class="required-class">*</span></label>
                    <input type="text" name="section4_heading1" id="section4_heading1" class="form-control"
                        value="{{ old('section4_heading1', $updateAbout->section4_heading1) }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section4_description1">Section 4 Description 1<span class="required-class">*</span></label>
                    <textarea name="section4_description1" id="section4_description1" class="form-control editor">{{ old('section4_description1', $updateAbout->section4_description1) }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section4_heading2">Section 4 Heading 2<span class="required-class">*</span></label>
                    <input type="text" name="section4_heading2" id="section4_heading2" class="form-control"
                        value="{{ old('section4_heading2', $updateAbout->section4_heading2) }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="section4_description2">Section 4 Description 2<span class="required-class">*</span></label>
                    <textarea name="section4_description2" id="section4_description2" class="form-control editor">{{ old('section4_description2', $updateAbout->section4_description2) }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="banner">Banner <span class="required-class">*</span></label>
                    <div class="input-group">
                        @if ($updateAbout->banner)
                            <a href="{{ asset('assets/website/images/pages/about/' . $updateAbout->banner) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/about/' . $updateAbout->banner) }}" class="img-fluid rounded">
                            </a>
                        @endif
                        <input type="file" id="banner" name="banner"
                            accept=".jpg, .jpeg, .png">
                        <div class="banner_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="section2_image1">Section 2 Image 1 <span class="required-class">*</span></label>
                    <div class="input-group">
                        @if ($updateAbout->section2_image1)
                            <a href="{{ asset('assets/website/images/pages/about/' . $updateAbout->section2_image1) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/about/' . $updateAbout->section2_image1) }}" class="img-fluid rounded">
                            </a>
                        @endif
                        <input type="file" id="section2_image1" name="section2_image1"
                            accept=".jpg, .jpeg, .png">
                        <div class="section2_image1_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="section2_image2">Section 2 Image 2 <span class="required-class">*</span></label>
                    <div class="input-group">
                        @if ($updateAbout->section2_image2)
                            <a href="{{ asset('assets/website/images/pages/about/' . $updateAbout->section2_image2) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/about/' . $updateAbout->section2_image2) }}" class="img-fluid rounded">
                            </a>
                        @endif
                        <input type="file" id="section2_image2" name="section2_image2"
                            accept=".jpg, .jpeg, .png">
                        <div class="section2_image2_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="section3_image">Section 3 Image <span class="required-class">*</span></label>
                    <div class="input-group">
                        @if ($updateAbout->section3_image)
                            <a href="{{ asset('assets/website/images/pages/about/' . $updateAbout->section3_image) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/about/' . $updateAbout->section3_image) }}" class="img-fluid rounded">
                            </a>
                        @endif
                        <input type="file" id="section3_image" name="section3_image"
                            accept=".jpg, .jpeg, .png">
                        <div class="section3_image_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="section4_image1">Section 4 Image 1 <span class="required-class">*</span></label>
                    <div class="input-group">
                        @if ($updateAbout->section4_image1)
                            <a href="{{ asset('assets/website/images/pages/about/' . $updateAbout->section4_image1) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/about/' . $updateAbout->section4_image1) }}" class="img-fluid rounded">
                            </a>
                        @endif
                        <input type="file" id="section4_image1" name="section4_image1"
                            accept=".jpg, .jpeg, .png">
                        <div class="section4_image1_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="section4_image2">Section 4 Image 2 <span class="required-class">*</span></label>
                    <div class="input-group">
                        @if ($updateAbout->section4_image2)
                            <a href="{{ asset('assets/website/images/pages/about/' . $updateAbout->section4_image2) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                <img src="{{ asset('assets/website/images/pages/about/' . $updateAbout->section4_image2) }}" class="img-fluid rounded">
                            </a>
                        @endif
                        <input type="file" id="section4_image2" name="section4_image2"
                            accept=".jpg, .jpeg, .png">
                        <div class="section4_image2_error text-dark">Supported formats are png, jpeg and jpg</div>
                    </div>
                </div>
            </div>
            <input type="button" onclick="submitFormData()" id="btnSubmit" class="btn btn-primary float-right" value="Save">
        </form>
    </div>
</div>
    {{-- <main class="content">
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Update About Page</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/pages/home" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form id="applyForm">
                                        <div class="row">
                                            <div class="col-md-12 form-errors"></div>
                                        </div>
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="title">Title <span class="required-class">*</span></label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                       value="{{ old('title',$updateAbout->title) }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="description">Short Description  <span class="required-class">*</span></label>
                                                <textarea name="short_description" id="short_description" class="form-control"
                                                          rows="3">{{ old('short_description',$updateAbout->short_description) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="description">Description  <span class="required-class">*</span><span
                                                            class="required-class">*</span></label>
                                                <textarea name="description" id="description" class="form-control"
                                                          rows="3">{{ old('description',$updateAbout->description) }}</textarea>
                                            </div>
                                        </div>

                                        @if($updateAbout->banner)
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group">
                                                        <img src="{{ asset('assets/website/images/pages/about/'.$updateAbout->banner) }}"
                                                             height="70" width="70">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Banner Image <span class="required-class">*</span></label>
                                                <input type="file" id="banner" name="banner" accept=".jpg, .jpeg, .svg, .png">
                                                <div class="banner_error text-dark">Supported formats are jpeg and jpg</div>
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
    </main> --}}
@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        function submitFormData() {
            $("input[type='button']").prop('disabled', true);
            const exts = ['png','jpeg','jpg'];

            let banner = document.getElementById
            ('banner');
            var errorCheck = false;

            if (banner.files.length != 0) {
                banner = banner.files[0].name;
                let ext_banner = banner.substr(banner.lastIndexOf('.') + 1);
                if (!exts.includes(ext_banner)) {
                    $("input[type='button']").prop('disabled', false);
                    $(".banner_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".banner_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if(errorCheck === true)
            {
                return false;
            }

            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios.post('/admin/pages/about-update/'+'{{$updateAbout->id}}', bodyFormData,{
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
                            window.location.href = "/admin/pages/about-update/"+"{{$updateAbout->id}}";
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

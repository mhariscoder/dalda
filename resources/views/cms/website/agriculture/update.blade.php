@extends('cms.layouts.master')

@section('content')
    {{-- <main> --}}

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>
                </div>
                <div>
                    Agriculture Page
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h4 class="card-title">Update Agriculture Page</h4>
            <form id="agricultureForm">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-errors"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="heading">Heading </label>
                        <input type="text" name="heading" id="heading" class="form-control"
                            value="{{ old('heading', $agriculture->heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description </label>
                        <textarea name="description" id="description" class="form-control editor" rows="3">{{ old('description', $agriculture->description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section1_content1">Section1 Content 1 </label>
                        <textarea name="section1_content1" id="section1_content1" class="form-control editor" rows="3">{{ old('section1_content1', $agriculture->section1_content1) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section1_content2">Section1 Content 2 </label>
                        <textarea name="section1_content2" id="section1_content2" class="form-control editor" rows="3">{{ old('section1_content2', $agriculture->section1_content2) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section2_content">Section2 Content </label>
                        <textarea name="section2_content" id="section2_content" class="form-control editor" rows="3">{{ old('section2_content', $agriculture->section2_content) }}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_heading">Section3 Heading </label>
                        <input type="text" name="section3_heading" id="section3_heading" class="form-control"
                            value="{{ old('section3_heading', $agriculture->section3_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_content">Section3 Content </label>
                        <textarea name="section3_content" id="section3_content" class="form-control editor" rows="3">{{ old('section3_content', $agriculture->section3_content) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section4_content">Section4 Content </label>
                        <textarea name="section4_content" id="section4_content" class="form-control editor" rows="3">{{ old('section4_content', $agriculture->section4_content) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="banner_heading">Banner Heading </label>
                        <textarea name="banner_heading" id="banner_heading" class="form-control editor" rows="3">{{ old('banner_heading', $agriculture->banner_heading) }}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="image">Banner Image </label>
                        <div class="input-group">
                            @if ($agriculture->banner)
                                <a href="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->banner) }}"
                                    data-toggle="lightupdateServices" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->banner) }}"
                                        class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="banner" name="banner" accept=".jpg, .jpeg, .png">
                            <div class="banner_error text-dark">Supported formats are png, jpeg and jpg</div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="image">Section1 Image 1 </label>
                        <div class="input-group">
                            @if ($agriculture->section1_image1)
                                <a href="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section1_image1) }}"
                                    data-toggle="lightupdateServices" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section1_image1) }}"
                                        class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section1_image1" name="section1_image1"
                                accept=".jpg, .jpeg, .png">
                            <div class="section1_image1_error text-dark">Supported formats are png, jpeg and jpg</div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="image">Section1 Image 2 </label>
                        <div class="input-group">
                            @if ($agriculture->section1_image2)
                                <a href="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section1_image2) }}"
                                    data-toggle="lightupdateServices" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section1_image2) }}"
                                        class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section1_image2" name="section1_image2"
                                accept=".jpg, .jpeg, .png">
                            <div class="section1_image2_error text-dark">Supported formats are png, jpeg and jpg</div>
                        </div>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="image">Section2 Image </label>
                        <div class="input-group">
                            @if ($agriculture->section2_image)
                                <a href="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section2_image) }}"
                                    data-toggle="lightupdateServices" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section2_image) }}"
                                        class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section2_image" name="section2_image" accept=".jpg, .jpeg, .png">
                            <div class="section2_image_error text-dark">Supported formats are png, jpeg and jpg</div>
                        </div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="image">Section4 Image </label>
                        <div class="input-group">
                            @if ($agriculture->section4_image)
                                <a href="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section4_image) }}"
                                    data-toggle="lightupdateServices" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/agriculture/' . $agriculture->section4_image) }}"
                                        class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section4_image" name="section4_image" accept=".jpg, .jpeg, .png">
                            <div class="section4_image_error text-dark">Supported formats are png, jpeg and jpg</div>
                        </div>
                    </div>
                </div>



                <button type="button" class="btn btn-primary float-right" onclick="submitFormData()">Save
                </button>
            </form>

        </div>

    </div>


    {{-- </main> --}}
@endsection


@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        function submitFormData() {
            $("input[type='button']").prop('disabled', true);
            const exts = ['jpeg', 'jpg'];

            let banner = document.getElementById('banner');
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
            if (errorCheck === true) {
                return false;
            }

            let form = document.querySelector('#agricultureForm');
            let bodyFormData = new FormData(form);
            console.log('form data', bodyFormData);
            axios.post('/admin/pages/agriculture-list/update/' + '{{ $agriculture->id }}', bodyFormData, {
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
                                window.location.reload();
                            }
                        }).catch(error => {
                            console.log('error', error);
                            swal({

                                title: error.response.data.msg,
                                icon: "error",
                                dangerMode: true,
                                closeOnClickOutside: false
                            });
                        });
                        preventDefault();

                    }
                })
                .catch(function(error) {
                    console.log('eww', error)
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

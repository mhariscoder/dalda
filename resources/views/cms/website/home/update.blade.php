@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                </div>
                <div>
                    Home Page
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Update Home Page</h5>
            <form id="applyForm">
                <div class="row">
                    <div class="col-md-12 form-errors"></div>
                </div>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="banner_heading">Banner Heading <span class="required-class">*</span></label>
                        <textarea name="banner_heading" id="banner_heading" class="form-control editor">{{ old('banner_heading', $updateHome->banner_heading) }}</textarea>

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="banner_description">Banner Description <span class="required-class">*</span></label>
                        <textarea name="banner_description" id="banner_description" class="form-control editor">{{ old('banner_description', $updateHome->banner_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section1_heading">Section 1 Heading <span class="required-class">*</span></label>
                        <input type="text" name="section1_heading" id="section1_heading" class="form-control"
                            value="{{ old('section1_heading', $updateHome->section1_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section1_description">Section 1 Description <span
                                class="required-class">*</span></label>
                        <textarea name="section1_description" id="section1_description" class="form-control editor">{{ old('section1_description', $updateHome->section1_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section2_heading">Section 2 Heading <span class="required-class">*</span></label>
                        <input type="text" name="section2_heading" id="section2_heading" class="form-control"
                            value="{{ old('section2_heading', $updateHome->section2_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card1_heading">Card 1 Heading <span class="required-class">*</span></label>
                        <input type="text" name="card1_heading" id="card1_heading" class="form-control"
                            value="{{ old('card1_heading', $updateHome->card1_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card1_description">Card 1 Description <span class="required-class">*</span></label>
                        <textarea name="card1_description" id="card1_description" class="form-control editor">{{ old('card1_description', $updateHome->card1_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card2_heading">Card 2 Heading <span class="required-class">*</span></label>
                        <input type="text" name="card2_heading" id="card2_heading" class="form-control"
                            value="{{ old('card2_heading', $updateHome->card2_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card2_description">Card 2 Description <span class="required-class">*</span></label>
                        <textarea name="card2_description" id="card2_description" class="form-control editor">{{ old('card2_description', $updateHome->card2_description) }}</textarea>
                    </div>
                </div>
                {{-- <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card3_heading">Card 3 Heading <span class="required-class">*</span></label>
                        <input type="text" name="card3_heading" id="card3_heading" class="form-control"
                            value="{{ old('card3_heading', $updateHome->card3_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card3_description">Card 3 Description <span class="required-class">*</span></label>
                        <textarea name="card3_description" id="card3_description" class="form-control editor">{{ old('card3_description', $updateHome->card3_description) }}</textarea>
                    </div>
                </div> --}}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_heading">Section 3 Heading <span class="required-class">*</span></label>
                        <input type="text" name="section3_heading" id="section3_heading" class="form-control"
                            value="{{ old('section3_heading', $updateHome->section3_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_description">Section 3 Description <span
                                class="required-class">*</span></label>
                        <textarea name="section3_description" id="section3_description" class="form-control editor">{{ old('section3_description', $updateHome->section3_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_sub_heading">Section 3 Sub Heading <span
                                class="required-class">*</span></label>
                        <textarea name="section3_sub_heading" id="section3_sub_heading" class="form-control editor">{{ old('section3_sub_heading', $updateHome->section3_sub_heading) }}</textarea>

                        {{-- <input type="text" name="section3_sub_heading" id="section3_sub_heading" class="form-control"
                            value="{{ old('section3_sub_heading', $updateHome->section3_sub_heading) }}"> --}}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_sub_description">Section 3 Sub Description <span
                                class="required-class">*</span></label>
                        <textarea name="section3_sub_description" id="section3_sub_description" class="form-control editor">{{ old('section3_sub_description', $updateHome->section3_sub_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section3_sub_content">Section 3 Sub Content <span
                                class="required-class">*</span></label>
                        <textarea name="section3_sub_content" id="section3_sub_content" class="form-control editor">{{ old('section3_sub_content', $updateHome->section3_sub_content) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section4_heading">Section 4 Heading <span class="required-class">*</span></label>
                        <input type="text" name="section4_heading" id="section4_heading" class="form-control"
                            value="{{ old('section4_heading', $updateHome->section4_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section4_description">Section 4 Description <span
                                class="required-class">*</span></label>
                        <textarea name="section4_description" id="section4_description" class="form-control editor">{{ old('section4_description', $updateHome->section4_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section5_heading">Section 5 Heading <span class="required-class">*</span></label>
                        <input type="text" name="section5_heading" id="section5_heading" class="form-control"
                            value="{{ old('section5_heading', $updateHome->section5_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section5_description">Section 5 Description <span
                                class="required-class">*</span></label>
                        <textarea name="section5_description" id="section5_description" class="form-control editor">{{ old('section5_description', $updateHome->section5_description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_heading">Section 6 Heading <span class="required-class">*</span></label>
                        <input type="text" name="section6_heading" id="section6_heading" class="form-control"
                            value="{{ old('section6_heading', $updateHome->section6_heading) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_heading1">Section 6 Sub Heading 1 <span
                                class="required-class">*</span></label>
                        <input type="text" name="section6_sub_heading1" id="section6_sub_heading1"
                            class="form-control"
                            value="{{ old('section6_sub_heading1', $updateHome->section6_sub_heading1) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_description1">Section 6 Sub Description 1 <span
                                class="required-class">*</span></label>
                        <textarea name="section6_sub_description1" id="section6_sub_description1" class="form-control editor">{{ old('section6_sub_description1', $updateHome->section6_sub_description1) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_link1">Section 6 Sub Link 1 <span class="required-class">*</span></label>
                        <input type="text" name="section6_sub_link1" id="section6_sub_link1" class="form-control"
                            value="{{ old('section6_sub_link1', $updateHome->section6_sub_link1) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_heading2">Section 6 Sub Heading 2 <span
                                class="required-class">*</span></label>
                        <input type="text" name="section6_sub_heading2" id="section6_sub_heading2"
                            class="form-control"
                            value="{{ old('section6_sub_heading2', $updateHome->section6_sub_heading2) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_description2">Section 6 Sub Description 2 <span
                                class="required-class">*</span></label>
                        <textarea name="section6_sub_description2" id="section6_sub_description2" class="form-control editor">{{ old('section6_sub_description2', $updateHome->section6_sub_description2) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_link2">Section 6 Sub Link 2 <span class="required-class">*</span></label>
                        <input type="text" name="section6_sub_link2" id="section6_sub_link2" class="form-control"
                            value="{{ old('section6_sub_link2', $updateHome->section6_sub_link2) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_heading3">Section 6 Sub Heading 3 <span
                                class="required-class">*</span></label>
                        <input type="text" name="section6_sub_heading3" id="section6_sub_heading3"
                            class="form-control"
                            value="{{ old('section6_sub_heading3', $updateHome->section6_sub_heading3) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_description3">Section 6 Sub Description 3 <span
                                class="required-class">*</span></label>
                        <textarea name="section6_sub_description3" id="section6_sub_description3" class="form-control editor">{{ old('section6_sub_description3', $updateHome->section6_sub_description3) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="section6_sub_link3">Section 6 Sub Link 3 <span class="required-class">*</span></label>
                        <input type="text" name="section6_sub_link3" id="section6_sub_link3" class="form-control"
                            value="{{ old('section6_sub_link3', $updateHome->section6_sub_link3) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="input-group">Banner Image</label>
                        <div class="input-group">
                            @if ($updateHome->banner)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->banner) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->banner) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="banner" name="banner" accept=".jpg, .jpeg, .png">
                            <div class="banner_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Mobile Banner <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->banner_mobile)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->banner_mobile) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->banner_mobile) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="banner_mobile" name="banner_mobile"
                                accept=".jpg, .jpeg, .png">
                            <div class="banner_mobile_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section 1 Image <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->section1_image)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->section1_image) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->section1_image) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section1_image" name="section1_image" accept=".jpg, .jpeg, .png">
                            <div class="section1_image_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section 1 Image 2 <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->section1_image2)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->section1_image2) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->section1_image2) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section1_image2" name="section1_image2" accept=".jpg, .jpeg, .png">
                            <div class="section1_image2_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section 2 Image <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->section2_image)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->section2_image) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->section2_image) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section2_image" name="section2_image" accept=".jpg, .jpeg, .png">
                            <div class="section2_image_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Card Section Image <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->card_section_image)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->card_section_image) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->card_section_image) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="card_section_image" name="card_section_image"
                                accept=".jpg, .jpeg, .png">
                            <div class="card_section_image_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section 6 Sub Image 1 <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->section6_sub_image1)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->section6_sub_image1) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->section6_sub_image1) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section6_sub_image1" name="section6_sub_image1"
                                accept=".jpg, .jpeg, .png">
                            <div class="section6_sub_image1_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section 6 Sub Image 2 <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->section6_sub_image2)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->section6_sub_image2) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->section6_sub_image2) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section6_sub_image2" name="section6_sub_image2"
                                accept=".jpg, .jpeg, .png">
                            <div class="section6_sub_image2_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Section 6 Sub Image 3 <span class="required-class">*</span></label>
                        <div class="input-group">
                            @if ($updateHome->section6_sub_image3)
                                <a href="{{ asset('assets/website/images/pages/landing/' . $updateHome->section6_sub_image3) }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                    <img src="{{ asset('assets/website/images/pages/landing/' . $updateHome->section6_sub_image3) }}" class="img-fluid rounded">
                                </a>
                            @endif
                            <input type="file" id="section6_sub_image3" name="section6_sub_image3"
                                accept=".jpg, .jpeg, .png">
                            <div class="section6_sub_image3_error text-dark">Supported formats are jpeg and jpg</div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary float-right" onclick="submitFormData()">Save
                </button>
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
                                    <h4 class="card-title">Update Home Page</h4>
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
                                                       value="{{ old('title',$updateHome->title) }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="description">Description  <span class="required-class">*</span></label>
                                                <textarea name="description" id="description" class="form-control"
                                                          rows="3">{{ old('description',$updateHome->description) }}</textarea>
                                            </div>
                                        </div>

                                        @if ($updateHome->banner)
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group">
                                                        <img src="{{ asset('assets/website/images/pages/landing/'.$updateHome->banner) }}"
                                                             height="70" width="70">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Banner Image <span class="required-class">*</span></label>
                                                <input type="file" id="banner" name="banner" accept=".jpg, .jpeg, .png">
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
            const exts = ['jpeg', 'jpg', 'png'];

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

            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            console.log('data',bodyFormData);
            axios.post('/admin/pages/home-update/' + '{{ $updateHome->id }}', bodyFormData, {
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
                                window.location.href = "/admin/pages/home-update/" + '{{ $updateHome->id }}';
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

@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                </div>
                <div>
                    Education Page
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">

        <div class="card-body">
            <h5 class="card-title">Update Education Page</h5>

            <div class="row">
                <div class="col-12">
                    <form action="/admin/pages/education/main-update/{{ $institute->id }}" method="POST"
                        enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="banner_heading">Banner Heading <span class="required-class">*</span></label>
                                <textarea name="banner_heading" id="banner_heading" class="form-control editor">{{ old('banner_heading', $institute->banner_heading) }}</textarea>

                                {{-- <input type="text" name="banner_heading" id="banner_heading" class="form-control"
                                    value="{{ old('banner_heading', $institute->banner_heading) }}"> --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section1_heading">Section 1 Heading <span
                                        class="required-class">*</span></label>
                                <input type="text" name="section1_heading" id="section1_heading" class="form-control"
                                    value="{{ old('section1_heading', $institute->section1_heading) }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section1_description">Section 1 Description <span
                                        class="required-class">*</span></label>
                                <textarea name="section1_description" id="section1_description" class="form-control editor">{{ old('section1_description', $institute->section1_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section2_description">Section 2 Description <span
                                        class="required-class">*</span></label>
                                <textarea name="section2_description" id="section2_description" class="form-control editor">{{ old('section2_description', $institute->section2_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section3_heading">Section 3 Heading <span
                                        class="required-class">*</span></label>
                                <input type="text" name="section3_heading" id="section3_heading" class="form-control"
                                    value="{{ old('section3_heading', $institute->section3_heading) }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section3_description">Section 1 Description <span
                                        class="required-class">*</span></label>
                                <textarea name="section3_description" id="section3_description" class="form-control editor">{{ old('section3_description', $institute->section3_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section4_heading">Section 4 Heading <span
                                        class="required-class">*</span></label>
                                <input type="text" name="section4_heading" id="section4_heading" class="form-control"
                                    value="{{ old('section4_heading', $institute->section4_heading) }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section4_description">Section 4 Description <span
                                        class="required-class">*</span></label>
                                <textarea name="section4_description" id="section4_description" class="form-control editor">{{ old('section4_description', $institute->section4_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section5_content">Section 5 Content <span
                                        class="required-class">*</span></label>
                                <textarea name="section5_content" id="section5_content" class="form-control editor">{{ old('section5_content', $institute->section5_content) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section6_heading">Section 6 Heading <span
                                        class="required-class">*</span></label>
                                <input type="text" name="section6_heading" id="section6_heading" class="form-control"
                                    value="{{ old('section6_heading', $institute->section6_heading) }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section6_description">Section 6 Description <span
                                        class="required-class">*</span></label>
                                <textarea name="section6_description" id="section6_description" class="form-control editor">{{ old('section6_description', $institute->section6_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section7_heading">Section 7 Heading <span
                                        class="required-class">*</span></label>
                                <input type="text" name="section7_heading" id="section7_heading" class="form-control"
                                    value="{{ old('section7_heading', $institute->section7_heading) }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="section7_description">Section 7 Description <span
                                        class="required-class">*</span></label>
                                <textarea name="section7_description" id="section7_description" class="form-control editor">{{ old('section7_description', $institute->section7_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="banner">Banner <span class="required-class">*</span></label>
                                <div class="input-group">
                                    @if ($institute->banner)
                                        <a href="{{ asset('assets/website/images/pages/education/' . $institute->banner) }}"
                                            data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                            <img src="{{ asset('assets/website/images/pages/education/' . $institute->banner) }}"
                                                class="img-fluid rounded">
                                        </a>
                                    @endif
                                    <input type="file" id="banner" name="banner" accept=".jpg, .jpeg, .png">
                                    <div class="banner_error text-dark">Supported formats are png, jpeg and jpg
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="section2_image">Section 2 Image <span class="required-class">*</span></label>
                                <div class="input-group">
                                    @if ($institute->section2_image)
                                        <a href="{{ asset('assets/website/images/pages/education/' . $institute->section2_image) }}"
                                            data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                            <img src="{{ asset('assets/website/images/pages/education/' . $institute->section2_image) }}"
                                                class="img-fluid rounded">
                                        </a>
                                    @endif
                                    <input type="file" id="section2_image" name="section2_image"
                                        accept=".jpg, .jpeg, .png">
                                    <div class="section2_image_error text-dark">Supported formats are png, jpeg
                                        and jpg</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="section3_image">Section 3 Image <span class="required-class">*</span></label>
                                <div class="input-group">
                                    @if ($institute->section3_image)
                                        <a href="{{ asset('assets/website/images/pages/education/' . $institute->section3_image) }}"
                                            data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                            <img src="{{ asset('assets/website/images/pages/education/' . $institute->section3_image) }}"
                                                class="img-fluid rounded">
                                        </a>
                                    @endif
                                    <input type="file" id="section3_image" name="section3_image"
                                        accept=".jpg, .jpeg, .png">
                                    <div class="section3_image_error text-dark">Supported formats are png, jpeg
                                        and jpg</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="section4_image">Section 4 Image <span class="required-class">*</span></label>
                                <div class="input-group">
                                    @if ($institute->section4_image)
                                        <a href="{{ asset('assets/website/images/pages/education/' . $institute->section4_image) }}"
                                            data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                            <img src="{{ asset('assets/website/images/pages/education/' . $institute->section4_image) }}"
                                                class="img-fluid rounded">
                                        </a>
                                    @endif
                                    <input type="file" id="section4_image" name="section4_image"
                                        accept=".jpg, .jpeg, .png">
                                    <div class="section4_image_error text-dark">Supported formats are png, jpeg
                                        and jpg</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="section7_image">Section 7 Image <span class="required-class">*</span></label>
                                <div class="input-group">
                                    @if ($institute->section7_image)
                                        <a href="{{ asset('assets/website/images/pages/education/' . $institute->section7_image) }}"
                                            data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                            <img src="{{ asset('assets/website/images/pages/education/' . $institute->section7_image) }}"
                                                class="img-fluid rounded">
                                        </a>
                                    @endif
                                    <input type="file" id="section7_image" name="section7_image"
                                        accept=".jpg, .jpeg, .png">
                                    <div class="section7_image_error text-dark">Supported formats are png, jpeg
                                        and jpg</div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" value="Save">
                    </form>
                </div>
            </div>
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
                                    <h4 class="card-title">Update Education / Scholarships</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/education-list" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/admin/update-education-list/{{$institute->id}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="institute_name">Institute Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="institute_name" id="institute_name" class="form-control"
                                                           value="{{ old('institute_name',$institute->institute_name) }}" maxlength="55">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="web_url">Institute Web Url <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="web_url" id="web_url" class="form-control"
                                                           value="{{ old('web_url',$institute->web_url) }}" maxlength="55">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description </label>
                                                    <textarea name="description" id="description" class="form-control"
                                                              rows="3">{{ old('description',$institute->description) }}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save
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

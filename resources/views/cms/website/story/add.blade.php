@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

            </div>
            <div>
                University Icons Management
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Add University Icon</h5>
        <form id="applyForm">
            @csrf
            @if($errors->any())
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
                <div class=" form-group col-md-12 mb-3">
                    <label for="heading">Heading <span class="required-class">*</span></label>
                    <input class="form-control" type="text" id="heading" name="heading" placeholder="Enter Heading">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="video_description">Video Description </label>
                    <textarea name="video_description" id="video_description" class="form-control editor" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class=" form-group col-md-12 mb-3">
                    <label for="student_name">Student Name <span class="required-class">*</span></label>
                    <input class="form-control" type="text" id="student_name" name="student_name" placeholder="Enter Student Name">
                </div>
            </div>
            <div class="form-row">
                <div class=" form-group col-md-12 mb-3">
                    <label for="uni_name">University Name <span class="required-class">*</span></label>
                    <input class="form-control" type="text" id="uni_name" name="uni_name" placeholder="Enter University Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Description </label>
                    <textarea name="description" id="description" class="form-control editor" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row upload">
                <div class="form-group col-md-12">
                    <label for="video_file">Upload Video<span
                                class="required-class"> *</span></label>
                    <input type="file" name="video_file" accept="video/mp4,video/x-m4v,video/*" class="form-control"/>
                    <div id="progress-container">
                        <div id="progress-bar"></div>
                    </div>
                </div>
            </div>
            <input type="button"  onclick="submitFormData(this)" id="btnSubmit" class="btn btn-primary float-right" value="Save">
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
                                    <h4 class="card-title">Add About Page</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/pages/about" class="btn btn-primary float-right">← Back</a>
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
                                                <label for="description">Short Description  <span class="required-class">*</span></label>
                                                <textarea name="short_description" id="short_description" class="form-control"
                                                          rows="3">{{ old('short_description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="description">Full Description  <span class="required-class">*</span></label>
                                                <textarea name="description" id="description" class="form-control"
                                                          rows="6">{{ old('description') }}</textarea>
                                            </div>
                                        </div>

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
        const progressBar = document.getElementById("progress-bar");
        const axiosInstance = axios.create();
        function submitFormData(button) {
            // $("input[type='button']").prop('disabled', true);
            // const exts = ['jpeg','jpg','png'];

            // let icon = document.getElementById
            // ('icon');
            // var errorCheck = false;

            // if (icon.files.length != 0) {
            //     icon = icon.files[0].name;
            //     let ext_icon = icon.substr(icon.lastIndexOf('.') + 1);
            //     if (!exts.includes(ext_icon)) {
            //         $("input[type='button']").prop('disabled', false);
            //         $(".icon_error").removeClass('text-dark').addClass('text-danger');
            //         errorCheck = true;
            //     } else {
            //         $(".icon_error").removeClass('text-danger').addClass('text-dark');
            //     }
            // }
            // if(errorCheck === true)
            // {
            //     return false;
            // }
            progressBar.style.width = "0%";
            button.disabled = true;
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axiosInstance({
                method: 'post',
                url: '/admin/pages/story',
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
                            window.location.href = "/admin/pages/story";
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
        axiosInstance.defaults.onUploadProgress = function(progressEvent) {
            const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
            progressBar.style.width = `${percentCompleted}%`;
        };
    </script>
    @endpush

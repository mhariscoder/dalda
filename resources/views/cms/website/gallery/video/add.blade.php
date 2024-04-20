@extends('cms.layouts.master')

@section('content')
    @php
        $category = old("category");
    @endphp
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

            </div>
            <div>
                Videos
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Upload Video</h5>
        <form id="applyForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="category">Select Page <span
                                class="required-class">*</span></label>
                    <select class="form-control category" id="category" name="category">
                        <option value="">Select</option>
                        @foreach($categories as $val)
                            <option value="{{$val}}" {{ $category === $val ? "selected" : ""}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row upload">
                <div class="form-group col-md-12">
                    <label for="video_file">Upload Video<span
                                class="required-class"> *</span></label>
                    <input type="file" id="video_file" name="video_file" accept="video/mp4,video/x-m4v,video/*" class="form-control"/>
                    <div id="progress-container">
                        <div id="progress-bar"></div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary float-right"  onclick="submitFormData(this)" type="button">Save</button>
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
                                    <h4 class="card-title">Upload Video</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/gallery-video-list" class="btn btn-primary float-right">← Back</a>
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
                                                <label for="category">Select Page <span
                                                            class="required-class">*</span></label>
                                                <select class="form-control category" name="category">
                                                    <option value="">Select</option>
                                                    @foreach($categories as $val)
                                                        <option value="{{$val}}" {{ $category === $val ? "selected" : ""}}>{{$val}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row agriculture">
                                            <div class="form-group col-md-12">
                                                <label for="university_name">University Name <span
                                                            class="required-class">*</span></label>
                                                <select class="form-control" name="university_name">
                                                    <option value="">Select</option>
                                                    @foreach($agricultures as $val)
                                                        <option value="{{$val->id}}" {{ (int)old('university_name') === $val->id ? "selected" : ""}}>{{$val->university_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row hospital">
                                            <div class="form-group col-md-12">
                                                <label for="hospital_name">Hospital Name <span
                                                            class="required-class">*</span></label>
                                                <select class="form-control" name="hospital_name">
                                                    <option value="">Select</option>
                                                    @foreach($hospitals as $val)
                                                        <option value="{{$val->id}}" {{ (int)old('hospital_name') === $val->id ? "selected" : ""}}>{{$val->hospital_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row upload">
                                            <div class="form-group col-md-12">
                                                <label for="video_name">Video Url<span
                                                            class="required-class"> *</span></label>
                                                <input type="url" name="video_url" class="form-control"
                                                       value="{{ old('video_url') }}" placeholder="Enter Video Url"/>
                                            </div>
                                        </div>

                                        <input type="button" class="btn btn-primary"
                                               onclick="submitFormData()" value="Save"/>
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
        switch ("{{$category}}") {
            case 'Agriculture':
                $(".agriculture").show();
                $(".hospital").hide();
                break;
            case 'Hospital':
                $(".hospital").show();
                $(".agriculture").hide();
                break;
            default:
                $(".agriculture, .hospital").hide();
        }

        $(".category").on("change", function () {
            switch ($(this).find(":selected").val()) {
                case 'Agriculture':
                    $(".agriculture").show();
                    $("#hospital_name").val('');
                    $(".hospital").hide();
                    break;
                case 'Hospital':
                    $(".hospital").show();
                    $("#university_name").val('');
                    $(".agriculture").hide();
                    break;
                default:
                    $(".agriculture, .hospital").hide();
                    $("#university_name,#hospital_name").val('');
            }
        });
        const progressBar = document.getElementById("progress-bar");
        const category = document.getElementById("category");
        const videoFile = document.getElementById("video_file");
        const axiosInstance = axios.create();
        function submitFormData(button) {
            if(category.value === ""){
                swal({
                    title: "Please select category",
                    icon: "error",
                    dangerMode: true,
                    closeOnClickOutside: false
                });
                return false;
            }
            if(videoFile.value === ""){
                swal({
                    title: "Please select video file",
                    icon: "error",
                    dangerMode: true,
                    closeOnClickOutside: false
                });
                return false;
            }
            progressBar.style.width = "0%";
            button.disabled = true;
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axiosInstance({
                method: 'post',
                url: '/admin/add-gallery-video-list',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data'}
            })
                .then(function (response) {
                    if (response) {
                        button.disabled = false;
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/admin/gallery-video-list";
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
                    button.disabled = false;
                    $(".alert-danger").remove();
                    let html = `<div class="alert alert-danger"><strong>Whoops!</strong><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data, function (k, v) {
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

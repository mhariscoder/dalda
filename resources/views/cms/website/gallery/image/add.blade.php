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
                Image Gallery
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Upload Image</h5>
        <form id="applyForm" class="needs-validation" novalidate>
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

            <div class="form-row upload">
                <div class="form-group col-md-12">
                    <label for="image_file">Upload Image<span
                                class="required-class"> *</span></label>
                    <input type="file" id="i_file" name="image_file"  accept=".jpg,.jpeg,.png" class="form-control"/>
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
                                    <h4 class="card-title">Add Image</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/gallery-image-list" class="btn btn-primary float-right">← Back</a>
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
                                                <label for="category">Select Category <span
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
                                                <select class="form-control" id="university_name" name="university_name">
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
                                                <select class="form-control" id="hospital_name" name="hospital_name">
                                                    <option value="">Select</option>
                                                    @foreach($hospitals as $val)
                                                        <option value="{{$val->id}}" {{ (int)old('hospital_name') === $val->id ? "selected" : ""}}>{{$val->hospital_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row education">
                                            <div class="form-group col-md-12">
                                                <label for="institute_name">Institution Name <span
                                                            class="required-class">*</span></label>
                                                <select class="form-control" id="institute_name" name="institute_name">
                                                    <option value="">Select</option>
                                                    @foreach($institutes as $val)
                                                        <option value="{{$val->id}}" {{ (int)old('institute_name') === $val->id ? "selected" : ""}}>{{$val->institute_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="image">Upload Image <span
                                                            class="required-class">*</span></label>
                                                <input type="file" id="i_file" name="image" class="form-control"
                                                       accept=".jpg,.jpeg,.png"
                                                       value="{{ old('image') }}">
                                                <div class="i_file_error text-dark">Supported formats are jpeg and jpg</div>
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
                $(".hospital,.education").hide();
                $("#hospital_name,#institute_name").val("");
                break;
            case 'Hospital':
                $(".hospital").show();
                $(".agriculture,.education").hide();
                $("#university_name,#institute_name").val("");
                break;
            case 'Education / Scholarship':
                $(".education").show();
                $(".agriculture,.hospital").hide();
                $("#university_name,#hospital_name").val("");
                break;
            default:
                $(".agriculture, .hospital, .education").hide();
                $("#university_name,#hospital_name,#institute_name").val("");
        }

        $(".category").on("change", function () {
            switch ($(this).find(":selected").val()) {
                case 'Agriculture':
                    $(".agriculture").show();
                    $(".hospital,.education").hide();
                    $("#hospital_name,#institute_name").val("");
                    break;
                case 'Hospital':
                    $(".hospital").show();
                    $(".agriculture,.education").hide();
                    $("#university_name,#institute_name").val("");
                    break;
                case 'Education / Scholarship':
                    $(".education").show();
                    $(".agriculture,.hospital").hide();
                    $("#university_name,#hospital_name").val("");
                    break;
                default:
                    $(".agriculture, .hospital, .education").hide();
                    $("#university_name,#hospital_name,#institute_name").val("");
            }
        });
        function submitFormData() {
            const exts = ['jpeg','jpg','png'];

            let i_file = document.getElementById
            ('i_file');
            var errorCheck = false;

            if (i_file.files.length != 0) {
                i_file = i_file.files[0].name;
                let ext_i_file = i_file.substr(i_file.lastIndexOf('.') + 1);
                if (!exts.includes(ext_i_file)) {
                    $(".i_file_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".i_file_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if(errorCheck === true)
            {
                return false;
            }

            $("input[type='button']").prop('disabled', true);
            this.disabled = true;
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios({
                method: 'post',
                url: '/admin/add-gallery-image-list',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data'}
            })
                .then(function (response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/admin/gallery-image-list";
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
    </script>
@endpush

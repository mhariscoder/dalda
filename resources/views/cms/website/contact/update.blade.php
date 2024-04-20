@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                </div>
                <div>
                    Contact Page
                </div>

            </div>
        </div>
    </div>

    <div class="main-card mb-3 card" >

                        <div class="card-body">
                            <h4 class="card-title">Update Contact Page</h4>

                                    <form id="applyForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 form-errors"></div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="title">Title </label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ old('title', $updateContact->title) }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="sub_heading">Sub Heading </label>
                                                <input type="text" name="sub_heading" id="sub_heading"
                                                    class="form-control"
                                                    value="{{ old('sub_heading', $updateContact->sub_heading) }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Office Number </label>
                                                <input type="text" name="office_no" id="office_no"
                                                    class="form-control phoneNumberOnly" placeholder="Enter Office Number"
                                                    value="{{ old('office_no', $updateContact->office_no) }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Email </label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Enter Email" maxlength="55"
                                                    value="{{ old('email', $updateContact->email) }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="address">Address </label>
                                                <textarea name="address" id="address" class="form-control editor" rows="3">{{ old('address', $updateContact->address) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="banner_heading">Banner Heading </label>
                                                <textarea name="banner_heading" id="banner_heading" class="form-control editor" rows="3">{{ old('banner_heading', $updateContact->banner_heading) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="image">Banner Image </label>
                                                <div class="input-group">
                                                    @if ($updateContact->banner)
                                                        <a href="{{ asset('assets/website/images/pages/contact/' . $updateContact->banner) }}"
                                                            data-toggle="lightupdateServices" data-gallery="gallery"
                                                            class="col-md-4">
                                                            <img src="{{ asset('assets/website/images/pages/contact/' . $updateContact->banner) }}"
                                                                class="img-fluid rounded">
                                                        </a>
                                                    @endif
                                                    <input type="file" id="banner" name="banner"
                                                        accept=".jpg, .jpeg, .png">
                                                    <div class="banner_error text-dark">Supported formats are png, jpeg and
                                                        jpg</div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="button" class="btn btn-primary float-right"
                                            onclick="submitFormData()">Save
                                        </button>
                                    </form>

                        </div>
                    </div>


@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        $(".phoneNumberOnly").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

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

            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios.post('/admin/pages/update-contact/' + '{{ $updateContact->id }}', bodyFormData, {
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
                                window.location.href = '/admin/pages/update-contact/' +
                                    '{{ $updateContact->id }}';
                            }
                        }).catch(error => {
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

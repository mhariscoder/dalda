@extends('cms.layouts.master')

@section('content')
    <main>
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                    </div>
                    <div>
                        Health - Hospital Page

                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">

                            <div class="card-body">
                                <div class="row w-100 ">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Add Hospital Details</h4>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <a href="/admin/pages/education/services-list/{{ \App\Models\CMSEducation::EDUCATION_ID }}"
                                            class="btn btn-primary float-right">← Back</a>
                                    </div> --}}
                                </div>

                                        <form id="hospitalForm">

                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 form-errors"></div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="name">Name <span
                                                            class="required-class">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ old('name') }}" maxlength="55">
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="sort_order">Sort Order <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="sort_order" id="sort_order" class="form-control"
                                                           value="{{ old('sort_order') }}" maxlength="55">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="image">Image <span
                                                            class="required-class">*</span></label>
                                                    <div class="input-group">

                                                        <input type="file" id="image" name="image"
                                                            accept=".jpg, .jpeg, .png">
                                                        <div class="image_error text-dark">Supported formats are png, jpeg
                                                            and jpg</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary float-right" onclick="submitFormData()">Save
                                            </button>


                                        </form>

                            </div>

                    </div>


    </main>
@endsection


@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script src="/assets/js/select2.full.min.js"></script>
    <script src="/assets/js/select2.script.js"></script>
    <script>
        function submitFormData() {
            $("input[type='button']").prop('disabled', true);
            const exts = ['jpeg', 'jpg', 'png'];

            let image = document.getElementById('image');
            var errorCheck = false;

            if (image.files.length != 0) {
                image = image.files[0].name;
                let ext_image = image.substr(image.lastIndexOf('.') + 1);
                if (!exts.includes(ext_image)) {
                    $("input[type='button']").prop('disabled', false);
                    $(".image_error").removeClass('text-dark').addClass('text-danger');
                    errorCheck = true;
                } else {
                    $(".image_error").removeClass('text-danger').addClass('text-dark');
                }
            }
            if (errorCheck === true) {
                return false;
            }






            let form = document.querySelector('#hospitalForm');
            let bodyFormData = new FormData(form);



            axios({
                    method: 'post',
                    url: '/admin/pages/health/add-hospitals-list/' + {{ \App\Models\CMSEducation::EDUCATION_ID }} +
                        '/add',
                    data: bodyFormData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title:"Successfully Added",
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href =
                                    '/admin/pages/health/hospitals-list/{{ \App\Models\CmsHealth::HEALTH_ID }}';
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

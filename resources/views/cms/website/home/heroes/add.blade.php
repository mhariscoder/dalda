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
                        Heroes
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">

            <div class="card-body">
                <div class="row w-100 ">
                    <div class="col-md-6">
                        <h4 class="card-title">Add Hero Details</h4>
                    </div>
                </div>

                <form id="heroForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-errors"></div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title <span class="required-class">*</span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}" maxlength="55">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="designation">Designation <span class="required-class">*</span></label>
                            <input type="text" name="designation" id="designation" class="form-control"
                                value="{{ old('designation') }}" maxlength="55">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="department">Department <span class="required-class">*</span></label>
                            <input type="text" name="department" id="department" class="form-control"
                                value="{{ old('department') }}" maxlength="55">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description<span class="required-class">*</span> </label>
                            <textarea name="description" id="description" class="form-control editor" rows="3">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="sort_order">Sort Order <span class="required-class">*</span></label>
                            <input type="text" name="sort_order" id="sort_order" class="form-control"
                                value="{{ old('sort_order') }}" maxlength="55">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="image">Image <span class="required-class">*</span></label>
                            <div class="input-group">

                                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png">
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






            let form = document.querySelector('#heroForm');
            let bodyFormData = new FormData(form);



            axios({
                    method: 'post',
                    url: '/admin/pages/add-heroes-list/' + {{ \App\Models\CMSHOME::HOME_ID }} +
                        '/add',
                    data: bodyFormData,
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title: "Successfully Added",
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href =
                                    '/admin/pages/heroes-list/{{ \App\Models\CMSHOME::HOME_ID }}';
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

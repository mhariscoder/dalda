@extends('cms.layouts.master')

@section('content')
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
                                <h4 class="card-title">Update Hero Details</h4>
                            </div>
                        </div>

                                <form id="heroForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 form-errors"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title"> Title </label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                value="{{ old('title', $updateHero->title) }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="designation"> Designation </label>
                                            <input type="text" name="designation" id="designation" class="form-control"
                                                value="{{ old('designation', $updateHero->designation) }}">
                                        </div>
                                    </div><div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="department"> Department </label>
                                            <input type="text" name="department" id="department" class="form-control"
                                                value="{{ old('department', $updateHero->department) }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description"> Description </label>
                                            <textarea name="description" id="description" class="form-control editor">{{ old('description', $updateHero->description) }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="sort_order"> Sort Order </label>
                                            <input type="number" name="sort_order" id="sort_order" class="form-control"
                                                value="{{ old('sort_order', $updateHero->sort_order) }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="image">Image </label>
                                            <div class="input-group">
                                                @if ($updateHero->image)
                                                    <a href="{{ asset('assets/website/images/pages/landing/' . $updateHero->image) }}"
                                                        data-toggle="lightupdateServices" data-gallery="gallery"
                                                        class="col-md-4">
                                                        <img src="{{ asset('assets/website/images/pages/landing/' . $updateHero->image) }}"
                                                            class="img-fluid rounded">
                                                    </a>
                                                @endif
                                                <input type="file" id="image" name="image"
                                                    accept=".jpg, .jpeg, .png">
                                                <div class="image_error text-dark">Supported formats are png, jpeg and jpg
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right"
                                        onclick="submitFormData()">Save </button>
                                </form>

                    </div>
                </div>

@endsection

@push('scripts')
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        function submitFormData(e) {


            $("input[type='button']").prop('disabled', true);
            const exts = ['png', 'jpeg', 'jpg'];

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

            axios.post('/admin/pages/heroes-update/{{ $updateHero->id }}', bodyFormData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function(response) {
                    if (response) {
                        $("input[type='button']").prop('disabled', false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false,

                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.reload()

                            }
                        }).catch(error => {
                            console.log('e', error)
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

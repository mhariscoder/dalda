@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-info" style="color:#2b8540;"> </i>

            </div>
            <div>
                Document Management
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Update Document</h5>
        <form id="applyForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="title">Title <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value="{{ old('title', $upload->title) }}" maxlength="55" required>
                        <div class="invalid-feedback">
                            Please provide a valid title.
                        </div>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible shadow-sm">
                <p>Only <strong>one</strong> field is required either you can upload document or fill the description.
                </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="upload">Upload File </label>
                    @if(!empty($upload->name))
                        <div class="alert alert-secondary"
                                role="alert">
                            <a href="{{Storage::url('uploads/documents/'.$upload->name ?? '')}}"
                                target="_blank" style="text-decoration: underline; color:#585F57">
                                Uploaded Course Document </a>
                        </div>
                    @endif
                    <input type="file" id="i_file" name="upload" class="form-control" accept=".docx, .pdf"
                        value="{{ old('name') }}">
                    <div class="i_file_error text-dark">Supported formats are docx and pdf</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="description">Description </label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description',$upload->description) }}</textarea>
                </div>
            </div>

            <button class="btn btn-primary float-right"  onclick="submitFormData()" type="button">Save</button>
        </form>
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
                                    <h4 class="card-title">Update Document</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/upload-documents" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                    <label for="title">Title <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                           value="{{ old('title',$upload->title) }}">
                                                </div>
                                            </div>

                                            <div class="alert alert-warning alert-dismissible shadow-sm">
                                                <p>Only <strong>one</strong> field is required either you can upload document or fill the description.</p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="upload">Upload File </label>
                                                    @if(!empty($upload->name))
                                                        <div class="custom-file-alert custom-file-alert-secondary"
                                                             role="alert">
                                                            <a href="{{Storage::url('uploads/documents/'.$upload->name ?? '')}}"
                                                               target="_blank">
                                                                Uploaded Course Document </a>
                                                        </div>
                                                    @endif
                                                    <input type="file" id="i_file" name="upload" class="form-control"
                                                           accept=".docx, .pdf"
                                                           value="{{ old('upload') }}">
                                                    <div class="i_file_error text-dark">Supported formats are docx and pdf</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description </label>
                                                    <textarea name="description" id="description" class="form-control"
                                                              rows="3">{{ old('description',$upload->description) }}</textarea>
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
            const exts = ['docx','pdf','DOCX','PDF'];

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

            $("input[type='button']").prop('disabled',true);
            this.disabled=true;
            let form = document.querySelector('#applyForm');
            let bodyFormData = new FormData(form);
            axios({
                method: 'post',
                url: '/admin/update-upload-document/'+'{{$upload->id}}',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data'}
            })
                .then(function (response) {
                    if (response) {
                        $("input[type='button']").prop('disabled',false);
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then(successBtn => {
                            if (successBtn) {
                                window.location.href = "/admin/upload-documents";
                            }
                        }).catch(error => {w
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
                    $("#applyForm").addClass('was-validated');
                    $("input[type='button']").prop('disabled',false);
                    $(".alert-danger").remove();
                    var html = `<div class="alert alert-danger"><strong>Whoops!</strong><ul>`;
                    if (error.response.data.error !== undefined) {
                        html += `<li>${error.response.data.error}</li>`;
                    }
                    $.each(error.response.data.errors, function (k, v) {
                        var splitKey = k.split('.');
                        $(`input[name="data[${splitKey[1]}][${splitKey[2]}]"]`).addClass('has-error');
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

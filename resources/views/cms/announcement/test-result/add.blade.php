@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-info" style="color:#2b8540;"> </i>

                </div>
                <div>
                    Test Dates Management
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add Test Result</h5>
            <form action="/admin/add-student-result" method="POST" class="needs-validation" novalidate>
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
                    <div class="col-md-6 mb-3">
                        <label for="student_name">Student Name <span class="required-class">*</span></label>
                        <select class="form-control select2" name="student_name" required="required">
                            <option value="">Select</option>
                            @foreach ($students as $val)
                                <option value="{{ $val->id }}"
                                    {{ (int) old('student_name') === $val->id ? 'selected' : '' }}>{{ $val->full_name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select student name.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exam_name">Exam Name <span class="required-class">*</span></label>
                        <select class="form-control" name="exam_name" required="required">
                            <option value="">Select</option>
                            @foreach ($exams as $val)
                                <option value="{{ $val->id }}"
                                    {{ (int) old('exam_name') === $val->id ? 'selected' : '' }}>{{ $val->title }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select exam name.
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Marks <span class="required-class">*</span></label>
                        <input type="number" name="marks" id="marks" class="form-control set_decimal_places"
                            value="{{ old('marks') }}" placeholder="Enter Marks" maxlength="10" data-max-digit="4"
                            step="any" required>
                        <div class="invalid-feedback">
                            Please provide valid marks.
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="percentage">Percentage(%) <span class="required-class">*</span></label>
                        <input type="number" name="percentage" id="percentage" class="form-control  set_percentage_places"
                            value="{{ old('percentage') }}" placeholder="Enter Percentage" min="0" max="100" required>
                        <div class="invalid-feedback " id="percentage_error">
                            Please enter percentage between 1 to 100.
                        </div>
                        {{-- <span class="text-danger font-weight-light percentage"></span> --}}
                    </div>
                </div>
                <input type="submit" id="btnSubmit" class="btn btn-primary float-right" value="Save">
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
                                    <h4 class="card-title">Add Test Result</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/student-result" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/admin/add-student-result" method="POST">
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
                                                <div class="form-group col-md-6">
                                                    <label for="student_name">Student Name <span
                                                                class="required-class">*</span></label>
                                                    <select class="form-control" name="student_name">
                                                        <option value="">Select</option>
                                                        @foreach ($students as $val)
                                                            <option value="{{$val->id}}" {{ (int)old('student_name') === $val->id ? "selected" : ""}}>{{$val->full_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exam_name">Exam Name <span
                                                                class="required-class">*</span></label>
                                                    <select class="form-control" name="exam_name">
                                                        <option value="">Select</option>
                                                        @foreach ($exams as $val)
                                                            <option value="{{$val->id}}" {{ (int)old('exam_name') === $val->id ? "selected" : ""}}>{{$val->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Marks <span
                                                                class="required-class">*</span></label>
                                                    <input type="number" name="marks" id="marks"
                                                           class="form-control set_decimal_places"
                                                           value="{{ old('marks') }}" placeholder="Enter Marks"
                                                           maxlength="10" data-max-digit="4" step="any">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="description">Percentage(%) <span
                                                                class="required-class">*</span></label>
                                                    <input type="number" name="percentage" id="percentage"
                                                           class="form-control set_decimal_places"
                                                           value="{{ old('percentage') }}"
                                                           placeholder="Enter Percentage" data-max-digit="4" step="any"
                                                           maxlength="10">
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

@push('scripts')
    <script>
        $(".set_decimal_places").keydown(function(e) {
            if (($(this).val()) && $(this).val().indexOf('.') === -1) {
                $(this).val($(this).val().substring(0, 4));
            }
            if ($(this).val() === "" && e.keyCode === 190) {
                e.preventDefault();
            }
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey ===
                    true)) ||
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
            } else if ($(this).val().split('.').length > 1 && ($(this).val().split('.')[1].length == $(this).data(
                    'maxDigit')) && e.keyCode !== 8) {
                e.preventDefault();
            }

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });


        $(".set_percentage_places").keyup(function(e) {
            let pattern = new RegExp("^([1-9]|([1-9][0-9])|100)$");
            if (pattern.test($(this).val()) === false) {
                $("#percentage_error").attr("style", "display:block");
                return false;
            }
            $("#percentage_error").attr("style", "display:none");
        })
        $(".set_percentage_places").keydown(function(e) {
            // if (($(this).val()) && $(this).val().indexOf('.') === -1) {
            //     $(this).val($(this).val().substring(0, 2));
            // }
            if ($(this).val() === "" && e.keyCode === 190) {
                e.preventDefault();
            }



            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey ===
                    true)) ||
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
            } else if ($(this).val().split('.').length > 1 && ($(this).val().split('.')[1].length == $(this).data(
                    'maxDigit')) && e.keyCode !== 8) {
                e.preventDefault();
            }

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>
@endpush

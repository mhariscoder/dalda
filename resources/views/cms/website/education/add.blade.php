@extends('cms.layouts.master')

@section('content')
    <main>
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Add Education / Scholarships</h4>
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
                                        <form action="/admin/add-education-list" method="POST">
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
                                                <div class="form-group col-md-12">
                                                    <label for="institute_name">Institute Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="institute_name" id="institute_name" class="form-control"
                                                           value="{{ old('institute_name') }}" maxlength="55">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="web_url">Institute Web Url <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="web_url" id="web_url" class="form-control"
                                                           value="{{ old('web_url') }}" maxlength="55">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description </label>
                                                    <textarea name="description" id="description" class="form-control"
                                                              rows="3">{{ old('description') }}</textarea>
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
    </main>
@endsection
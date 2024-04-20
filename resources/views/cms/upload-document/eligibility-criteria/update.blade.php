@extends('cms.layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-info" style="color:#2b8540;"> </i>

            </div>
            <div>
                Eligibilty Criteria Management
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Add Eligibility Criteria</h5>
        <form id="applyForm" action="/admin/update-eligibility-criteria/{{$criteria->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 form-errors"></div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="title">Title <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value="{{ old('title',$criteria->title) }}" maxlength="55">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Description </label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description',$criteria->description) }}</textarea>
                </div>
            </div>
            <input type="submit" id="btnSubmit" class="btn btn-primary float-right" value="Save"
            onclick="this.disabled=true;this.form.submit();">
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
                                    <h4 class="card-title">Update Eligibility Criteria</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/eligibility-criteria" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/admin/update-eligibility-criteria/{{$criteria->id}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <stron>Whoops!</stron>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="title">Title <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                           value="{{ old('title',$criteria->title) }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description <span
                                                                class="required-class">*</span></label>
                                                    <textarea name="description" id="description" class="form-control"
                                                              rows="4">{{ old('description',$criteria->description) }}</textarea>
                                                </div>
                                            </div>

                                            <input type="submit" id="btnSubmit" class="btn btn-primary" value="Save"
                                                   onclick="this.disabled=true;this.form.submit();">
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

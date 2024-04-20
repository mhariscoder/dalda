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
        <h5 class="card-title">Update Test Dates</h5>
        <form action="/admin/test-dates/{{$news->id}}/update" method="POST" class="needs-validation" novalidate>
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
                <div class="col-md-12 mb-3">
                    <label for="title">Title <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value="{{ old('title' ,$news->title) }}" maxlength="55" required>
                        <div class="invalid-feedback">
                            Please provide a valid title.
                        </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Description <span class="required-class">*</span></label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description',$news->description) }}</textarea>
                    <div class="invalid-feedback">
                        Please provide a valid description.
                    </div>
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
                                    <h4 class="card-title">Update Test Dates</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/test-dates" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/admin/test-dates/{{$news->id}}/update" method="POST">
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
                                            <div class="row">
                                                <div class="col-md-12 form-errors"></div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="title">Title <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                           value="{{ old('title',$news->title) }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description <span
                                                                class="required-class">*</span></label>
                                                    <textarea name="description" id="description" class="form-control"
                                                              rows="5">{{ old('description',$news->description) }}</textarea>
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


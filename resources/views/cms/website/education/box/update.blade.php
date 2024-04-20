@extends('cms.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery " style="color:#2b8540; font-weight:bold"> </i>

                </div>
                <div>
                    Education - Box Page
                </div>

            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="row w-100 ">
                <div class="col-md-6">
                    <h4 class="card-title">Update Box Details</h4>
                </div>
                {{-- <div class="col-md-6">
                    <a href="/admin/pages/education/education-box-list/{{ \App\Models\CMSEducation::EDUCATION_ID }}"
                        class="btn btn-primary float-right">← Back</a>
                </div> --}}
            </div>
            <form action="/admin/pages/education/box-data-update/{{ $box->id }}" method="POST"
                enctype='multipart/form-data'>
                @method('PUT')
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
                    <div class="form-group col-md-12">
                        <label for="heading"> Heading </label>
                        <textarea name="heading" id="heading" class="form-control editor">{{ old('heading', $box->heading) }}</textarea>

                        {{-- <input type="text" name="heading" id="heading" class="form-control"
                            value="{{ old('heading', $box->heading) }}"> --}}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description"> Description </label>
                        <textarea name="description" id="description" class="form-control editor">{{ old('description', $box->description) }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="sort_order"> Sort Order </label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control"
                            value="{{ old('sort_order', $box->sort_order) }}">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary float-right" value="Save">
            </form>
        </div>
    </div>



@endsection

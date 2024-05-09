@extends('cms.layouts.master')

@section('content')
    <main>
        <div class="container-fluid site-width">
            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Edit Counselling</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('/admin/pages/education/counselling') }}" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ url('/admin/pages/education/counselling/'.$counsellings->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
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
                                                <label for="counselling_category_id">Counselling Category <span class="required-class">*</span></label>
                                                <select name="counselling_category_id" id="counselling_category_id" class="form-control">
                                                    <option value="">Select Counselling Category</option>
                                                    @foreach($counsellingCategories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $counsellings->counselling_category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="question">Question <span class="required-class">*</span></label>
                                                <input type="text" name="question" id="question" class="form-control" value="{{ $counsellings->question }}" maxlength="55">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="answer">Answer <span class="required-class">*</span></label>
                                                <input type="text" name="answer" id="answer" class="form-control" value="{{ $counsellings->answer }}" maxlength="55">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
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

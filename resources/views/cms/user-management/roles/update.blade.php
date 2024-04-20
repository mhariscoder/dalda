@extends('cms.layouts.master')
@push('styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/toggle-switch.css">
@endpush
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users " style="color:#2b8540;font-weight:bold"> </i>

            </div>
            <div>
                User Management
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Add Role</h5>
        <form action="/admin/update-role/{{$role->id}}" method="POST" class="needs-validation" novalidate>
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
                <div class="col-md-12 mb-3">
                    <label for="role_name">Role Name <span class="required-class">*</span></label>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Role Name"
                        value="{{ old('role_name',$role->name) }}" maxlength="55" required>
                    <div class="invalid-feedback">
                        Please choose a roles name.
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <label>Permissions <span class="required-class">*</span></label>
                <div class="float-right">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input permission" id="select-all">
                        <label class="custom-control-label checkbox-primary outline" for="select-all">Select All</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                @php
                    $name = '';
                @endphp
                @foreach ($permissions as $key => $val)
                    @php
                        if (explode('-', $val->name)[1] != 'documents') {
                            $flag = 1;
                        }
                    @endphp
                    @if ($name != explode('-', $val->name)[0] && $flag == 1)
                        @php
                            if (explode('-', $val->name)[1] == 'documents') {
                                $name = explode('-', $val->name)[1];
                                $flag = 0;
                            } else {
                                $name = explode('-', $val->name)[0];
                            }
                        @endphp
                        <label><strong>{{ ucfirst($name) }}</strong></label>
                    @endif
                    <div class="form-row ml-3">
                        <label class="switch" style="margin-top: -17px !important">
                            <input type="checkbox" class="permission is_active" id="permissions{{ $key }}"
                                name="permissions[{{ $key }}]" value="{{ $val->id }}"
                                {{ in_array($val->id, $rolePermissions) ? 'checked' : '' }}>
                            <span class="slider" data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Block/Unblock"></span>
                        </label>
                        <label class="mb-2" for="permissions{{ $key }}">{{ $val->name }}</label>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-primary float-right" type="submit">Save</button>
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
                                    <h4 class="card-title">Update Role</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/manage-roles" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/admin/update-role/{{$role->id}}" method="POST">
                                            @method('PUT')
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
                                                    <label for="name">Role Name</label>
                                                    <input type="text" class="form-control rounded" id="name"
                                                           name="role_name" placeholder="Enter Role Name"
                                                           value="{{ old('role_name',$role->name) }}"  maxlength="55">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <label>Permissions <span class="required-class">*</span></label>
                                                <div class="float-right">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox"
                                                               class="custom-control-input permission" id="select-all">
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="select-all">Select All</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                @foreach($permissions as $key => $val)
                                                    <div class="form-group col-md-2">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox"
                                                                   class="custom-control-input permission"
                                                                   id="permissions{{$key}}"
                                                                   name="permissions[{{$key}}]"
                                                                   value="{{ $val->id }}" {{ in_array($val->id, $rolePermissions) ? 'checked' : '' }}>
                                                            <label class="custom-control-label checkbox-primary outline"
                                                                   for="permissions{{$key}}">{{ $val->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
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
        $("#select-all").click(function () {
            if ($(this).is(":checked")) {
                $(".permission").prop("checked", true);
            } else {
                $(".permission").prop("checked", false);
            }
        });
    </script>
@endpush

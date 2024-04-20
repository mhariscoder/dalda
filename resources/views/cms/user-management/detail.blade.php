@extends('cms.layouts.master')

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
            <h5 class="card-title">View User Details</h5>
            <form>
                @if ($user->profile_picture)
                    <div class="d-flex justify-content-center">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <img src="{{ $user->profile_picture }}" height="150" width="150">
                                </div>
                        </div>
                    </div>
                @endif

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Description </label>
                        <div class="input-group">
                            <textarea class="form-control" rows="2" readonly>{{ $user->profile_detail }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name">First name </label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name">Last name </label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name"
                            value="{{ old('last_name', $user->last_name) }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="father_name">Father Name </label>
                        <input type="text" class="form-control" id="father_name" name="father_name"
                            placeholder="Father Name" value="{{ old('father_name', $user->father_name) }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mother_name">Mother Name </label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name"
                            placeholder="Mother Name" value="{{ old('mother_name', $user->mother_name) }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="email">Email </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                aria-describedby="inputGroupPrepend" value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="cnic">CNIC</label>
                        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="CNIC"
                            value="{{ old('cnic', $user->cnic) }}" readonly>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact"
                            value="{{ old('contact', $user->contact) }}" readonly>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}"
                            readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="marital_status">Marital Status</label>
                        <select class="form-control" name="marital_status" id="marital_status" readonly>
                            <option value="single"
                                {{ old('marital_status', $user->marital_status) == 'single' ? 'selected' : '' }}>
                                Single
                            </option>
                            <option value="married"
                                {{ old('marital_status', $user->marital_status) == 'married' ? 'selected' : '' }}>
                                Married
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="dob">Postal Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter Postal Address" value="{{ old('address', $user->postal_address) }}"
                            readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>User Roles </label>
                        <div class="form-row m-2">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="role" checked disabled>
                                <label class="custom-control-label checkbox-primary outline"
                                    for="role">{{ $userRole }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
            </script>
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
                                    <h4 class="card-title mb-1">User Details</h4>
                                    @if (!empty($user->student_id))
                                        <strong class="card-title pb-0">Student ID#
                                            <span>{{$user->student_id}}</span>
                                        </strong>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <a href="/admin/manage-users" class="btn btn-primary float-right">← Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form>

                                            @if ($user->profile_picture)
                                                <label>Profile Picture </label><br>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <img src="{{ $user->profile_picture }}"
                                                             height="100" width="100">
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Description </label>
                                                    <div class="input-group">
                                                        <textarea class="form-control"
                                                                  rows="2"
                                                                  readonly>{{ $user->profile_detail }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">First Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           value="{{ $user->first_name }}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="last_name">Last Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded"
                                                           value="{{ $user->last_name }}" readonly>
                                                </div>
                                            </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="father_name">Father Name <span
                                                                    class="required-class">*</span></label>
                                                        <input type="text" class="form-control rounded" id="father_name"
                                                               name="father_name" placeholder="Enter Father Name"
                                                               value="{{ $user->father_name }}" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mother_name">Mother Name <span
                                                                    class="required-class">*</span></label>
                                                        <input type="text" class="form-control rounded" id="mother_name"
                                                               name="mother_name" placeholder="Enter Mother Name"
                                                               value="{{ $user->mother_name }}" readonly>
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="email">Email <span
                                                                class="required-class">*</span></label>
                                                    <input type="email" class="form-control rounded"
                                                           value="{{ $user->email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="cnic">CNIC </label>
                                                    <input type="text" class="form-control rounded"
                                                           value="{{ $user->cnic }}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="contact">Contact </label>
                                                    <input type="text" class="form-control rounded"
                                                           value="{{ $user->contact }}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control rounded"
                                                           id="dob" name="dob" value="{{ $user->dob }}"
                                                    >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marital_status">Marital Status</label>
                                                    <select class="form-control" name="marital_status"
                                                            id="marital_status">
                                                        <option value="single" {{ $user->marital_status == 'single' ? 'selected' : ''}}>
                                                            Single
                                                        </option>
                                                        <option value="married" {{$user->marital_status == 'married' ? 'selected' : ''}}>
                                                            Married
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address">Postal Address</label>
                                                    <input type="text" class="form-control rounded"
                                                           id="address" name="address"
                                                           placeholder="Enter Postal Address"
                                                           value="{{ $user->postal_address }}"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-2 role">
                                                    <label>User Role <span class="required-class">*</span></label>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="role"
                                                               checked disabled>
                                                        <label class="custom-control-label checkbox-primary outline"
                                                               for="role">{{ $userRole }}</label>
                                                    </div>
                                                </div>
                                            </div>
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

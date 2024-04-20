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
            <h5 class="card-title">Update User</h5>
            <form action="/admin/update-user/{{ $user->id }}" autocomplete="off" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
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
                        <label for="first_name">First name <span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"
                            value="{{ old('first_name',$user->first_name) }}" maxlength="55" required>
                        <div class="invalid-feedback">
                            Please choose a first name.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name">Last name <span
                            class="required-class">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name"
                        value="{{ old('last_name',$user->last_name) }}" maxlength="55" required>
                        <div class="invalid-feedback">
                            Please choose a last name.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="father_name">Father Name <span
                                class="required-class">*</span></label>
                        <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name"
                            value="{{ old('father_name',$user->father_name) }}" required>
                        <div class="invalid-feedback">
                            Please choose a father name.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mother_name">Mother Name <span
                            class="required-class">*</span></label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name"
                        value="{{ old('mother_name',$user->mother_name) }}" required>
                        <div class="invalid-feedback">
                            Please choose a mother name.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="email">Email <span
                            class="required-class">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                aria-describedby="inputGroupPrepend" value="{{ old('email',$user->email) }}" required>
                            <div class="invalid-feedback">
                                Please choose a email.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-10 mb-3">
                        <div class="password-container">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" autoComplete='cc-number' required>
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i id="toggleIcon" class="fas fa-eye"></i>
                            </span>
                            <div class="invalid-feedback">
                                Please choose a password.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button type="button" class="btn btn-secondary btn-sm float-right mt-2" onclick="generatePassword()">Generate Password</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="cnic">CNIC</label>
                        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="CNIC"
                            value="{{ old('cnic',$user->cnic) }}" minlength="13" maxlength="13">
                            <div class="invalid-feedback">
                                Please make sure cnic no is correct.
                            </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact"
                        value="{{ old('contact',$user->contact) }}" minlength="11" maxlength="13">
                        <div class="invalid-feedback">
                            Please make sure contact no is correct.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob"
                            value="{{ old('dob',$user->dob) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="marital_status">Marital Status</label>
                        <select class="form-control" name="marital_status"
                            id="marital_status">
                            <option value="single"
                                {{ old('marital_status',$user->marital_status) == 'single' ? 'selected' : '' }}>
                                Single
                            </option>
                            <option value="married"
                                {{ old('marital_status',$user->marital_status) == 'married' ? 'selected' : '' }}>
                                Married
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="dob">Postal Address</label>
                        <input type="text" class="form-control" id="address"
                        name="address" placeholder="Enter Postal Address"
                        value="{{ old('address',$user->postal_address) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>User Roles <span class="required-class">*</span></label>
                        @if (count($roles) > 0)
                        <div class="form-row mt-2">
                            @foreach ($roles as $key => $val)
                                <div class="form-group col-md-2 role m-2">
                                    <div
                                        class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input"
                                            id="role_id{{ $key }}" name="role"
                                            value="{{ $val->name }}"
                                            {{ old('role',$userRole) == $val->name ? 'checked' : '' }}>
                                        <label
                                            class="custom-control-label checkbox-primary outline text-nowrap"
                                            for="role_id{{ $key }}">{{ $val->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    </div>
                </div>
                <button class="btn btn-primary float-right" type="submit">Submit form</button>
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
                                    <h4 class="card-title">Update User</h4>
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
                                        <form action="/admin/update-user/{{$user->id}}" method="POST">
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
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">First Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="first_name"
                                                           name="first_name" placeholder="Enter First Name"
                                                           value="{{ old('first_name',$user->first_name) }}"
                                                           maxlength="55">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="last_name">Last Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="last_name"
                                                           name="last_name" placeholder="Enter Last Name"
                                                           value="{{ old('last_name',$user->last_name) }}"
                                                           maxlength="55">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="father_name">Father Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="father_name"
                                                           name="father_name" placeholder="Enter Father Name"
                                                           value="{{ old('father_name',$user->father_name) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="mother_name">Mother Name <span
                                                                class="required-class">*</span></label>
                                                    <input type="text" class="form-control rounded" id="mother_name"
                                                           name="mother_name" placeholder="Enter Mother Name"
                                                           value="{{ old('mother_name',$user->mother_name) }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="email">Email <span
                                                                class="required-class">*</span></label>
                                                    <input type="email" class="form-control rounded" id="email"
                                                           name="email" placeholder="Enter Email"
                                                           value="{{ old('email',$user->email) }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="cnic">CNIC</label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           name="cnic" placeholder="Enter CNIC"
                                                           value="{{ old('cnic',$user->cnic) }}" minlength="13"
                                                           maxlength="13">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="contact">Contact</label>
                                                    <input type="text" class="form-control rounded allowNumberOnly"
                                                           id="contact" name="contact" placeholder="Enter Contact"
                                                           value="{{ old('contact',$user->contact) }}" minlength="11"
                                                           maxlength="13">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control rounded"
                                                           id="dob" name="dob" value="{{ old('dob',$user->dob) }}"
                                                    >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="marital_status">Marital Status</label>
                                                    <select class="form-control" name="marital_status"
                                                            id="marital_status">
                                                        <option value="single" {{old('marital_status',$user->marital_status) == 'single' ? 'selected' : ''}}>
                                                            Single
                                                        </option>
                                                        <option value="married" {{old('marital_status',$user->marital_status) == 'married' ? 'selected' : ''}}>
                                                            Married
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address">Postal Address</label>
                                                    <input type="text" class="form-control rounded"
                                                           id="address" name="address"
                                                           placeholder="Enter Postal Address"
                                                           value="{{ old('address',$user->postal_address) }}"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <label>User Roles <span class="required-class">*</span></label>
                                            </div>
                                            @if(count($roles) > 0)
                                                <div class="form-row">
                                                    @foreach($roles as $key => $val)
                                                        <div class="form-group col-md-2 role">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="role_id{{$key}}" name="role"
                                                                       value="{{ $val->name }}" {{ old("role",$userRole) == $val->name ? 'checked' : '' }}>
                                                                <label class="custom-control-label checkbox-primary outline text-nowrap"
                                                                       for="role_id{{$key}}">{{ $val->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
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
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("toggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
        function generatePassword() {
            var length = 12; // Desired length of the password
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()"; // Characters to include in the password
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            document.getElementById("password").value = password;
        }
        $(".allowNumberOnly").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('input:checkbox').click(function () {
            $('input:checkbox').not(this).prop('checked', false);
        });
    </script>
@endpush

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8" />
    <title>Dalda Foundation</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <link rel="stylesheet" href="assets/frontend/css/new-style.css">
    <link rel="stylesheet" href="assets/frontend/css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        {!! RecaptchaV3::initJs() !!}


</head>

<body class="loginPage registerPage">
    <div class="box">
        <div class="innerBox">
            <div class="logo">
                <a href="/">
                    <img src="/assets/frontend/img/logo.png" alt="" />
                </a>
            </div>
            <a href="/" class="closeBtn">
                <i class="fa-solid fa-xmark"></i>
            </a>

            <div class="content-container">
                <div class="content-container-header">
                    <div>
                        <img src="/assets/frontend/img/cap.png" alt="" width="64px" height="30px">

                        <h2>Register as Student</h2>
                    </div>
                    <p>Enter Your Details to Register Yourself</p>
                </div>

                <div class="content-container-body">
                    <form class="register-form " id="regForm" action="/register" method="post" autocomplete="off">
                        @csrf
                        {!! RecaptchaV3::field('register',$name='g-recaptcha-response') !!}
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <div class="form-group">
                            <div class="form-control form-control-required">
                                <label for="first_name" class="form-label">First Name </label>
                                <input type="text" id="first_name" name="first_name" placeholder="Enter First Name "
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-control form-control-required">
                                <label for="last_name" class="form-label">Last Name </label>
                                <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-control form-control-required">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="example@abc.com">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-control form-control-required">
                                <label for="password" class="form-label">Create Password </label>
                                <input type="password" id="password" name="password" placeholder="Enter your password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control form-control-required">
                                <label for="password" class="form-label">Confirm Password </label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Re-Enter Password" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-control form-control-required">
                            <label for="dob" class="form-label">Date Of Birth </label>
                            <input type="date" onkeyup="transform()" id="dob" name="dob"
                                value="{{ old('dob') }}" placeholder="12-12-2000" maxlength="10" />
                            @error('dob')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-control form-control-required">
                            <label for="postal_address" class="form-label">Postal Address </label>
                            <input id="postal_address" name="postal_address" type="text"
                                value="{{ old('postal_address') }}" placeholder="Enter Postal Address"
                                autocomplete="false" disabled>
                            @error('postal_address')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type=" submit" class="btn btn-primary btn-block waves-effect waves-light">Sign
                            Up</button>
                        <a href="/login" class="forget"><i class="fa fa-lock mr-2"></i>Already have an account?</a>


                    </form>
                </div>
            </div>
        </div>
    </div>






    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script>
        setInterval(function() {
            $("span.error").remove();
            $("div.alert-success").remove();
        }, 5000);

        function getRidOffAutocomplete() {

            var timer = window.setTimeout(function() {
                    $('#postal_address').prop('disabled', false);
                    clearTimeout(timer);
                },
                800);
        }

        getRidOffAutocomplete();
    </script>
    <script src="assets/frontend/js/main.js"></script>


</body>

</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dalda login form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/all.min.css" />

    <style>
        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }




        #prevBtn {
            background-color: #bbbbbb;
            border: 1px solid #bbbbbb;
        }
    </style>



</head>

<body class="accountbg ">

    <div class="wrapper-page">
        <div class="container" style="margin-top: -6%;">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4 cstmCard">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="/register" class="logo logo-admin">
                                    <img src="/assets/images/daldalogo.png" class="mt-3" alt=""
                                        height="80" /></a>
                                <p class="text-muted w-75 mx-auto mb-4 mt-4">
                                    Register your self to access portal.
                                </p>
                            </div>
                            <form id="regForm" class="form-horizontal needs-validation mt-4" action="/register" method="post" novalidate>
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

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('error') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- One "tab" for each step in the form: -->
                                <div class="tab form-row">
                                    <div class="form-group col-md-12">
                                        <label for="first_name">First Name <span class="required-class">*</span></label>
                                        <input type="text" class="form-control rounded mb-3" id="first_name"
                                            name="first_name" placeholder="Enter First Name"
                                            value="{{ old('first_name') }}" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="last_name">Last Name <span class="required-class">*</span></label>
                                        <input type="text" class="form-control rounded mb-3" id="last_name"
                                            name="last_name" placeholder="Enter Last Name"
                                            value="{{ old('last_name') }}" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="father_name">Father Name <span
                                                class="required-class">*</span></label>
                                        <input type="text" class="form-control rounded mb-3" id="father_name"
                                            name="father_name" placeholder="Enter Father Name"
                                            value="{{ old('father_name') }}" >
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="mother_name">Mother Name <span
                                                class="required-class">*</span></label>
                                        <input type="text" class="form-control rounded mb-3" id="mother_name"
                                            name="mother_name" placeholder="Enter Mother Name"
                                            value="{{ old('mother_name') }}" >
                                    </div>




                                </div>
                                <div class="tab form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">Email <span class="required-class">*</span></label>
                                        <input type="email" class="form-control rounded mb-3" id="email"
                                            name="email" placeholder="Enter Email" value="{{ old('email') }}" >
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="password">Password <span class="required-class">*</span></label>
                                        <input type="password" class="form-control rounded mb-3" id="password"
                                            name="password" placeholder="Enter Password"
                                            value="{{ old('password') }}" >
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="password">Confirm Password <span
                                                class="required-class">*</span></label>
                                        <input type="password" class="form-control rounded mb-3"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Re Enter Password"
                                            value="{{ old('password_confirmation') }}" >
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control rounded allowNumberOnly mb-3"
                                            id="contact" name="contact" placeholder="Enter Contact"
                                            value="{{ old('contact') }}" minlength="11" maxlength="13" >
                                    </div>





                                </div>


                                <div class="tab form-row">
                                    <div class="form-group col-md-12">
                                        <label for="marital_status">Marital Status</label>
                                        <select class="form-control form-select mb-3" name="marital_status"
                                            id="marital_status">
                                            <option value="single"
                                                {{ old('marital_status') == 'single' ? 'selected' : '' }}>
                                                Single
                                            </option>
                                            <option value="married"
                                                {{ old('marital_status') == 'married' ? 'selected' : '' }}>
                                                Married
                                            </option>
                                        </select>


                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="cnic">CNIC</label>
                                        <input type="text" class="form-control rounded allowNumberOnly mb-3"
                                            name="cnic" placeholder="Enter CNIC" value="{{ old('cnic') }}"
                                            minlength="13" maxlength="13" >
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control rounded mb-3" id="dob"
                                            name="dob" value="{{ old('dob') }}" >
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label for="password">Postal Address <span
                                                class="required-class">*</span></label>
                                        <input type="text" class="form-control rounded  mb-3" id="address"
                                            name="address" placeholder="Enter Postal Address"
                                            value="{{ old('address') }}" >
                                    </div>





                                </div>

                                <div style="overflow:auto;">
                                    <div style="float:left;">

                                        <button class="btn btn-success  waves-effect waves-light" type="button"
                                            id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    </div>
                                    <div style="float:right;">

                                        <button class="btn btn-success  waves-effect waves-light" type="button"
                                            id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    </div>

                                </div>
                                <div class="form-group text-center mt-4">
                                    <div class="col-12">
                                        <div class="float-left">
                                            <a href="/login" class="text-muted"><i class="fa fa-lock mr-1"></i>
                                                Already have an account?</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- script -->
<script src="/assets/js/bootstrap.js"></script>
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/owl.carousel.js"></script>
<script src="/assets/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


<!-- script -->
<script>
    setInterval(function() {
        $("div.alert-danger").remove();
        $("div.alert-success").remove();
    }, 5000);
    (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
</script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Sign Up";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                console.log(y[i]);
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>


</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dalda</title>

    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/icons.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/style.css">
    <style>
        .btn-success, .btn-success:hover {
            background-color: #318737;
            border: #318737;
        }
    </style>
</head>

<body>
<div class="accountbg"></div>

<div class="wrapper-page">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5">
                <div class="card card-pages shadow-none mt-4 cstmCard">
                    <div class="card-body">
                        <div class="text-center mt-0 mb-3">
                            <a href="/register" class="logo logo-admin">
                                <img src="/assets/images/dalda.png" class="mt-3" alt="" height="80"></a>
                            <p class="text-muted w-75 mx-auto mb-4 mt-4">Register your self to access portal.</p>
                        </div>

                        <form class="form-horizontal mt-4" action="/register" method="post">
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

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name <span
                                                class="required-class">*</span></label>
                                    <input type="text" class="form-control rounded" id="first_name"
                                           name="first_name" placeholder="Enter First Name"
                                           value="{{ old('first_name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name <span
                                                class="required-class">*</span></label>
                                    <input type="text" class="form-control rounded" id="last_name"
                                           name="last_name" placeholder="Enter Last Name"
                                           value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email <span
                                                class="required-class">*</span></label>
                                    <input type="email" class="form-control rounded" id="email"
                                           name="email" placeholder="Enter Email"
                                           value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Password <span class="required-class">*</span></label>
                                    <input type="password" class="form-control rounded" id="password"
                                           name="password" placeholder="Enter Password"
                                           value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Confirm Password <span class="required-class">*</span></label>
                                    <input type="password" class="form-control rounded" id="password_confirmation"
                                           name="password_confirmation" placeholder="Re Enter Password"
                                           value="{{ old('password_confirmation') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Date Of Birth <span class="required-class">*</span></label>
                                    <input type="date" class="form-control rounded" id="dob"
                                           name="dob" placeholder="Enter Date Of Birth"
                                           value="{{ old('dob') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Postal Address <span class="required-class">*</span></label>
                                    <input type="text" class="form-control rounded" id="address"
                                           name="address" placeholder="Enter Postal Address"
                                           value="{{ old('address') }}">
                                </div>
                            </div>

                            <div class="form-group text-center mt-3">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4">
                                <div class="col-12">
                                    <div class="float-left">
                                        <a href="/login" class="text-muted"><i class="fa fa-lock mr-1"></i>
                                            Already have an account?</a>
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

<!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script>
    setInterval(function () {
        $("div.alert-danger").remove();
        $("div.alert-success").remove();
    }, 5000);
</script>
</body>
</html> --}}

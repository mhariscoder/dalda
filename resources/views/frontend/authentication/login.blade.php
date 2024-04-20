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

<body>
    <div class="loginPage">


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

                <div class="content-container" id="borderChange">
                    <div class="content-container-header">
                        <div class="left  loginFormButton" data-name="admin">
                            <img src="/assets/frontend/img/sms-icon.png" alt="" data-name="admin">
                            <span data-name="admin">Admin Login
                            </span>
                        </div>

                        <div class="right active loginFormButton" data-name="student">
                            <img src="/assets/frontend/img/capGrey.png" alt="" data-name="student">
                            <span data-name="student">
                                Student Login</span>
                        </div>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>

                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error') }}</strong>

                        </div>
                    @endif
                    <div class="content-container-body">
                        <p>Enter Your Login Details</p>
                        <form class=" login-form" action="/admin/login" method="post">
                            {!! RecaptchaV3::field('login',$name='g-recaptcha-response') !!}
                            @csrf
                            <input type="hidden" name="type" id="type" value="student">
                            <div class="form-control form-control-required">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="example@abc.com">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control form-control-required">
                                <label for="password">Password </label>
                                <input type="password"  id="password" name="password" value="" placeholder="Enter your password">
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="remember">
                                <div class="form-control form-control-checkbox">
                                    <input type="checkbox" id="remember_me" name="remember_me" value="true" />
                                    <label for="remember_me">Remember me</label>
                                </div>

                                <a href="/forgot-password" class="forget"><i class="fa fa-lock mr-2"></i>Forgot
                                    Password</a>
                            </div>
                            <button type=" submit" class="btn btn-primary">Log in</button>



                            <div class="noAccount">
                                <a href="">Don't have an account?</a>
                                <a href="/confirm-student">SIGN UP NOW</a>
                            </div>

                            <div class="login login-link">
                                <a href="" class="loginFormButton" data-name="admin"><i span
                                        data-name="admin" class="fa fa-sign-in mr-1"></i><span data-name="admin">
                                        Admin Login</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
    setInterval(function(){
        $("div.alert-danger").remove();
        $("div.alert-success").remove();
    }, 5000);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="assets/frontend/js/main.js"></script>

{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>dalda login form</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css" />
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/css/all.min.css" />

</head>

<body class="accountbg">
  <!-- <div > -->
    <div class="wrapper-page">
      <div class="container" style="margin-top: -4%;">
        <div class="row d-flex align-items-center justify-content-start">
          <div class="col-lg-5">
            <div class="card card-pages shadow-none mt-4 cstmCard">
              <div class="card-body">
                <div class="text-center mt-0 mb-3">
                  <a href="/admin/login" class="logo logo-admin">
                    <img src="/assets/images/daldalogo.png" class="mt-3" alt="" height="80" /></a>
                  <p class="text-muted w-75 mx-auto mb-4 mt-4">
                    Enter your email address and password to access admin
                    panel.
                  </p>
                </div>

                <form class="form-horizontal mt-4" action="/admin/login" method="post">
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
                  <div class="form-group">
                    <div class="col-12">
                      <label for="email">Email <span class="required-class">*</span></label>
                      <input type="email" class="form-control mb-3" id="email" name="email" value="{{old('email')}}" placeholder="Email"
                        required />
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-12">
                      <label for="password">Password <span class="required-class">*</span></label>
                      <input type="password" class="form-control mb-3" id="password" name="password" value=""
                        placeholder="Password" required />
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-12">
                      <div class="checkbox checkbox-primary">
                        <div class="custom-control custom-checkbox ">
                          <input type="checkbox" class="custom-control-input my-checkbox" id="remember_me"
                            name="remember_me" value="true" />
                          <label class="custom-control-label mb-0" for="remember_me">
                            Remember me</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group text-center mt-3">
                    <div class="col-12">
                      <button class="btn btn-success btn-block waves-effect waves-light" type="submit">
                        Log In
                      </button>
                    </div>
                  </div>
                  <div class="form-group mt-4">
                    <div class="col-12">
                      <div class="float-left">
                        <a href="/admin/forgot-password" class=""><i class="fa fa-lock mr-1"></i> Forgot your
                          password?</a>
                      </div>
                      <div class="float-right">
                        <span class="text-dark">New to Dalda?</span>
                        <a href="/register" class=""><i class="fa fa-user mr-1"></i> Join Now </a>
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
  <!-- </div> -->
</body> --}}

<!-- script -->
{{-- <script src="/assets/js/bootstrap.js"></script>
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/owl.carousel.js"></script>
<script src="/assets/js/all.min.js"></script>

<!-- script -->
<script>
  setInterval(function(){
      $("div.alert-danger").remove();
      $("div.alert-success").remove();
  }, 5000);
</script>

</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
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
        .custom-control-label {
            box-shadow: #318737;
        }
        .custom-control-input:checked ~ .custom-control-label:before {
            border-color: #318737;
            background-color: #318737;
            box-shadow: #318737;
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
                            <a href="/login" class="logo logo-admin">
                                <img src="/assets/images/dalda.png" class="mt-3" alt="" height="80"></a>
                            <p class="text-muted w-75 mx-auto mb-4 mt-4">Enter your email address and password to access admin panel.</p>
                        </div>

                        <form class="form-horizontal mt-4" action="/login" method="post">
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

                            <div class="form-group">
                                <div class="col-12">
                                    <label for="email">Email <span class="required-class">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <label for="password">Password <span class="required-class">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <div class="checkbox checkbox-primary">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me" value="true">
                                            <label class="custom-control-label" for="remember_me"> Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center mt-3">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4">
                                <div class="col-12">
                                    <div class="float-left">
                                        <a href="/forgot-password" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                    <div class="float-right">
                                        <span class="text-dark">New to Dalda?</span>
                                        <a href="/register" class="text-muted"><i class="fa fa-user mr-1"></i> Join Now </a>
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
    setInterval(function(){
        $("div.alert-danger").remove();
        $("div.alert-success").remove();
    }, 5000);
</script>
</body>
</html> --}}

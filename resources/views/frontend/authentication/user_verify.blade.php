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
    <link rel="stylesheet" href="/assets/frontend/css/new-style.css">
    <link rel="stylesheet" href="/assets/frontend/css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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


                    </div>
                    <p>Welcome, Please set new password to access panel.</p>
                </div>
                <div class="content-container-body" style="padding: 35px">

                    <form class="forgot-password-form " action="/student-password-verification/{{$verificationToken}}" method="post">
                        @csrf
                        <div class="form-control form-control-required">
                            <label for="password">Password <span class="required-class">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" value=""
                                placeholder="Enter Password" required>
                            @if (Session::has('error'))
                                <div class=" fade show" role="alert">
                                    <span class="error">{{ Session::get('error') }}</span>

                                </div>
                            @endif
                        </div>
                        <div class="form-control form-control-required">
                            <label for="password">Confirm Password <span class="required-class">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" value=""
                                placeholder="Enter Confirm Password" required>
                            @if (Session::has('error'))
                                <div class=" fade show" role="alert">
                                    <span class="error">{{ Session::get('error') }}</span>

                                </div>
                            @endif
                        </div>
                        <button type=" submit" class="btn btn-primary">Save</button>
                    </form>
                </div>

            </div>

        </div>


    </div>






    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        setInterval(function() {
            $("span.error").remove();
            $("div.alert-success").remove();
        }, 5000);
    </script>
    <script src="/assets/frontend/js/main.js"></script>


</body>

</html>











{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dalda</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

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
                            <a href="/login" class="logo logo-admin">
                            <img src="/assets/images/dalda.png" class="mt-3" alt="" height="80"></a>
                            <p class="text-muted w-75 mx-auto mb-4 mt-4">Welcome, Please set new password to access admin panel.</p>
                        </div>

                        <form class="form-horizontal mt-4" action="/student-password-verification/{{$verificationToken}}" method="post">
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
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="password">Password <span class="required-class">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="password">Confirm Password <span class="required-class">*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" value="" placeholder="Enter Confirm Password" required>
                                </div>
                            </div>
                            <div class="form-group text-center mt-3">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Save</button>
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











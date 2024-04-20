<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dalda forgot Password form</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/all.min.css" />

</head>

<body class="accountbg">

    <div class="wrapper-page">

        <div class="container ">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4 cstmCard">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="/login" class="logo logo-admin">
                                    <img src="/assets/images/daldalogo.png" class="mt-3" alt="" height="80"></a>
                            </div>
                            <form class="form-horizontal mt-4 " action="/forgot-password" method="post">
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
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-success btn-block waves-effect waves-light"
                                            type="submit">Reset Password</button>
                                    </div>
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
<script src="/assetsjs/jquery-3.6.0.min.js"></script>
<script src="/assetsjs/owl.carousel.js"></script>
<script src="/assetsjs/all.min.js"></script>

<!-- script -->
<script>
    setInterval(function() {
        $("div.alert-danger").remove();
        $("div.alert-success").remove();
    }, 5000);
</script>

</html>

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
                            <a href="/admin/login" class="logo logo-admin">
                                <img src="/assets/images/dalda.png" class="mt-3" alt="" height="80"></a>
                        </div>
                        <form class="form-horizontal mt-4" action="/admin/forgot-password" method="post">
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
                            <div class="form-group text-center mt-3">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Reset Password</button>
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

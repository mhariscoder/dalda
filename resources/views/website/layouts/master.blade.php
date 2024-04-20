<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/website/css/style.css">
    <link rel="stylesheet" href="/assets/website/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Dalda</title>
    <style>
        .whatsapp {
            position: fixed;
            right: 1%;
            bottom: 6%;
            width: 4em;
            z-index: 99;
        }
        .whatsapp h5 {
            color: white;
            background: #20b20f;
            height: 60px;
            width: 60px;
            padding-left: 1px;
            padding-top: 10px;
            border-radius: 50%;
            text-align: center;
            line-height: 0px;
            box-shadow: 2px 1px 20px 1px rgb(0 0 0 / 22%);
        }
    </style>
</head>
<body>
@include('website.layouts.topbar')
@yield('content')
@include('website.layouts.footer')
<div class="whatsapp">
    <a href="https://api.whatsapp.com/send?phone=92213135464789" target="_blank">
        <h5><i class="fab fa-whatsapp fa-2x"></i></h5></a>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/assets/website/js/jquery-3.2.1.slim.min.js" ></script>
<script src="/assets/website/js/popper.min.js" ></script>
<script src="/assets/website/js/bootstrap.min.js"></script>
<script src="/assets/website/js/slick.js"></script>
<script src="/assets/website/js/isotope.pkgd.min.js"></script>
<script src="/assets/website/js/masonry.pkgd.min.js"></script>
@stack('scripts')
<script>
    setInterval(function(){
        if($("div.alert-danger").length > 0 || $("div.alert-success").length > 0){
            setTimeout(function (){
                $("div.alert-danger").remove();
                $("div.alert-success").remove();
            },10000);
        }
    }, 10000);
</script>
</body>

</html>

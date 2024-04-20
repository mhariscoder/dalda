<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Dalda Foundation</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/new-style.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/normalize.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    
    <!-- Slick Carousel Theme (Optional) -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
        <style>
            .whatsapp {
                position: fixed;
                right: 0.5%;
                bottom: 15%;
                width: 4em;
                z-index: 99;
            }
            .whatsapp a{
               font-size: 25px
            }
            .whatsapp h5 {
                color: white;
                background: #20b20f;
                height: 50px;
                width: 50px;
                padding-left: 1px;
                padding-top: 6px;
                border-radius: calc(50px/2);
                text-align: center;
                line-height: 0px;
                box-shadow: 2px 1px 20px 1px rgb(0 0 0 / 22%);
            }
            .whatsapp i{
                font-size: 1.8em;
            }
        </style>
        {!! RecaptchaV3::initJs() !!}
</head>

<body>
    <div class="loader">
       <img class="icon" src="/assets/frontend/img/logo.png"/>
      </div>
    @include('website.layout.header')

    @yield('content')
    @include('website.layout.footer')
    <div class="whatsapp">
        <a href="https://api.whatsapp.com/send?phone=923311200897" target="_blank">
            <h5><i class="fab fa-whatsapp fa-2x"></i></h5></a>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="/assets/frontend/js/main.js"></script>
<script>
     window.addEventListener('load', function() {
    document.querySelector('.loader').style.display = 'none';
});
</script>
@stack('scripts')

</html>

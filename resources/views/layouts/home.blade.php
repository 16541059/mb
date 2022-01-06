<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/themewar-font.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/quera-icon.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/jquery.datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/lightcase.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/preset.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/ignore_for_wp.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">


    <link rel="icon" type="image/png" href="{{asset('front/assets/images/favicon.png')}}">
    @yield('css')

</head>
@include('layouts.menu')
<!-- Header End -->

<!-- Banner Start -->
<!-- Banner End -->

<!-- Features Start -->
@yield('main')
<!-- Get Started End -->

<!-- Footer Start -->
@include('layouts.footer')

<body>

<div class="preloader clock text-center">
    <div class="queraLoader">
        <div class="loaderO">
            <span>M</span>
            <span>A</span>
            <span>R</span>
            <span>K</span>
            <span>A</span>
        </div>
    </div>
</div>



<script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="{{asset('front/assets/js/jquery.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.appear.js')}}"></script>
<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/assets/js/shuffle.min.js')}}"></script>
<script src="{{asset('front/assets/js/nice-select.js')}}"></script>
<script src="{{asset('front/assets/js/lightcase.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.datetimepicker.full.min.js')}}"></script>
<script src="{{asset('front/assets/js/circle-progress.js')}}"></script>
<script src="{{asset('front/assets/js/gmaps.js')}}"></script>
<script src="{{asset('../../maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o')}}"></script>

<script src="{{asset('front/assets/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{asset('front/assets/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('front/assets/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('front/assets/js/theme.js')}}"></script>
    @yield('js')
</body>
</html>

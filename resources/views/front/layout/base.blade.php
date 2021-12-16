@php
    $chk =\App\Models\About::where("id","1")->count();

    if($chk){
    $aboutglb=\App\Models\About::where("id","1")->get();
    }else{
        $aboutglb[0]=["sosial"=>""];
    }

    $chkprv =\App\Models\Privacy::where("id","1")->count();

    if($chkprv){
    $privacglb=\App\Models\Privacy::where("id","1")->get();
    }else{
        $privacglb[0]=[ "kvkk" => "", "cerez" => "", "gizlilik" => ""];
    }
@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset("front/css/bootstrap.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/icofont.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/meanmenu.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/modal-video.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/fonts/flaticon.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/animate.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/lightbox.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("front/css/owl.theme.default.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/odometer.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/nice-select.min.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/style.css")}}">

    <link rel="stylesheet" href="{{asset("front/css/responsive.css")}}">
    <title>@yield("title")</title>
    <link rel="icon" type="image/png" href="{{asset("front/img/favicon.png")}}">
</head>

<body>

<div class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="pre-box-one">
                <div class="pre-box-two"></div>
            </div>
        </div>
    </div>
</div>


<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left">
                    <ul>
                        <li>
                            <i class="icofont-location-pin"></i>
                            <a href="#">{{(isset(json_decode($aboutglb[0]["sosial"])->adres)?(json_decode($aboutglb[0]["sosial"])->adres):"")}}</a>
                        </li>
                        <li>
                            <i class="icofont-ui-call"></i>
                            <a href="tel:{{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}">{{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}</a>
                        </li>
                        <li>
                            <i class="icofont-ui-email"></i>
                            <a href="mailto:{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}">{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right">
                    <ul>
                        <li>
                            <span>Bizi Takip Edin:</span>
                        </li>
                        <li>
                            <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->facebook)?(json_decode($aboutglb[0]["sosial"])->facebook):"")}}" target="_blank">
                                <i class="icofont-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->twitter)?(json_decode($aboutglb[0]["sosial"])->twitter):"")}}" target="_blank">
                                <i class="icofont-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->youtube)?(json_decode($aboutglb[0]["sosial"])->youtube):"")}}" target="_blank">
                                <i class="icofont-youtube-play"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->instagram)?(json_decode($aboutglb[0]["sosial"])->instagram):"")}}" target="_blank">
                                <i class="icofont-instagram"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="navbar-area sticky-top">

    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="front/img/logo-two.png" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="front/img/logo.png" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Ana Sayfa</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Kurumsal <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{route("about.index")}}">Hakımızda</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route("whyus.index")}}">Neden Biz ?</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route("image.index")}}">Fotoğraf Galeresi</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route("refrans.index")}}">Referansalar</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route("video.index")}}">Videolar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("service.index",["egitimlerimiz"])}}" class="nav-link dropdown-toggle">Eğitimlerimiz <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                    @foreach(\App\Models\Category::where('parent_id',0)->with("subcategory")->get() as $taxonomy)
                                <li class="nav-item">
                                    <a href="{{route("service.detail",$taxonomy["slug"])}}" class=" nav-link dropdown-toggle ">{{$taxonomy["name"]}}
                                        <i class="  {{count($taxonomy->subcategory)?'icofont-simple-down':''}}"></i></a>
                                    @if(count($taxonomy->subcategory))
                                    <ul class="dropdown-menu">
                                        @foreach($taxonomy->subcategory as $row )
                                        <li class="nav-item">
                                            <a href="{{route("service.detail",$row["slug"])}}" class="nav-link">{{$row["name"]}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                        @endif
                                </li>
                                    @endforeach

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route("language.index")}}" class="nav-link dropdown-toggle">Diğer Diller <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">

                                @foreach(\App\Models\Language::all() as $row)
                                    <li  class="nav-item" >
                                        <a class="nav-link" href="{{route("language.detail",$row["slug"])}}">{{$row["title"]}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("campaing.index")}}" class="nav-link">Kampanyalar</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("contact.index")}}" class="nav-link">İletişim</a>
                        </li>
                    </ul>
                    <div class="side-nav">
                        <a class="donate-btn" href="{{route("login")}}">
                            Giriş Yap
                            <i class="icofont-heart-login"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield("content")

<footer class="footer-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a class="logo" href="index.html">
                            <img src="front/img/logo-two.png" alt="Logo">
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vero, magni est placeat
                            neque, repellat maxime a dolore</p>
                        <ul>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="icofont-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="icofont-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="icofont-youtube-play"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="icofont-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-causes">
                        <h3>Urgent causes</h3>
                        <div class="cause-inner">
                            <ul class="align-items-center">
                                <li>
                                    <img src="front/img/footer-thumb1.jpg" alt="Cause">
                                </li>
                                <li>
                                    <h3>
                                        <a href="donation-details.html">Donate for melina the little child</a>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                        <div class="cause-inner">
                            <ul class="align-items-center">
                                <li>
                                    <img src="front/img/footer-thumb2.jpg" alt="Cause">
                                </li>
                                <li>
                                    <h3>
                                        <a href="donation-details.html">Relief for Australia cyclone effected</a>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-links">
                        <h3>Quick links</h3>
                        <ul>
                            <li>
                                <a href="about.html">
                                    <i class="icofont-simple-right"></i>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="blog.html">
                                    <i class="icofont-simple-right"></i>
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="events.html">
                                    <i class="icofont-simple-right"></i>
                                    Events
                                </a>
                            </li>
                            <li>
                                <a href="donation.html">
                                    <i class="icofont-simple-right"></i>
                                    Donation
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-contact">
                        <h3>Contact info</h3>
                        <div class="contact-inner">
                            <ul>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <a href="#">6B, Helvetica street, Jordan</a>
                                </li>
                                <li>
                                    <i class="icofont-ui-call"></i>
                                    <a href="tel:+123456789">+123-456-789</a>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-inner">
                            <ul>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <a href="#">6A, New street, Spain</a>
                                </li>
                                <li>
                                    <i class="icofont-ui-call"></i>
                                    <a href="tel:+548658956">+548-658-956</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <p>Copyright ©2021 Findo. Designed By <a href="../../index.htm" target="_blank">HiBootstrap</a></p>
        </div>
    </div>
</footer>


<div class="go-top">
    <i class="icofont-arrow-up"></i>
    <i class="icofont-arrow-up"></i>
</div>


<script src="{{asset("front/js/jquery.min.js")}}"></script>
<script src="{{asset("front/js/popper.min.js")}}"></script>
<script src="{{asset("front/js/bootstrap.min.js")}}"></script>

<script src="{{asset("front/js/form-validator.min.js")}}"></script>

<script src="{{asset("front/js/contact-form-script.js")}}"></script>

<script src="{{asset("front/js/jquery.ajaxchimp.min.js")}}"></script>

<script src="{{asset("front/js/jquery.meanmenu.js")}}"></script>

<script src="{{asset("front/js/jquery-modal-video.min.js")}}"></script>

<script src="{{asset("front/js/wow.min.js")}}"></script>

<script src="{{asset("front/js/lightbox.min.js")}}"></script>

<script src="{{asset("front/js/owl.carousel.min.js")}}"></script>

<script src="{{asset("front/js/odometer.min.js")}}"></script>
<script src="{{asset("front/js/jquery.appear.min.js")}} "></script>

<script src="{{asset("front/js/jquery.nice-select.min.js")}}"></script>

<script src="{{asset("front/js/custom.js")}}"></script>
</body>
@yield("script")
<script>
    var button = document.querySelector('.popup'),
        items = document.querySelectorAll('.trigger');
    var openCloseMenu = function() {
        for(i=0; i < items.length; i++){
            items[i].classList.toggle('slideout');
        }
    }
    button.onclick = openCloseMenu;

</script>
</body>

<!-- Mirrored from expert-themes.com/html/globex/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Nov 2021 08:12:51 GMT -->

</html>
<style>
    .navigation > li:hover{
        color: inherit;
        color: white;
    }

    @media only screen and (max-width: 768px) {
        .header-upper{

            display: none;
        }
        .logincls{
            display: block;
        }

    }
    .logincls{
        display: none;
    }

    .nav {
        position: fixed;
        bottom:0px;
        z-index:1000;
    }
    /* ADJUST MENU POP UP */
    .nav li {
        list-style-type: none;
        background-color:RGBA(0,0,0,.5);
        width:85px;
        height:45px;
        text-align:center;
        z-index: 5;
        cursor: pointer;
        display:block;
    }
    .nav li:hover {
        display:block;
    }
    .nav li:first-child {
        list-style-type: none;
        display:block;
        background-color:RGBA(0,0,0,.5);
        width:85px;
        height:45px;
        text-align:center;
        z-index: 5;
        cursor: pointer;
    }

    .nav li:first-child:hover {
        display:block;
    }
    /* CONTROL MENU POP UP MENU FONT STYLE */
    .nav li a {
        font-family:Arial, Helvetica, sans-serif;
        font-weight: 400;
        font-size:12px;
        color:#ffffff;
        display: block;
        padding-top:18px;
        width:100%;
        height:100%;
        text-decoration:none;
    }
    /* MENU FONT HOVER */
    .nav li a:hover {
        color:#0BB3E2;
    }
    * {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        list-style: none;
        border:0;
    }
    button.popup,
    ul.trigger {
        text-align: center;
        width: 4.7em;
        height: 4.7em;
        position: fixed;
        margin-bottom:0px;
        bottom:0;
        left: 0;
        -webkit-transition: .2s linear;
        -moz-transition: .2s linear;
        transition: .2s linear;
        border: none;
    }
    /* ADJUST MARGIN BOTTOM */
    ul.trigger {
        margin-left: 14px;
        margin-bottom: -75px;
    }
    /* ADJUST MENU COLOR/SIZE/POSITION */
    button.popup {
        background-color:RGBA(0,0,0,.8);
        width:85px;
        height:45px;
        text-align:center;
        margin-bottom:0;
        margin-left:14px;
        bottom:0;
        left:0;
        z-index: 5;
        cursor: pointer;
        font-size:0.75em;
        font-weight: bold;
        color:#0BB3E2;
    }
    /* ADJUST ROLL UP DISTANCE */
    ul.trigger.slideout:nth-child(1) {
        -webkit-transform: translateY(-22.5em) translateX(0em);
        -moz-transform: translateY(-22.5em) translateX(0em);
        transform: translateY(-22.5em) translateX(0em);
    }
</style>

</html>

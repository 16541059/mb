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
    $color ="#29235c"
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{asset("front/css/responsive.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
                    {{--    <li>
                            <i class="icofont-ui-email"></i>
                            <a href="mailto:{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}">{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}</a>
                        </li>--}}
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
                        <li>
                            <a href="https://wa.me/{{(isset(json_decode($aboutglb[0]["sosial"])->whatsapp)?(json_decode($aboutglb[0]["sosial"])->whatsapp):"")}}" target="_blank">
                                <i class="icofont-whatsapp"></i>
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
        <a href="{{route("index")}}" class="logo">
            <img src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route("index")}}">
                    <img src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}" alt="Logo">
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
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a class="logo" href="{{route("index")}}">
                            <img src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}" alt="Logo">
                        </a>
                        <p>{!! isset($aboutglb[0]["about"])?(mb_substr(strip_tags($aboutglb[0]["about"]) ,0,200)):""    !!}
                            ...</p>
                        <ul>
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
                            <li>
                                <a href="https://wa.me/{{(isset(json_decode($aboutglb[0]["sosial"])->whatsapp)?(json_decode($aboutglb[0]["sosial"])->whatsapp):"")}}" target="_blank">
                                    <i class="icofont-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-links">
                        <h3>Hızlı Linkler</h3>
                        <ul>
                            <li>
                                <a href="{{route("service.index",["egitimlerimiz"])}}">
                                    <i class="icofont-simple-right"></i>
                                    Eğitimler
                                </a>
                            </li>
                            <li>
                                <a href="{{route("language.index")}}">
                                    <i class="icofont-simple-right"></i>
                                    Diğer Diller
                                </a>
                            </li>
                            <li>
                                <a href="{{route("campaing.index")}}">
                                    <i class="icofont-simple-right"></i>
                                    Kampanyalar
                                </a>
                            </li>
                            <li>
                                <a href="{{route("contact.index")}}">
                                    <i class="icofont-simple-right"></i>
                                    İletişim
                                </a>
                            </li>
                            <li>
                                <a href="{{route("whyus.index")}}">
                                    <i class="icofont-simple-right"></i>
                                    Neden Biz
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-contact">
                        <h3>İletişim Bilgilerim</h3>
                        <div class="contact-inner">
                            <ul>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <a href="#">{{(isset(json_decode($aboutglb[0]["sosial"])->adres)?(json_decode($aboutglb[0]["sosial"])->adres):"")}}</a>
                                </li>
                                <li>
                                    <i class="icofont-ui-call"></i>
                                    <a href="tel:{{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}">{{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}</a>
                                </li>
                                <br>
                                <li>
                                    <i class="icofont-ui-email"></i>
                                    <a href="mailto:{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}">{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-inner">


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <p>Copyright &copy; 2020 Tüm hakları İngiliz Kültüre aittir. Designed By <a href="https://areswebtasarim.com" target="_blank">Ares Web Tasarım</a></p>
        </div>
    </div>
</footer>
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="privacymodal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Çerezler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $privacglb[0]["cerez"] !!}
            </div>

        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="privacymodal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Gizlilik Sözleşmesi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $privacglb[0]["gizlilik"] !!}
            </div>
        </div>
    </div>
</div>
<!-- Search Popup -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="privacymodal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">KVKK Metni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $privacglb[0]["kvkk"] !!}
            </div>
        </div>
    </div>
</div>

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
{{--<script>
    var button = document.querySelector('.popup'),
        items = document.querySelectorAll('.trigger');
    var openCloseMenu = function() {
        for(i=0; i < items.length; i++){
            items[i].classList.toggle('slideout');
        }
    }
    button.onclick = openCloseMenu;

</script>--}}
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

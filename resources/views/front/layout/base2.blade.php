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
<html>


<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <!-- Stylesheets -->
    <link href="{{asset("front/css/bootstrap.css")}}" rel="stylesheet">
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}"/>


    <!-- Color Themes -->
    <link id="theme-color-file" href="{{asset('front/css/color-themes/default-theme.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('front/js/respond.js')}}"></script><![endif]-->
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header header-style-three">

        <!-- Header Top Two -->
        <div class="header-top-two">
            <div class="outer-container">
                <div class="clearfix">

                    <!-- Top Left -->
                    <div class="top-left clearfix">
                        <!-- Info List -->
                        <ul class="info-list">
                            <li>
                                Çalışma
                                Saateleri: {{(isset(json_decode($aboutglb[0]["sosial"])->day)?(json_decode($aboutglb[0]["sosial"])->day):"")}}
                                {{(isset(json_decode($aboutglb[0]["sosial"])->time)?(json_decode($aboutglb[0]["sosial"])->time):"")}}
                            </li>

                        </ul>
                    </div>

                    <!-- Top Right -->
                    <div class="top-right pull-right clearfix">
                        <!-- Info List -->
                        <ul class="info-list">
                            <li><a href="mailto:info@webmail.com"><span class="icon flaticon-email"></span>
                                    {{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}
                                </a></li>
                            <li><a href="tel:786-875-864-75"><span class="icon flaticon-telephone"></span>
                                    {{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}
                                </a></li>
                        </ul>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li>
                                <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->facebook)?(json_decode($aboutglb[0]["sosial"])->facebook):"")}}"
                                   class="fa fa-facebook-f"></a></li>
                            <li>
                                <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->twitter)?(json_decode($aboutglb[0]["sosial"])->twitter):"")}}"
                                   class="fa fa-twitter"></a></li>
                            <li>
                                <a href="{{(isset(json_decode($aboutglb[0]["sosial"])->instagram)?(json_decode($aboutglb[0]["sosial"])->instagram):"")}}"
                                   class="fa fa-instagram"></a></li>
                            <li>
                                <a href="https://wa.me/{{(isset(json_decode($aboutglb[0]["sosial"])->whatsapp)?(json_decode($aboutglb[0]["sosial"])->whatsapp):"")}}"
                                   class="fa fa-whatsapp"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-left logo-box">
                        <div class="logo"><a href="/"><img
                                    src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}" alt=""
                                    title=""></a>
                        </div>
                    </div>

                    <div class="pull-right upper-right clearfix">

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-pin"></span></div>
                            <ul>
                                <li><strong>Address</strong></li>
                                <li>{{(isset(json_decode($aboutglb[0]["sosial"])->adres)?(json_decode($aboutglb[0]["sosial"])->adres):"")}}</li>
                            </ul>
                        </div>

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-email-1"></span></div>
                            <ul>
                                <li><strong>E-Mail</strong></li>
                                <li>{{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}</li>
                            </ul>
                        </div>

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <!-- Quote Btn -->
                            <div class="btn-box">
                                <a href="/login" class="theme-btn btn-style-one"><span class="txt">Giriş Yap</span></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">

            <div class="auto-container clearfix">
                <div class="nav-outer clearfix">

                    <!-- Grid Box -->
                    <div  class="grid-box navSidebar-button">
                        <a style="color: white"  href="#" class="icon flaticon-menu-2"></a>
                    </div>
                    <!-- End Grid Box -->

                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu show navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="logincls"><a href="{{route("login")}}">GİRİŞ YAP</a></li>
                                <li><a class="current" href="{{route("index")}}">ANA SAYFA</a></li>
                                <li class=" dropdown"><a href="#">KURUMSAL</a>
                                    <ul>
                                        <li class=""><a href="{{route("about.index")}}">Hakımızda</a></li>
                                        <li class=""><a href="{{route("whyus.index")}}">Neden Biz ?</a></li>
                                        <li class=""><a href="{{route("image.index")}}">Fotoğraf Galeresi</a></li>
                                        <li class=""><a href="{{route("refrans.index")}}">Referansalar</a></li>
                                        <li class=""><a href="{{route("video.index")}}">Videolar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a
                                        onclick="window.location.href='{{route("service.index",["egitimlerimiz"])}}'"
                                        href="{{route("service.index",["egitimlerimiz"])}}">EĞİTİMLER</a>
                                    <ul>
                                        @foreach(\App\Models\Category::where('parent_id',0)->with("subcategory")->get() as $taxonomy)
                                            <li class=" {{count($taxonomy->subcategory)?"dropdown":""}} "><a
                                                    onclick="window.location.href='{{route("service.detail",$taxonomy["slug"])}}'"
                                                    href="{{route("service.detail",$taxonomy["slug"])}}">{{$taxonomy["name"]}}</a>
                                                @if(count($taxonomy->subcategory))
                                                    <ul>
                                                        @foreach($taxonomy->subcategory as $row )
                                                            <li>
                                                                <a href="{{route("service.detail",$row["slug"])}}">{{$row["name"]}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </li>

                                        @endforeach
                                    </ul>
                                </li>

                                <li class="dropdown"><a onclick="window.location.href='{{route("language.index")}}'"
                                                        href="{{route("language.index")}}">DİĞER DİLLER</a>
                                    <ul>
                                        @foreach(\App\Models\Language::all() as $row)
                                            <li>
                                                <a href="{{route("language.detail",$row["slug"])}}">{{$row["title"]}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li class=""><a href="{{route("campaing.index")}}">KAMPANYALAR</a></li>
                                <li class=""><a href="{{route("contact.index")}}">İLETİŞİM</a></li>

                            </ul>
                        </div>


                        <!--Search Box-->
                        <div class="search-box-outer ml-3 ">
                            <div class="search-box-btn">{{--<span class="fa fa-search">--}}</span></div>
                        </div>

                    </nav>
                    <!-- Main Menu End-->

                    <!-- Options Box -->
                    <div class="options-box clearfix">
                        <div class="option-inner">
                            <span class="icon flaticon-24-hours-2"></span>
                            <div class="number"><span>BİZİ Arayın</span><a href="tel:+901-855-678-90">
                                    {{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}
                                </a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Header Lower -->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="/" title=""><img src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}" alt=""
                                              title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->

                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}"
                                                       alt=""
                                                       title=""></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>

    <!-- Sidebar Cart Item -->
    <div class="xs-sidebar-group info-group">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">
                        X
                    </a>
                </div>
                <div class="sidebar-textwidget">

                    <!-- Sidebar Info Content -->
                    <div class="sidebar-info-contents">
                        <div class="content-inner">
                            <div class="logo">
                                <a href="/"><img src="{{(isset($aboutglb[0]["logo"])?($aboutglb[0]["logo"]):"")}}"
                                                 alt=""/></a>
                            </div>
                            <div class="content-box">
                                <h2>Hakkımızda</h2>
                                <p class="text">

                                    {!! isset($aboutglb[0]["about"])?(mb_substr(strip_tags($aboutglb[0]["about"]) ,0,250)):""    !!}
                                    ...
                                </p>
                                <a href="{{route("about.index")}}" class="theme-btn btn-style-three"><span
                                        class="txt">Detaylı Bilgi</span></a>
                            </div>
                            <div class="contact-info">
                                <h2>İLETİŞİM BİLGİLERİ</h2>
                                <ul class="list-style-one">
                                    <li><span class="icon fa fa-location-arrow"></span>
                                        {{(isset(json_decode($aboutglb[0]["sosial"])->adres)?(json_decode($aboutglb[0]["sosial"])->adres):"")}}
                                    </li>
                                    <li><span class="icon fa fa-phone"></span>
                                        {{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}
                                    </li>
                                    <li><span class="icon fa fa-envelope"></span>
                                        {{(isset(json_decode($aboutglb[0]["sosial"])->mail)?(json_decode($aboutglb[0]["sosial"])->mail):"")}}
                                    </li>
                                    <li><span class="icon fa fa-clock-o"></span> Çalışma
                                        Saateleri: {{(isset(json_decode($aboutglb[0]["sosial"])->day)?(json_decode($aboutglb[0]["sosial"])->day):"")}}
                                        {{(isset(json_decode($aboutglb[0]["sosial"])->time)?(json_decode($aboutglb[0]["sosial"])->time):"")}}
                                    </li>
                                </ul>
                            </div>
                            <!-- Social Box -->
                            <ul class="social-box">
                                <li class="facebook"><a
                                        href="{{(isset(json_decode($aboutglb[0]["sosial"])->facebook)?(json_decode($aboutglb[0]["sosial"])->facebook):"")}}"
                                        class="fa fa-facebook-f"></a></li>
                                <li class="twitter"><a
                                        href="{{(isset(json_decode($aboutglb[0]["sosial"])->twitter)?(json_decode($aboutglb[0]["sosial"])->twitter):"")}}"
                                        class="fa fa-twitter"></a></li>
                                <li class="linkedin"><a
                                        href="{{(isset(json_decode($aboutglb[0]["sosial"])->linkedin)?(json_decode($aboutglb[0]["sosial"])->linkedin):"")}}"
                                        class="fa fa-linkedin"></a></li>
                                <li class="instagram"><a
                                        href="{{(isset(json_decode($aboutglb[0]["sosial"])->instagram)?(json_decode($aboutglb[0]["sosial"])->instagram):"")}}"
                                        class="fa fa-instagram"></a></li>
                                <li class="youtube"><a
                                        href="{{(isset(json_decode($aboutglb[0]["sosial"])->youtube)?(json_decode($aboutglb[0]["sosial"])->youtube):"")}}"
                                        class="fa fa-youtube"></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END sidebar widget item -->

@yield("content")
<!-- Main Footer -->
    <footer class="main-footer style-three">
        <div class="pattern-layer-three"
             style="background-image: url({{asset('front/images/background/pattern-14.png')}})"></div>
        <div class="pattern-layer-four"
             style="background-image: url({{asset('front/images/background/pattern-15.png')}})"></div>
        <!--Waves end-->
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget logo-widget">
                            <h5>Hakkımızda</h5>
                            <div class="text">
                                {!! isset($aboutglb[0]["about"])?(mb_substr(strip_tags($aboutglb[0]["about"]) ,0,300)):""    !!}
                                ...
                                <a href="{{route("about.index")}}" class="learn"><span
                                        class="arrow flaticon-long-arrow-pointing-to-the-right"></span>Hakkımızda Daha
                                    Fazlası</a>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget links-widget">
                            <h5>Hızlı Menü</h5>
                            <ul class="list-link">
                                <li><a href="/">Anasayfa</a></li>
                                <li><a href="{{route("service.index",["egitimlerimiz"])}}">Eğitimler</a></li>
                                <li><a href="{{route("language.index")}}">Diğer Diller</a></li>
                                <li><a href="{{route("campaing.index")}}">Kampanyalar</a></li>
                                <li><a href="{{route("contact.index")}}">İletişim</a></li>
                                <li><a href="{{route("whyus.index")}}">Neden Biz</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                        <div class="footer-widget subscribe-widget">
                            <h5>Bizden Haberler</h5>
                            <div class="text">Bültenimize Üye Olun ! Tüm İndirim <br> ve Fırsatlardan İlk Sizin
                                Haberiniz Olsun !
                            </div>
                            <!--Emailed Form-->
                            <div class="text" id="alertmail"></div>
                            <div class="emailed-form">

                                <div class="form-group">
                                    <input type="email" name="abonemail" value="" placeholder="E-postanızı giriniz"
                                           required>
                                    <button type="submit" onclick="saveabone('{{route("savemail")}}')"
                                            class="theme-btn">Kayıt Ol
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Column -->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <div class="copyright">Copyright &copy; 2020 Tüm hakları İngiliz Kültüre aittir.</div>
                    </div>
                    <!-- Column -->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <ul class="footer-nav">

                            <li><a data-toggle="modal" data-target=".bd-example-modal-lg">KVK Bilgilendirme Metni</a>
                            </li>
                            <li><a data-toggle="modal" data-target=".bd-example-modal-lg1">Çerez Politikası</a></li>
                            <li><a data-toggle="modal" data-target=".bd-example-modal-lg2">Gizlilik</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="nav">
            <ul class="trigger">
                <li><a href="https://wa.me/{{(isset(json_decode($aboutglb[0]["sosial"])->whatsapp)?(json_decode($aboutglb[0]["sosial"])->whatsapp):"")}}" class="menufont"> <i class="fa fa-whatsapp" > Whatsapp </i></a></li>
                <li><a href="{{(isset(json_decode($aboutglb[0]["sosial"])->facebook)?(json_decode($aboutglb[0]["sosial"])->facebook):"")}}" class="menufont"> <i class="fa fa-facebook" > Facebook </i></a></li>
                <li><a href="tel:{{(isset(json_decode($aboutglb[0]["sosial"])->tel)?(json_decode($aboutglb[0]["sosial"])->tel):"")}}" class="menufont"> <i class="fa fa-phone" > Telefon </i></a></li>
                <li><a href="{{(isset(json_decode($aboutglb[0]["sosial"])->instagram)?(json_decode($aboutglb[0]["sosial"])->instagram):"")}}" class="menufont"> <i class="fa fa-instagram" > İnstagram </i></a></li>
                <li><a href="{{(isset(json_decode($aboutglb[0]["sosial"])->youtube)?(json_decode($aboutglb[0]["sosial"])->youtube):"")}}" class="menufont"> <i class="fa fa-youtube" > Youtube </i></a></li>
                <li><a href="{{(isset(json_decode($aboutglb[0]["sosial"])->twitter)?(json_decode($aboutglb[0]["sosial"])->twitter):"")}}" class="menufont"> <i class="fa fa-twitter" > Twitter </i></a></li>

            </ul>
            <button class="popup">İletişim</button>
        </div>



    </footer>


</div>
<!--End pagewrapper-->

<!-- Color Palate / Color Switcher -->

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
<div class="search-popup">
    <button class="close-search style-two"><span class="flaticon-multiply"></span></button>
    <button class="close-search"><span class="flaticon-up-arrow-1"></span></button>
    <form method="post" action="https://expert-themes.com/html/globex/blog.html">
        <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search Here" required="">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<!-- End Header Search -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{asset('front/js/jquery.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('front/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('front/js/appear.js')}}"></script>
<script src="{{asset('front/js/parallax.min.js')}}"></script>
<script src="{{asset('front/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('front/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('front/js/owl.js')}}"></script>
<script src="{{asset('front/js/wow.js')}}"></script>
<script src="{{asset('front/js/nav-tool.js')}}"></script>
<script src="{{asset('front/js/jquery-ui.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
<script src="{{asset('front/js/color-settings.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>
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

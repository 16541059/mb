@extends("front.layout.base")
@section("title")
    Amerikan Kultur
@endsection

@section("content")


    <div class="banner-area-two three">
        <div class="banner-slider owl-theme owl-carousel">

            @foreach($slider as $row)
            <div class="banner-slider-item banner-img-four" style="background-image: url('{{url($row["images"])}}')">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-content">
                                <h1> {{$row["name"]}} </h1>
                                <p> {{$row["title"]}} </p>
                             {{--   <div class="banner-btn-area">
                                    <a class="common-btn banner-btn" href="#">Get Start A Fundraising</a>
                                    <a class="common-btn" href="#">Donate Now</a>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    <div class="feature-area two pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-item">
                        <i class="flaticon-solidarity"></i>
                        <h3>
                            <a href="#">EUROPASS</a>
                        </h3>
                        <p>Üniversiteden mezun olduktan sonra Europass belgesi ile öğrencilerine iş imkanı sunabilen ülkemizdeki tek dil kursu zinciridir.</p>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-item two">
                        <i class="flaticon-donation"></i>
                        <h3>
                            <a href="#">ÇİFT DİPLOMA</a>
                        </h3>
                        <p>Amerika Birleşik Devletleri’nin Ortaokul Ve Lise Düzeyinde En Popüler Eğitim Sistemleri Arasındadır .</p>

                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="feature-item three">
                        <i class="flaticon-love"></i>
                        <h3>
                            <a href="#">ONLINE TESOL</a>
                        </h3>
                        <p>Ana dili İngilizce olmayan kişilere İngilizce öğretme yetkinliğini gösterir bir belge alınmasını sağlayan kursun kısaltılmış adıdır..</p>

                    </div>
                </div>
            </div>
        </div>
    </div>




    @if(!empty($about) )

        <div class="about-area two pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title">Hakkımızda</span>
                                <h2>{{$about[0]["name"]}}</h2>
                            </div>
                            <p>
                                {!!  mb_substr(strip_tags($about[0]["about"]) ,0,1000)  !!}...
                            </p>
                            <div class="about-btn-area">

                                <a class="common-btn" href="{{route("about.index")}}">Daha Fazla</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{$about[0]["image"]}}" alt="About">
                            <div class="video-wrap">
                                @php
                                if(isset(json_decode($about[0]["sosial"])->video)){
                                 $video_id= explode("=",(json_decode($about[0]["sosial"])->video));

                        }
                                @endphp
                                <button class="js-modal-btn" data-video-id="{{isset(json_decode($about[0]["sosial"])->video)?(end($video_id)):""}}">
                                    <i class="icofont-ui-play"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <section class="about-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="title">Hakkımızda</div>
                    <h2>{{$about[0]["name"]}}</h2>
                </div>
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="text">
                                {!!  mb_substr(strip_tags($about[0]["about"]) ,0,1000)  !!}...
                            </div>
                            <div class="blocks-outer">


                            </div>

                            <a href="{{isset(json_decode($about[0]["sosial"])->video)?(json_decode($about[0]["sosial"])->video):""}}"
                               class="lightbox-image theme-btn btn-style-one"><span class="txt"><i
                                        class="play-icon"><img src="{{asset("front/images/icons/play-icon.png")}}"
                                                               alt=""/></i>&ensp; intro Video</span></a>

                        </div>
                    </div>

                    <!-- Images Column -->
                    <div class="images-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column"
                             style="background-image: url({{asset("front/images/icons/globe.png")}} )">
                            <div class="pattern-layer"
                                 style="background-image: url({{asset("front/images/background/pattern-1.png")}})"></div>
                            <div class="images-outer parallax-scene-1">
                                <div class="image" data-depth="0.10">
                                    <img src="{{$about[0]["image"]}}" alt=""/>
                                </div>
                                <div class="image-two" data-depth="0.30">
                                    <img style="border-radius: 50%" src="{{asset("front/images/resource/about-2.jpg")}}"
                                         alt=""/>
                                </div>
                                <div class="image-three" data-depth="0.20">
                                    <img style="border-radius: 50%" src="{{asset("front/images/resource/about-3.jpg")}}"
                                         alt=""/>
                                </div>
                                <div class="image-four" data-depth="0.30">
                                    <img style="border-radius: 50%" src="{{asset("front/images/resource/about-4.jpg")}}"
                                         alt=""/>
                                </div>
                            </div>
                        </div>
                        <a href="{{route("about.index")}}" class="learn"><span
                                class="arrow flaticon-long-arrow-pointing-to-the-right"></span>Hakkımızda Daha
                            Fazlası</a>
                    </div>

                </div>
            </div>
        </section>
    @endif
    <!--Sponsors Section-->
    <!-- Featured Section -->
    <section class="featured-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Featured Block Two -->
                <div class="feature-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms"
                         style="background-image: url({{asset("front/images/resource/feature-1.jpg")}});">
                        <div class="text"><b>İNGİLİZCE SEVİYENİZİ MERAK EDİYORSANIZ, UZMAN KADROMUZ SİZİN İÇİN
                                DEĞERLENDİRSİN!</b></div>
                        <div style="text-align: center; solid">
                            <br><a href="{{route("placement.index")}}" class="theme-btn btn-style-two center "><span class="txt">SEVİYE TESPİT SINAVI</span></a><br>
                        </div>
                    </div>
                </div>

                <!-- Featured Block Two -->
                <div class="feature-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms"
                         style="background-image: url({{asset("front/images/resource/feature-2.jpg")}});">
                        <div class="text"><b>HIZLI ÖN KAYIT İÇİN TIKLAYIN! SİZE EN UYGUN EĞİTİMİ BERABER BULALIM</b>
                        </div>
                        <div style="text-align: center; solid">
                            <br><a href="{{route("registration.index")}}" class="theme-btn btn-style-two center "><span class="txt">ÖN KAYIT FORMU</span></a><br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- Services Section -->
    <section class="services-section margin-top">
        <div class="pattern-layer"
             style="background-image: url({{asset("front/images/background/pattern-2.png")}})"></div>
        <div class="auto-container">
            <!-- Sec Title -->


        </div>
    </section>
    <section class="services-section-two margin-top">
        <div class="auto-container">
            <div class="upper-box" style="background-color: #29235c">
                <div class="icon-one" style="background-image: url({{asset("front/images/icons/icon-1.png")}})"></div>
                <div class="icon-two" style="background-image: url({{asset("front/images/icons/icon-2.png")}})"></div>
                <div class="icon-three" style="background-image: url({{asset("front/images/icons/icon-3.png")}})"></div>
                <!-- Sec Title -->
                <div class="sec-title light centered">
                    <div class="title"></div>
                    <h2>EĞİTİMLERİMİZ</h2>
                </div>
            </div>
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Service Block Two -->
                    @if(!empty($egitim))
                        @foreach($egitim as $row)
                            <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="shape-one"></div>
                                    <div class="shape-two"></div>
                                    <div class="icon-box">
                                        <span class="icon icon fa fa-book"></span>
                                    </div>
                                    <h5><a href="{{route("service.detail",$row["slug"])}}">{{$row["name"]}}</a></h5>
                                    <div class="text">
                                        {!!  mb_substr( strip_tags($row["description"]) ,0,120)  !!}...
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="btn-box">
                    <a href="{{route("service.index",["egitimlerimiz"])}}" class="theme-btn btn-style-one"><span
                            class="txt">TÜM HİZMETLER</span></a>
                </div>
            </div>
        </div>
    </section>



    <section class="call-to-action-section"
             style="background-image: url({{asset("front/images/background/pattern-16.png")}})">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Heading Column -->
                <div class="heading-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3 style="color:white;">Şimdi İngilizce Öğrenmenin Tam Zamanı!<br> İNGİLİZCE SEVİYENİZİ TEST
                            EDİN. SİZE UYGUN EĞİTİMİ BERABER BULALIM
                        </h3>
                    </div>
                </div>
                <!-- Button Column -->
                <div class="button-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <a href="{{route("registration.index")}}" class="theme-btn btn-style-two"><span class="txt">Ön Kayıt</span></a>
                        <a href="{{route("placement.index")}}" class="theme-btn btn-style-two"><span class="txt">Teste Katıl</span></a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(!empty($sinavingilizcesi))
        <section class="pricing-section">
            <div class="pattern-layer-one"
                 style="background-image: url({{asset("front/images/background/pattern-11.jpg")}})"></div>
            <div class="pattern-layer-two"
                 style="background-image: url({{asset("front/images/background/pattern-12.jpg")}})"></div>
            <div class="auto-container">

                <!-- Sec Title -->
                <div class="sec-title centered">
                    <div class="title">İNGİLİZ Kültür</div>
                    <h2>Sınav İngilizcesi</h2>
                </div>
                <div class="row clearfix">

                    <!-- Price Block -->

                    @foreach($sinav as $row )
                        <div class="price-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <h3 style="text-align:center">{{$row["name"]}}</h3>
                                <div class="text">
                                    <p>{!!  mb_substr(strip_tags($row["description"]) ,0,120)  !!}...</p></div>

                                <div class="btn-box">
                                    <a href="{{route("service.detail",$row["slug"])}}"
                                       class="theme-btn btn-style-one"><span class="txt">Detaylı Bilgi</span></a>
                                </div>

                            </div>
                        </div>
                @endforeach

                <!-- Price Block -->

                </div>
                <div class="btn-box">
                    <a href="{{route("service.index",[$sinavingilizcesi[0]["slug"]])}}" class="theme-btn btn-style-one"><span
                            class="txt">TÜM HİZMETLER</span></a>
                </div>

            </div>
        </section>
    @endif

    @if(!empty($kampanya))

        <section class="news-section-four">
            <div class="image-layer"
                 style="background-image: url({{asset("front/images/background/pattern-19.png")}})"></div>
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title light centered">
                    <div class="title">Ingiliz Kültür</div>
                    <h2>Duyuru & Kampanyalar</h2>
                </div>

                <div class="row clearfix">

                    <!-- News Block -->
                    @foreach($kampanya as $row)
                        <div class="news-block-four col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image">
                                    <a href="{{route("campaing.detail",$row["slug"])}}"><img src="{{$row["image"]}}"
                                                                                             alt=""/></a>
                                </div>
                                <div class="lower-content">
                                    <div
                                        class="post-date"> {{ $datetime->parse($row["updated_at"])->formatLocalized('%d') }}
                                        <span>
                                    {{  mb_substr( $datetime->parse($row["updated_at"])->formatLocalized('%B') ,0,3)  }}
                                </span></div>
                                    <h4><a href="{{route("campaing.detail",$row["slug"])}}">{{$row["title"]}}</a></h4>
                                    <div class="text">
                                        {!! mb_substr( $row["description"] ,0,120)  !!}...
                                    </div>
                                    <a class="" href="{{route("campaing.detail",$row["slug"])}}">Detaylı Bilgi</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

    @endif
    <!--Sponsors Section-->
    @if(!empty($referans))
        <section class="sponsors-section style-three news-section-four">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="title"></div>
                            <h2>Referanslarımız</h2>
                        </div>

                    </div>
                </div>
                <div class="carousel-outer">
                    <!--Sponsors Slider-->
                    <ul class="sponsors-carousel owl-carousel owl-theme">
                        @foreach($referans as $row)
                            <li>
                                <div class="image-box"><a href="#"><img src="{{$row["image"]}}" alt=""></a></div>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </section>
        <!--End Sponsors Section-->
    @endif



    <div class="modal fade" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content" style="background: rgba(51,170,51,0);border: 0px">

                <div class="modal-body">
                    <button style="color: red" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <a href="{{$popup[0]["link"]}}"> <img style="width: 100%" src="{{$popup[0]["image"]}}" alt=""> </a>

                </div>

            </div>
        </div>
    </div>

    <!-- End News Section Three -->
@endsection

@section("script")
    <script>


            @if($popup[0]["active"])

                     @if($popup[0]["oneshow"])

                        $('#saleModal').modal('show');
                     @else
                       if(!localStorage.getItem("popup")){
                         $('#saleModal').modal('show');
                         localStorage.setItem("popup","true")
                     }
                     @endif

            @endif




    </script>

@endsection

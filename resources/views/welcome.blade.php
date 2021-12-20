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
        @endif



    <div class="feature-area pt-100 pb-70" style="background-color: #ffffff">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6" >
                    <div class="feature-item" style="background-color:{{$color}}" >
                        <i class="fas fa-level-up-alt"></i>
                  {{--      <h3>
                            <a href="#">Be a volunteer</a>
                        </h3>--}}
                        <p><b>İNGİLİZCE SEVİYENİZİ MERAK EDİYORSANIZ, UZMAN KADROMUZ SİZİN İÇİN
                                DEĞERLENDİRSİN!</b></p>
                        <a class="feature-btn" href="{{route("placement.index")}}">Seviye Tespit Sınavı</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="feature-item two" style="background-color:{{$redcolor}}">
                        <i class="fas fa-edit"></i>
                        {{--     <h3>
                            <a href="#">Donate now</a>
                        </h3>--}}
                        <p><b>HIZLI ÖN KAYIT İÇİN TIKLAYIN! SİZE EN UYGUN EĞİTİMİ BERABER BULALIM</b></p>
                        <a class="feature-btn" href="{{route("registration.index")}}">Ön Kayıt Formu</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if(!empty($egitim))
    <section class="donations-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title"></span>
                <h2>Eğitimlerimiz</h2>

            </div>
            <div class="row">
                @foreach($egitim as $row)
                <div class="col-sm-6 col-lg-4">
                    <div class="donation-item">
                        <div class="top">

                            <h3>
                                <a href="{{route("service.detail",$row["slug"])}}">{{$row["name"]}}</a>
                            </h3>
                            <p>    {!!  mb_substr( strip_tags($row["description"]) ,0,100)  !!}...</p>
                        </div>
                        <div class="img">
                            <img src="{{$row["image"]}}" alt="">
                            <a class="common-btn" style="background-color: {{$redcolor}}" href="{{route("service.detail",$row["slug"])}}">Detay</a>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endif


    <section class="feature-area container pt-100 pb-70  feature-item two "  style="background-color: {{$color}}">
        <div class="container">
            <div class="row">
                <!-- Heading Column -->
                <div class="heading-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3 style="color:white;">Şimdi İngilizce Öğrenmenin Tam Zamanı!<br> İNGİLİZCE SEVİYENİZİ TEST
                            EDİN. SİZE UYGUN EĞİTİMİ BERABER BULALIM
                        </h3>
                    </div>
                </div>
                <!-- Button Column -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                        <a href="{{route("registration.index")}}" class="feature-btn"><span class="txt">Ön Kayıt</span></a>
                        <a href="{{route("placement.index")}}" class="feature-btn"><span class="txt">Teste Katıl</span></a>
                </div>
            </div>
        </div>
    </section>


    @if(!empty($sinavingilizcesi))

    <div class="benefit-area container three pt-100 pb-70">
        <div class="container">
            <div class="section-title">

                <h2>Sınav İngilizcesi</h2>

            </div>
            <div class="row">
                @foreach($sinav as $row )
                <div class="col-sm-6 col-lg-3">
                    <div class="benefit-item">
                        <img src="{{$row["image"]}}" style="border-radius:50%;width: 80px;height: 80px;line-height: 80px"  class="img-circle" alt="">
                        <h3>{{$row["name"]}}</h3>
                        <p>{!!  mb_substr(strip_tags($row["description"]) ,0,120)  !!}...</p>
                        <div class="img">
                            <a class="common-btn" style="background-color: {{$redcolor}}" href="{{route("service.detail",$row["slug"])}}">Detay</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endif


    <!--Sponsors Section-->
    @if(!empty($kampanya))
    <section class="blog-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Amerikan Kültür </span>

                <h2>Duyuru & Kampanyalar </h2>


            </div>
            <div class="row">

                @foreach($kampanya as $row)
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="{{route("campaing.detail",$row["slug"])}}">
                                <img src="{{$row["image"]}}" alt="Blog">
                            </a>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    <span>{{ $datetime->parse($row["updated_at"])->formatLocalized('%B %d - %m - %Y') }}</span>
                                </li>

                            </ul>
                            <h3>
                                <a href="{{route("campaing.detail",$row["slug"])}}">{{$row["title"]}}</a>
                            </h3>
                            <p>      {!! mb_substr( $row["description"] ,0,120)  !!}...</p>
                            <a class="blog-btn" href="{{route("campaing.detail",$row["slug"])}}">Detay</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>

@endif

@if(!empty($foto))
    <section class="gallery-area  container   pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Amerikan Kültür</span>
                <h2>Fotoğran Galerisi</h2>

            </div>
            <div class="row">
                @foreach($foto as $row)
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="{{$row["image"]}}" data-lightbox="roadtrip">
                            <img src="{{$row["image"]}}" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endif


    @if(!empty($referans))


        <section class="gallery-area  container   pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">Amerikan Kültür</span>
                    <h2>Referanslarımız</h2>
                    <div class="container mb-5">

                        <section class="customer-logos slider">
                            @foreach($referans as $row)

                                <div class="slide"><img src="{{$row["image"]}}"></div>
                            @endforeach

                        </section>
                    </div>
                </div>

            </div>
        </section>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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

                     $(document).ready(function(){
                         $('.customer-logos').slick({
                             slidesToShow: 6,
                             slidesToScroll: 1,
                             autoplay: true,
                             autoplaySpeed: 1500,
                             arrows: false,
                             dots: false,
                             pauseOnHover: false,
                             responsive: [{
                                 breakpoint: 768,
                                 settings: {
                                     slidesToShow: 4
                                 }
                             }, {
                                 breakpoint: 520,
                                 settings: {
                                     slidesToShow: 3
                                 }
                             }]
                         });
                     });


    </script>

    <style>
        h2{
            text-align:center;
            padding: 20px;
        }
        /* Slider */

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-slider
        {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list
        {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .slick-list:focus
        {
            outline: none;
        }
        .slick-list.dragging
        {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list
        {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track
        {
            position: relative;
            top: 0;
            left: 0;
            display: block;
        }
        .slick-track:before,
        .slick-track:after
        {
            display: table;
            content: '';
        }
        .slick-track:after
        {
            clear: both;
        }
        .slick-loading .slick-track
        {
            visibility: hidden;
        }

        .slick-slide
        {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
        }
        [dir='rtl'] .slick-slide
        {
            float: right;
        }
        .slick-slide img
        {
            display: block;
        }
        .slick-slide.slick-loading img
        {
            display: none;
        }
        .slick-slide.dragging img
        {
            pointer-events: none;
        }
        .slick-initialized .slick-slide
        {
            display: block;
        }
        .slick-loading .slick-slide
        {
            visibility: hidden;
        }
        .slick-vertical .slick-slide
        {
            display: block;
            height: auto;
            border: 1px solid transparent;
        }
        .slick-arrow.slick-hidden {
            display: none;
        }
    </style>

@endsection

@extends("front.layout.base")
@section("title",)
    Hakkımızda
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one"
             style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>Hakkımızda</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Hakkımızda</li>
            </ul>
        </div>
    </section>

    @if(!empty($about) )
    <section class="about-section mt-3">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title mt-3">
                <div class="title">Hakkımızda</div>
                <h2>{{$about[0]["name"]}}</h2>
            </div>
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="text">
                            {!! $about[0]["about"] !!}
                            </div>
                        <div class="blocks-outer">



                            <!-- Feature Block -->
                            <div class="feature-block">

                            </div>

                        </div>

                        <a href="{{isset(json_decode($about[0]["sosial"])->video)?(json_decode($about[0]["sosial"])->video):""}}" class="lightbox-image theme-btn btn-style-one"><span class="txt"><i class="play-icon"><img src="{{asset("front/images/icons/play-icon.png")}}" alt="" /></i>&ensp; intro Video</span></a>

                    </div>
                </div>

                <!-- Images Column -->
                <div class="images-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column" style="background-image: url({{asset("front/images/icons/globe.png")}} )">
                        <div class="pattern-layer" style="background-image: url({{asset("front/images/background/pattern-1.png")}})"></div>
                        <div class="images-outer parallax-scene-1">
                            <div class="image" data-depth="0.10">
                                <img  src="{{$about[0]["image"]}}" alt="" />
                            </div>
                            <div class="image-two" data-depth="0.30">
                                <img style="border-radius: 50%" src="{{asset("front/images/resource/about-2.jpg")}}" alt="" />
                            </div>
                            <div class="image-three" data-depth="0.20">
                                <img style="border-radius: 50%"  src="{{asset("front/images/resource/about-3.jpg")}}" alt="" />
                            </div>
                            <div class="image-four" data-depth="0.30">
                                <img style="border-radius: 50%"  src="{{asset("front/images/resource/about-4.jpg")}}" alt="" />
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->

@endif
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
                            <li><div class="image-box"><a href="#"><img src="{{$row["image"]}}" alt=""></a></div></li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </section>
        @endif
    <!-- End Contact Map Section -->
@endsection

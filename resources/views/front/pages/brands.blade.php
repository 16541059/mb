@extends('layouts.home')
@section('title')
@endsection
@section('main')
    <section class="page_banner" style="background-image: url({{asset('front/assets/images/bg/orta.jpg);')}}">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">Temsilciliklerimiz</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{route('index')}}" rel="v:url"><i
                                class="twi-home-alt1"></i>Anasayfa</a><span>/</span>Temsilciliklerimiz</p>
                </div>
            </div>
        </div>
    </section>

    <section class="servicePage01">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <img src="{{asset('front/assets/images/brands/amerikankultur.png')}}"  width="200px" alt="">
                        </div>
                        <h3><a href="single-service.html">Amerikan Kültür</a></h3>
                        <p>Amerikan Kültür Yabancı Dil Kurlsarı</p>
                        <a class="sm" href="https://www.amerikankultur.com" target="_blank">Web Sitesiniz Ziyaret Et<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <img src="{{asset('front/assets/images/brands/ingilizkultur.png')}}"  width="200px" alt="">

                        </div>
                        <h3><a href="single-service.html">İngiliz Kültür</a></h3>
                        <p>İngiliz Kültür Yabancı Dil Kursları</p>
                        <a class="sm" href="https://www.ingilizkultur.com" target="_blank">Web Sitesini Ziyaret Et<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <img src="{{asset('front/assets/images/brands/tac.png')}}"  width="150px" alt="">
                        </div>
                        <h3><a href="https://www.tacdilkursu.com" target="_blank">Tac Dil Kursu</a></h3>
                        <p>Tac Eğitim Kurumları</p>
                        <a class="sm" href="https://www.tacdilkursu.com" target="_blank">Web Sitesini Ziyaret Et<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                           <img src="{{asset('front/assets/images/brands/amerikanvip.png')}}" width="150px" alt="">
                        </div>
                        <h3><a href="single-service.html">American VIP</a></h3>
                        <p>American VIP Language Schools</p>
                        <a class="sm" href="https://www.americanvip.com.tr" target="_blank">Web Siteyi Ziyaret Et<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <span>05</span>
                            <i class="icon-Wemseu01"></i>
                            <div class="brleft"></div>
                            <div class="brright"></div>
                        </div>
                        <h3><a href="single-service.html">Consultancy</a></h3>
                        <p>A typical business holds many different assets called capital, including office...</p>
                        <a class="sm" href="single-service.html">Read More<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <span>06</span>
                            <i class="icon-local_1-1"></i>
                            <div class="brleft"></div>
                            <div class="brright"></div>
                        </div>
                        <h3><a href="single-service.html">Financial Advices</a></h3>
                        <p>A typical business holds many different assets called capital, including office...</p>
                        <a class="sm" href="single-service.html">Read More<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <span>07</span>
                            <i class="icons-startup-1"></i>
                            <div class="brleft"></div>
                            <div class="brright"></div>
                        </div>
                        <h3><a href="single-service.html">Audit Marketing</a></h3>
                        <p>A typical business holds many different assets called capital, including office...</p>
                        <a class="sm" href="single-service.html">Read More<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_01">
                        <div class="ibMeta">
                            <span>08</span>
                            <i class="icon-local_7-1"></i>
                            <div class="brleft"></div>
                            <div class="brright"></div>
                        </div>
                        <h3><a href="single-service.html">Banking Advising</a></h3>
                        <p>A typical business holds many different assets called capital, including office...</p>
                        <a class="sm" href="single-service.html">Read More<i class="twi-arrow-right1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection

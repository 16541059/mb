@extends("front.layout.base")
@section("title",)
    Hizmetlerimiz
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>{{($data[0]["name"])}}</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>{{mb_strtolower($data[0]["name"],"UTF-8")}}</li>
            </ul>
        </div>
    </section>


    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Sidebar Side -->
                <div class="sidebar-side left-sidebar col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">

                        <!-- Services -->
                        <div class="sidebar-widget">
                            <ul class="service-list">
                                @foreach($list as $row)
                                <li class="{{$row["slug"]==$data[0]["slug"]?"current":""}}"><a href="{{route("service.detail",$row["slug"])}}"><span class="arrow fa fa-angle-double-right"></span> {{$row["name"]}}</a></li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- Contact Widget -->
                        <div class="sidebar-widget contact-widget">
                            <div class="widget-content" style="background-image:url({{asset("front/images/resource/service.jpg")}})">
                                <div class="border-layer"></div>
                                <div class="icon-box flaticon-phone-call"></div>
                                <h4>Nasıl yardımcı olabiliriz?</h4>
                                <div class="text">Herhangi bir yardıma ihtiyacınız olursa, lütfen <br>
                                    bizimle iletişime geçmekten çekinmeyin..</div>
                                <ul>
                                    <li><span class="icon flaticon-call"></span>{{isset(json_decode($about[0]["sosial"])->tel)?(json_decode($about[0]["sosial"])->tel):""}}</li>
                                    <li><span class="icon flaticon-envelope"></span>{{isset(json_decode($about[0]["sosial"])->mail)?(json_decode($about[0]["sosial"])->mail):""}}</li>
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>

                <!-- Content Side -->
                <div class="content-side right-sidebar col-lg-8 col-md-12 col-sm-12">
                    <div class="services-detail">
                        <div class="inner-box">
                            <h2>{{$data[0]["name"]}}</h2>
                            <div class="image">
                                <img src="{{$data[0]["image"]}}" alt="" />
                            </div>
                            {!! $data[0]["description"] !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Info Section -->
    <section class="info-section" style="background-image: url({{asset("front/images/background/6.jpg")}})">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Logo Column -->
                <div class="logo-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="logo">
                            <a href="index-2.html"><img src="images/logo-2.png" alt="" /></a>
                        </div>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="icon-box"><span class="flaticon-pin"></span></div>
                        <ul>
                            <li><strong>Address</strong></li>
                            <li>{{isset(json_decode($about[0]["sosial"])->adres)?(json_decode($about[0]["sosial"])->adres):""}}</li>
                        </ul>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="icon-box"><span class="flaticon-phone-call"></span></div>
                        <ul>
                            <li><strong>Phone</strong></li>
                            <li>{{isset(json_decode($about[0]["sosial"])->tel)?(json_decode($about[0]["sosial"])->tel):""}}</li>
                        </ul>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="icon-box"><span class="flaticon-email-1"></span></div>
                        <ul>
                            <li><strong>E-Mail</strong></li>
                            <li>{{isset(json_decode($about[0]["sosial"])->mail)?(json_decode($about[0]["sosial"])->mail):""}}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

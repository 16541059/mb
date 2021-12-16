@extends("front.layout.base")
@section("title",)
Hizmetlerimiz
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>{{($info["service"])}}</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>{{mb_strtolower($info["service"],"UTF-8")}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Services Page Section -->
    <section class="services-page-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- News Block Three -->
                @foreach($data as $row)
                <div class="news-block-three col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route("service.detail",$row["slug"])}}"><img src="{{$row["image"]}}" alt="" /></a>
                        </div>
                        <div class="lower-content">

                                <h4><a href="{{route("service.detail",$row["slug"])}}">{{$row["name"]}}</a></h4>
                                <div class="text">
                                    {!!  mb_substr(strip_tags($row["description"]) ,0,120)  !!}...
                                </div>
                                <a class="read-more" href="{{route("service.detail",$row["slug"])}}">Detaylı Bilgi<span class="arrow flaticon-long-arrow-pointing-to-the-right"></span></a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Page Section -->

@endsection

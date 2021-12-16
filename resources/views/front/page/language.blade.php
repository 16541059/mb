@extends("front.layout.base")
@section("title",)
    Diller
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>DİLLER</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Diller</li>
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
                            <div class="image" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <a href="{{route("language.detail",$row["slug"])}}"><img src="{{$row["image"]}}" alt="" /></a>
                            </div>
                            <div class="lower-content">

                                <h4><a href="{{route("language.detail",$row["slug"])}}">{{$row["title"]}}</a></h4>
                                <div class="text">
                                    {!!  mb_substr(strip_tags($row["description"]) ,0,120)  !!}...
                                </div>
                                <a class="read-more" href="{{route("language.detail",$row["slug"])}}">Detaylı Bilgi<span class="arrow flaticon-long-arrow-pointing-to-the-right"></span></a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Page Section -->

@endsection

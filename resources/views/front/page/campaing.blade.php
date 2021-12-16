@extends("front.layout.base")
@section("title",)
    Kampanyalar
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>Kampanyalar</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Kampanyalar</li>
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
                    <div class="news-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <a href="{{route("campaing.detail",$row["slug"])}}"><img src="{{$row["image"]}}" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <div class="post-date">
                                    {{ $datetime->parse($row["updated_at"])->formatLocalized('%d') }}
                                    <span>
                                            {{  mb_substr( $datetime->parse($row["updated_at"])->formatLocalized('%B') ,0,3)  }}
                                    </span>
                                </div>
                                <h4><a href="{{route("campaing.detail",$row["slug"])}}">{{$row["title"]}}</a></h4>
                                <div class="text"> {!!  mb_substr(strip_tags($row["description"]) ,0,120)  !!}...</div>
                                <a class="read-more" href="{{route("campaing.detail",$row["slug"])}}">Detaylı Bilgi<span class="arrow flaticon-long-arrow-pointing-to-the-right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="styled-pagination text-center">
                <ul class="clearfix">

                    <li>
                        {{$data->links()}}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Services Page Section -->

@endsection

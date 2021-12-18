@extends("front.layout.base")
@section("title",)
Hizmetlerimiz
@endsection

@section("content")

    <!--Page Title-->
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>{{ucfirst(mb_strtolower($info["service"],"UTF-8")) }}</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Sayfa</a>
                            </li>
                            <li>
                                <span>{{ucfirst(mb_strtolower($info["service"],"UTF-8")) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog-area three ptb-100">
        <div class="container">
            <div class="row">

                @foreach($data as $row)
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item">
                            <div class="top">
                                <a href="{{route("service.detail",$row["slug"])}}">
                                    <img src="{{$row["image"]}}" alt="Blog">
                                </a>
                            </div>
                            <div class="bottom">

                                <h3>
                                    <a href="{{route("service.detail",$row["slug"])}}">{{$row["name"]}}</a>
                                </h3>
                                <p> {!!  mb_substr(strip_tags($row["description"]) ,0,120)  !!}...</p>
                                <a class="blog-btn" href="{{route("service.detail",$row["slug"])}}">Detay</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>



@endsection

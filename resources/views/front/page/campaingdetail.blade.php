@extends("front.layout.base")
@section("title",)
    Kampanyalar
@endsection

@section("content")

    <!--Page Title-->
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Kampanya Detay</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Sayfa</a>
                            </li>
                            <li>
                                <span>Kampanya Detay</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <div class="details-img">
                            <img src="{{$data[0]["image"]}}" alt="Details">
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $datetime->parse($data[0]["updated_at"])->formatLocalized('%A %d %B %Y') }}
                                </li>

                            </ul>
                            <h2>{{$data[0]["title"]}}  </h2>
                            <p>
                                {!! $data[0]["description"]  !!}
                            </p>

                        </div>



                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">

                        <div class="post widget-item">
                            <h3>Diğer Kampanyalarımız</h3>
                            @foreach($list as $row)

                            <div class="post-inner">

                                <ul class="align-items-center">
                                    <li>
                                        <a href="{{route("campaing.detail",$row["slug"])}}">         <img src="{{$row["image"]}}" alt="Details">   </a>
                                    </li>
                                    <li>
                                        <h4>
                                            <a href="{{route("campaing.detail",$row["slug"])}}">{{$row["title"]}}</a>
                                        </h4>
                                        <p><a href="{{route("campaing.detail",$row["slug"])}}"> {{ $datetime->parse($row["updated_at"])->formatLocalized('%A %d %B %Y') }}</a></p>
                                    </li>
                                </ul>

                            </div>

                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

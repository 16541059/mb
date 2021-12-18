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
                        <h2>{{ucwords(mb_strtolower($data[0]["name"],"UTF-8")) }}</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Sayfa</a>
                            </li>
                            <li>
                                <span>{{ucwords(mb_strtolower($data[0]["name"],"UTF-8")) }}</span>
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
                            <img  style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" src="{{$data[0]["image"]}}" alt="Details">

                            <h2>{{$data[0]["name"]}}  </h2>
                            <p>
                                {!! $data[0]["description"]  !!}
                            </p>

                        </div>



                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">

                        <div class="post widget-item">
                            <h3>Diğer Eğitimlerimiz</h3>
                            @foreach($list as $row)

                                <div class="post-inner">

                                    <ul class="align-items-center">
                                        <li>
                                            <a href="{{route("service.detail",$row["slug"])}}">         <img  style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  src="{{$row["image"]}}" alt="Details">   </a>
                                        </li>
                                        <li>
                                            <h4>
                                                <a href="{{route("service.detail",$row["slug"])}}">{{$row["name"]}}</a>
                                            </h4>
                                            <p><a href="{{route("service.detail",$row["slug"])}}"> </a> <a href="" ></a>  {!!  mb_substr(strip_tags($row["description"]) ,0,80)  !!}... <a href="{{route("service.detail",$row["slug"])}}" ><i class="fas fa-arrow-right"></i> </a> </p>
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

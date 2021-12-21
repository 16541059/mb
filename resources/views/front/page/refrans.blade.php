@extends("front.layout.base")
@section("title",)
    Referanslarımız
@endsection

@section("content")

    <!--Page Title-->
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Referanslarımız</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Safya</a>
                            </li>
                            <li>
                                <span>Referanslarımız</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($data  as $row)
                    <div class="col-sm-3 col-lg-2">
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
    </div>


@endsection
@section("script")


    <script src="{{asset("front/js/mixitup.js")}}"></script>
@endsection

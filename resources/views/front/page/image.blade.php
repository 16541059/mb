@extends("front.layout.base")
@section("title",)
    Fotoğraf Galerisi
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one"
             style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>FotoĞraf GALERİSİ</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Fotoğraf Galerisi</li>
            </ul>
        </div>
    </section>


    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title centered">

                <h2>Galeri</h2>
            </div>

            <div class="mixitup-gallery">
                <div class="filters clearfix">



                </div>
                <div class=" row clearfix">
                    @foreach($data  as $row)
                    <div class="case-block  all ideas technology development col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{$row["image"]}}" alt="" />
                                <div class="overlay-box">
                                    <a href="{{$row["image"]}}" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">{{$row["name"]}}</a></h4>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
@section("script")


    <script src="{{asset("front/js/mixitup.js")}}"></script>
@endsection

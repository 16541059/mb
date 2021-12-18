@extends("front.layout.base")
@section("title",)
    Video Galerisi
@endsection

@section("content")
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Video Galerisi</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Safya</a>
                            </li>
                            <li>
                                <span>Video Galerisi</span>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="gallery-item">
                            <a  class="js-modal-btn" data-video-id="{{$row['link']}}" >
                                <iframe width="100%" height="300"  src="https://www.youtube.com/embed/{{$row['link']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"   allowfullscreen></iframe>
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

@endsection

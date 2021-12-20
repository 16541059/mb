@extends("front.layout.base")
@section("content")
    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="pre-box-one">
                    <div class="pre-box-two"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-item">
                    <h1>404</h1>
                    <h2>Hata!  sayfa bulunamadı</h2>
                    <p>Üzgünüz, aradığınız sayfa mevcut değil</p>
                    <a class="common-btn" href="{{route("index")}}">Ana Sayfaya Git</a>
                </div>
            </div>
        </div>
    </div>

@endsection

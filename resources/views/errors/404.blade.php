@extends("front.layout.base")
@section("content")

    <section class="error-section">
        <div class="auto-container">
            <div class="content">
                <h1>404</h1>
                <h2>Hata!  sayfa bulunamadı</h2>
                <div class="text">Üzgünüz, aradığınız sayfa mevcut değil</div>
                <a href="{{route("index")}}" class="theme-btn btn-style-three"><span class="txt">Ana Sayfaya Git</span></a>
            </div>
        </div>
    </section>
@endsection

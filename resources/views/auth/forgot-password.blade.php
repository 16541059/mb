
@extends("front.layout.base")
@section("content")
    <x-guest-layout>

    </x-guest-layout>
    <section class="page-title">
        <div class="pattern-layer-one"
             style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div style="font-size: 40px" class="auto-container">
            <h2>Şifremi Unuttum</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Şifremi Unuttum</li>
            </ul>
        </div>
    </section>
    <section class="register-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Form Column-->
                <div class="form-column column col-lg-6 col-md-6 col-sm-6 container justify-content-center">



                    <!--Login Form-->
                    <div class="styled-form login-form">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Parolanızı mı unuttunuz?  Sorun yok.  Sadece bize e-posta adresinizi bildirin, size yeni bir tane seçmenize izin verecek bir şifre sıfırlama bağlantısını e-posta ile gönderelim.') }}
                                </div>
                                <div class="block">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-jet-button>
                                        {{ __('Şifre Sıfırlama Linki Gönder') }}
                                    </x-jet-button>
                                </div>
                            </form>
                    </div>

                </div>



            </div>
        </div>
    </section>
    <!--End Register Section-->
@endsection

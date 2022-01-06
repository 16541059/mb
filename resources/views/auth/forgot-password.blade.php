<<<<<<< HEAD
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
=======

@extends("front.layout.base")
@section("content")
    <x-guest-layout>

    </x-guest-layout>
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Şifremi Unuttum</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Sayfa</a>
                            </li>
                            <li>
                                <span>Şifremi Unuttum</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
                                <div class="mt-3 mb-4 text-lg ">
                                    {{ __('Parolanızı mı unuttunuz?  Sorun yok.  Sadece bize e-posta adresinizi bildirin, size yeni bir tane seçmenize izin verecek bir şifre sıfırlama bağlantısını e-posta ile gönderelim.') }}
                                </div>
                                <div class="block">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <div class="flex items-center justify-end mt-4 mb-4">

                                    <button type="submit" class="btn common-btn">Şifre Sıfırlama Linki Gönder</button>
                                </div>
                            </form>
                    </div>

                </div>



            </div>
        </div>
    </section>
    <!--End Register Section-->
@endsection
>>>>>>> 9caac8dc45f3eaa383ea36ec2e8ec22d6f74fbff

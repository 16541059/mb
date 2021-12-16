@extends("front.layout.base")
@section("content")
<x-guest-layout>

</x-guest-layout>

<section class="page-title">
    <div class="pattern-layer-one"
         style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
    <div style="font-size: 40px" class="auto-container">
        <h2>Giriş</h2>
        <ul class="page-breadcrumb">
            <li><a href="/">Anasayfa</a></li>
            <li>Giriş Yap</li>
        </ul>
    </div>
</section>
<section class="register-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Form Column-->
            <div class="form-column column col-lg-6 col-md-6 col-sm-6 container justify-content-center">

                <div class="sec-title">
                    <h2>Giriş Yap</h2>
                    <div class="separate"></div>
                </div>

                <!--Login Form-->
                <div class="styled-form login-form">
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <div class="form-group">
                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Şifremi Unuttum') }}
                                    </a>
                                @endif

                                <x-jet-button class="ml-4">
                                    {{ __('Giriş Yap') }}
                                </x-jet-button>
                            </div>
                        </div>



                    </form>
                </div>

            </div>



        </div>
    </div>
</section>
<!--End Register Section-->
@endsection

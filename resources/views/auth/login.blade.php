@extends("front.layout.base")
@section("content")
    <x-guest-layout>

    </x-guest-layout>
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Giriş</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Sayfa</a>
                            </li>
                            <li>
                                <span>Giriş</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-form-area">
        <div class="container-fluid p-0">
            <div class="row m-0 mt-0  justify-content-center">

                <div class="col-lg-6 p-0 ">
                    <div class="user-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="user-content-inner">
                                    <div class="top">
                                        <a href="index.html">
                                            <img
                                                src="{{(isset(\App\Models\About::where("id",1)->get()[0]["logo"])?(\App\Models\About::where("id",1)->get()[0]["logo"]):"")}}"
                                                alt="Logo">
                                        </a>
                                        <h2>Giriş Yap</h2>
                                    </div>
                                    <x-jet-validation-errors class="mb-4"/>

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                                                    <x-jet-input id="email" class="form-control" type="email"
                                                                 name="email"
                                                                 :value="old('email')" required autofocus/>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <x-jet-label for="password" value="{{ __('Password') }}"/>
                                                    <x-jet-input id="password" class="form-control" type="password"
                                                                 name="password" required
                                                                 autocomplete="current-password"/>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between bd-highlight">
                                                <div class=" bd-highlight">

                                                    <label for="remember_me" class="">
                                                    <label for="remember_me" class="">
                                                        <x-jet-checkbox id="remember_me" name="remember"/>
                                                        <span
                                                            class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                    </label>
                                                </div>
                                                <div class="p-2 bd-highlight">

                                                    @if (Route::has('password.request'))
                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                           href="{{ route('password.request') }}">
                                                            {{ __('Şifremi Unuttum') }}
                                                        </a>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn common-btn">Giriş</button>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--End Register Section-->
@endsection

@extends('layouts.home')
@section('title')
@endsection
@section('main')

    <section class="page_banner" style="background-image: url({{asset('front/assets/images/bg/banner.jpg);')}}">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">About Us</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="index.html" rel="v:url"><i
                                class="twi-home-alt1"></i>Home</a><span>/</span>About Us One</p>
                </div>
            </div>
        </div>
    </section>
@include('layouts.faq')
    @include('layouts.student')


@endsection
@section('js')
@endsection

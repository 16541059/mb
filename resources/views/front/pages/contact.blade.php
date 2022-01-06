@extends('layouts.home')
@section('title')
    Contact
@endsection
@section('css')
@endsection
@section('main')
<section class="page_banner" style="background-image: url(assets/images/bg/banner.jpg);">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-6">
                <h2 class="banner-title">Contact Us</h2>
            </div>
            <div class="col-md-6 text-right">
                <p class="breadcrumbs"><a href="index.html" rel="v:url"><i
                            class="twi-home-alt1"></i>Home</a><span>/</span>Contact Us</p>
            </div>
        </div>
    </div>
</section>


<section class="coniconboxPage">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="icon_box_10">
                    <div class="ib_box"><i class="icons-location-pin"></i></div>
                    <h3>Genel Merkez:</h3>
                    <p>Çağlayan Mah. 2049 Sk. NO:22 <br> Muratpaşa/ANTALYA</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="icon_box_10">
                    <div class="ib_box"><i class="icons-telephone"></i></div>
                    <h3>Bize Ulaşın</h3>
                    <p><a href="tel:+908508080453">0 850 80 80 453 </a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="icon_box_10">
                    <div class="ib_box"><i class="icons-envelope-1"></i></div>
                    <h3>Mail</h3>
                    <p><a href="mailto:info@markalarbirligi.com.tr">info@markalarbirligi.com.tr</a>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="contactSection">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-8">
                <div class="appointment_form">
                    <p>İletmek istediğiniz her türlü istek ve önerilerinizi bize yazabilirsiniz.*</p>
                    <h3>İletişim Formu</h3>
                    <form action="{{route('contact.post')}}"  class="row" id="contact_form">
                        @csrf
                        <div class="input-field col-md-6">
                            <i class="twi-user2"></i>
                            <input class="required" type="text" name="con_name" placeholder="Adınız Soyadınız">
                        </div>
                        <div class="input-field col-md-6">
                            <i class="twi-envelope2"></i>
                            <input class="required" type="email" name="con_email" placeholder="Email Address">
                        </div>
                        <div class="input-field col-md-6">
                            <i class="twi-user2"></i>
                            <input class="required" type="text" name="con_name" placeholder="Telefon Numaranız">
                        </div>
                        <div class="input-field col-md-6">
                            <i class="twi-envelope2"></i>
                            <input class="required" type="email" name="con_email" placeholder="Email Adresiniz">
                        </div>
                        <div class="input-field col-md-12">
                            <i class="twi-pen2"></i>
                            <textarea class="required" name="con_message"
                                      placeholder="Bize İletmek İstedikleriniz"></textarea>
                        </div>
                        <div class="input-field col-md-12">
                            <button type="submit" onclick="send('{{route("contact.post")}}')" class="qu_btn">Submit Now</button>
                            <div class="con_message"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chatNow">
                    <h4>Chat With Support</h4>
                    <p>Let’s chat our live experts to get answer your question</p>
                    <a href="javascript:void(0);" class="qu_btn">Live Chat</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
@endsection

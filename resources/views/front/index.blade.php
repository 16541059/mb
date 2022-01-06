@extends('layouts.home')
@section('title')
    Markalar Birliği Türkiye'nin En Büyük Franchising Kuruluşu
@endsection
@section('css')
@endsection
@section('main')
@include('layouts.slider')
    <!-- Markalar -->
<section class="clientLogo01">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-3 col-md-12">
                <h2 class="secTitle">Markalarımız</h2>
            </div>
            <div class="col-xl-7 col-md-8">
                <div class="client-slider owl-carousel">
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/national.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/schools.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/akdkids.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/english.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/vip.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/akd.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/akdkolej.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/americancilek.png')}}" alt=""></a>
                    <a href="javascript:void(0);"><img src="{{asset('front/assets/images/client-logo/exam.png')}}" alt=""></a>

                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <a href="contact.html" class="qu_btn">Franchise Başvuru</a>
            </div>
        </div>
    </div>
</section>
<!-- End Markalar Logo -->

<!-- About-->
<section class="aboutSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-5">
                <div class="absThumb">
                    <img src="{{asset('front/assets/images/home2/1.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="absCon">
                    <ar5 class="secTitle">Yeni İş Fırsatları Arayan Bir Girişimci Misiniz? </ar5 class="secTitle">
                    <p>
                        Türkiye’nin en büyük ve en saygın eğitim kurumu markalarının genel merkezi olarak sizlere yeni ve kazançlı bir iş fırsatı sunuyoruz. Hali hazırda yıllardan gelen tecrübeyle geliştirilmiş, mali – operasyonel – idari – hukuki anlamda bütün sistem işleyişi tamamen netleştirilmiş bir Franchise Modeliyle sizlere hizmet vermek için sabırsızlanıyoruz.
                    </p>
                            <p>
                                Eğitim kalitesi en iyi olan ve Türkiye’nin en bilindik markalarıyla bu yola çıkarak çok kazançlı bir girişimde bulunabilirsiniz.</p>
                               <p> Sizlerin her konuda kazanç elde etmesi ve memnuniyeti bizim için en büyük başarıdır. Bu sebeple sahip olduğumuz bütün tecrübemiz ve markalarımızın bilinirliğiyle tüm olumsuz etkenleri ortadan kaldırarak, siz değerli girişimcilerin bütün enerji ve motivasyonunu kendi işinize yoğunlaştırmanızı sağlayacağız ve bu sayede Markalar Birliği ailesine katıldığınızda; deneyimli ve tecrübeli bir ekibin desteğini sürekli yanınızda hissedeceksiniz.</p>
                               <p> Her biri alanında uzman kişilerden oluşan onlarca departmanlarımızın desteği ve yönlendirmesi ile, daha tabelanızı astığınız ilk aydan itibaren yapmış olduğunuz yatırımın olumlu geri dönüşünü almaya başlayacaksınız.</p>
                                <p>Eğer siz de eğitim sektöründe büyük başarılara imza atmak, sizi tercih edenlerin hayatına dokunmak, karlı ve sürdürülebilir bir işletme sahibi olmak istiyorsanız, hizmet vermek için bütün ekibimiz sizi çağırıyor!</p>
                            </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About -->

<!-- Why -->
<section class="chooseSection chooseSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-5">
                <mb2 class="secTitle white">Franchise Adayından Beklediğimiz Nitelikler;</mb2>
                <p class="secDesc">
                    In addition to payroll cheques, a business writes many other cheques during the course of a year
                    to pay for a wide variety of items including local business taxes,
                </p>
            </div>
            <div class="col-xl-7 mt8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div><i class="icon-local_1"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>Tercihen Eğitim Sektöründe Tecrübeli</h3>
                            <p>All cash received from sales and from all other sources has to be carefully
                                identified....</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div><i class="icon-local_3"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>Bulunduğu Lokasyondaki Pazarı İyi Okuyabilecek</h3>
                            <p>Bulunduğu Lokasyondaki Pazarı İyi Okuyabilecek</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div><i class="icon-XjxC7N01"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>Yeterli Sermayeye Sahip</h3>
                            <p>Yeterli Sermayeye Sahip</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div><i class="icon-local_11"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>Bizleri Temsil Edecek Vizyona Sahip </h3>
                            <p>Bizleri Temsil Edecek Vizyona Sahip </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why -->
<!-- form -->
<section class="appoinmentSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-5">
                <div class="reviewArea">
                    <mb2 class="secTitle">FRANCHİSE KOŞULLARIMIZ.</mb2>
                    <br/><br/>
                    <p class="secDesc">
                        Franchising koşullarımız belirlenen bölge ve lokasyonun potansiyeline göre değişiklik göstermektedir.
                    </p>
                    <p class="customers">Bu sebeple bizlere <span><a href="tel:+908508080453">0 850 80 80 453 </span></a>numaralı telefondan ulaşarak detaylı bilgi ve fiyat teklifi alabilirsiniz.</p>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="appointment_form">
                    <p>Do it right now!</p>
                    <h3>Franchise Başvuru Formu</h3>
                    <form action="#" method="post" class="row" id="contact_form">
                        <div class="input-field col-md-6">
                            <i class="twi-user2"></i>
                            <input class="required" type="text" name="con_name" placeholder="Your Name">
                        </div>
                        <div class="input-field col-md-6">
                            <i class="twi-envelope2"></i>
                            <input class="required" type="email" name="con_email" placeholder="Email Address">
                        </div>
                        <div class="input-field col-md-6">
                            <i class="twi-map-marker-alt2"></i>
                            <input type="text" name="con_location" placeholder="Your Location">
                        </div>
                        <div class="input-field col-md-6">
                            <select class="required" name="con_subject">
                                <option selected="selected">Subjects</option>
                                <option>Finance Consultant</option>
                                <option>Business Consultant</option>
                                <option>Financial Advices</option>
                                <option>Business Growth</option>
                            </select>
                        </div>
                        <div class="input-field col-md-12">
                            <i class="twi-comment-lines2"></i>
                            <textarea class="required" name="con_message"
                                      placeholder="Describe Your Plan"></textarea>
                        </div>
                        <div class="input-field col-md-12">
                            <button type="submit" class="qu_btn">Get A Quote</button>
                            <div class="con_message"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Endform-->
<!-- Harita-->
    <section class="aboutSection01">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subTitle"><span class="bleft"></span>Markalar Birliği
                    </div>
                    <h2 class="secTitle">Temsilciliklerimiz </h2>
                    <div class="col-md-12">
                       <!-- <img src="{{asset('front/assets/images/bg/h1.png')}}" alt="">-->
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <ul class="listItem">
                                <li><i class="twi-check1"></i>Adana</li>
                                <li><i class="twi-check1"></i>Adıyaman</li>
                                <li><i class="twi-check1"></i>Afyon</li>
                                <li><i class="twi-check1"></i>Ankara</li>
                                <li><i class="twi-check1"></i>Antalya</li>
                                <li><i class="twi-check1"></i>Aydın</li>
                                <li><i class="twi-check1"></i>Balıkesir</li>
                                <li><i class="twi-check1"></i>Bilecik</li>
                                <li><i class="twi-check1"></i>Bingöl</li>
                                <li><i class="twi-check1"></i>Bolu</li>
                                <li><i class="twi-check1"></i>Burdur</li>
                                <li><i class="twi-check1"></i>Bursa</li>
                                <li><i class="twi-check1"></i>Çanakkale</li>
                                <li><i class="twi-check1"></i>Çankırı</li>
                                <li><i class="twi-check1"></i>Denizli</li>
                                <li><i class="twi-check1"></i>Diyarbakır</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="listItem">
                                <li><i class="twi-check1"></i>Edirne</li>
                                <li><i class="twi-check1"></i>Elazığ</li>
                                <li><i class="twi-check1"></i>Erzincan</li>
                                <li><i class="twi-check1"></i>Erzurum</li>
                                <li><i class="twi-check1"></i>Eskişehir</li>
                                <li><i class="twi-check1"></i>Gaziantep</li>
                                <li><i class="twi-check1"></i>Hatay</li>
                                <li><i class="twi-check1"></i>İçel(Mersin)</li>
                                <li><i class="twi-check1"></i>İstanbul</li>
                                <li><i class="twi-check1"></i>İzmir</li>
                                <li><i class="twi-check1"></i>Kars</li>
                                <li><i class="twi-check1"></i>Kastamonu</li>
                                <li><i class="twi-check1"></i>Kayseri</li>
                                <li><i class="twi-check1"></i>Kırklareli</li>
                                <li><i class="twi-check1"></i>Kocaeli</li>
                                <li><i class="twi-check1"></i>Konya</li>
                            </ul>
                        </div>

                        <div class="col-md-3">
                            <ul class="listItem">
                                <li><i class="twi-check1"></i>Kütahya</li>
                                <li><i class="twi-check1"></i>Malatya</li>
                                <li><i class="twi-check1"></i>Manisa</li>
                                <li><i class="twi-check1"></i>Kahramanmaraş</li>
                                <li><i class="twi-check1"></i>Mardin</li>
                                <li><i class="twi-check1"></i>Muğla</li>
                                <li><i class="twi-check1"></i>Muş</li>
                                <li><i class="twi-check1"></i>Niğde</li>
                                <li><i class="twi-check1"></i>Ordu</li>
                                <li><i class="twi-check1"></i>Sakarya</li>
                                <li><i class="twi-check1"></i>Samsun</li>
                                <li><i class="twi-check1"></i>Siirt</li>
                                <li><i class="twi-check1"></i>Sinop</li>
                                <li><i class="twi-check1"></i>Sivas</li>
                                <li><i class="twi-check1"></i>Tekirdağ</li>
                                <li><i class="twi-check1"></i>Tokat</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="listItem">
                                <li><i class="twi-check1"></i>Trabzon</li>
                                <li><i class="twi-check1"></i>Tunceli</li>
                                <li><i class="twi-check1"></i>Uşak</li>
                                <li><i class="twi-check1"></i>Van</li>
                                <li><i class="twi-check1"></i>Zonguldak</li>
                                <li><i class="twi-check1"></i>Aksaray</li>
                                <li><i class="twi-check1"></i>Karaman</li>
                                <li><i class="twi-check1"></i>Kırıkkale</li>
                                <li><i class="twi-check1"></i>Bartın</li>
                                <li><i class="twi-check1"></i>Ardahan</li>
                                <li><i class="twi-check1"></i>Iğdır</li>
                                <li><i class="twi-check1"></i>Yalova</li>
                                <li><i class="twi-check1"></i>Karabük</li>
                                <li><i class="twi-check1"></i>Kilis</li>
                                <li><i class="twi-check1"></i>Osmaniye</li>
                                <li><i class="twi-check1"></i>Düzce</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="listItem">

                            </ul>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-4">
                </div>-->
            </div>
        </div>
    </section>
<!-- End Harita -->
<section class="chooseSection03">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-6 pdAcc">
                <h2 class="secTitle">Get Every Answer</h2>
                <div class="accordion quAccordion" id="quAccordion01">
                    <div class="card">
                        <div class="card-header" id="ma_ac_01">
                            <h2 class="mb-0">
                                <button type="button" data-toggle="collapse" data-target="#ma_collapes_01"
                                        data-aria-expanded="true" data-aria-controls="ma_collapes_01">
                                    <span></span>
                                    Best Sources of Help and Advice for Your Business
                                </button>
                            </h2>
                        </div>
                        <div id="ma_collapes_01" class="collapse show" aria-labelledby="ma_ac_01"
                             data-parent="#quAccordion01">
                            <div class="card-body">
                                You’re not on your own when setting up or running a business in the UK offier a
                                wealth of information and expertise if you need help from filling in your tax forms
                                to recruiting people or setting up your business
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="ma_ac_02">
                            <h2 class="mb-0">
                                <button class="collapsed" type="button" data-toggle="collapse"
                                        data-target="#ma_collapes_02" data-aria-expanded="false"
                                        data-aria-controls="ma_collapes_02">
                                    <span></span>
                                    Franchise Adayından Beklediğimiz Nitelikler;
                                </button>
                            </h2>
                        </div>
                        <div id="ma_collapes_02" class="collapse" aria-labelledby="ma_ac_02"
                             data-parent="#quAccordion01">
                            <div class="card-body">
                                    <div class="col-md-12">
                                        <ul class="listItem">
                                            <li><i class="twi-check1"></i>Tercihen Eğitim Sektöründe Tecrübeli</li>
                                            <li><i class="twi-check1"></i>Bulunduğu Lokasyondaki Pazarı İyi Okuyabilecek</li>
                                            <li><i class="twi-check1"></i>Yeterli Sermayeye Sahip</li>
                                            <li><i class="twi-check1"></i>Bizleri Temsil Edecek Vizyona Sahip </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="ma_ac_03">
                            <h2 class="mb-0">
                                <button class="collapsed" type="button" data-toggle="collapse"
                                        data-target="#ma_collapes_03" data-aria-expanded="false"
                                        data-aria-controls="ma_collapes_03">
                                    <span></span>
                                    Offices are helpful on recruitment and employing people
                                </button>
                            </h2>
                        </div>
                        <div id="ma_collapes_03" class="collapse" aria-labelledby="ma_ac_03"
                             data-parent="#quAccordion01">
                            <div class="card-body">
                                You’re not on your own when setting up or running a business in the UK offier a
                                wealth of information and expertise if you need help from filling in your tax forms
                                to recruiting people or setting up your business
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="ma_ac_04">
                            <h2 class="mb-0">
                                <button class="collapsed" type="button" data-toggle="collapse"
                                        data-target="#ma_collapes_04" data-aria-expanded="false"
                                        data-aria-controls="ma_collapes_04">
                                    <span></span>
                                    Services including a legal helpline with disabilities
                                </button>
                            </h2>
                        </div>
                        <div id="ma_collapes_04" class="collapse" aria-labelledby="ma_ac_04"
                             data-parent="#quAccordion01">
                            <div class="card-body">
                                You’re not on your own when setting up or running a business in the UK offier a
                                wealth of information and expertise if you need help from filling in your tax forms
                                to recruiting people or setting up your business
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="chImage">
                    <img src="{{asset('front/assets/images/home3/3.png')}}" alt="">
                </div>
                <div class="chooseSlider owl-carousel">
                    <div class="chsItem">
                        <img src="{{asset('front/assets/images/home3/4.png')}}" alt="">
                        <p>Where spotless cleaning comes to your door, No One Can Do This</p>
                    </div>
                    <div class="chsItem">
                        <img src="{{asset('front/assets/images/home3/4.png')}}" alt="">
                        <p>Where spotless cleaning comes to your door, No One Can Do This</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blogSectiont01">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-7 noPaddingRight">
                <div class="row">
                    <div class="col-md-6">
                        <div class="blogItem01">
                            <div class="blogThumb">
                                <img src="{{asset('front/assets/images/blog/1.jpg')}}" alt="">
                            </div>
                            <div class="blogContent">
                                <div class="bmeta">
                                    <span><i class="twi-folder2"></i><a href="blog1.html">Develop</a></span>|<span><i class="twi-user2"></i><a href="blog1.html">David Smith</a></span>
                                </div>
                                <h3><a href="single-blog.html">ITAM joins the financial, inventory...</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blogItem01">
                            <div class="blogThumb">
                                <img src="{{asset('front/assets/images/blog/2.jpg')}}" alt="">
                            </div>
                            <div class="blogContent">
                                <div class="bmeta">
                                    <span><i class="twi-folder2"></i><a href="blog1.html">Marketing</a></span>|<span><i class="twi-user2"></i><a href="blog1.html">David Smith</a></span>
                                </div>
                                <h3><a href="single-blog.html">How To Scale a Dropshipping Business...</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="ctaBcon">
                    <div class="subTitle"><span class="bleft"></span>News Feed</div>
                    <h2 class="secTitle">Latest <span>News</span></h2>
                    <p class="secDesc">
                        Trusted by the world’s best organizations, for 15 years and running, it has been delivering smiles to hundreds of IT advisors, developers...
                    </p>
                    <a href="blog1.html" class="qu_btn">View All News</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
@endsection

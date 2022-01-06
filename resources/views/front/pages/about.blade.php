@extends('layouts.home')
@section('title')
    About
@endsection
    @section('css')
@endsection
@section('main')
    <section class="page_banner" style="background-image: url({{asset('front/assets/images/bg/banner.jpg);')}}">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">Hakkımızda</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{route('index')}}" rel="v:url"><i
                                class="twi-home-alt1"></i>Anasayfa</a><span>/</span>Biz Kimiz?</p>
                </div>
            </div>
        </div>
    </section>


    <section class="aboutSection02 abSpd">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-7">
                    <div class="absCon">
                        <mrk2 class="secTitle">BİZ <span>KİMİZ?</span></mrk2>
                        <br/> <br/>
                        <div class="subTitle">Markalar Birliği; Franchising alanların ve verenlerin, nihai tüketici ilişkilerini düzenleyen ve kâr amacı gütmeyen büyük bir kuruluştur.</div>
                        <mb3 class="secDesc">
                            Genel Başkanlığını Fatih ÇİFCİ’nin yaptığı bu kuruluş, 2010 yılında sektöründe tecrübeli ve tüketici haklarına saygılı markaların ortak kalite standartları ölçüsünde ülkemizdeki markacılığın daha disiplinli olarak hizmet vermesini sağlamak amacıyla kurulmuştur.
                            <br/><br/>
                        <p>Markalar Birliği bünyesinde 30 adet marka bulunmaktadır. Şirket Türkiye’nin ve dünyanın önde gelen eğitim kurumu markalarından oluşmakta ve bünyesindeki bütün markaların en kaliteli biçimde hizmet verebilmesi adına çalışmalar yapmaktadır.
                        <p>Markalar Birliği şirketi içerisinde bütün eğitim faaliyetlerini yürüten ve temsilciliklerin daha disiplinli biçimde hizmet vermesini sağlayan eğitim sektöründe tecrübeli ve alanında uzman yaklaşık 100’ü aşkın personel çalışmaktadır. 600’den fazla temsilciliği bulunan Markalar Birliği kuruluşu sadece Türkiye’ye değil dünyanın bütün ülkelerine Franchising verme yetkisine sahiptir. Çoğu Türkiye’de olmak üzere dünyanın birkaç ülkesinde de hizmet veren temsilcilikler, yaklaşık 12.000’i aşkın kişiye iş istihdamı sağlamaktadır. Temsilcilikler bünyesinde yılda yaklaşık 2 milyonu aşkın öğrenciye eğitim verilmektedir.
                    </p>
                        <div class="signAuthor">Yönetim Kurulu Başkanı –</div>
                            <div class="col-lg-12">

                                <img src="{{asset('front/assets/images/home2/sign.png')}}" alt=""></div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="absThumb">
                        <img src="{{asset('front/assets/images/home2/fatihcifci.png')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="comHistorySec">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <mb2 class="secTitle">Misyon & Vizyon</mb2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="historyWrapper">
                        <div class="bars"></div>
                        <div class="historyItem">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Misyon</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="historyContent">
                                        <img src="{{asset('front/assets/images/about/misyon.png')}}" alt="">
                                        <div class="hcinner">

                                            <p>
                                                Markalar Birliği şirketinin kuruluş amacı; bünyesinde barındıracağı markaların tüketici şikâyetlerini temel alarak hem temsilciliğin hem de tüketicinin memnuniyetini sağlamak ve orta yolu bulmaktır. Franchising alan temsilcilikler, tüketici ile yapılan her türlü sözleşmede Markalar Birliği’nin onayının olmasını ve tüketici şikâyetlerinde Markalar Birliği’nin almış olduğu kararları (lehine ya da aleyhine) uygulamayı kayıtsız şartsız kabul etmişlerdir. Temsilciliklerimiz, Markalar Birliği’nin ülkemizdeki marka, bayi ve tüketici ilişkisinde kaliteli bir standart yerleştirmesi adına markasının bir üst makamı olarak aldığı kararlara uymak ve tüketici şikâyetleri neticesinde Markalar Birliğinin vermiş olduğu kararı 72 saat içinde uygulamakla yükümlüdür.</p>
                                                <p>Kısaca Markalar Birliği; ülkemizdeki franchising veren markaların bir araya gelerek hiç bir baskı altında kalmadan kendi kendilerine oluşturdukları bir birliktir. Markalar Birliği nihai tüketicinin ve franchising alanın haklarını koruyan aynı zamanda markaları bir arada daha kaliteli ve iyi hizmet vermeye götüren bir organizasyondur.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="historyItem reverse">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="historyContent">
                                        <img src="{{asset('front/assets/images/about/2.jpg')}}" alt="">
                                        <div class="hcinner">
                                            <p>
                                                Markalar Birliği olarak vizyonumuz, Türkiye’deki ve dünyadaki diğer temsilciliklerimizle eğitime yön verip; yılda 2 milyonu aşan öğrencilerimizin hayatlarına ışık tutarak onlara farklı bir bakış açısı kazandırıp, hayatlarında yeni başlangıçlara adım atarken yanlarında olmak ve hedeflerine ulaşma yolunda ve sonrasında onlara destek olarak, geleceğe umutla bakmalarını sağlamaktır.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2>Vizyon</h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection

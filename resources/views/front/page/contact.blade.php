@extends("front.layout.base")
@section("title",)
    Bağlantı Kurun
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one"
             style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>İLETİŞİM</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>İletişim</li>
            </ul>
        </div>
    </section>


    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="auto-container">
            <!-- Sec Title -->


            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-pin"></span></div>
                            <ul>
                                <li><strong>Adres</strong></li>
                                <li>{{isset(json_decode($about[0]["sosial"])->adres)?(json_decode($about[0]["sosial"])->adres):""}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-phone-call"></span></div>
                            <ul>
                                <li><strong>Telefon</strong></li>
                                <li>{{isset(json_decode($about[0]["sosial"])->tel)?(json_decode($about[0]["sosial"])->tel):""}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-email-1"></span></div>
                            <ul>
                                <li><strong>E-Posta</strong></li>
                                <li>{{isset(json_decode($about[0]["sosial"])->mail)?(json_decode($about[0]["sosial"])->mail):""}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Contact Info Section -->
    <section class="contact-map-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2>Mesajınızı Gönderin</h2>
                    </div>

                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">

                <!-- Contact Form -->
                <form method="POST" action="{{route("contact.post")}}" id="form" enctype="multipart/form-data">
                    @csrf

                    <div class="row clearfix">

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label>Adınız *</label>
                            <input type="text" name="name" placeholder="" required>
                            <span id="username" style="color: red"></span>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label>E-posta adresiniz*</label>
                            <input type="text" name="email" placeholder="" required>
                            <span id="email" style="color: red"></span>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label>Telefon numarası *</label>
                            <input type="text" name="tel" placeholder="" required>
                            <span id="phone" style="color: red"></span>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label>Konu</label>
                            <input type="text" name="subject" placeholder="" required>
                            <span id="subject" style="color: red"></span>
                        </div>


                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label>Mesajınız*</label>
                            <textarea name="message" placeholder=""></textarea>
                            <span id="message" style="color: red"></span>

                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <div class="captcha">
                                <div class="d-flex flex-row bd-highlight ">
                                    <div class="p-2 bd-highlight mt-2">  <span>{!! Captcha::img() !!}</span>
                                        <button type="button" id="refresh" class="btn btn-success"><i
                                                class="fa fa-refresh"></i></button></div>
                                    <div class="p-2 bd-highlight">
                                        <input id="captcha" type="text" class="form-control col-6 mt-2" placeholder="" style="height: 40px"
                                               required name="captcha">
                                    </div>

                                </div>


                                <smal id="cp" style="color: red"></smal>
                            </div>


                        </div>
                        <span style="width: 100%" id="success" class="">

                        </span>
                        <div class="form-group text-center col-lg-12 col-md-12 col-sm-12">

                            <button class="theme-btn btn-style-three" type="button"
                                    onclick="send('{{route("contact.post")}}')"><span class="txt">Gönder</span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- End Contact Form -->

        </div>
    </section>
    <!-- Map Section -->
    <section class="contact-map-section">
        <div class="auto-container">
            <!-- Map Boxed -->
            <div class="map-boxed">
                <!--Map Outer-->
                <div class="map-outer">
                    {!!  isset(json_decode($about[0]["sosial"])->maps)?(json_decode($about[0]["sosial"])->maps):""!!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Map Section -->

    <!-- End Contact Map Section -->
@endsection
@section("script")
    <script type="text/javascript">

        recaptcha = () => {
            $.ajax({
                type: 'GET',
                url: 'refreshcaptcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        }

        $('#refresh').click(function () {
            recaptcha()
        });

        send = (route) => {
            let data = $("#form").serialize();
            $.ajax({
                url: route,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    $("#username").text("")
                    $("#phone").text("")
                    $("#email").text("")
                    $("#subject").text("")
                    $("#cp").text("")
                    $("#message").text("")
                    $("#success").text(response["msg"])
                    $("#success").addClass("alert alert-success ml-3")
                    $("#success").show("slow")
                    $("input").val("")
                    $("textarea").val("")
                    setTimeout(function () {
                        $("#success").hide("slow")
                    }, 3000)
                    recaptcha()
                },
                error: function (response) {
                    let msg = response["responseJSON"]["errors"];
                    $("#username").text(typeof msg["name"] != "undefined" ? msg["name"][0] : "")
                    $("#phone").text(typeof msg["tel"] != "undefined" ? msg["tel"][0] : "")
                    $("#email").text(typeof msg["email"] != "undefined" ? msg["email"][0] : "")
                    $("#subject").text(typeof msg["subject"] != "undefined" ? msg["subject"][0] : "")
                    $("#cp").text(typeof msg["captcha"] != "undefined" ? msg["captcha"][0] : "")
                    $("#message").text(typeof msg["message"] != "undefined" ? msg["message"][0] : "")
                    recaptcha()
                }
            });
        }
    </script>
@endsection

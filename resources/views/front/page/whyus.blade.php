@extends("front.layout.base")
@section("title",)
Neden Biz
@endsection

@section("content")

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one"
             style="background-image: url({{asset("front/images/background/pattern-16.png")}})"></div>
        <div class="auto-container">
            <h2>Neden Biz</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Neden Biz</li>
            </ul>
        </div>
    </section>

    <section class="faq-page-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">Neden Bİz</div>
                <h2> Neden Bizi Tercih Etmelisiniz? </h2>
            </div>

            <div class="row clearfix">

                <!-- Column -->
                <div class="column col-lg-12 col-md-12 col-sm-12">

                    <ul class="accordion-box">
                        <!--Block-->
                        @foreach($data as $row)
                        <li class="accordion block">
                            <div class="acc-btn">{{$row["question"]}}<div class="icon fa fa-angle-right"></div></div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        {{$row["answer"]}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

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
                        <h2>Soru Sorun</h2>
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

@extends("front.layout.base")
@section("title",)
    Bağlantı Kurun
@endsection

@section("content")


    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>İletişim</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Sayfa</a>
                            </li>
                            <li>
                                <span>İletişim</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-location-pin"></i>
                        <span>Adres:</span>
                        <a href="#">{{isset(json_decode($about[0]["sosial"])->adres)?(json_decode($about[0]["sosial"])->adres):""}}</a>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-call"></i>
                        <span>Telefon:</span>
                        <a href="tel:{{isset(json_decode($about[0]["sosial"])->tel)?(json_decode($about[0]["sosial"])->tel):""}}">{{isset(json_decode($about[0]["sosial"])->tel)?(json_decode($about[0]["sosial"])->tel):""}}</a>
                        <a href="https://wa.me/{{(isset(json_decode($about[0]["sosial"])->whatsapp)?(json_decode($about[0]["sosial"])->whatsapp):"")}}"
                           target="_blank">{{(isset(json_decode($about[0]["sosial"])->whatsapp)?(json_decode($about[0]["sosial"])->whatsapp):"")}}</a>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-email"></i>
                        <span>Email:</span>
                        <a href="mailto:{{isset(json_decode($about[0]["sosial"])->mail)?(json_decode($about[0]["sosial"])->mail):""}}">{{isset(json_decode($about[0]["sosial"])->mail)?(json_decode($about[0]["sosial"])->mail):""}}</a>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-area pb-70">
        <div class="container">
            <form id="contactForm" action="{{route("contact.post")}}" id="form">
                @csrf
                <h2>Bizimle İletişime Geçin</h2>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Adınız" required
                                   data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-email"></i>
                            </label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="E-posta adresiniz" required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-call"></i>
                            </label>
                            <input type="text" name="tel" id="phone_number" placeholder="Telefon Numaranız" required
                                   data-error="Please enter your number" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-notepad"></i>
                            </label>
                            <input type="text" name="subject" id="msg_subject" class="form-control" placeholder="Konu"
                                   required data-error="Please enter your subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>
                                <i class="icofont-comment"></i>
                            </label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                      placeholder="Mesajınız yazınız" required
                                      data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-2 bd-highlight captcha ">{!! Captcha::img() !!}</div>
                                <div class="p-2 bd-highlight">
                                    <button type="button" id="refresh" class="btn btn-success"><i
                                            class="fas fa-sync"></i></button>
                                </div>

                                <div class="p-2 bd-highlight"><input type="text" id="captcha" name="captcha"
                                                                     class="form-control"
                                                                     placeholder="" style="height: 40px" required
                                                                     data-error="Please enter your captcha"></div>

                            </div>
                            <div class="help-block with-errors">
                                <smal id="cp" style="color: red"></smal>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" onclick="send('{{route("contact.post")}}')" class="btn common-btn">
                            Gönder
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>


                        </span>

                        <div class="clearfix" id="success"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="map-area">
        {!!  isset(json_decode($about[0]["sosial"])->maps)?(json_decode($about[0]["sosial"])->maps):""!!}
    </div>

    <!-- End Contact Map Section -->
@endsection
@section("script")
    <script type="text/javascript">
        $("iframe").attr("id", "map")
        recaptcha = () => {
            $.ajax({
                type: 'GET',
                url: 'refreshcaptcha',
                success: function (data) {
                    $(".captcha").html(data.captcha);
                }
            });
        }

        $('#refresh').click(function () {
            recaptcha()
        });

        send = (route) => {
            let data = $("#contactForm").serialize();
            $.ajax({
                url: route,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (response) {

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
                    $("#cp").text(typeof msg["captcha"] != "undefined" ? msg["captcha"][0] : "")
                    recaptcha()
                }
            });
        }
    </script>
@endsection

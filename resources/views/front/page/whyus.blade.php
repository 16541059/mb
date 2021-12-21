@extends("front.layout.base")
@section("title",)
Neden Biz
@endsection

@section("content")

    <!--Page Title-->
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Neden Biz</h2>
                        <ul>
                            <li>
                                <a href="{{route("index")}}">Ana Safya</a>
                            </li>
                            <li>
                                <span>Neden Biz</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="faq-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq-img">
                        <img src="{{$about[0]["image"]}}" alt="FAQ">
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="accordion">
                        @foreach($data as $row)
                        <li>
                            <a>

                                {{$row["question"]}}
                                <i class="icofont-plus"></i>
                                <i class="icofont-minus two"></i>
                            </a>
                            <p>
                                {{$row["ansver"]}}</p>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-area pb-70">
        <div class="container">
            <form id="contactForm" action="{{route("contact.post")}}" id="form">
                @csrf
                <h2>Bize Soru Sorun</h2>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Adınız" required
                                   data-error="Lütfen adınızı giriniz">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-email"></i>
                            </label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="E-posta adresiniz" required data-error="Lütfen E-postanızı girin">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-call"></i>
                            </label>
                            <input type="text" name="tel" id="phone_number" placeholder="Telefon Numaranız" required
                                   data-error="Lütfen numaranızı giriniz" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-notepad"></i>
                            </label>
                            <input type="text" name="subject" id="msg_subject" class="form-control" placeholder="Konu"
                                   required data-error="Lütfen konunuzu girin">
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
                                      data-error="Mesajınızı yazın"></textarea>
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
                                                                     data-error="Lütfen görseldeki resmi giriniz"></div>

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
    <!-- End Contact Info Section -->


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

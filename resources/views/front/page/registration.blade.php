@extends("front.layout.base")
@section("title")
    Ön Kayıt
@endsection

@section("content")

    <section class="wizard-section pattern-layer-one page-title " style="background-color: #29235c" ;>
        <div class="auto-container">
            <h2>Ön Kayıt</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Ön Kayıt</li>
            </ul>
        </div>
        <div class="row no-gutters">

            <div class="col-lg-6 col-md-6  offset-sm-2 offset-md-3 offset-lg-3 ">
                <div class="form-wizard">
                    <form  id="registraitonform" action="{{route("registration.post")}}" method="post" role="form">
                        @csrf
                        <div class="form-wizard-header">

                            <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span>1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                            </ul>
                        </div>
                        <fieldset class="wizard-fieldset show">
                            <h4>Ne Üzerine Eğitim Almak İstiyorsunuz ?</h4>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (\Session::has('msg'))
                                <div class="alert alert-success">
                                    <ul>
                                            <li>{!! \Session::get('msg') !!}</li>
                                    </ul>
                                </div>

                            @endif
                            <div class="form-group">
                                <div  class="wizard-form-radio">
                                    <input name="genelingilizce" id="radio1" type="checkbox">
                                    <label for="radio1">Genel İngilizce</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="wizard-form-radio">
                                            <input name="konusmaisingilizcesi" id="radio2" type="checkbox">
                                            <label for="radio2">Konuşma ve İş İngilizcesi</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="wizard-form-radio">
                                            <input name="homeschooling" id="radio3" type="checkbox">
                                            <label for="radio3">HomeSchooling ( Çift Diploma )</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="wizard-form-radio">
                                            <input name="online" id="radio4" type="checkbox">
                                            <label for="radio4">Online İngilizce</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="wizard-form-radio">
                                            <input name="sinav" id="radio5" type="checkbox">
                                            <label for="radio5">Sınav İngilizcesi</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="meslek" id="radio6" type="checkbox">
                                    <label for="radio6">Meslek Garantili Sertifika Programları</label>
                                </div>

                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-next-btn float-right">İleri</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset ">
                            <h4>Bu Eğitimleri Ne için Almak İstiyorsunuz ?</h4>

                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="is" id="radio7"  type="checkbox">
                                    <label for="radio7">İş İçin</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="turizim" id="radio8" type="checkbox">
                                    <label for="radio8">Turizm / Gezi İçin</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="ogrenmek" id="radio10" type="checkbox">
                                    <label for="radio10"> Öğrenmek İstediğim İçin </label>
                                </div>

                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Geri</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">İleri</a>
                            </div>
                        </fieldset>
                        <fieldset class="wizard-fieldset ">
                            <h4>Hangi Zaman Dilimi Size Uygun ?</h4>

                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="zaman" id="radio11" checked value="haftaicisaban" type="radio">
                                    <label for="radio11">Haftaiçi Sabah Grubu</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="zaman" id="radio12"  value="haftaiciaksam" type="radio">
                                    <label for="radio12">Haftaiçi Akşam Grubu</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="zaman" id="radio13"  value="haftasonusaban" type="radio">
                                    <label for="radio13">Haftasonu Sabah Grubu</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="zaman" id="radio14"  value="haftasonuaksam" type="radio">
                                    <label for="radio14">Haftasonu Akşam Grubu</label>
                                </div>

                            </div>

                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Geri</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">İleri</a>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset ">
                            <h4>Eğitiminizi Nasıl Almak İstersiniz ?</h4>

                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="egitimtur" id="radio15"  checked value="yuzyuze" type="radio">
                                    <label for="radio15">Yüz Yüze Sınıf Ortamında</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="egitimtur" id="radio16"  value="birebir" type="radio">
                                    <label for="radio16">Bire Bir Özel Ders</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="egitimtur" id="radio17"  value="online" type="radio">
                                    <label for="radio17">Vaktim Yok Online İstiyorum</label>
                                </div>

                            </div>


                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Geri</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">İleri</a>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <h5>Bu Alan On Kayıt Başvurunuz İçin Zorunludur</h5>
                            <div class="form-group">
                                <input type="email" name="mail" class="form-control wizard-required" required id="email">
                                <label for="email" class="wizard-form-text-label">Email Adresiniz *</label>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control wizard-required" required name="name" id="username">
                                <label for="username" class="wizard-form-text-label">Adınız Soyadınız*</label>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control wizard-required" required  name="tel" id="tele">
                                <label for="tel" class="wizard-form-text-label">Telefon Numaranız*</label>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="wizard-form-radio">
                                            <input name="gender" id="radio23" value="male" checked type="radio">
                                            <label for="radio23">Erkek</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="wizard-form-radio">
                                            <input name="gender" id="radio44" value="female" type="radio">
                                            <label for="radio44">Kadın</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="wizard-form-radio">
                                    <input name="kvkk"    id="radio29" type="checkbox">
                                    <label for="radio29"> KVKK Sözleşmesini <a style="color: #00b44e" data-toggle="modal" data-target=".bd-example-modal-lg"> Okudum   </a> Onaylıyorum</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control wizard-required" name="captcha" placeholder="Görseldeki Metni Giriniz" id="captcha">
                                <label for="captcha" class="wizard-form-text-label captcha"><span>{!! Captcha::img() !!}</span>
                                    <button type="button" id="refresh" class="btn btn-success"><i
                                            class="fa fa-refresh"></i></button>*</label>
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-submit float-right">Gönder</a>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section("script")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(".wizard-form-radio").click(function (){
            let check =! $(this).children(":first").is(":checked")
            $(this).children(":first").prop("checked",check);

        })
        $(".wizard-form-radio input[type='radio'] ").click(function (){
            let check =! $(this).is(":checked")
            $(this).prop("checked",check);

        })
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

        jQuery(document).ready(function () {
            // click on next button
            jQuery('.form-wizard-next-btn').click(function () {
                var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                var next = jQuery(this);
                var nextWizardStep = true;
                parentFieldset.find('.wizard-required').each(function () {
                    var thisValue = jQuery(this).val();

                    if (thisValue == "") {
                        jQuery(this).siblings(".wizard-form-error").slideDown();
                        nextWizardStep = false;
                    } else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                });
                if (nextWizardStep) {
                    next.parents('.wizard-fieldset').removeClass("show", "400");
                    currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
                    next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                    jQuery(document).find('.wizard-fieldset').each(function () {
                        if (jQuery(this).hasClass('show')) {
                            var formAtrr = jQuery(this).attr('data-tab-content');
                            jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
                                if (jQuery(this).attr('data-attr') == formAtrr) {
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({
                                        "left": position.left,
                                        "width": innerWidth
                                    });
                                } else {
                                    jQuery(this).removeClass('active');
                                }
                            });
                        }
                    });
                }
            });
            //click on previous button
            jQuery('.form-wizard-previous-btn').click(function () {
                var counter = parseInt(jQuery(".wizard-counter").text());
                ;
                var prev = jQuery(this);
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                prev.parents('.wizard-fieldset').removeClass("show", "400");
                prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
                currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
                jQuery(document).find('.wizard-fieldset').each(function () {
                    if (jQuery(this).hasClass('show')) {
                        var formAtrr = jQuery(this).attr('data-tab-content');
                        jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
                            if (jQuery(this).attr('data-attr') == formAtrr) {
                                jQuery(this).addClass('active');
                                var innerWidth = jQuery(this).innerWidth();
                                var position = jQuery(this).position();
                                jQuery(document).find('.form-wizard-step-move').css({
                                    "left": position.left,
                                    "width": innerWidth
                                });
                            } else {
                                jQuery(this).removeClass('active');
                            }
                        });
                    }
                });
            });
            //click on form submit button
            jQuery(document).on("click", ".form-wizard .form-wizard-submit", function () {
                var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                parentFieldset.find('.wizard-required').each(function () {
                    var thisValue = jQuery(this).val();
                    if (thisValue == "") {
                        jQuery(this).siblings(".wizard-form-error").slideDown();

                    } else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                        let kvkk = $("#radio29").is(":checked");
                        if(kvkk){
                            $("#registraitonform").submit();
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Lütfen KVKK Sözleşmesini Onaylayın'
                            })
                        }
                    }
                });
            });
            // focus on input field check empty or not
            jQuery(".form-control").on('focus', function () {
                var tmpThis = jQuery(this).val();
                if (tmpThis == '') {
                    jQuery(this).parent().addClass("focus-input");
                } else if (tmpThis != '') {
                    jQuery(this).parent().addClass("focus-input");
                }
            }).on('blur', function () {
                var tmpThis = jQuery(this).val();
                if (tmpThis == '') {
                    jQuery(this).parent().removeClass("focus-input");
                    jQuery(this).siblings('.wizard-form-error').slideDown("3000");
                } else if (tmpThis != '') {
                    jQuery(this).parent().addClass("focus-input");
                    jQuery(this).siblings('.wizard-form-error').slideUp("3000");
                }
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

    </script>

    <style>




        .wizard-content-left h1 {
            color: #ffffff;
            font-size: 38px;
            font-weight: 600;
            padding: 12px 20px;
            text-align: center;
        }

        .form-wizard {
            color: #888888;
            padding: 30px;
        }

        .form-wizard .wizard-form-radio {
            display: inline-block;
            margin-left: 5px;
            position: relative;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 25px;
            padding: 12px 25px;
            font-size: 0.9rem;
            font-family: "Roboto", sans-serif;
            color: #ffffff;
            width: 100%;
            text-align: left;
            font-weight: 200;
            -webkit-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
            margin-bottom: 1%;
        }

        .form-wizard .wizard-form-radio input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            background-color: #dddddd;
            height: 25px;
            width: 25px;
            display: inline-block;
            vertical-align: middle;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:focus {
            outline: 0;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked {
            background-color: #fb1647;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            display: inline-block;
            background-color: #ffffff;
            border-radius: 50%;
            left: 1px;
            right: 0;
            margin: 0 auto;
            top: 8px;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::after {
            content: "";
            display: inline-block;
            webkit-animation: click-radio-wave 0.65s;
            -moz-animation: click-radio-wave 0.65s;
            animation: click-radio-wave 0.65s;
            background: #000000;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
            border-radius: 50%;
        }

        .form-wizard .wizard-form-radio input[type="radio"] ~ label {
            padding-left: 10px;
            cursor: pointer;
        }

        .form-wizard .wizard-form-radio input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            background-color: #dddddd;
            height: 25px;
            width: 25px;
            display: inline-block;
            vertical-align: middle;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:focus {
            outline: 0;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked {
            background-color: #fb1647;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            display: inline-block;
            background-color: #ffffff;
            border-radius: 50%;
            left: 1px;
            right: 0;
            margin: 0 auto;
            top: 8px;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::after {
            content: "";
            display: inline-block;
            webkit-animation: click-radio-wave 0.65s;
            -moz-animation: click-radio-wave 0.65s;
            animation: click-radio-wave 0.65s;
            background: #000000;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
            border-radius: 50%;
        }

        .form-wizard .wizard-form-radio input[type="radio"] ~ label {
            padding-left: 10px;
            cursor: pointer;
        }

        /*------------------------------------------*/

        .form-wizard .wizard-form-radio input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            background-color: #dddddd;
            height: 25px;
            width: 25px;
            display: inline-block;
            vertical-align: middle;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
        }

        .form-wizard .wizard-form-radio input[type="checkbox"]:focus {
            outline: 0;
        }

        .form-wizard .wizard-form-radio input[type="checkbox"]:checked {
            background-color: #fb1647;
        }

        .form-wizard .wizard-form-radio input[type="checkbox"]:checked::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            display: inline-block;
            background-color: #ffffff;
            border-radius: 50%;
            left: 1px;
            right: 0;
            margin: 0 auto;
            top: 8px;
        }

        .form-wizard .wizard-form-radio input[type="checkbox"]:checked::after {
            content: "";
            display: inline-block;
            webkit-animation: click-radio-wave 0.65s;
            -moz-animation: click-radio-wave 0.65s;
            animation: click-radio-wave 0.65s;
            background: #000000;
            content: '';
            display: block;
            position: relative;
            z-index: 100;
            border-radius: 50%;
        }

        .form-wizard .wizard-form-radio input[type="checkbox"] ~ label {
            padding-left: 10px;
            cursor: pointer;
        }

        /*------------------------------------------*/


        .form-wizard .form-wizard-header {
            text-align: center;
        }

        .form-wizard .form-wizard-next-btn, .form-wizard .form-wizard-previous-btn, .form-wizard .form-wizard-submit {
            background-color: #d65470;
            color: #ffffff;
            display: inline-block;
            min-width: 100px;
            min-width: 120px;
            padding: 10px;
            text-align: center;
        }

        .form-wizard .form-wizard-next-btn:hover, .form-wizard .form-wizard-next-btn:focus, .form-wizard .form-wizard-previous-btn:hover, .form-wizard .form-wizard-previous-btn:focus, .form-wizard .form-wizard-submit:hover, .form-wizard .form-wizard-submit:focus {
            color: #ffffff;
            opacity: 0.6;
            text-decoration: none;
        }

        .form-wizard .wizard-fieldset {
            display: none;
        }

        .form-wizard .wizard-fieldset.show {
            display: block;
        }

        .form-wizard .wizard-form-error {
            display: none;
            background-color: #d70b0b;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            width: 100%;
        }

        .form-wizard .form-wizard-previous-btn {
            background-color: #fb1647;
        }

        .form-wizard .form-control {
            font-weight: 300;
            height: auto !important;
            padding: 15px;
            color: #888888;
            background-color: #f1f1f1;
            border: none;
        }

        .form-wizard .form-control:focus {
            box-shadow: none;
        }

        .form-wizard .form-group {
            position: relative;
            margin: 25px 0;
        }

        .form-wizard .wizard-form-text-label {
            position: absolute;
            left: 10px;
            top: 16px;
            transition: 0.2s linear all;
        }

        .form-wizard .focus-input .wizard-form-text-label {
            color: #d65470;
            top: -18px;
            transition: 0.2s linear all;
            font-size: 12px;
        }

        .form-wizard .form-wizard-steps {
            margin: 20px 0;
        }

        .form-wizard .form-wizard-steps li {
            width: 20%;
            float: left;
            position: relative;
        }

        .form-wizard .form-wizard-steps li::after {
            background-color: #f3f3f3;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            border-bottom: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
        }

        .form-wizard .form-wizard-steps li span {
            background-color: #dddddd;
            border-radius: 50%;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            position: relative;
            text-align: center;
            width: 40px;
            z-index: 1;
        }

        .form-wizard .form-wizard-steps li:last-child::after {
            width: 50%;
        }

        .form-wizard .form-wizard-steps li.active span, .form-wizard .form-wizard-steps li.activated span {
            background-color: #d65470;
            color: #ffffff;
        }

        .form-wizard .form-wizard-steps li.active::after, .form-wizard .form-wizard-steps li.activated::after {
            background-color: #d65470;
            left: 50%;
            width: 50%;
            border-color: #d65470;
        }

        .form-wizard .form-wizard-steps li.activated::after {
            width: 100%;
            border-color: #d65470;
        }

        .form-wizard .form-wizard-steps li:last-child::after {
            left: 0;
        }

        .form-wizard .wizard-password-eye {
            position: absolute;
            right: 32px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        @keyframes click-radio-wave {
            0% {
                width: 25px;
                height: 25px;
                opacity: 0.35;
                position: relative;
            }
            100% {
                width: 60px;
                height: 60px;
                margin-left: -15px;
                margin-top: -15px;
                opacity: 0.0;
            }
        }

        @media screen and (max-width: 767px) {
            .wizard-content-left {
                height: auto;
            }
        }

    </style>
@endsection

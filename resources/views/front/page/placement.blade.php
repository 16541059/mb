@extends("front.layout.base")
@section("title")
    Seviye Belirleme
@endsection

@section("content")

    <section class="wizard-section pattern-layer-one page-title " style="background-color: #141d38" ;>
        <div class="auto-container">
            <h2>SEVİYENİZİ BELİRLEYİN</h2>
            <ul class="page-breadcrumb">
                <li><a href="/">Anasayfa</a></li>
                <li>Seviyenizi Belirleyin</li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6  offset-sm-2 offset-md-3 offset-lg-3 ">
            <div id="surveyElement" style="display:inline-block;width:100%; "></div>
            <div id="surveyResult"></div>
        </div>
    </section>


@endsection
@section("script")
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://unpkg.com/survey-jquery@1.9.0/survey.jquery.min.js"></script>
    <link href="https://unpkg.com/survey-core@1.9.0/modern.min.css" type="text/css" rel="stylesheet"/>
    <script>

        Survey.StylesManager.applyTheme("modern");


        var surveyJSON = {
            title: " ",
            "locale": "tr",
            showProgressBar: "bottom",
            //    showTimerPanel: "top",
            //   maxTimeToFinishPage: 10,
            //    maxTimeToFinish: 25,

            completedHtml: "Cevaplarınız başarıyla kaydedildi. En kısa zamanda size dönüş sağlanacaktır. <br> <a class='btn btn-primary mt-3 ' href='/'>Anasayfa Dön</a>",
            firstPageIsStarted: true,
            startSurveyText: "Teste Başla",
            "pages":

                [

                    {
                        "name": "page1",
                        "elements": [{
                            "type": "html",
                            "html": "İngilizcenizi birkaç dakikada test edin ve seviyenizi öğrenin. <br/> Bu şekilde seviyenizi iyileştirecek doğru kararlar alabilirsiniz.<br/>Teste başlamak <b>'Teste Başla'</b> butonuna tıklayın."
                        }]
                    },
                        @foreach($data as $key=>$row)
                        @if(!empty($row["image"]) )
                    {
                        "name": "page",
                        "elements": [{
                            "type": "image",
                            "name": "image_{{$row["id"]}}",
                            "imageLink": "{{$row["image"]}}",
                            "imageWidth": "500px",
                            "imageHeight": "300px"
                        },
                            {"type": "html", "name": "question2", "html": `{!!  $row["question"] !!}`},
                            {
                                "type": "radiogroup",
                                "name": "{{$row["id"]}}",
                                "title": "",
                                "titleLocation": "hidden",
                                "isRequired": true,
                                "choices": ["{{$row["answera"]}}", "{{$row["answerb"]}}", "{{$row["answerc"]}}", "{{$row["answerd"]}}"],

                            }
                        ]
                    },
                        @else

                    {
                        "name": "page{{$key}}",
                        "elements": [{"type": "html", "name": "question2", "html": `{!!  $row["question"] !!}`},
                            {
                                "type": "radiogroup",
                                "name": "{{$row["id"]}}",
                                "isRequired": true,
                                "title": "",
                                "titleLocation": "hidden",
                                "choices": ["{{$row["answera"]}}", "{{$row["answerb"]}}", "{{$row["answerc"]}}", "{{$row["answerd"]}}"]
                            }]
                    },
                        @endif
                        @endforeach
                    {
                        "name": "pageuserinfo",
                        "elements": [{
                            "name": "name",
                            "type": "text",
                            "title": "Lütfen adınızı giriniz:",
                            "placeHolder": "Jhon Doe",
                            "hideNumber": true,
                            "isRequired": true
                        }, {
                            "name": "birthdate",
                            "type": "text",
                            "inputType": "date",
                            "title": "Doğum tarihiniz:",
                            "hideNumber": true,
                            "isRequired": true
                        }, {
                            "name": "email",
                            "type": "text",
                            "inputType": "email",
                            "title": "Mail adresiniz:",
                            "placeHolder": "jhondoe@mail.com",
                            "hideNumber": true,
                            "isRequired": true,
                            "validators": [
                                {
                                    "type": "email"
                                }
                            ]
                        },
                            {
                                "name": "tel",
                                "type": "text",
                                "inputType": "tel",
                                "hideNumber": true,
                                "title": "Telefon numaranız:",
                                "placeHolder": "555 555 55 55",
                                "isRequired": true,
                                "validators": [
                                    {
                                        "type": "tel"
                                    }
                                ]
                            }

                        ]
                    },

                ]
        }


        function sendDataToServer(survey) {
            //send Ajax request to your web server.
            //  console.log(survey.data);
            let {name, email, tel, birthdate, ...answer} = survey.data;
            let data = {
                "name": name,
                "email": email,
                "tel": tel,
                "birthdate": birthdate,
                "result": answer
            }
            $.ajax({
                url: '{{route("placement.post")}}',
                type: "post",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // console.log(textStatus, errorThrown);
                }
            });
        }

        var survey = new Survey.Model(surveyJSON);


        $("#surveyElement").Survey({
            model: survey,
            onComplete: sendDataToServer,
            completeText: "Gönder",

        });
        @foreach($data as $key=>$row)
        var q = survey.getQuestionByName('{{$row["id"]}}');
        q.choicesOrder = "random";
        q.showLabel = "true";
        @endforeach
    </script>


    <style>
        .sv-container-modern__title {
            padding-left: 0.55em;
            color: #1ab394;
            padding-top: unset;

        }

        .sv-q-col-1, .sv-question__content, .sv-string-viewer {
            color: white;
        }


        .sv-radio {
            border: 20px;
            border: white;


        }

        .sv-item__decorator {
            background-color: white;
            margin-top: 4px;


        }

        .sv_qstn .sv-q-col-1, .sv-question .sv-q-col-1 {
            display: inline-block;

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
            margin-bottom: 10px;

        }

        .sv-root-modern input.sv-text, textarea.sv-comment, select.sv-dropdown {
            font-weight: 300;
            height: auto !important;
            padding: 15px;
            color: #888888;
            background-color: #f1f1f1;
            border: none;
            border-radius: .25rem;
        }

        .sv-text {

            color: white;
        }

        .sv-progress__text {
            position: unset;
            margin-top: 0.69em;
            color: #9d9d9d;
            font-size: 0.87em;
            font-weight: bold;
            padding-left: 0.6321em;
        }
    </style>
@endsection

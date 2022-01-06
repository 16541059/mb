@extends("layouts.backend")

@section('title', 'Bilgileriniz')

@section("content")
    <div class="container-fluid">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Sınav</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Ana Sayfa</li>
                            <li class="breadcrumb-item active" aria-current="page">Sınav</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6 col-md-6  offset-sm-2 offset-md-3 offset-lg-3">
                <div class="text-center" id="surveyElement" style="display:inline-block;width:100%; "></div>
                <div id="surveyResult"></div>
            </div>

        </div>
    </div>

@endsection
@section("js_after")
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://unpkg.com/survey-jquery@1.9.0/survey.jquery.min.js"></script>
    <link href="https://unpkg.com/survey-core@1.9.0/modern.min.css" type="text/css" rel="stylesheet"/>
    <script>

        Survey.StylesManager.applyTheme("modern");


        var surveyJSON = {
            title: " ",
            "locale": "tr",
            showProgressBar: "bottom",
                showTimerPanel: "top",
        //       maxTimeToFinishPage: 10,
                maxTimeToFinish: {{$data[0]["max"]*60}},

            completedHtml: "Cevaplarınız başarıyla kaydedildi. <br> <a class='btn btn-primary mt-3 ' href='/users/sinav'>Çık</a>",
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
                        @foreach( json_decode($data[0]["question"]) as $key=>$row )
                    {
                        "name": "page",
                        "elements": [
                                @foreach($row as $keys=>$value)
                                @php
                                    $val=   explode( '_', $keys );
                                @endphp
                                @if($val[0]=="image")
                                @if(!empty($value))
                            {
                                "type": "image",
                                "name": "",
                                "imageLink": "{{$value}}",
                                "imageWidth": "700px",
                                "imageHeight": "300px"
                            },
                                @endif
                                @endif
                                @endforeach

                                @foreach($row as $keys=>$value)
                                @php
                                    $val=   explode( '_', $keys );
                                @endphp
                                @if($val[0]=="question")
                            {
                                "type": "html", "name": "question2", "html": `{!! $value !!}`
                            },
                                @endif
                                @endforeach
                            {
                                "type": "radiogroup",
                                @foreach($row as $keys=>$value)
                                    @php
                                        $val=   explode( '_', $keys );
                                    @endphp
                                    @if($val[0]=="question")
                                "name": "{{$keys}}",
                                @endif
                                    @endforeach
                                "title": "",
                                "titleLocation": "hidden",
                                "isRequired": false,
                                "choices":
                                    [
                                        @foreach($row as $keys=>$value)
                                            @php
                                                $val=   explode( '_', $keys );
                                            @endphp
                                            @switch($val[0])

                                            @case("answera")
                                            "{{$value}}",
                                        @break
                                            @case("answerb")
                                            "{{$value}}",
                                        @break
                                            @case("answerc")
                                            "{{$value}}",
                                        @break
                                            @case("answerd")
                                            "{{$value}}",
                                        @break
                                        @default

                                        @endswitch
                                        @endforeach



                                    ],

                            }
                        ]
                    },

                    @endforeach
                ]
        }


        function sendDataToServer(survey) {

            let data = {
                "result": survey.data
            }
                 $.ajax({
                     url: '{{route("users.exam.post",[$data[0]["slug"]])}}',
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
        @foreach( json_decode($data[0]["question"]) as $key=>$row )
        @foreach($row as $keys=>$value)
        @php
            $val=   explode( '_', $keys );
        @endphp
        @if($val[0]=="question")
        var q = survey.getQuestionByName('{{$keys}}');
        q.choicesOrder = "random";
        q.showLabel = "true";
        @endif
        @endforeach
        @endforeach
    </script>
    <style>
        .sv-container-modern__title {
            padding-left: 0.55em;
            color: #1ab394;
            padding-top: unset;

        }

        .sv-q-col-1, .sv-question__content, .sv-string-viewer {
            color: #30b2e5;
        }


        .sv-radio {
            border: 20px;
            border: #30b2e5;


        }

        .sv-item__decorator {
            background-color: #85ee6e;
            margin-top: 4px;


        }

        .sv_qstn .sv-q-col-1, .sv-question .sv-q-col-1 {
            display: inline-block;

            position: relative;
            border: 1px solid rgb(232, 118, 118);
            border-radius: 25px;
            padding: 12px 25px;
            font-size: 0.9rem;
            font-family: "Roboto", sans-serif;
            color: #af1b1b;
            width: 100%;
            text-align: left;
            font-weight: 200;
            -webkit-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
            margin-bottom: 10px;

        }

        .sv-root-modern input.sv-text, textarea.sv-comment, select.sv-dropdown {
            color: rgb(49, 243, 4);
            background-color: transparent;
        }

        .sv-text {

            color: #c53232;
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

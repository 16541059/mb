{{--@extends('adminlte::page')
@section('title', 'Sınav Düzenle')

@section('content_header')

@stop

@section('content')--}}
    <h3>{{$data[0]["user"]["tc"] ." nolu ".$data[0]["user"]["name"]." adlı öğrencini ".$data[0]["exam"]["name"]." Sınavı sonucu " }}</h3>
    <div class="alert alert-info" role="alert">
        Yeşil renk: Doğru Cevplandı, Kırmızı renk: Yalış Cevap , Sarı renk: Öğrenci Cevabı
    </div>

  {{--  <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.examresult.edit",["id"=>$data[0]["exam"]["id"]])}}">Sonuçlar</a>
    </div>--}}

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Öğrencinin Cevapları</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.exam.put',$data[0]["id"]],"enctype"=>"multipart/form-data"]) !!}

            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label('name', "Sınav İsmi") !!}
                    {!! Form::text('name',$data[0]["exam"]["name"],["class"=>"form-control","disabled"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date', "Sınav tarihi") !!}
                    {!! Form::date('date', $datetime->create($data[0]["date"]),["class"=>"form-control","disabled"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('time', "Sınav saati") !!}
                    {!! Form::text('time',$datetime->parse($data[0]["time"])->timezone('Europe/Istanbul')->format('H:i'),["class"=>"form-control","disabled"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('max', "Sınav Süresi dk") !!}
                    {!! Form::text('max',$data[0]["exam"]["max"],["class"=>"form-control","disabled"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('level', "Seviyesi") !!}
                    {!! Form::select('level', ['A1' => 'A1', 'A2' => 'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'],$data[0]["level"],["class"=>"form-control","disabled"])!!}
                </div>
                    <div class="form-group ">
                        {!! Form::label('total', "Doğru Soru Sayısı ") !!}
                        {!! Form::number('total',$trueans,["class"=>"form-control","disabled"])!!}

                    </div>
                    <div class="form-group ">
                        {!! Form::label('total', "Yanlış Soru Sayısı ") !!}
                        {!! Form::number('total',$total-$trueans,["class"=>"form-control","disabled"])!!}

                    </div>
                <div class="form-group ">
                    {!! Form::label('total', "Toplam Soru Sayısı ") !!}
                    {!! Form::number('total',$total,["class"=>"form-control","disabled"])!!}

                </div>
                <hr>
                <h3>Sorular</h3>
                <div id="question">

                    @foreach(json_decode($data[0]["exam"]["question"]) as $key=>$row )

                        <div class="callout callout-success">
                            <div class="d-flex justify-content-between bd-highlight mb-3">
                                <div class="p-2 bd-highlight"> {!! ($key + 1) !!})Soru</div>

                            </div>

                            @foreach($row as $keys=>$value)
                                @php
                                    $val=   explode( '_', $keys );
                                @endphp
                                @switch($val[0])
                                    @case("image")

                                    <div  class="form-group">
                                        @if(!empty($value))
                                            <img width="25%" class="img-thumbnail elevation-2  mb-2" src="{{$value}}">
                                        @endif

                                    </div>

                                    @break
                                    @case("question")
                                    <div class="form-group">
                                        <div class="callout callout-info">
                                            {!! $value !!}
                                        </div>

                                    </div>

                                    @php
                                        $userresutl= !empty( $result->$keys)?$result->$keys:$keys
                                    @endphp

                                    @break

                                    @case("answera")

                                    <div class="form-group row ">
                                        {!! Form::label("a", "Doğru Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answera[$key]",$value, ["class" => "form-control ", "disabled", "id" => "a","style"=> ($value==$userresutl?"background-color: #00b44e":"background-color:red") ]) !!}

                                    </div>
                                    @break
                                    @case("answerb")
                                    <div class="form-group row ">
                                        {!! Form::label("b", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answerb[$key]",$value, ["class" => "form-control ", "disabled", "id" => "b","style"=> ($value==$userresutl?"background-color: #f39c12":"")  ]) !!}
                                    </div>
                                    @break

                                    @case("answerc")
                                    <div class="form-group row ">
                                        {!! Form::label("answerc[$key]", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answerc[$key]", $value, ["class" => "form-control ", "disabled", "id" => "c","style"=> ($value==$userresutl?"background-color: #f39c12":"")]) !!}
                                    </div>
                                    @break

                                    @case("answerd")
                                    <div class="form-group row ">
                                        {!! Form::label("answerd[$key]", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answerd[$key]",$value, ["class" => "form-control ", "disabled", "id" => "d","style"=> ($value==$userresutl?"background-color: #f39c12":"")]) !!}
                                    </div>
                                    @break
                                    @default
                                    Default case...
                                @endswitch

                            @endforeach

                        </div>
                    @endforeach
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">


                </div>


            </div>

        </div>


    </div>
{{--
@stop

@section('css')


@stop

@section('js')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>


        $('#time').timepicker({
            timeFormat: 'H:ss',
            interval: 30,
            minTime: '8',
            maxTime: '11:00pm',
            defaultTime: '8',
            startTime: '10:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });

        $("#totalget").click(function (){
            let i=  $(".callout").length;

            $.ajax({
                url: "{{route("admin.exam.total")}}",
                type: 'POST',
                data:{"value":$("#total").val(),"i":i } ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                success: function (data) {
                    $("#question").append(data)
                    $('.summernote').summernote({
                        height: 100
                    });
                }

            })
        });
        $("#totalgetone").click(function (){
            let i=  $(".callout").length;

            $.ajax({
                url: "{{route("admin.exam.total")}}",
                type: 'POST',
                data:{"value":1,"i":i } ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                success: function (data) {
                    $("#question").append(data)
                    $('.summernote').summernote({
                        height: 100
                    });
                }

            })
        });

        $('.summernote').summernote({
            height: 100
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif



    </script>
@stop
--}}

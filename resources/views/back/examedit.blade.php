@extends('adminlte::page')
@section('title', 'Sınav Düzenle')

@section('content_header')
    <h3>Sınav Düzenle</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.exam.index")}}">Sınavlar</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sınav Düzenle</h3>
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
                    {!! Form::text('name',$data[0]["name"],["class"=>"form-control","required"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date', "Sınav tarihi") !!}
                    {!! Form::date('date', $datetime->create($data[0]["date"]),["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('time', "Sınav saati") !!}
                    {!! Form::text('time',$datetime->parse($data[0]["time"])->timezone('Europe/Istanbul')->format('H:i'),["class"=>"form-control","required"," data-clocklet"]) !!}
                </div>
                    <div class="form-group">
                        {!! Form::label('max', "Sınav Süresi dk") !!}
                        {!! Form::text('max',$data[0]["max"],["class"=>"form-control","required"]) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('level', "Seviyesi") !!}
                    {!! Form::select('level', ['A1' => 'A1', 'A2' => 'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'],$data[0]["level"],["class"=>"form-control","required"])!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('total', "Soru Sayısı giriniz") !!}
                    <div class="row">
                        <div class="col-md-11">
                            {!! Form::number('total',null,["class"=>"form-control"])!!}
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-secondary" id="totalget" type="button" style="width: 100%" >Ekle</button>
                        </div>

                    </div>

                </div>
                <hr>
                <h3>Sorular</h3>
                <div id="question">

                @foreach(json_decode($data[0]["question"]) as $key=>$row )

                        <div class="callout callout-success">
                            <div class="d-flex justify-content-between bd-highlight mb-3">
                                <div class="p-2 bd-highlight"> {!! ($key + 1) !!})Soru</div>
                                <div class="p-2 bd-highlight"> <button type="button"  onclick="($(this).parent('div').parent('div').parent('div').remove())" class="btn btn-danger" > <i class="fa fa-trash"></i> Sil</button> </div>
                            </div>

                            @foreach($row as $keys=>$value)
                                @php
                                  $val=   explode( '_', $keys );
                                @endphp
                                @switch($val[0])
                                    @case("image")

                                    <div class="form-group">
                                        @if(!empty($value))
                                            <img width="25%" class="img-thumbnail elevation-2  mb-2" src="{{$value}}">
                                        @endif
                                        <br>
                                        <label for="exampleInputFile">{!! Form::label("image", "Görsel") !!}</label>
                                        {!! Form::file("image[$key]", ["class" => "form-control"]) !!}
                                        <span style="color:red;">İsteğe Bağlı</span>
                                    </div>

                                    @break
                                    @case("question")
                                    <div class="form-group">
                                        {!! Form::label("question[$key]", "Soru") !!}
                                        {!! Form::textarea("question[$key]", $value, ["class" => "form-control summernote", "id" => "summernote", "required"]) !!}
                                    </div>
                                    @break

                                    @case("answera")
                                    <div class="form-group row ">
                                        {!! Form::label("a", "Doğru Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answera[$key]",$value, ["class" => "form-control ", "required", "id" => "a"]) !!}
                                    </div>
                                    @break
                                    @case("answerb")
                                    <div class="form-group row ">
                                        {!! Form::label("b", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answerb[$key]",$value, ["class" => "form-control ", "required", "id" => "b"]) !!}
                                    </div>
                                    @break

                                    @case("answerc")
                                    <div class="form-group row ">
                                        {!! Form::label("answerc[$key]", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answerc[$key]", $value, ["class" => "form-control ", "required", "id" => "c"]) !!}
                                    </div>
                                    @break

                                    @case("answerd")
                                    <div class="form-group row ">
                                        {!! Form::label("answerd[$key]", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                        {!! Form::text("answerd[$key]",$value, ["class" => "form-control ", "required", "id" => "d"]) !!}
                                    </div>
                                    @break
                                    @default
                                    Default case...
                                @endswitch

                            @endforeach

                        </div>
                    @endforeach
                </div>
                <button class="btn btn-secondary" id="totalgetone" type="button" style="width: 100%" >Soru Ekle</button>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary " style="width: 100%" >Güncelle</button>
                </div>


            </div>
            {!! Form::close() !!}
        </div>


    </div>
@stop

@section('css')


@stop

@section('js')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/clocklet/css/clocklet.min.css">
    <script src="https://cdn.jsdelivr.net/npm/clocklet"></script>
    <script>
/*

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
        });*/

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

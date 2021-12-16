@extends('adminlte::page')
@section('title', 'Sınav oluştur')

@section('content_header')
    <h3>Sınav Oluştur</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.exam.index")}}">Sınavlar</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sınav Oluştur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'admin.exam.post',"enctype"=>"multipart/form-data"]) !!}

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
                    {!! Form::text('name',old('name'),["class"=>"form-control","required"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date', "Sınav tarihi") !!}
                    {!! Form::date('date', \Carbon\Carbon::now()->format('d-m-Y') ,["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('time', "Sınav saati") !!}
                    {!! Form::text('time', \Carbon\Carbon::now()->timezone('Europe/Istanbul')->format('H:i'),["class"=>"form-control","required","id"=>"time","data-clocklet"]) !!}
                </div>
                    <div class="form-group">
                        {!! Form::label('max', "Sınav Süresi dk") !!}
                        {!! Form::text('max', old('max'),["class"=>"form-control","required"]) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('level', "Seviyesi") !!}
                    {!! Form::select('level', ['A1' => 'A1', 'A2' => 'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'],null,["class"=>"form-control"])!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('total', "Soru Sayısı giriniz") !!}
                    <div class="row">
                        <div class="col-md-11">
                            {!! Form::number('total',null,["class"=>"form-control","required"])!!}
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-secondary" id="totalget" type="button" style="width: 100%" >Ekle</button>
                        </div>

                    </div>

                </div>
                <hr>
                <h3>Sorular</h3>
                <div id="question">



                </div>
                    <button class="btn btn-secondary" id="totalgetone" type="button" style="width: 100%" >Soru Ekle</button>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button type="submit" style="width: 100%" class="btn btn-primary ">Kaydet</button>
                </div>


            </div>
            {!! Form::close() !!}
        </div>


    </div>
@stop

@section('css')


@stop

@section('js')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/clocklet/css/clocklet.min.css">
    <script src="https://cdn.jsdelivr.net/npm/clocklet"></script>

    <script>


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

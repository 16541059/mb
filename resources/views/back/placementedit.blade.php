@extends('adminlte::page')
@section('title', 'Soru Ekle')

@section('content_header')
    <h3>Soru Ekle</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.seviyesinav.index")}}">Sorular</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Soru Ekle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.seviyesinav.put',"id"=>$data[0]["id"]],"enctype"=>"multipart/form-data","class"=>"form-horizontal"]) !!}

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
                    @if($data[0]["image"])
                    <img width="25%" class="img-thumbnail elevation-2  mb-2" src="{{$data[0]["image"]}}">
                    @endif
                    <br>
                    <label for="exampleInputFile">{!! Form::label('image', "Görsel") !!}</label>
                    {!! Form::file('image',["class"=>"form-control"]) !!}
                    <span style="color:red;">İsteğe Bağlı</span>

                </div>

                <div class="form-group">
                    {!! Form::label('question', "Soru") !!}
                    {!! Form::textarea('question',$data[0]['question'],["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
                </div>

                <div class="form-group row ">
                    {!! Form::label('a', "A)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answera',$data[0]['answera'],["class"=>"form-control summernote","required","id"=>"a"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2  ">
                            {!! Form::radio('correct',"a",$data[0]['correct']=="a"?true:false,["class"=>"custom-control-input","id"=>"customSwitch1"]) !!}
                            {!! Form::label('customSwitch1', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('b', "B)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answerb',$data[0]['answerb'],["class"=>"form-control summernote","required","id"=>"b"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2  ">
                            {!! Form::radio('correct',"b",$data[0]['correct']=="b"?true:false,["class"=>"custom-control-input","id"=>"customSwitch2"]) !!}
                            {!! Form::label('customSwitch2', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('c', "C)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answerc',$data[0]['answerc'],["class"=>"form-control summernote","required","id"=>"c"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2  ">
                            {!! Form::radio('correct',"c",$data[0]['correct']=="c"?true:false,["class"=>"custom-control-input","id"=>"customSwitch3"]) !!}
                            {!! Form::label('customSwitch3', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('d', "D)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answerd',$data[0]['answerd'],["class"=>"form-control summernote","required","id"=>"d"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2 ">
                            {!! Form::radio('correct',"d",$data[0]['correct']=="d"?true:false,["class"=>"custom-control-input","id"=>"customSwitch4"]) !!}
                            {!! Form::label('customSwitch4', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button style="width: 100%" type="submit" class="btn btn-primary ">Güncelle</button>
                </div>


            </div>
            {!! Form::close() !!}
        </div>


    </div>
@stop

@section('css')


@stop

@section('js')
    <script>
        $('#summernote').summernote({
            height: 100
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

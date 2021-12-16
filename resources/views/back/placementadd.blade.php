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
            {!! Form::open(['route' => 'admin.seviyesinav.post',"enctype"=>"multipart/form-data","class"=>"form-horizontal"]) !!}

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
                    <label for="exampleInputFile">{!! Form::label('image', "Görsel") !!}</label>
                    {!! Form::file('image',["class"=>"form-control"]) !!}
                    <span style="color:red;">İsteğe Bağlı</span>

                </div>

                <div class="form-group">
                    {!! Form::label('question', "Soru") !!}
                    {!! Form::textarea('question',old('question'),["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
                </div>

                <div class="form-group row ">
                    {!! Form::label('a', "A)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answera',old('answera'),["class"=>"form-control summernote","required","id"=>"a"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2  ">
                            {!! Form::radio('correct',"a",false,["class"=>"custom-control-input","id"=>"customSwitch1"]) !!}
                            {!! Form::label('customSwitch1', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('b', "B)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answerb',old('answerb'),["class"=>"form-control summernote","required","id"=>"b"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2  ">
                            {!! Form::radio('correct',"b",false,["class"=>"custom-control-input","id"=>"customSwitch2"]) !!}
                            {!! Form::label('customSwitch2', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('c', "C)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answerc',old('answerc'),["class"=>"form-control summernote","required","id"=>"c"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2  ">
                            {!! Form::radio('correct',"c",false,["class"=>"custom-control-input","id"=>"customSwitch3"]) !!}
                            {!! Form::label('customSwitch3', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('d', "D)",["class"=>"col-form-label"]) !!}

                    <div class="col-sm-10">
                        {!! Form::text('answerd',old('answerd'),["class"=>"form-control summernote","required","id"=>"d"]) !!}
                    </div>

                    <div class="col-sm-1">
                        <div class="custom-control custom-switch mt-2 ">
                            {!! Form::radio('correct',"d",false,["class"=>"custom-control-input","id"=>"customSwitch4"]) !!}
                            {!! Form::label('customSwitch4', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary " style="width: 100%">Kaydet</button>
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

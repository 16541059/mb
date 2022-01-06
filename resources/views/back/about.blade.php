@extends('adminlte::page')
@section('title', 'Hakkımda')

@section('content_header')
    <h3>Hakkımda</h3>
@stop

@section('content')



    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Hakkımda Düzenle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.hakkımda.put', $data["id"]],"enctype"=>"multipart/form-data"]) !!}

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
                    <label for="exampleInputFile">{!! Form::label('logo', "Logo") !!}</label>
                    <br>
                    <img width="25%" class="mb-2" src="{{$data["logo"]}}">
                    {!! Form::file('logo',["class"=>"form-control"]) !!}

                </div>
                <div class="form-group">
                    <label for="exampleInputFile">{!! Form::label('image', "Görsel") !!}</label>
                    <br>
                    <img width="25%" class="mb-2" src="{{$data["image"]}}">
                    {!! Form::file('image',["class"=>"form-control"]) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('name', "Başlık") !!}
                    {!! Form::text('name',$data["name"],["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('about', "Hakkımda") !!}
                    {!! Form::textarea('about',$data["about"],["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('video', "Tanıtım videosu") !!}
                    {!! Form::text('video',(isset(json_decode($data["sosial"])->video)?(json_decode($data["sosial"])->video):""),["class"=>"form-control summernote","id"=>"summernote","placeholder"=>"Youtube Video Linki"]) !!}
                </div>
                <div hidden>
                    <div class="form-group">
                        {!! Form::label('day', "Çalışma Günleri") !!}
                        {!! Form::text('day',(isset(json_decode($data["sosial"])->day)?(json_decode($data["sosial"])->day):""),["class"=>"form-control summernote","id"=>"summernote",]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('time', "Çalışma Saatleri") !!}
                        {!! Form::text('time',(isset(json_decode($data["sosial"])->time)?(json_decode($data["sosial"])->time):""),["class"=>"form-control summernote","id"=>"summernote",]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('adres', "Adres") !!}
                        {!! Form::text('adres',(isset(json_decode($data["sosial"])->adres)?(json_decode($data["sosial"])->adres):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('maps', "Google Maps Kodu") !!}
                        {!! Form::textarea('maps',(isset(json_decode($data["sosial"])->maps)?(json_decode($data["sosial"])->maps):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tel', "Telefon") !!}
                        {!! Form::text('tel',(isset(json_decode($data["sosial"])->tel)?(json_decode($data["sosial"])->tel):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('cep', "Cep Telefon") !!}
                        {!! Form::text('cep',(isset(json_decode($data["sosial"])->cep)?(json_decode($data["sosial"])->cep):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('mail', "Mail") !!}
                        {!! Form::text('mail',(isset(json_decode($data["sosial"])->mail)?(json_decode($data["sosial"])->mail):""),["class"=>"form-control summernote","id"=>"summernote",]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('facebook', "Facebook") !!}
                        {!! Form::text('facebook',(isset(json_decode($data["sosial"])->facebook)?(json_decode($data["sosial"])->facebook):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('instagram', "İnstagram") !!}
                        {!! Form::text('instagram',(isset(json_decode($data["sosial"])->instagram)?(json_decode($data["sosial"])->instagram):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('twitter', "Twitter") !!}
                        {!! Form::text('twitter',(isset(json_decode($data["sosial"])->twitter)?(json_decode($data["sosial"])->twitter):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('whatsapp', "Whatsapp") !!}
                        {!! Form::text('whatsapp',(isset(json_decode($data["sosial"])->whatsapp)?(json_decode($data["sosial"])->whatsapp):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('youtube', "Youtube") !!}
                        {!! Form::text('youtube',(isset(json_decode($data["sosial"])->youtube)?(json_decode($data["sosial"])->youtube):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telegram', "Telegram") !!}
                        {!! Form::text('telegram',(isset(json_decode($data["sosial"])->telegram)?(json_decode($data["sosial"])->telegram):""),["class"=>"form-control summernote","id"=>"summernote"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('linkedin', "Linkedin") !!}
                        {!! Form::text('linkedin',(isset(json_decode($data["sosial"])->linkedin)?(json_decode($data["sosial"])->linkedin):""),["class"=>"form-control summernote","id"=>"summernote",]) !!}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary ">Düzenle</button>
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
            height: 400
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

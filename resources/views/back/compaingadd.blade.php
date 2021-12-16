@extends('adminlte::page')
@section('title', 'Kampanya')

@section('content_header')
    <h3>Kampanya Ekle</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.campaing.index")}}">Kampanya Listesi</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kampanya  Ekle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'admin.campaing.post',"enctype"=>"multipart/form-data"]) !!}

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

                </div>

                <div class="form-group">
                    {!! Form::label('title', "Başlık") !!}
                    {!! Form::text('title',old('title'),["class"=>"form-control","required"]) !!}
                </div>
                    <div class="form-group">
                        {!! Form::label('description', "Açıklama") !!}
                        {!! Form::textarea('description',old('description'),["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
                    </div>

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
    <script>
        $('#summernote').summernote({
            height: 400
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}","{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

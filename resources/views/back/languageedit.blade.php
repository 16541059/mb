@extends('adminlte::page')
@section('title', 'Eğitimler')

@section('content_header')
    <h3>Dil Düzenle</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.language.index")}}">Diller</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Dil Düzenle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.language.put', $data[0]["id"]],"enctype"=>"multipart/form-data"]) !!}

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
                    <br>
                    <img width="25%" src="{{$data[0]["image"]}}">
                    {!! Form::file('image',["class"=>"form-control"]) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('title', "Dil") !!}
                    {!! Form::text('title',$data[0]["title"],["class"=>"form-control","required"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', "Açıklama") !!}
                    {!! Form::textarea('description',$data[0]["description"],["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary " style="width: 100%">Düzenle</button>
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

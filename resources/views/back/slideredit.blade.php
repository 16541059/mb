@extends('adminlte::page')
@section('title', 'Slider')

@section('content_header')
    <h3>Slider</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.slider.index")}}">Slider</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Slider Düzenle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.slider.put', $data[0]["id"]],"enctype"=>"multipart/form-data"]) !!}

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
                    <label for="exampleInputFile">{!! Form::label('images', "Görsel") !!}</label>
                    <br>
                    <img width="25%" src="{{$data[0]["images"]}}">
                    {!! Form::file('images',["class"=>"form-control"]) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('name', "İsim") !!}
                    {!! Form::text('name',$data[0]["name"],["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', "Başlık") !!}
                    {!! Form::text('title',$data[0]["title"],["class"=>"form-control","required"]) !!}
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button style="width: 100%" type="submit" class="btn btn-primary ">Düzenle</button>
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

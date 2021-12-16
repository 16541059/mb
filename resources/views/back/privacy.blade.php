@extends('adminlte::page')
@section('title', 'Politiklar')

@section('content_header')
    <h3>Politikalar</h3>
@stop

@section('content')



    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Politikalar Düzenle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.privacy.put', $data["id"]],"enctype"=>"multipart/form-data"]) !!}

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
                    {!! Form::label('kvkk', "KVKK Metni") !!}
                    {!! Form::textarea('kvkk',$data["kvkk"],["class"=>"form-control summernote","required"]) !!}
                </div>
                    <div class="form-group">
                        {!! Form::label('cerez', "Çerez Politikası") !!}
                        {!! Form::textarea('cerez',$data["cerez"],["class"=>"form-control summernote","required"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('gizlilik', "Gizlilik Politikası") !!}
                        {!! Form::textarea('gizlilik',$data["gizlilik"],["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
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

        $('.summernote').summernote({
            height: 400
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

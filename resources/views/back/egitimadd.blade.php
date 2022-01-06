@extends('adminlte::page')
@section('title', 'Eğitimler')

@section('content_header')
    <h3>Eğitimler</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.egitim.index")}}">Eğitimler</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Eğitim Ekle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'admin.egitim.post',"enctype"=>"multipart/form-data"]) !!}

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
                    {!! Form::label('name', "İsim") !!}
                    {!! Form::text('name',old('name'),["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('parent_id', "Şu Kategori Altında oluştur") !!}
                    {!!Form::select('parent_id',["0"=>"En üstde göster"]+ $category ,old('category'),["class"=>"form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', "Açıklama") !!}
                    {!! Form::textarea('description',old('description'),["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
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
            height: 400
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}","{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

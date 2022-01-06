@extends('adminlte::page')
@section('title', 'Popup')

@section('content_header')
    <h3>Popup</h3>
@stop

@section('content')



    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Popup Düzenle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['admin.popup.put', $data["id"]],"enctype"=>"multipart/form-data"]) !!}

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
                    <img width="25%" class="mb-2" src="{{$data["image"]}}">
                    {!! Form::file('image',["class"=>"form-control"]) !!}

                </div>

                <div class="custom-control custom-switch mb-2">
                    {!! Form::checkbox('active',$data["active"],$data["active"],["class"=>"custom-control-input","id"=>"customSwitch2"]) !!}
                    {!! Form::label('customSwitch2', "Açılışta Göster",["class"=>"custom-control-label"]) !!}

                </div>
                    <div class="custom-control custom-switch mb-2">
                        {!! Form::checkbox('oneshow',$data["oneshow"],$data["oneshow"],["class"=>"custom-control-input","id"=>"customSwitch1"]) !!}
                        {!! Form::label('customSwitch1', "Sayfa yenilendiğide tekrar göster",["class"=>"custom-control-label"]) !!}

                    </div>
                <div class="form-group">
                    {!! Form::label('link', "Link") !!}
                    {!! Form::text('link',$data["link"],["class"=>"form-control"]) !!}
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

        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

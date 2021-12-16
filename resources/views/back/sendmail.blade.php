@extends('adminlte::page')
@section('title', 'Mail Gönder')

@section('content_header')
    <h3>Mail Gönder</h3>
    <p>Toplam Abone sayınız: {{$count}}</p>
@stop

@section('content')


    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Abonelerinize Mesaj Gönderin</h3>
            </div>
            <!-- /.card-header -->
            {!! Form::open(['route' => ['admin.abone.post']]) !!}
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('subject', "Konu") !!}
                    {!! Form::text('subject',old('subject'),["class"=>"form-control","placeholder"=>"Konu","required"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mail', "Mail") !!}
                    {!! Form::textarea('mail',old('mail'),["class"=>"form-control summernote","id"=>"summernote","required"]) !!}
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
            </div>
        {!! Form::close() !!}
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
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

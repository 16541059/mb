@extends('adminlte::page')
@section('title', 'Öğreni Ekle')

@section('content_header')
    <h3>Öğrenci Ekle</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-primary mb-3" href="{{route("admin.users.index")}}">Öğrenciler</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Öğrenci Ekle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'admin.users.post',"enctype"=>"multipart/form-data"]) !!}

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
                    {!! Form::label('tc', "TC") !!}
                    {!! Form::text('tc',old('tc'),["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', "İsim") !!}
                    {!! Form::text('name',old('name'),["class"=>"form-control","required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', "E-posta") !!}
                    {!! Form::email('email',old('email'),["class"=>"form-control","required"]) !!}
                </div>
                    <div class="form-group">
                        {!! Form::label('tel', "Telefon") !!}
                        {!! Form::tel('tel',old('tel'),["class"=>"form-control","required"]) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('password', "Şifre") !!}
                    {!! Form::text('password',old('password'),["class"=>"form-control","required", "data-character-set"=>"a-z,A-Z","data-size"=>"6","rel"=>"gp" ]) !!}
                    <button type="button" class="btn btn-secondary mt-1 getNewPass">Şifre Oluştur</button>
                </div>
                <div class="form-group">
                    {!! Form::label('level', "Seviyesi") !!}
                    {!! Form::select('level', ['A1' => 'A1', 'A2' => 'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'],null,["class"=>"form-control","required"])!!}
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="d-flex justify-content-end">

                    <button style="width: 100%" type="submit" class="btn btn-primary ">Kaydet</button>
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


        // Generate a password string
        function randString(id) {
            var dataSet = $(id).attr('data-character-set').split(',');
            var possible = '';
            if ($.inArray('a-z', dataSet) >= 0) {
                possible += 'abcdefghijklmnopqrstuvwxyz';
            }
            if ($.inArray('A-Z', dataSet) >= 0) {
                possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if ($.inArray('0-9', dataSet) >= 0) {
                possible += '0123456789';
            }
            if ($.inArray('#', dataSet) >= 0) {
                possible += '![]{}()%&*$#^<>~@|';
            }
            var text = '';
            for (var i = 0; i < $(id).attr('data-size'); i++) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }


        $(".getNewPass").click(function () {
            var field = $(this).closest('div').find('input[rel="gp"]');
            field.val(randString(field));
        });


    </script>
@stop

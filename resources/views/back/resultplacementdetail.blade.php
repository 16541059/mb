{{--@extends('adminlte::page')
@section('title', 'Cevaplar')

@section('content_header')

    <h3>Cevaplar</h3>
@stop

@section('content')--}}
    <div class="row">
        <div class="{{--col-lg-6 col-md-6  offset-sm-2 offset-md-3 offset-lg-3--}} col-md-12 ">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kişi Bilgileri</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open() !!}

                <div class="card-body">

                    <div class="form-group">
                        {!! Form::label('', "İsim") !!}
                        {!! Form::text('',$data[0]["name"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Mail") !!}
                        {!! Form::text('',$data[0]["email"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Telefon") !!}
                        {!! Form::text('',$data[0]["tel"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Doğum Tarihi") !!}
                        {!! Form::date('',$data[0]["birthdate"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Doğru Cevaplanan Soru Sayısı") !!}
                        {!! Form::text('',$trueans,["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Yanlış Cevaplanan Soru Sayısı") !!}
                        {!! Form::text('',$falseans,["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Toplam soru Sayısı") !!}
                        {!! Form::text('',$total,["class"=>"form-control","readonly"]) !!}
                    </div>
                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <div class="row">

        <div class="{{--col-lg-6 col-md-6  offset-sm-2 offset-md-3 offset-lg-3--}} col-md-12 ">
            <!-- general form elements -->

                <!-- /.card-header -->

                <!-- form start -->
                @foreach($question as $index=>$row )


                    @foreach(json_decode($data[0]["result"])  as $key=>$value )


                        @if($row["id"] ==$key )
                        <div class="card {{$row["".\App\Helper\mHelper::trueanswer($row["correct"])  .""]==$value?"card-success":"card-danger"}} ">
                            <div class="card-header">
                                <h3 class="card-title"> {{$row["".\App\Helper\mHelper::trueanswer($row["correct"])  .""]==$value?"Doğru":"Yanlış"}}</h3>
                            </div>
                            @if(!empty($row["image"]))
                                <img class="img-thumbnail elevation-2 ml-3 mt-3 mb-2" src="{{$row["image"]}}" width="25%">
                            @endif
                            <div class=" ml-3 mt-3 mb-3 card-title">
                               {{++$index}}.)  {!! $row["question"] !!}
                            </div>
                            <div class="card-body" >


                                <div class="form-group row ">
                                    <label for="s" class="col-form-label">A)</label>

                                    <div class="col-sm-10">
                                        <input class="form-control summernote" readonly=""  style="{{$row["answera"]==$value?"background-color:#f39c12":null}}"  type="text" value="{{$row["answera"]}}">
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="custom-control custom-switch mt-2  ">
                                            <input class="custom-control-input"  disabled="" {{$row["correct"]=="a"?"checked":""}}   type="radio">
                                            <label  class="custom-control-label">Doğru Şık</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="s" class="col-form-label">B)</label>

                                    <div class="col-sm-10">
                                        <input class="form-control summernote" readonly=""  style="{{$row["answerb"]==$value?"background-color:#f39c12":null}}" type="text" value="{{$row["answerb"]}}">
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="custom-control custom-switch mt-2  ">
                                            <input class="custom-control-input" disabled="" type="radio" {{$row["correct"]=="b"?"checked":""}}>
                                            <label  class="custom-control-label">Doğru Şık</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="s" class="col-form-label">C)</label>

                                    <div class="col-sm-10">
                                        <input class="form-control summernote" readonly=""  style="{{$row["answerc"]==$value?"background-color: #f39c12":null}}"type="text" value="{{$row["answerc"]}}">
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="custom-control custom-switch mt-2  ">
                                            <input class="custom-control-input"  disabled="" {{$row["correct"]=="c"?"checked":""}} type="radio" >
                                            <label  class="custom-control-label">Doğru Şık</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="d" class="col-form-label">D)</label>

                                    <div class="col-sm-10">
                                        <input class="form-control summernote" readonly=""   style="{{$row["answerd"]==$value?"background-color: #f39c12":null}}"type="text" value="{{$row["answerd"]}}">
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="custom-control custom-switch mt-2  ">
                                            <input class="custom-control-input"  disabled=""{{$row["correct"]=="d"?"checked":""}} type="radio" >
                                            <label  class="custom-control-label">Doğru Şık</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        @endif

                    @endforeach
                <!-- /.card-body -->
                @endforeach


        </div>

    </div>
{{--
@stop

@section('css')


@stop

@section('js')
    <script>


    </script>
@stop

--}}

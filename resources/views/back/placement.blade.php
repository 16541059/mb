@extends('adminlte::page')
@section('title', 'Soru Ekle')

@section('content_header')
    <h3>Sorular</h3>
@stop

@section('content')

    <div class="d-flex justify-content-end">
        <button class="btn btn-danger mb-3 mr-2"  onclick="deleteall(event,'','{{route("admin.seviyesinav.deleteall")}}')" >Seçimleri Sil</button>
        <a class="btn btn-primary mb-3" href="{{route("admin.seviyesinav.add")}}">Soru Ekle</a>
    </div>

    <div class="col-md-12">
        <!-- general form elements -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Seviye Belirleme testi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                        <div id="accordion">
                            @foreach($data as $key=>$row)
                                <div id="item_{{$row["id"]}}" class="card card-secondary">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-10" onclick="lastocordion('{{$key}}')">
                                                <h4 class="card-title w-100">

                                                    <div class="custom-control custom-checkbox">
                                                        <input name="ids[]" value="{{$row["id"]}}" id="customCheckbox{{$key}}"  class="custom-control-input" type="checkbox">
                                                        <label for="customCheckbox{{$key}}" class="custom-control-label"></label>
                                                    </div>
                                                    <a class="d-block w-100" data-toggle="collapse"
                                                       href="#collapse_{{$key}}">
                                                        {{$key+1}}. Soru <br> {!! $row["question"] !!}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-end ">
                                                <div class="card-tools">

                                                    <a href="{{route("admin.seviyesinav.edit",["id"=>$row["id"]])}}" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i> Düzenle
                                                    </a>
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove">
                                                        <button class="btn btn-danger"
                                                                onclick="deleteitem(event,'','{{route("admin.seviyesinav.delete",["id"=>$row["id"]])}}')">
                                                            <i class="fas fa-trash"></i> Sil
                                                        </button>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse_{{$key}}" class="collapse {{$key==0?"show":null}}"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <img width="25%" class="img-thumbnail elevation-2 ml-3 mb-2" src="{{$row["image"]}}">
                                            <div class="form-group row ">
                                                {!! Form::label('s', "A)",["class"=>"col-form-label"]) !!}

                                                <div class="col-sm-10">
                                                    {!! Form::text('answerb',$row['answera'],["class"=>"form-control summernote","readonly","id"=>"b"]) !!}
                                                </div>

                                                <div class="col-sm-1">
                                                    <div class="custom-control custom-switch mt-2  ">
                                                        {!! Form::radio('correct'.$key.'',$row['correct'],($row['correct']=="a"?true:false),["class"=>"custom-control-input","id"=>"customSwitcha".$key."","disabled"]) !!}
                                                        {!! Form::label('customSwitcha'.$key.'', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                {!! Form::label('s', "B)",["class"=>"col-form-label"]) !!}

                                                <div class="col-sm-10">
                                                    {!! Form::text('answerb',$row['answerb'],["class"=>"form-control summernote","readonly","id"=>"b"]) !!}
                                                </div>

                                                <div class="col-sm-1">
                                                    <div class="custom-control custom-switch mt-2  ">
                                                        {!! Form::radio('correct'.$key.'',$row['correct'],($row['correct']=="b"?true:false),["class"=>"custom-control-input","id"=>"customSwitchb".$key."","disabled"]) !!}
                                                        {!! Form::label('customSwitchb'.$key.'', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                {!! Form::label('s', "C)",["class"=>"col-form-label"]) !!}

                                                <div class="col-sm-10">
                                                    {!! Form::text('answerc',$row['answerc'],["class"=>"form-control summernote","readonly","id"=>"b"]) !!}
                                                </div>

                                                <div class="col-sm-1">
                                                    <div class="custom-control custom-switch mt-2  ">
                                                        {!! Form::radio('correct'.$key.'',$row['correct'],($row['correct']=="c"?true:false),["class"=>"custom-control-input","id"=>"customSwitchc".$key."","disabled"]) !!}
                                                        {!! Form::label('customSwitchc'.$key.'', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                {!! Form::label('d', "D)",["class"=>"col-form-label"]) !!}

                                                <div class="col-sm-10">
                                                    {!! Form::text('answerd',$row['answerd'],["class"=>"form-control summernote","readonly","id"=>"d"]) !!}
                                                </div>

                                                <div class="col-sm-1">
                                                    <div class="custom-control custom-switch mt-2  ">
                                                        {!! Form::radio('correct'.$key.'',$row['correct'],($row['correct']=="d"?true:false),["class"=>"custom-control-input","id"=>"customSwitchd".$key."","disabled"]) !!}
                                                        {!! Form::label('customSwitchd'.$key.'', "Doğru Şık",["class"=>"custom-control-label"]) !!}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>


        </div>

    </div>
@stop

@section('css')


@stop

@section('js')
    <script>



        lastocordion=(value)=>{
            localStorage.setItem("lastacordion", value);
        }
       let acrodion=  localStorage.getItem("lastacordion");
        if(acrodion){
            $(".collapse").removeClass("show")
            $("#collapse_"+acrodion).addClass("show")
            goToByScroll("collapse_"+acrodion)
        }


        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif
    </script>
@stop

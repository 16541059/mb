@extends('adminlte::page')
@section('title', 'Neden Biz')

@section('content_header')

    <h3>Neden Biz</h3>
@stop

@section('content')
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'admin.whyus.post',"enctype"=>"multipart/form-data"]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('question', "Soru") !!}
                        {!! Form::textarea('question',old('question'),["class"=>"form-control","required","rows"=>5]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ansver', "Cevap") !!}
                        {!! Form::textarea('ansver',old('ansver'),["class"=>"form-control","required","rows"=>5]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Ekle
        </button>
        <button class="btn btn-danger ml-3" onclick="deleteall(event,'','{{route("admin.whyus.deleteall")}}')">
            Seçimleri Sil
        </button>

    </div>

    <div class="col-md-12">

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
                                            <label for="customCheckbox{{$key}}" class="custom-control-label">

                                            </label>
                                        </div>
                                        <a class="d-block w-100" data-toggle="collapse"
                                           href="#collapse_{{$key}}">
                                            {{$key+1}}. Soru <br> <span id="question_{{$row["id"]}}">   {{$row["question"]}} </span>
                                        </a>
                                    </h4>
                                </div>

                                <div class="col-md-2 d-flex justify-content-end ">
                                    <div class="card-tools">

                                        <button type="button" class="btn btn-warning" onclick="edit('{{$row["id"]}}')"
                                                data-toggle="modal" data-target="#exampleModal1" type="button" class="btn btn-tool">
                                            <i class="fas fa-edit"></i> Düzenle
                                        </button>
                                        <button type="button" class="btn btn-tool"
                                                data-card-widget="remove">
                                            <button class="btn btn-danger"
                                                    onclick="deleteitem(event,'','{{route("admin.whyus.delete",["id"=>$row["id"]])}}')">
                                                <i class="fas fa-trash"></i> Sil
                                            </button>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="collapse_{{$key}}" class="collapse {{$key==0?"show":null}}"
                             data-parent="#accordion">
                            <div id="ansver_{{$row["id"]}}" class="card-body">
                                {{$row["ansver"]}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(["id"=>"editform"]) !!}
                <div class="modal-body">
                    <div hidden class="form-group">
                        {!! Form::label('id', "id") !!}
                        {!! Form::text('id',old('id'),["class"=>"form-control","required"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('questionedit', "Soru") !!}
                        {!! Form::textarea('questionedit',old('question'),["class"=>"form-control","required","rows"=>5]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ansveredit', "Cevap") !!}
                        {!! Form::textarea('ansveredit',old('ansver'),["class"=>"form-control","required","rows"=>5]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="button" onclick="send('{{route("admin.whyus.put")}}')" class="btn btn-primary">
                        Güncelle
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
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

            edit = (id) => {
            let question = $("#question_" + id).text().trim();
            let ansver = $("#ansver_" + id).text().trim();

            $("textarea[name='questionedit']").val(question)
            $("input[name='id']").val(id)
            $("textarea[name='ansveredit']").val(ansver)

        }
        send = (route) => {
            let data = $("#editform").serialize();
            $.ajax({
                url: route,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (data) {
                    toast(data["status"], data["msg"], data["type"]);
                    setTimeout(() => {
                        location.reload();
                    }, 1000)
                }

            });


        }
        lastocordion=(value)=>{
            localStorage.setItem("lastawhyus", value);
        }
        let acrodion=  localStorage.getItem("lastawhyus");
        if(acrodion){
            $(".collapse").removeClass("show")
            $("#collapse_"+acrodion).addClass("show")
            goToByScroll("collapse_"+acrodion)
        }

    </script>
@stop

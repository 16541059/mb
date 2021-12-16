@extends('adminlte::page')
@section('title', 'Video Galeri')

@section('content_header')

    <h3>Video Galerisi</h3>
@stop

@section('content')


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube vidoe linki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'admin.video.post',"enctype"=>"multipart/form-data"]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', "İsim") !!}
                        {!! Form::text('name',old('name'),["class"=>"form-control","required"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', "Video Link") !!}
                        {!! Form::text('link',old('name'),["class"=>"form-control","required"]) !!}
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
           Video Ekle
        </button>
        <button class="btn btn-danger ml-3" onclick="deleteall(event,'','{{route("admin.video.deleteall")}}')">
            Seçimleri Sil
        </button>

    </div>



    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Video Galerisi</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($data as $row)
                        <div id="item_{{$row["id"]}}"  class="col-sm-2  ">

                            <a href="{{$row["image"]}}" data-toggle="lightbox" data-title="{{$row["name"]}}" data-gallery="gallery">
                                <iframe width="100%" height=""  src="https://www.youtube.com/embed/{{$row['link']}}" frameborder="0" allowfullscreen></iframe>
                            </a>
                            <button class="btn btn-secondary"  > <input name="ids[]" class="check-box"  value="{{$row["id"]}}"  type="checkbox"></button>
                            <button class="btn btn-danger"  onclick="deleteitem(event,'','{{route("admin.video.delete",["id"=>$row["id"]])}}')" ><i class="fas fa-trash"></i> Sil</button>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif



    </script>
@stop

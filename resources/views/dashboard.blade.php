@extends('adminlte::page',['iFrameEnabled' => false])
@section('title', 'Dashboard')

@section('content_header')
    <h1>Ana Sayfa</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h6>Ziyaretçiler</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bu gün</span>
                        <span class="info-box-number">
{{App\Models\Visitor::where("date", Carbon\Carbon::now()->format('Y-m-d'))->count()}}

                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dün</span>
                        <span
                            class="info-box-number">     {{App\Models\Visitor::where("date", Carbon\Carbon::yesterday()->format('Y-m-d'))->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Toplam</span>
                        <span class="info-box-number">
                            {{App\Models\Visitor::all()->count()}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            Son Ön Kayıt Başvuruları
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach($register as $row)
                            <div class="callout callout-info">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5>{{$row["name"]}}</h5>
                                        <p>{{$row["mail"]}} /{{$row["tel"]}} </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                                                onclick="getmessage('{{$row["id"]}}','{{route("admin.onkayit.post")}}')"
                                                class="btn btn-warning"><i class="fas fa-edit"></i> Detay
                                        </button>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            Son Gelen Mesajlar
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach($contact as $row)
                            <div class="callout callout-success">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5>{{$row["name"]}}</h5>
                                        <p>{{$row["email"]}} /{{$row["tel"]}} </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                                                onclick="getmessage('{{$row["id"]}}','{{route("admin.contact.getmessage")}}')"
                                                class="btn btn-warning"><i class="fas fa-edit"></i> Oku
                                        </button>

                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            Seviye Tespit Başvuruları

                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach($placement as $row)
                            <div class="callout callout-warning">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5>{{$row["name"]}}</h5>
                                        <p>{{$row["email"]}} /{{$row["tel"]}} </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                                                onclick="getmessage('{{$row["id"]}}','{{route("admin.resultplacement.post")}}')"
                                                class="btn btn-warning"><i class="fas fa-edit"></i> Detay
                                        </button>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card bg-gradient-primary">

                    <div>


                        {!!(isset(json_decode($about[0]["sosial"])->maps)?(json_decode($about[0]["sosial"])->maps):"") !!}
                    </div>


                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Detay</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal-body" class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')
    <script>
        getmessage = (id, route) => {
            $.ajax({
                url: route,
                type: 'POST',
                data: {"id": id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                success: function (data) {
                    $("#modal-body").html(data);

                }

            });
        }

    </script>
    <style>
        iframe {
            width: 100%;
            height: 610px;
        }
    </style>
@stop

@extends('adminlte::page')
@section('title', 'Gelen Kutusu')

@section('content_header')

    <h3>Gelen Kutusu</h3>
@stop

@section('content')

    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Gelen kutusu</h3>

                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button  onclick="deleteall(event,'','{{route("admin.contact.deleteall")}}')" type="button" class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>

                    </div>
                    <!-- /.btn-group -->
                    <button type="button" onclick="location.reload()"  class="btn btn-default btn-sm">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <div class="float-right">
                        1-50/{{$total}}
                        <div class="btn-group">
                            {{ $data->links("pagination::bootstrap-4") }}
                        </div>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.float-right -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                        @foreach($data as $row)
                        <tr id="item_{{$row["id"]}}" >
                            <td>
                                <div class="icheck-primary">
                                    <input type="checkbox" name="ids[]" value="{{$row["id"]}}" id="check1">
                                    <label for="check1"></label>
                                </div>
                            </td>

                            <td class="mailbox-name"><a href="#">{{$row["name"]}}</a> (<span>{{$row["email"]}}</span>)  </td>
                            <td class="mailbox-subject">{{ mb_substr( strip_tags($row["subject"]) ,0,30) }}...
                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{$datetime->parse($row["updated_at"])->diffForHumans()}}</td>
                            <td>

                                <button class="btn btn-danger"
                                        onclick="deleteitem(event,'','{{route("admin.contact.delete",["id"=>$row["id"]])}}')">
                                    <i class="fas fa-trash"></i> Sil
                                </button>
                                <button class="btn btn-warning"  data-toggle="modal" onclick="getmessage('{{$row["id"]}}','{{route("admin.contact.getmessage")}}')"  data-target="#exampleModal">
                                    <i class="fas fa-book"></i> Oku
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button"   onclick="deleteall(event,'','{{route("admin.contact.deleteall")}}')"  class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>

                    </div>
                    <!-- /.btn-group -->
                    <button type="button" onclick="location.reload()"  class="btn btn-default btn-sm">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <div class="float-right ">
                        1-50/{{$total}}
                        <div class="btn-group ">
                            {{ $data->links("pagination::bootstrap-4") }}
                        </div>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.float-right -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div id="modal-body" class="modal-content">

            </div>
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')
    <script>


        $(function () {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function () {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for font awesome
            $('.mailbox-star').click(function (e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var fa    = $this.hasClass('fa')

                //Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })

        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif
 getmessage=(id,route)=>{
            $.ajax({
                url: route,
                type: 'POST',
                data: {"id":id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType : 'html',
                success: function (data) {
                $("#modal-body").html(data);

                }

            });
        }
    </script>
@stop

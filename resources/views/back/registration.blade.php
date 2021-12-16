@extends('adminlte::page')
@section('title', 'Ön Kayıt')

@section('content_header')

    <h3>Ön Kayıt Başvuruları</h3>
@stop

@section('content')


    <div class="d-flex justify-content-end">
        <button class="btn btn-danger mb-1 mr-2"  onclick="deleteall(event,'','{{route("admin.onkayit.deleteall")}}')" >Seçimleri Sil</button>

    </div>


    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>
                        <input onchange="checkedall(event,'ids[]')"  type="checkbox">
                    </th>
                    <th>
                     İsim
                    </th>

                    <th>Mail</th>
                    <th>Telefon</th>
                    <th>Zaman</th>
                    <th class="text-center" >Aksiyon</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr id="item_{{$row["id"]}}" >
                        <td>
                            <input name="ids[]" value="{{$row["id"]}}"  type="checkbox">
                        </td>
                        <td class="pl-0 pr-0" >

                            {{$row["name"]}}
                        </td>
                        <td>{{$row["mail"]}}</td>
                        <td>{{$row["tel"]}} </td>
                        <td>{{$datetime->parse($row["updated_at"])->diffForHumans()}}</td>
                        <td class="text-center pr-0 pl-0" >

                            <button  class="btn btn-warning"  data-toggle="modal" data-target="#exampleModal"  onclick="getmessage('{{$row["id"]}}','{{route("admin.onkayit.post")}}')" class="btn btn-warning" ><i class="fas fa-edit"></i> Detay</button>
                            <button class="btn btn-danger"  onclick="deleteitem(event,'','{{route("admin.onkayit.delete",["id"=>$row["id"]])}}')" ><i class="fas fa-trash"></i> Sil</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
        <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl"   role="document">

                <div  class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Başvuru Detayları</h5>
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
        $('#summernote').summernote({
            height: 400
        });
        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}","{!! \Session::get('type') !!}");
        @endif

        $(function () {
            $(document).ready(function() {
                $('#example1').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,

                });
            } );
        });

    </script>
@stop

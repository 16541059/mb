@extends('adminlte::page')
@section('title', 'Öğrenci Listesi')

@section('content_header')

    <h3>Öğrenci Listesi</h3>
@stop

@section('content')


    <div class="d-flex justify-content-end">
        <button class="btn btn-danger mb-1 mr-2"  onclick="deleteall(event,'','{{route("admin.users.deleteall")}}')" >Seçimleri Sil</button>

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
                    <th>Tc</th>
                    <th>
                        İsim
                    </th>

                    <th>Mail</th>
                    <th>Telefon</th>
                    <th>Seviye</th>
                    <th class="text-center" >Aksiyon</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr id="item_{{$row["id"]}}" >
                        <td>
                            <input name="ids[]" value="{{$row["id"]}}"  type="checkbox">
                        </td>
                        <td class="" >

                            {{$row["tc"]}}
                        </td>
                        <td class="" >

                            {{$row["name"]}}
                        </td>
                        <td>{{$row["email"]}}</td>
                        <td>{{$row["tel"]}} </td>
                        <td>{{$row["level"]}}</td>
                        <td class="text-center pr-0 pl-0" >
                            {{--     <a href="{{route("admin.resultplacement.detail",[$row["id"]])}}"> detay</a>--}}
                            <a  class="btn btn-warning" href="{{route("admin.users.edit",[$row["id"]])}}"    class="btn btn-warning" ><i class="fas fa-edit"></i> Düzenle</a>
                            <button class="btn btn-danger"  onclick="deleteitem(event,'','{{route("admin.users.delete",["id"=>$row["id"]])}}')" ><i class="fas fa-trash"></i> Sil</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
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

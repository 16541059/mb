@extends('adminlte::page')
@section('title', 'Slider')

@section('content_header')

    <h3>Slider Öğeleri</h3>
@stop

@section('content')



    <div class="d-flex justify-content-end">
        <button class="btn btn-danger mb-1 mr-2" onclick="deleteall(event,'','{{route("admin.slider.deleteall")}}')">
            Seçimleri Sil
        </button>
        <a class="btn btn-primary mb-1" href="{{route("admin.slider.add")}}">Slider Ekle</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Öğeler</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th>
                        <input onchange="checkedall(event,'ids[]')" type="checkbox">
                        Görsel
                    </th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th class="text-center">Aksiyon</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slider as $row)
                    <tr id="item_{{$row["id"]}}"  >

                        <td  id="item_{{$row["id"]}}" >
                            <input name="ids[]" value="{{$row["id"]}}" type="checkbox">
                            <img width="100" src="{{$row["images"]}}" alt="">
                        </td>
                        <td>{{$row["name"]}}</td>
                        <td>{{$row["title"]}}</td>
                        <td class="text-center pr-0 pl-0">
                            <a href="{{route("admin.slider.edit",["id"=>$row["id"]])}}" class="btn btn-warning"><i
                                    class="fas fa-edit"></i> Düzenle</a>
                            <button class="btn btn-primary"
                                    onclick="confirm(event,'Değitirmek istiyormusnuz','{{route("admin.slider.change",["id"=>$row["id"]])}}')">
                                <i class="fas fa-toggle-on"></i> {{$row["active"]?"Gizle":"Göster"}}</button>
                            <button class="btn btn-danger"
                                    onclick="deleteitem(event,'','{{route("admin.slider.delete",["id"=>$row["id"]])}}')">
                                <i class="fas fa-trash"></i> Sil
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')


@stop

@section('js')
    <script>


        @if (\Session::has('msg'))
        toast("{!! \Session::get('status') !!}", "{!! \Session::get('msg') !!}", "{!! \Session::get('type') !!}");
        @endif

        $(function () {
            $(document).ready(function () {
                $('#example1').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,

                });
            });
        });

    </script>
@stop

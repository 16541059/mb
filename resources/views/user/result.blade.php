@extends("layouts.backend")

@section('title', 'Bilgileriniz')

@section("content")
    <div class="container-fluid">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Sonuçlarınız</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Ana Sayfa</li>
                            <li class="breadcrumb-item active" aria-current="page">Sonuçlarınız</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <!-- Lists -->

                <div class="block block-rounded">

                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">#</th>
                                <th>Sınav</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Puan</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-semibold">
                                    <a href="be_pages_generic_blank.html">{{$row["exam"]["name"]}}</a>
                                </td>

                                <td class="d-none d-sm-table-cell">
                                    <span class="badge bg-success">{{$row["point"]}}</span>
                                </td>
                                <td>
                                    <em class="text-muted">
                                        <button type="button" class="btn btn-primary push" data-bs-toggle="modal" onclick="getmessage('{{$row["id"]}}','{{route("users.result.post")}}')" data-bs-target="#modal-block-extra-large">Cevaplarınız</button>
                                    {{--    <a href="{{route("users.result.detail",$row["id"])}}" class="btn btn-primary"> Cevaplarınız </a>--}}
                                    </em>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Dynamic Table with Export Buttons -->



        </div>
    </div>
    <div class="modal fade " id="modal-block-extra-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Cevaplarınız</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content"  id="modal-body"  >

                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js_after")

    <script src="{{asset("user/js/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons-jszip/jszip.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons/buttons.print.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/datatables-buttons/buttons.html5.min.js")}}"></script>
    <script src="{{asset("user/js/pages/tables_datatables.js")}}"></script>

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
</script>

@endsection

@section("css_before")
    <link rel="stylesheet" href="{{asset("user/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css")}} ">
    <link rel="stylesheet" href="{{asset("usser/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css")}}">
@endsection

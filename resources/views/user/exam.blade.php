@extends("layouts.backend")

@section('title', 'Bilgileriniz')

@section("content")
    <div class="container-fluid">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Sınavlar</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Ana Sayfa</li>
                            <li class="breadcrumb-item active" aria-current="page">Sınavlar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <!-- Lists -->
            @foreach($data as $row)
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-content block-content-full bg-primary-darker text-center">
                        <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                            <i class="fa fa-2x fa-file-signature text-white"></i>
                        </a>
                        <p class="text-white fs-3 fw-light mt-3 mb-0">
                            {{$row["name"]}}
                        </p>

                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-borderless table-striped table-hover">
                            <tbody>
                            <tr>

                                <td>
                                    <strong>Sınav Günü:</strong>
                                    <strong class="text-success">{{$datetime->parse($row["date"])->formatLocalized('%A %d %B %Y')}}</strong>
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    <strong>Sınav Saati:</strong>
                                    <strong class="text-success">{{$datetime->parse($row["time"])->timezone('Europe/Istanbul')->format('H:i')}}</strong>

                                </td>

                            </tr>
                            <tr>

                                <td>
                                    <strong>Sınav Süresi:</strong>
                                    <strong class="text-success">{{$row["max"]}} dk</strong>
                                </td>

                            </tr>
                            <tr>

                                <td>
                                    <strong>Soru Sayısı:</strong>
                                    <strong class="text-success">{{ count(json_decode($row["question"])) }} </strong>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                        @if (\Session::has('status'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('msg') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if( $datetime->parse($row["date"])->format("Y-d-m")==$datetime->now()->format("Y-d-m") && $datetime->now()->format("H:i:s") >= $datetime->parse($row["time"])->format("H:i:s") && $datetime->now()->format("H:i:s")<=$datetime->parse($row["time"])->addMinutes($row["max"])->format("H:i:s") )
                        <div class="text-center">
                            <a class="btn btn-sm btn-primary" href="{{route("users.exam.question",[$row["slug"]])}}">
                                <i class="fa fa-eye me-1 opacity-50"></i> Sınava Başla
                            </a>
                        </div>
                            @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

@section("js_after")
    <script>

        setTimeout(()=>{
            $(".alert").hide("slow")
        },3000)
    </script>
@endsection

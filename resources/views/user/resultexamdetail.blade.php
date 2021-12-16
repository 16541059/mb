{{--@extends("layouts.backend")

@section('title', 'Bilgileriniz')

@section("content")--}}
    <div class="container-fluid">
   {{--     <div class="bg-body-light">
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
        </div>--}}

        <div class="alert alert-info" role="alert">
            <div class="d-flex flex-row bd-highlight">
                <div class="p-2 bd-highlight">
                    <div class="foo" style="background-color: red"></div>
                    Yanlış Cevapladınız
                </div>
                <div class="p-2 bd-highlight">
                    <div class="foo" style="background-color: green"></div>
                    Doğru Cevapladınız
                </div>
                <div class="p-2 bd-highlight">
                    <div class="foo" style="background-color: #f39c12"></div>
                    Cevabınız
                </div>
            </div>
        </div>

        {{--  <div class="d-flex justify-content-end">
              <a class="btn btn-primary mb-3" href="{{route("admin.examresult.edit",["id"=>$data[0]["exam"]["id"]])}}">Sonuçlar</a>
          </div>--}}

        <div class="col-md-12">
            <!-- general form elements -->

            <!-- form start -->
            {!! Form::open(['route' => ['admin.exam.put',$data[0]["id"]],"enctype"=>"multipart/form-data"]) !!}

            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label('name', "Sınav İsmi") !!}
                    {!! Form::text('name',$data[0]["exam"]["name"],["class"=>"form-control","disabled"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date', "Sınav tarihi") !!}
                    {!! Form::date('date', $datetime->create($data[0]["date"]),["class"=>"form-control","disabled"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('time', "Sınav saati") !!}
                    {!! Form::text('time',$datetime->parse($data[0]["time"])->timezone('Europe/Istanbul')->format('H:i'),["class"=>"form-control","disabled"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('max', "Sınav Süresi dk") !!}
                    {!! Form::text('max',$data[0]["exam"]["max"],["class"=>"form-control","disabled"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('level', "Seviyesi") !!}
                    {!! Form::select('level', ['A1' => 'A1', 'A2' => 'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'],$data[0]["level"],["class"=>"form-control","disabled"])!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('total', "Doğru Soru Sayısı ") !!}
                    {!! Form::number('total',$trueans,["class"=>"form-control","disabled"])!!}

                </div>
                <div class="form-group ">
                    {!! Form::label('total', "Yanlış Soru Sayısı ") !!}
                    {!! Form::number('total',$total-$trueans,["class"=>"form-control","disabled"])!!}

                </div>
                <div class="form-group ">
                    {!! Form::label('total', "Toplam Soru Sayısı ") !!}
                    {!! Form::number('total',$total,["class"=>"form-control","disabled"])!!}

                </div>
            </div>
            <hr>
            <h3>Sorular</h3>

            <div id="">

                @foreach(json_decode($data[0]["exam"]["question"]) as $key=>$row )

                    <hr>
                            <div class="card-body">

                                @foreach($row as $keys=>$value)

                                    @php
                                        $val=   explode( '_', $keys );
                                    @endphp
                                    @switch($val[0])
                                        @case("image")

                                        <div class="form-group">
                                            @if(!empty($value))
                                                <img width="25%" class="img-thumbnail elevation-2  mb-2"
                                                     src="{{$value}}">
                                            @endif

                                        </div>

                                        @break
                                        @case("question")
                                        <div class="alert alert-info" role="alert">
                                            <div class="form-group">
                                                <div class="callout callout-info">
                                                    {!! ($key + 1) !!})Soru    {!! $value !!}
                                                </div>

                                            </div>
                                        </div>

                                        @php
                                            $userresutl= !empty( $result->$keys)?$result->$keys:$keys
                                        @endphp

                                        @break
                                    <div>
                                        @case("answera")

                                        <div class="form-group   ">
                                            {!! Form::label("a", "Doğru Cevap:", ["class" => "col-form-label"]) !!}
                                            {!! Form::text("answera[$key]",$value, ["class" => "form-control ", "disabled", "id" => "a","style"=> ($value==$userresutl?"background-color: #00b44e":"background-color:red") ]) !!}

                                        </div>
                                        @break
                                        @case("answerb")
                                        <div class="form-group  ">
                                            {!! Form::label("b", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                            {!! Form::text("answerb[$key]",$value, ["class" => "form-control ", "disabled", "id" => "b","style"=> ($value==$userresutl?"background-color: #f39c12":"")  ]) !!}
                                        </div>
                                        @break

                                        @case("answerc")
                                        <div class="form-group  ">
                                            {!! Form::label("answerc[$key]", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                            {!! Form::text("answerc[$key]", $value, ["class" => "form-control ", "disabled", "id" => "c","style"=> ($value==$userresutl?"background-color: #f39c12":"")]) !!}
                                        </div>
                                        @break

                                        @case("answerd")
                                        <div class="form-group  ">
                                            {!! Form::label("answerd[$key]", "Yanlış Cevap:", ["class" => "col-form-label"]) !!}
                                            {!! Form::text("answerd[$key]",$value, ["class" => "form-control ", "disabled", "id" => "d","style"=> ($value==$userresutl?"background-color: #f39c12":"")]) !!}
                                        </div>
                                        @break
                                        @default

                                    @endswitch

                                @endforeach
                            </div>

                @endforeach
            </div>


            <!-- /.card-body -->
        </div>


    </div>
    </div>

{{--@endsection--}}


<style>
    .foo {
        float: left;
        width: 20px;
        height: 20px;
        margin: 5px;
        border: 1px solid rgba(0, 0, 0, .2);
    }
</style>

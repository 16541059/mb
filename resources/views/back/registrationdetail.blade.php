

    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kişi Bilgileri</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open() !!}

                <div class="card-body">

                    <div class="form-group">
                        {!! Form::label('', "İsim") !!}
                        {!! Form::text('',$data[0]["name"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Mail") !!}
                        {!! Form::text('',$data[0]["mail"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('', "Telefon") !!}
                        {!! Form::text('',$data[0]["tel"],["class"=>"form-control","readonly"]) !!}
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="custom-control custom-switch mb-2">

                                {!! Form::checkbox('male',"male",json_decode($data[0]["extra"])->gender=="male",["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                                {!! Form::label('male', "Erkek",["class"=>"custom-control-label"]) !!}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-switch mb-2">
                                {!! Form::checkbox('female',"female",json_decode($data[0]["extra"])->gender=="female",["class"=>"custom-control-input","id"=>"female","disabled"]) !!}
                                {!! Form::label('female', "Kadın",["class"=>"custom-control-label "]) !!}
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>

        </div>

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ne Üzerine Eğitim Almak İstiyorsunuz ?</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open() !!}

                <div class="card-body">

                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->genelingilizce),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Genel İngilizce",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->konusmaisingilizcesi),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Konuşma ve İş İngilizcesi",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->homeschooling),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "HomeSchooling ( Çift Diploma )",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->online),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Online İngilizce",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->sinav),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Sınav İngilizcesi",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row pb-3 ">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->meslek),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Meslek Garantili Sertifika Programları",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary pb-5">
                <div class="card-header">
                    <h3 class="card-title">Bu Eğitimleri Ne için Almak İstiyorsunuz ?</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open() !!}

                <div class="card-body">

                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->is),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "İş İçin",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->turizim),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Turizm / Gezi İçin",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->ogrenmek),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Öğrenmek İstediğim İçin ",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>

        </div>

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Hangi Zaman Dilimi Size Uygun ?</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open() !!}

                <div class="card-body">

                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->zaman=="haftaicisaban"),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Haftaiçi Sabah Grubu",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->zaman=="haftaiciaksam"),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Haftaiçi Akşam Grubu",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->zaman=="haftasonusaban" ),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Haftasonu Sabah Grubu",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->zaman=="haftasonuaksam" ),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Haftasonu Akşam Grubu",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary pb-5">
                <div class="card-header">
                    <h3 class="card-title">Eğitiminizi Nasıl Almak İstersiniz ?</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open() !!}

                <div class="card-body">

                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->egitimtur=="yuzyuze"),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Yüz Yüze Sınıf Ortamında",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->egitimtur=="birebir"),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Bire Bir Özel Ders",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="custom-control custom-switch mb-2">

                            {!! Form::checkbox('',"",(json_decode($data[0]["extra"])->egitimtur=="online"),["class"=>"custom-control-input","id"=>"male","disabled"]) !!}
                            {!! Form::label('', "Vaktim Yok Online İstiyorum",["class"=>"custom-control-label"]) !!}

                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                {!! Form::close() !!}
            </div>

        </div>

    </div>


@extends('adminlte::page')
@section('title', 'Refaranslar')

@section('content_header')

    <h3>Referans</h3>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                   Referans Ekle
                </div>
                <div class="card-body">
                    <div id="actions" class="row">
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Fotoğraf Seç</span>
                      </span>
                                <button type="submit" class="btn btn-primary col start">
                                    <i class="fas fa-upload"></i>
                                    <span>Yükle</span>
                                </button>
                                <button type="reset" class="btn btn-warning col cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>İptal</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table table-striped files" id="previews">
                        <div id="template" class="row mt-2">
                            <div class="col-auto">
                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                            </div>
                            <div class="col d-flex align-items-center">
                                <p class="mb-0">
                                    <span class="lead" data-dz-name></span>
                                    (<span data-dz-size></span>)
                                </p>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Yükle</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>İptal</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        <span>Sil</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-danger mb-1 mr-2" onclick="deleteall(event,'','{{route("admin.refrans.deleteall")}}')">
            Seçimleri Sil
        </button>

    </div>



    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Referanslar</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($data as $row)
                        <div id="item_{{$row["id"]}}"  class="col-sm-2  ">

                            <a href="{{$row["image"]}}" data-toggle="lightbox" data-title="{{$row["name"]}}" data-gallery="gallery">
                                <img src="{{$row["image"]}}" class="img-fluid mb-2" alt="white sample"/>
                            </a>
                            <button class="btn btn-secondary"  > <input name="ids[]" class="check-box"  value="{{$row["id"]}}"  type="checkbox"></button>
                            <button class="btn btn-danger"  onclick="deleteitem(event,'','{{route("admin.refrans.delete",["id"=>$row["id"]])}}')" ><i class="fas fa-trash"></i> Sil</button>

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


        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "{{route("admin.refrans.post")}}", // Set the url
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoProcessQueue: true,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            let i=0;
            caption = file.caption == undefined ? "" : file.caption;
            file._captionBox = Dropzone.createElement("<input  class='form-control mt-3 ' type='text' placeholder='Görsel ismi Girin' name='name' value="+caption+" >");
            file.previewElement.appendChild(file._captionBox)
            file.previewElement.querySelector(".start").onclick = function() {
                if(file._captionBox.value!=""){

                    myDropzone.enqueueFile(file)
                }else{
                    toast("Başarısızı","Lütfen İsim Alanlarını Doldurunuz", "bg-danger");
                }

            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file,xhr,formData) {
            // Show the total progress bar when upload starts
            // And disable the start button

            formData.append('name',file._captionBox.value);
            document.querySelector("#total-progress").style.opacity = "1"
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")


        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })
        myDropzone.on("success", function(file, response) {
            toast(response["status"],response["msg"] , response["type"]);
            setTimeout(function(){ location.reload() }, 2000);
        })
        myDropzone.on("error", function(file, response) {
            $.each(response["errors"], function(index, value) {
                toast("Başırısız",value[0], "bg-danger");
            });
            $(".text-danger").hide();
        })
        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.

        check=(value)=>{
            var valid = true;
            $.each(value, function(index, value) {
                if(value.value==""){
                    toast("Başırısız","İsim Alanları Gerekli", "bg-danger");
                    return valid = false;
                }

            });
            return valid;
        }
        document.querySelector("#actions .start").onclick = function() {
            if(check($("input[name='name']"))){
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)

        }

        // DropzoneJS Demo Code End
    </script>
@stop

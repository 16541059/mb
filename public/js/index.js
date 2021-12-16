deleteitem = (event, message, route) => {
    event.preventDefault();

    Swal.fire({
        title: 'Silmek istediğinize eminmisiniz?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Hayır",
        confirmButtonText: 'Evet'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = route
        }
    })
}
toast = (title, body, cls) => {
    $(document).Toasts('create', {
        fade: true,
        delay: 3000,
        class: cls,
        title: title,
        body: body,
        autohide: true,
    })
}

confirm = (event, message, route) => {
    event.preventDefault();

    Swal.fire({
        title: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Hayır",
        confirmButtonText: 'Evet'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = route
        }
    })
}
checkedall = function (event, name) {
    var check = event.target.checked;
    if (check) {
        $('input[name="' + name + '"]').prop('checked', true);
    } else {
        $('input[name="' + name + '"]').prop('checked', false);
    }
}

deleteall = (event, message, route) => {
    event.preventDefault();
    Swal.fire({
        title: 'Silmek istediğinize eminmisiniz?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Hayır",
        confirmButtonText: 'Evet'
    }).then((result) => {
        if (result.isConfirmed) {
            let ids = $('input[name="ids[]"]').serialize()
            let array = $('input[name="ids[]"]').map(function (){return this.checked?this.value:null});
            $.ajax({
                url: route,
                type: 'POST',
                data: ids,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (data) {
                    toast(data["status"], data["msg"],data["type"]);
                    $.each( array, function( i, val ) {
                        $("#item_"+val).hide("slow");
                    });
                    $('input[name="ids[]"]').prop('checked', false);
                }

            });
        }
    })
}

function goToByScroll(id) {
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top
    }, 'slow');
}


privacy = (value) => {
    $("#privacymodal").text(value)
}

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}

saveabone = (route) => {
    let val = $("input[name='abonemail']").val();
    let check = !validateEmail(val) ? false : true;
    if (check) {
        $.ajax({
            url: route,
            type: "post",
            data: {"value": val},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                $("#alertmail").html(response["message"]);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // console.log(textStatus, errorThrown);
            }
        });
    } else {
        $("#alertmail").html("Geçersiz email adresi");
    }

}

setTimeout(()=>{
    $(".alert").hide("slow")
},5000)

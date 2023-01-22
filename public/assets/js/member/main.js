let token = $('meta[name="csrf-token"]').attr("content");
let privacyModal =$("#User_privacy");
let notification_status = {
    success: 'success',
    danger: 'danger',
    warning: 'warning',
    primary: 'primary'
}

let emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

$(() => {
    $(".logout").on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
        $('body').fadeOut(1000);
        ajax('/member/logout', 'POST', '', function () {
            window.location = '/'
        });
    });

    $('.sidebar-menu a').on('click', () => {
        // $('body').slideDown();
    })

    privacyModal.modal({
        backdrop: 'static',
        keyboard: false,
        show: true
    });

    privacyModal.modal("show");



    $('#check-privacy').on('change',function (){
        ajax('/member/check-privacy','POST','',function (){
            privacyModal.modal("hide");
        })
    })

    $('.de-gray-input').on('click',function (){
        $(this).parent().parent().parent().find('input').prop('disabled', false);
        $(this).hide();
        $(this).parent().parent().find('.btn-action').show();
    })

})

function alert_403() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Please Verify Your Account!',
        footer: '<a href="/member/profile">Verify Now?</a>'
    })
}

function alert_success(message = ""){
    Swal.fire({
        icon: 'success',
        title: 'Successfully',
        text: message,
    })
}

function alert_validation_error(message = "Your Action Validation Have Error"){
    Swal.fire({
        icon: 'danger',
        title: 'Opss..',
        text: message,
    })
}



function ajax(url, type = "GET", data, callback) {
    $.ajax({
        url: url,
        cache: true,
        type: type,
        async: true,
        data: data ? data : null,
        headers: {
            'X-CSRF-TOKEN': token
        },
    }).done(async function (response) {
        if (typeof callback == 'function') {
            callback(response);
        }
    }).fail(async function (error) {
        if (typeof callback == 'function') {
            callback(error);
            // setNotification(error.responseJSON.message, notification_status.danger);
            if (error.status == 403){
                alert_403();
            }
        }
        console.log(error);
    });
}

function uploadAjax(url, type = "GET", data, callback,errorHandlerElement = $('#errors')) {
    try {
        $.ajax({
            url: url,
            cache: false,
            type: type,
            async: true,
            dataType: 'json',
            data: data ? data : null,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': token
            },
        }).done(async function (response) {
            if (typeof callback == 'function') {
                callback(response);
                errorHandlerElement.html('');
            }
            console.log('response => ',response);
        }).fail(async function (error) {
            if (typeof callback == 'function') {
                callback(error);
                if(error.status == '422'){
                    let messages = JSON.parse(error.responseJSON.message);
                    errorHandlerElement.html('');
                    $.each(messages , function (key,values){
                    let items= '';
                        values.forEach(function (value,index){
                            let item = '<li><span>'+value+'</span></li>'
                            items+=item;
                        })
                        let row = '' +
                            '<li>' +
                            '    <span>'+key+'</span>' +
                            '     <ul>' +
                            items +
                            '    </ul>' +
                            '</li>'
                        errorHandlerElement.append(row);
                    })
                    alert_validation_error();
                    $('html, body').animate({
                        scrollTop: $(errorHandlerElement).offset().top
                    }, 2000);
                }
                else if (error.status == 403){
                    alert_403();
                }
            }
            console.log('error => ',error.responseJSON.message['name']);
        });
    } catch (ex) {
        alert(ex);
    }
}

function checkValidation(element = $('body')) {
    let trust = true;
    element.find('.required').each((index, item) => {
        console.log($(item).prop('type'));
        if (!$(item).val()) {
            trust = false;
            $(item).addClass('_error');
            $(item).parent().find('small').html('Please Complete This Field!');
        } else if ($(item).attr('type') == 'email' && !emailRegex.test($(item).val())) {
            trust = false;
            $(item).addClass('_error');
            $(item).parent().find('small').html('Format Email Not Correct!');
        } else {
            $(item).removeClass('_error');
            $(item).parent().find('small').html('');

        }
    })
    if (!trust) {
        setNotification('Please Fill Required Fields', notification_status.danger);
        $('body').animate({
            scrollTop: $("._error").offset().top - 200
        }, 1000);
    }
    return trust;
}
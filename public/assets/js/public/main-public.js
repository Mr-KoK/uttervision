let token = $('meta[name="csrf-token"]').attr("content");
let emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
let spinner = $('._spinner');
let notification_status = {
    success: 'success',
    danger: 'danger',
    warning: 'warning',
    primary: 'primary'
}
let removeNotifications = false;

function ajax(url, type = "GET", data,callback) {
    console.log('token',token)
    $.ajax({
        url: url,
        cache:true,
        type: type,
        async: true,
        data: data ? data : null,
        headers: {
            'X-CSRF-TOKEN': token
        },
    }).done(async function (response,jqXHR) {
        console.log(response); // predefined logic if any
        if(typeof callback == 'function') {
            callback(response,jqXHR);
        }
    })
        .fail(async function (error,jqXHR) {
            if(typeof callback == 'function') {
                callback(error,jqXHR);
                setNotification(error.responseJSON.message, notification_status.danger);
                console.log(error.responseJSON)
            }
        });
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

function setNotification(message, status) {
    let notifications_list = $('._notifications-holder');
    let notification = '<div class="notification-item animateOpen ' + status + '"><i class="fa fa-close _notification-close"></i><p class="text-message">' + message + '</p></div> ';
    notifications_list.append(notification);
    watch_notifications();
}

function watch_notifications() {
    $('.notification-item').on('click', function (e) {
        $(this).fadeOut();
    });
    removeNotifs();
}

function removeNotifs() {
    if (!removeNotifications) {
        removeNotifications = true
        $('._notifications .notification-item').each(function (index, item) {
            setTimeout(function () {
                $(item).removeClass('animateOpen');
                $(item).addClass('animateClose');
                $(item).fadeOut(3000);
            }, 5000)
        })
        removeNotifications = false;
    }
}
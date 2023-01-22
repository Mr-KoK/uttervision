let token = $('meta[name="csrf-token"]').attr("content");
let removeNotifications = false;
let coverImage = $('._cover-img');
let menuBtn = $('.menu-hamburger-icon');
let sidebar = $('._sidebar');
let backDrop = $('._back-drop');
let accountCollapseBtn = $('._account-holder .collapse-btn');
let accountCollapseBody = $('._account-holder .collapse-body');
let notificationCollapseBtn = $('.Notifications .collapse-btn');
let notificationCollapseBody = $('.Notifications .collapse-body');

let notification_status = {
    success: 'success',
    danger: 'danger',
    warning: 'warning',
    primary: 'primary'
}
let emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
$(document).ready(function () {
    menuBtn.on('click', function () {
        sidebar.addClass('show');
        backDrop.addClass('show');
        $('body').addClass('_overflow-hidden');
    });
    $('._spinner').on('click',function (e){
        e.stopPropagation();
        e.preventDefault();
    })
    backDrop.on('click', function () {
        sidebar.removeClass('show');
        backDrop.removeClass('show');
        $('body').removeClass('_overflow-hidden');
    });
    $('body').on('click', function () {
        accountCollapseBody.fadeOut();
        notificationCollapseBody.fadeOut();
    })
    accountCollapseBtn.on('click', function (e) {
        e.stopPropagation();
        accountCollapseBody.fadeToggle();
        notificationCollapseBody.fadeOut();
    });
    notificationCollapseBtn.on('click', function (e) {
        e.stopPropagation();
        notificationCollapseBody.fadeToggle();
        accountCollapseBody.fadeOut();
    });

    $(".btn-logout").on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
        $('body').fadeOut(1000);
        console.log('click');
        $.ajax({
            url: "/admin/logout",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                window.location = '/admin/login'
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
})



function resetModal(element = $('body')){
    element.find('input').each(function (index,item){
        $(item).val('');
    })
    element.find('select').each(function (index,item){
        $(item).prop('selectedIndex',0);
    })
    element.find('.modal-body .q-answers-holder').html('');
    element.find('.answer-box').remove();
}

function fillSummery() {
    let holder = $('._summery-items');
    holder.html('');
    $('input.required').each(function (index, item) {
        $(item).on('input change', function () {

        });
        let label = $(item).parent().find('p').text();
        let value = $(item).val();
        let id = $(item).attr('id');
        let className = '.su-' + id;
        let div = '<div class="object">' +
            '<label  for="' + id + '"><p>' + label + '</p>' +
            '<input id="su-' + id + '" class="su-' + id + '" type="text" readonly value="' + value + '"/>' +
            '</label>' +
            '</div>    ';
        holder.append(div);
        $(item).on('input change', function (e) {
            console.log(className);
            let val = $(this).val();
            holder.find(className).val(val);
        });

    });

}

function ajax(url, type = "GET", data,callback) {
    console.log('data',data)
    $.ajax({
        url: url,
        cache:true,
        type: type,
        async: true,
        data: data ? data : null,
        headers: {
            'X-CSRF-TOKEN': token
        },
    }).done(async function (response) {
        console.log(response); // predefined logic if any
        if(typeof callback == 'function') {
            callback(response);
        }
    })
        .fail(async function (error) {
            if(typeof callback == 'function') {
                callback(error);
                setNotification(error.responseJSON.message, notification_status.danger);
                console.log(error.responseJSON)
            }
        });
}

function checkCoverImage() {
    let src = coverImage.attr('src');
    if (!src.includes('avatar-placeholder')) {
        coverImage.parent().find('.remove-image-btn').show();
    } else {
        coverImage.parent().find('.remove-image-btn').hide();
    }
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

function setNotification(message, status) {
    let notifications_list = $('._notifications-holder');
    let notification = '<div class="notification-item animateOpen ' + status + '"><i class="fa fa-close _notification-close"></i><p class="text-message">' + message + '</p></div> ';
    notifications_list.append(notification);
    watch_notifications();
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
let verifyRegister = false;

$(document).ready(function () {
    $('.register-form').find('.icon-eye').on('click', function () {
        let type = $(this).parent().find('input').attr('type');
        if (type == 'password') {
            $(this).parent().find('input').attr('type', 'text');
        } else {
            $(this).parent().find('input').attr('type', 'password');
        }
    })
})
function checkPassword(element){
    let trust = true;
    let password = $('#reg-password-id')
    let confirm = $('#reg-confirm-password-id');
            if(password.val() !== confirm.val()){
                setNotification('Passwords are not equal',notification_status.danger);
                trust = false;
            }
    if (trust){
        password.removeClass('error');
        confirm.removeClass('error');
    }else {
        confirm.addClass('error');
        password.addClass('error');
    }
    return trust;
}

function stepRegister(callback){
    if (!checkValidation($('.register-form'))) {
        return;
    }else if(!checkPassword($('.register-form'))){
        return;
    }else if(!verifyRegister){
        setNotification('please answer reCaptcha',notification_status.danger);
        return;
    }
    else {
        let data = {
            email: $('.register-form #reg-email').val(),
            password: $('.register-form #reg-password-id').val()
        }
        let inputEmail = $('.register-form .email-holder input');
        let inputPassword = $('.register-form .password-holder input');
        let registerBtn = $('.register-form .btn-login');
        $.ajax({
            url: `/member/create?email=` + data.email +
                "&password=" + data.password,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            beforeSend: () => {
                spinner.addClass('show');
                $('.btn-login').attr('disabled', true);
            },
            success: async function (data) {
                // window.location = '/member/dashboard';
                $("input[name=email]").removeClass('error');
                $("input[name=password]").removeClass('error');
                $('.error-login').text('');
                // $('body').fadeOut();

                if(typeof callback == 'function') {
                    callback(data);
                }
            },
            error: async function (error) {
                switch (error.status) {
                    case 500 :
                        console.log(error);
                        spinner.removeClass('show');
                        setNotification('Server Not Okay', notification_status.danger)
                        registerBtn.attr('disabled', false);
                        break;
                    case 422:
                        spinner.removeClass('show');
                        setNotification('The Given Data Was Invalid', notification_status.danger);
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        registerBtn.attr('disabled', false);
                        break;
                    case 423:
                        setNotification('Your Account Has Been Locked', notification_status.danger);
                        spinner.removeClass('show');
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        registerBtn.attr('disabled', false);
                        break;
                        case 409 :
                        setNotification('Sry This User Is Exist!', notification_status.danger);
                        spinner.removeClass('show');
                        inputEmail.addClass('error');
                        registerBtn.attr('disabled', false);
                        break;
                    default:
                        spinner.removeClass('show');
                        setNotification('We Have a Problem Contact With Our Support', notification_status.danger);
                        registerBtn.attr('disabled', false);
                        break;
                }
                if(typeof callback == 'function') {
                    callback(error);
                }
            }
        });

    }
}

function register(){
    if (!checkValidation($('.register-form')) && checkPassword($('.register-form'))) {
        return;
    }
    else if(!verifyRegister){
        setNotification('please answer reCaptcha',notification_status.danger);
        $('#re-1').addClass('error');
        return;
    }
    else {
        let data = {
            email: $('.register-form #reg-email').val(),
            password: $('.register-form #reg-password-id').val()
        }
        let inputEmail = $('.register-form .email-holder input');
        let inputPassword = $('.register-form .password-holder input');
        let registerBtn = $('.register-form .register-btn');
        $.ajax({
            url: `/member/create?email=` + data.email +
                "&password=" + data.password,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            beforeSend: () => {
                spinner.addClass('show');
                $('.btn-login').attr('disabled', true);
            },
            success: function (data) {
                spinner.removeClass('show');
                window.location = '/member/dashboard';
                $('.captcha-holder').removeClass('error');
                inputEmail.removeClass('error');
                inputPassword.removeClass('error');
                $('.register-form .error-login').text('');
                $('body').fadeOut();

                if(typeof callback == 'function') {
                    callback(data);
                }
            },
            error: function (error) {
                switch (error.status) {
                    case 500 :
                        spinner.removeClass('show');
                        setNotification('Server Not Okay', notification_status.danger)
                        registerBtn.attr('disabled', false);
                        break;
                    case 422:
                        spinner.removeClass('show');
                        setNotification('The Given Data Was Invalid', notification_status.danger);
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        registerBtn.attr('disabled', false);
                        break;
                        case 409:
                        spinner.removeClass('show');
                        setNotification('User Is Exist!', notification_status.danger);
                        inputEmail.addClass('error');
                        inputPassword.removeClass('error');
                        registerBtn.attr('disabled', false);
                        break;
                    case 423:
                        setNotification('Your Account Has Been Locked', notification_status.danger);
                        spinner.removeClass('show');
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        registerBtn.attr('disabled', false);
                        break;
                    default:
                        spinner.removeClass('show');
                        setNotification('We Have a Problem Contact With Our Support', notification_status.danger);
                        registerBtn.attr('disabled', false);
                        break;
                }
                if(typeof callback == 'function') {
                    callback(error);
                }
            }
        });

    }
}
function verifyRegisterForm(e){
    verifyRegister =true;
    $('.captcha-holder').removeClass('error');
}
function verifyExpireRegisterForm(){
    verifyRegister =false;
}

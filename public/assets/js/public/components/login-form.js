let verifyLogin = false;
$(document).ready(function () {
    $('.login-form').find('.icon-eye').on('click', function () {
        let type = $(this).parent().find('input').attr('type');
        if (type == 'password') {
            $(this).parent().find('input').attr('type', 'text');
        } else {
            $(this).parent().find('input').attr('type', 'password');
        }
    })


})
function stepLogin(callback){
    if (!checkValidation($('.login-form'))) {
        return;
    }else if(!verifyLogin){
        setNotification('please answer reCaptcha',notification_status.danger);
        $('#le-1').addClass('error');
        return;
    } else {
        let data = {
            email: $('.login-form #email').val(),
            password: $('.login-form #password-id').val()
        }
        let inputEmail = $('.login-form .email-holder input');
        let inputPassword = $('.login-form .password-holder input');
        let loginBtn = $('.login-form .btn-login');
        $.ajax({
            url: `/member/step-login?email=` + data.email +
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
                $('.captcha-holder').removeClass('error');
                inputEmail.removeClass('error');
                inputPassword.removeClass('error');
                $('.error-login').text('');
                $('body').fadeOut();

                if(typeof callback == 'function') {
                    callback(data);
                }
            },
            error: async function (error) {
                switch (error.status) {
                    case 500 :
                        spinner.removeClass('show');
                        setNotification('Server Not Okay', notification_status.danger)
                        loginBtn.attr('disabled', false);
                        break;
                    case 422:
                        spinner.removeClass('show');
                        setNotification('The Given Data Was Invalid', notification_status.danger);
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        loginBtn.attr('disabled', false);
                        break;
                    case 423:
                        setNotification('Your Account Has Been Locked', notification_status.danger);
                        spinner.removeClass('show');
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        loginBtn.attr('disabled', false);
                        break;
                    default:
                        spinner.removeClass('show');
                        setNotification('We Have a Problem Contact With Our Support', notification_status.danger);
                        loginBtn.attr('disabled', false);
                        break;
                }
                if(typeof callback == 'function') {
                    callback(error);
                }
            }
        });

    }
}

function login(){
    if (!checkValidation($('.login-form'))) {
        return;
    }else if(!verifyLogin){
        setNotification('please answer reCaptcha',notification_status.danger);
        $('#le-1').addClass('error');
        return;
    } else {
        let data = {
            email: $('.login-form #email').val(),
            password: $('.login-form #password-id').val()
        }
        let inputEmail = $('.login-form .email-holder input');
        let inputPassword = $('.login-form .password-holder input');
        let loginBtn = $('.login-form .btn-login');
        $.ajax({
            url: `/member/login?email=` + data.email +
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
                $('#le-1').removeClass('error');
                inputEmail.removeClass('error');
                inputPassword.removeClass('error');
                $('.error-login').text('');
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
                        loginBtn.attr('disabled', false);
                        break;
                    case 422:
                        spinner.removeClass('show');
                        setNotification('The Given Data Was Invalid', notification_status.danger);
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        loginBtn.attr('disabled', false);
                        break;
                    case 423:
                        setNotification('Your Account Has Been Locked', notification_status.danger);
                        spinner.removeClass('show');
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        loginBtn.attr('disabled', false);
                        break;
                    default:
                        spinner.removeClass('show');
                        setNotification('We Have a Problem Contact With Our Support', notification_status.danger);
                        loginBtn.attr('disabled', false);
                        break;
                }
                if(typeof callback == 'function') {
                    callback(error);
                }
            }
        });

    }
}

function partnerLogin(){
    if (!checkValidation($('.login-form'))) {
        return;
    }else if(!verifyLogin){
        setNotification('please answer reCaptcha',notification_status.danger);
        $('#le-1').addClass('error');
        return;
    } else {
        let data = {
            email: $('.login-form #email').val(),
            password: $('.login-form #password-id').val()
        }
        let inputEmail = $('.login-form .email-holder input');
        let inputPassword = $('.login-form .password-holder input');
        let loginBtn = $('.login-form .btn-login');
        $.ajax({
            url: `/partner/login?email=` + data.email +
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
                window.location = '/partner/dashboard';
                $('#le-1').removeClass('error');
                inputEmail.removeClass('error');
                inputPassword.removeClass('error');
                $('.error-login').text('');
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
                        loginBtn.attr('disabled', false);
                        break;
                    case 422:
                        spinner.removeClass('show');
                        setNotification('The Given Data Was Invalid', notification_status.danger);
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        loginBtn.attr('disabled', false);
                        break;
                    case 423:
                        setNotification('Your Account Has Been Locked', notification_status.danger);
                        spinner.removeClass('show');
                        inputEmail.addClass('error');
                        inputPassword.addClass('error');
                        loginBtn.attr('disabled', false);
                        break;
                    default:
                        spinner.removeClass('show');
                        setNotification('We Have a Problem Contact With Our Support', notification_status.danger);
                        loginBtn.attr('disabled', false);
                        break;
                }
                if(typeof callback == 'function') {
                    callback(error);
                }
            }
        });

    }
}

function verifyLoginForm(e){
    verifyLogin =true;
    $('.captcha-holder').removeClass('error')
}
function verifyExpireLoginForm(){
    verifyLogin =false;
}

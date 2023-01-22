$(document).ready(function (){
    $('.register-action').on('click',function (){
        $('.init-auth-step').hide();
        $('.login-form').hide();
        $('.register-form').fadeIn();
    })

    $('.login-action').on('click',function (){
        $('.init-auth-step').hide();
        $('.register-form').hide();
        $('.login-form').fadeIn();
    })

    $('.register-btn').on('click',function (){
        register(function (response){
            if (response.success) {
                alert('success');
            }
            else {
                alert('sry');
            }
        });
    })

    $('.login-form .login-btn').on('click', function () {
        login(function (response) {
            if (response.success) {
                if (response.success) {
                    alert('success');
                }
                else {
                    alert('sry');
                }
            }
        });
    })

    $('.social-login').on('click',function (){
        $('body').fadeOut();
    })

    $('.login-form .partner-login-btn').on('click', function () {
        partnerLogin(function (response) {
            if (response.success) {
                if (response.success) {
                    alert('success');
                }
                else {
                    alert('sry');
                }
            }
        });
    })
})
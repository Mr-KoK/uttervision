$(document).ready(function() {
    let spinner = $('._spinner');
    $('.btn-under-bit').on('click', function() {
        navigator.clipboard.writeText('www.uttervision.com')
        $('.copy-notification').fadeIn();
        setTimeout(() => {
            $('.copy-notification').fadeOut();
        }, 400);
    });
    $('.input-group-text-password').on('click', function() {
        let input = $(this).closest('.input-group').find('input[name=password]');
        if ($(input).attr('type') == 'password') {
            $(input).attr('type', 'text');
        } else {
            $(input).attr('type', 'password');
        }
    });


    $('form[name=form]').on('submit', function(e) {
        // var url_root = '/';
        e.preventDefault();
        console.log('$(\'meta[name="csrf-token"]\').attr(\'content\')',$('meta[name="csrf-token"]').attr('content'))
        spinner.addClass('show');
        $('.btn-login-login').attr('disabled',true);
        $.ajax({
            url: `/admin/login?email=` + $("input[name=email]").val() +
                "&password=" + $("input[name=password]").val(),
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data.status==200){
                    spinner.removeClass('show');
                    window.location = '/admin/';
                    $("input[name=email]").removeClass('error');
                    $("input[name=password]").removeClass('error');
                    $('.error-login').text('');
                    $('body').fadeOut();
                }else{

                }
            },
            error: function(error) {
                switch (error.status){
                    case 500 :
                        spinner.removeClass('show');
                        $('.error-login').text('Server Not Okay');
                        $('.btn-login-login').attr('disabled',false);
                        break;
                    case 422:
                        spinner.removeClass('show');
                        $('.error-login').text('The Given Data Was Invalid');
                        $("input[name=email]").addClass('error');
                        $("input[name=password]").addClass('error');
                        $('.btn-login-login').attr('disabled',false);
                        break;
                    case 423:
                        console.log();
                        setNotification(error.responseText,notification_status.danger);
                        spinner.removeClass('show');
                        $('.error-login').text('Your Account Has Been Locked');
                        $("input[name=email]").addClass('error');
                        $("input[name=password]").addClass('error');
                        $('.btn-login-login').attr('disabled',false);
                        break;
                    default:
                        spinner.removeClass('show');
                        $('.error-login').text('We Have a Problem Contact With Our Support');
                        $('.error-login').text(error);
                        $('.btn-login-login').attr('disabled',false);
                        break;
                }


            }
        });
    })
});


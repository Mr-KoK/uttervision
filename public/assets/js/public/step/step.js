$(document).ready(function () {
    $('.answers_box input[type=radio]').on('change', function (e) {
        let id = $(this).attr('ans-id');
        $(this).parent().parent().parent().find('.question-answer-holder .quest-holder').removeClass('active').hide();
        $(this).parent().parent().parent().find('.question-answer-holder .' + id).addClass('active').fadeIn();
    })
    $('.answers_box input[type=checkbox]').on('change', function (e) {
        $(this).parent().parent().parent().find('.amswer-item').each(function (ansKey, answer) {
            let id = $(answer).find('input').attr('ans-id');
            if ($(answer).find('input').is(':checked')) {
                $(this).parent().parent().parent().find('.question-answer-holder .' + id).addClass('active').fadeIn();
            } else {
                $(this).parent().parent().parent().find('.question-answer-holder .' + id).removeClass('active').fadeOut();
            }

        })
    })
    $('.answers_box select').on('change', function () {
        let id = $(this).find(":selected").attr('id');
        $(this).parent().parent().parent().find('.question-answer-holder .quest-holder').removeClass('active').hide();
        $(this).parent().parent().parent().find('.question-answer-holder .' + id).addClass('active').fadeIn();
    })
    $('.step').on('click', function () {
        let index = $(this).attr('index');
        fixIndex(index);
    })
    $('._next').on('click', function () {
        let index = parseInt($('.step.active').attr('index'));
        if (haveMoreIndex(index)) {
            fixIndex(index + 1);
        }
    });
    $('._prev').on('click', function () {
        let index = parseInt($('.step.active').attr('index'));
        if (index != 0) {
            fixIndex(index - 1);
        }
    });

    $('.submit-form').on('click', function () {
        let user_id = $(this).attr('user-id');
        let country_id = $('#country_id').val();
        setFormInLocal(user_id);
        let form = getFormInLocal(country_id);
        sendForm(form);

    })

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
        stepRegister(function (response){
            if (response.success) {
                let user_id = response.data.id;
                setFormInLocal(user_id);
                let country_id = $('#country_id').val();
                let form = getFormInLocal(country_id);
                sendForm(form);
            }
        });
    })

    $('.login-form .login-btn').on('click', function () {
        stepLogin(function (response) {
            if (response.success) {
                let user_id = response.data.user_id;
                setFormInLocal(user_id);
                let country_id = $('#country_id').val();
                let form = getFormInLocal(country_id);
                sendForm(form);
            }
        });
    })

    $('.select-visa-type-body input[name="visa-type"]').on('change',function (){
        $('.step-visa-type').removeClass('text-center');
        $('.part-2').fadeIn();
    })
})

function sendForm(form){
    let data ={
        'form' :form,
    }
    ajax('/member/set-form', 'post', data, function (response,status) {
        console.log('status ===',status)
        if (response.success && status) {
            spinner.removeClass('show');
            alert('Your Applicant Has Been Submit Successfully!');
            let id =response.data.form.id;
            $('body').fadeOut();
            window.location.href = '/member/application/'+id;
        } else if (!response.success && status) {
            spinner.removeClass('show');
            alert('Your Applicant is Exist For This Country You Can Edit And Change That From Your Dashboard!')
            let id =response.data.form.id;
            $('body').fadeOut();
            window.location.href = '/member/application/'+id;

        } else {
            spinner.removeClass('show');
            setNotification('We Have a Problem with Your Applicant!', notification_status.danger);
            alert('try again later!')
        }
    })
}

function haveMoreIndex(index) {
    let lastIndex = 1;
    $('.step').each(function (key, item) {
        lastIndex = $(item).attr('index');
    });

    return lastIndex > index;
}

function fixIndex(index = 0) {
    let activeIndex = $('.group-step.active').attr('index');
    if (activeIndex != index) {
        $('.group-step').each(function (key, item) {
            $(this).removeClass('active');
        }).find(`[index='${index}']`).addClass('active');
        $(`.group-step[index='${index}']`).addClass('active');
        $('.step').each(function (key, item) {
            $(this).removeClass('active');
        })
        $(`.step[index='${index}']`).addClass('active');
        if (index != 0 && haveMoreIndex(index)) {
            $('._prev').show();
            $('._next').show();
        } else if(index != 0 && !haveMoreIndex(index)){
            $('._prev').show();
            $('._next').hide();
        }else if(index == 0 && haveMoreIndex(index)){
            $('._prev').hide();
            $('._next').show();
        }else if(index == 0 && !haveMoreIndex(index)){
            $('._prev').hide();
            $('._next').hide();
        }
        // if (!haveMoreIndex(index)) {
        //     $('._next').hide();
        // } else {
        //     $('._next').show();
        // }
    }
}

function getFormData() {

    let form = {
        'country_id': $('#country_id').val(),
        'type' : $('input[name="visa-type"]:checked').val(),
        'user_id': null,
        'items': {}
    }

    $('.quest.active').each(function (index, quest) {
        let item = {
            'answer_group_id': null,
            'step_id': null,
            'rows': {}
        }
        let answer_box = $(quest).find('.anseswer')[0];
        item['answer_group_id'] = $(answer_box).attr('group-ans-id');
        item['question_id'] = $(answer_box).attr('question_id');
        let row = {
            'answer_id': null,
            'value': null,
            'selected': 0,
        }
        switch (parseInt($(answer_box).attr('type'))) {
            case 3:
                $(answer_box).find('input').each(function (key, answer) {
                    row = {
                        'answer_id': null,
                        'value': null,
                        'selected': 0,
                    }
                    row['answer_id'] = $(answer).attr('answer-id');
                    if ($(answer).is(':checked')) {
                        row['selected'] = 1;
                    }
                    item['rows'][key] = row;
                });
                break;
            case 0:
                $(answer_box).find('input').each(function (key, answer) {
                    row = {
                        'answer_id': null,
                        'value': null,
                        'selected': 0,
                    }
                    row['answer_id'] = $(answer).attr('answer-id');
                    if ($(answer).val()) {
                        row['value'] = $(answer).val();
                        row['selected'] = 1;
                    }
                    item['rows'][key] = row;
                });
                break;
            case 1:
                $(answer_box).find('input').each(function (key, answer) {
                    row = {
                        'answer_id': null,
                        'value': null,
                        'selected': 0,
                    }
                    row['answer_id'] = $(answer).attr('answer-id');
                    if ($(answer).is(':checked')) {
                        row['selected'] = 1;
                    }
                    item['rows'][key] = row;
                });
                break;
            case 2:
                $(answer_box).find('option').each(function (key, answer) {
                    row = {
                        'answer_id': null,
                        'value': null,
                        'selected': 0,
                    }
                    row['answer_id'] = $(answer).attr('answer-id');
                    if ($(answer).is(':selected')) {
                        row['selected'] = 1;
                    }
                    if ($(answer).attr('answer-id')) {
                        item['rows'][key] = row;
                    }
                });
                break;
        }
        if (item['answer_group_id']) {
            form['items'][index] = item;
        }
    })
    return form;
}

function setFormInLocal(user_id) {
    let forms = JSON.parse(localStorage.getItem('Forms')) || {};
    let form = getFormData();
    form['user_id'] = user_id;
    let country_id = $('#country_id').val();
    forms[country_id] = form;
    localStorage.setItem('Forms', JSON.stringify(forms));
}

function getFormInLocal(country_id) {
    let Forms = JSON.parse(localStorage.getItem('Forms')) || [];
    return Forms[country_id];
}


let pageUrl = window.location;
let rowAnswerId = 0;
$(document).ready(function () {
    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
        var url = $(this).attr('href');
        getQuestions(url);
        window.history.pushState("", "", url);
    });

    $('#filter-groups').on('change',function (){
        var url = $(this).attr('href');
        getQuestions(url);
    })

    watchDelete();
    $('.btn-add').on('click', function (e) {
        $("#modal-add-question").modal("show");

    });
    $('.add-question-btn').on('click', function () {
        let self = $(this);
        if (!checkValidation($('#modal-add-question'))) {
            return;
        }

        let data = {
            title: $('#_question-title').val(),
            text: $('#_question-text').val(),
            group: $('#_step-group').val(),
            icon: $('#_icon').val(),
            step: $('#_step').val(),
            type: $('.modal-body .type-answer select').val(),
            answers: getAnswers(),
        }

        $(self).find('._spinner').addClass('show');
        ajax('/admin/user/question/store', 'post', data,
            function (response) {
                if (response.success) {
                    Swal.fire(
                        'Added!',
                        'Your question has been Added.',
                        'success'
                    )
                    $("#modal-add-question").modal('hide');
                    getQuestions();
                    resetModal($('#modal-add-question'));

                }
                $(self).find('._spinner').removeClass('show');
                $('.add-answer-btn').fadeIn();
            });


    })
    $('._step-group').on('change', function () {
        if ($(this).val()) {
            let holder = $(this).parent().parent().parent().find('._step');
            $(holder).attr('disabled', true);

            ajax('/admin/user/step/getByGroupId/' + $(this).val(), 'GET', null,
                function (response) {
                    if (response.success) {
                        holder.html('<option value="">Select a step</option>');
                        $(response.steps).each(function (index, item) {
                            let option = '<option value=' + item.id + '>' + item.name + '</option>'
                            holder.append(option);
                        })
                        $(holder).removeAttr('disabled');

                    }
                });
        }
    })
    $('.add-answer-btn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).fadeOut();
        let boxAnswer = '<div class="answer-box">' +
            '                 <div class="type-answer"> ' +
            components.type +
            '                 </div>' +
            '                 <div class="q-answers-holder">' +
            '                 </div>' +
            '                 <div class="add-answer">add more</div>   ' +
            '' +
            '            </div>';

        $('._answers').append(boxAnswer);
        addAnswer();
        watchAddBtn();
    })

    watchChangeIcon();
    watchEventAddQ();
    watchRemoveAnswer();
    watchRemoveQuestion();
    watchEdit();
    watchMore();
})

function watchChangeIcon(){
    $('._icons-holder').on('click',function (){
        $('._icons-holder ul').fadeToggle();
    });
    $('._icons-holder li ').on('click',function (e){
        e.stopPropagation();
        e.preventDefault();
        let c = $(this).find('i').attr('class');
        let t = $(this).find('span').text();
        $(this).parent().parent().find('._icon').val(c);
        $(this).parent().parent().find('button i').attr('class',c);
        $(this).parent().parent().find('button span').text(t);
        $(this).parent().parent().find('ul').fadeOut();
    })
}

function getLastIndexBox(element){
    let index = 0;
    element.find('.answer-box').each(function (boxIndex,BoxItem){
        index = boxIndex;
    })
    return index + 1 ;
}

function getAnswers() {
    let answers = [];
    $('.modal-body .q-answers-holder .row-answer').each(function (index, item) {
        let text = $(item).find('.write-answer').val();
        if (text.trim().length > 0) {
            let questions = [];
            $(item).find('.answer-questions .input-holder').each(function (indexQ, question) {
                let questionId = $(question).find('.modal-select-question').val();
                if (questions.indexOf(questionId) === -1) {
                    questions.push(questionId);
                }
            })
            let answer = {
                text,
                questions,
            }
            answers.push(answer);
        }
    })
    console.log(answers);
    return answers;
}

function getAnswerIndex() {
    let lastIndex = 0;
    $('.q-answers-holder .row-answer').each(function (index, item) {
        lastIndex = index + 1;
    })
    rowAnswerId = lastIndex + 1;
    return lastIndex;
}

function watchAddBtn() {

    $('.add-answer').on('click', function () {
        addAnswer();
        addQuestionBtn();
    })
}

function watchEventAddQ() {
    $('.add-qus-answer').each(function (index, item) {
        $(item).on('click', function () {
            $(item).parent().find('.answer-questions').append(components.question);
            let q_id = $(this).attr('question-id');
            $(item).parent().find('.answer-questions .input-holder:last-child select option').each(function (index,option){
                if ($(option).val() ==  q_id){
                    $(option).remove();
                }
            })
            watchRemoveQuestion();
        })
    })
}

function addRelatedQ(element) {
    $(element).on('click', function () {
        $(this).parent().find('.answer-questions').append(components.question);
        watchRemoveQuestion();
    })
}

function addQuestionBtn(element) {
    $(element).on('click', function () {
        $(this).parent().find('.answer-questions').append(components.question);
        watchRemoveQuestion();
    })
}

function watchRemoveAnswer(){
    $('.remove-box-answer').on('click',function (){
        $(this).parent().parent().remove();
        $(this).off();
    })
}


function addAnswer() {
    let index = getAnswerIndex();
    let answer = '<div id="answer-' + index + '" class="row-answer flex align-center between">' +
        '            <div class="input-holder col-answer c-47">\n' +
        '               <label for="_answer-text">\n' +
        '                 <input name="answer" class="write-answer" placeholder="write a answer" type="text">' +
        '                  <small></small>\n' +
        '               </label>\n' +
        '            </div>' +
        '            <div class="col-question c-47">' +
        '                 <div class="answer-questions">' +
        '                 </div>' +
        '                 <div id="add-answer-' + index + '" class="add-answer-question">Add Question</div> ' +
        '            </div>' +
        '          </div>';
    $('.q-answers-holder').append(answer);
    addQuestionBtn($("#add-answer-" + index));
}

function watchRemoveQuestion() {
    $('.remove-question').on('click', function () {
        $(this).parent().remove();
    })
}

function getFilters(){
    return {
        s_group : $('#filter-groups').val()
    }
}

function getQuestions(url) {
    $('.questions ._spinner').addClass('show');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        method: 'POST',
        url: url,
        data: getFilters(),
        error: function (error) {
            alert('Question could not be loaded.');
        }
    }).done(function (data) {
        $('.questions').html(data);
        $('.questions ._spinner').removeClass('show');
        watchDelete();
        watchEdit();
        watchMore();
        watchEventAddQ();
        watchRemoveAnswer();
        watchChangeIcon();
    });

}

function watchEdit() {
    $('.add-group-answer-btn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        let index = getLastIndexBox($(this).parent().parent().find('.answers-boxs'));
        let boxAnswer = '<div index='+index+' class="box-answer">' +
            components.type +
            '                 <div class="answers"></div>' +
            '                 <div class="actions">' +
            '                    <button index='+index+' class="add-more-answer">add more</button>' +
            '                    <button index='+index+' class="remove-box-answer"><img src="/assets/images/admin/icons/close-icon.svg" alt=""></button>' +
            '                 </div>   ' +
            '            </div>';

        $(this).parent().parent().find('.answers-boxs').append(boxAnswer);
        watchMore($('.add-more-answer[index="'+index+'"]'));
        watchRemoveAnswer();
    })

    $('.collapse-question-btn').on('click', function () {
        $(this).parent().parent().toggleClass('active');
    })
    $('.btn-holder .edit-question').on('click', function () {
        let question = {
            id: $(this).attr('q-id'),
            title: $(this).parent().parent().find('._question-title').val(),
            text: $(this).parent().parent().find('._question-text').val(),
            step_id: $(this).parent().parent().find('._step').val(),
            icon: $(this).parent().parent().find('._icon').val(),
            group_answers: getQAnswers($(this)),
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('.questions ._spinner').addClass('show');

                ajax('/admin/user/question/update', 'post', question, function (response) {
                    if (response.success) {
                        getQuestions(pageUrl);
                        Swal.fire(
                            'Updated!',
                            'Your question has been update.',
                            'success'
                        )
                    }
                })
            }
        })
    })
}
function watchMore(element=$('.add-more-answer')){
    $(element).on('click', function () {
        let index = getLastIndex($(this).parent().parent())
        $(this).parent().parent().find('.answers').append(
            '   <div class="ans-holder align-center between my-1 new-answers flex">\n' +
            '        <div class="_answer-holder input-holder c-47">\n' +
            '               <label">\n' +
            '                     <input class="_answer" index="' + index + '" placeholder="insert your answer text here" type="text">\n' +
            '                </label>\n' +
            '        </div>\n' +
            '        <div class="ans-question-holder c-47">\n' +
            '              <div class="answer-questions"></div>\n' +
            '              <button index="' + index + '" class="add-qus-answer">Add question</button>\n' +
            '        </div>\n' +
            '   </div>'
        )
        addRelatedQ($('.add-qus-answer[index="' + index + '"]'));
    })
}

function getQAnswers(element) {
    let boxAnswers = [];
    $(element).parent().parent().find('.box-answer').each(function (element_index, answerBox) {
        let answers = [];
        $(answerBox).find('.answers .ans-holder').each(function (ans_index, ans) {
            let questions = [];
            $(ans).find('select').each(function (qIndex, ques) {
                if ($(ques).val() && !questions.includes($(ques).val()) && $(ques).val() != 0) {
                    questions.push($(ques).val());
                }
            })
            let tempAnswer = {
                id: $(ans).find('._answer').attr('a-id'),
                answerText: $(ans).find('._answer').val(),
                questions: questions,
            }
            if (tempAnswer.answerText) {
                answers.push(tempAnswer);
            }
        });
        let tempBox = {
            type: $(answerBox).find('.type-holder select').val(),
            answers: answers,
        }
        if(tempBox.answers.length > 0){
            boxAnswers.push(tempBox)
        }
    })
    return boxAnswers;
}

function watchDelete() {
    $('._delete-question').on('click', function (e) {
        let questionId = $(this).attr('question-id');
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('.questions ._spinner').addClass('show');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    method: 'DELETE',
                    url: '/admin/user/question/' + questionId,

                }).done(function (response) {
                    if (response.success) {
                        getQuestions(pageUrl);
                        Swal.fire(
                            'Deleted!',
                            'Your question has been deleted.',
                            'success'
                        )
                    } else {
                        setNotification('A problem has occurred', notification_status.danger);
                    }
                }).fail(function () {
                    alert('Question could not be loaded.');
                });
            }
        })
    })
}

let questionList = [];

$('#_question-datalist option').each(function (index, item) {
    let option = '<option value="' + $(item).val() + '">' + $(item).text() + '</option>'
    questionList.push(option);
})

function getLastIndex(element) {
    let lastIndex = 0;
    $(element).find('._answer').each(function (index, item) {
        lastIndex = index;
    })
    return lastIndex + 1;
}

let components = {
    type: '<div class="type-holder c-47 t-center mauto">\n' +
        '            <label for="_answers-type">\n' +
        '                  <p>Answer Type</p>\n' +
        '                  <select name="_answers-type" class="required" >' +
        '                      <option value="0">Sample input</option>' +
        '                      <option value="1">Radio Box</option>' +
        '                      <option value="2">Select Box</option>' +
        '                      <option value="3">Multi Select Box</option>' +
        '                  </select>\n' +
        '                  <small></small>\n' +
        '             </label>\n' +
        '        </div>',

    question: '<div class="input-holder flex align-center c-47">\n' +
        '               <label for="_question-text">\n' +
        '                  <select list="_question-datalist" class="modal-select-question" >' +
        questionList +
        '                  </select>\n' +
        '                  <small></small>\n' +
        '               </label>\n' +
        '           <div class="remove-question flex"><img width="60" height="60" style="margin-left: 5px;cursor: pointer" src="/assets/images/admin/icons/close-icon.svg" alt="remove"></div>' +
        '          </div>',


}
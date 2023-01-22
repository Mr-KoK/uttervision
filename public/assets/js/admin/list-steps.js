$(document).ready(function () {
    getGroupStepList();
    $('#add_group').on('click', function () {
        let name = $('#group_step').val();
        $.ajax({
            data: {
                name
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '/admin/user/step-group/store',
            type: 'post',
            beforeSend: function () {
                $('.add_step_group').fadeOut();
                $('.g-list ._spinner').addClass('show');
            },
            success: (response) => {
                $('.g-list ._spinner').removeClass('show');
                getGroupStepList();
                // getStepsList();
            },
            error: (error) => {
                Swal.fire("", "We Have a Problem", error);
                $('._body_steps ._spinner').removeClass('show');
                $('.g-list ._spinner').removeClass('show');

            }
        })
    })

    $('#group_step').on('focus', function (e) {
        $('.g-list').fadeIn();
    })
    $('#group_step').on('focusout', function (e) {
        $('.g-list').fadeOut();
    })

})

function groupStepList() {
    $('#group_step').on('input change', function () {
        let result = existInList($(this).val().trim());
        $(this).attr('gid', 0);
        if ($(this).val().trim().length > 0 && !result) {
            $('.add_step_group').fadeIn();
        } else {
            $('.add_step_group').fadeOut();
        }
        showHideListItems($(this).val().trim().toLowerCase());
    })
    $('#group_step_list li').on('click', function () {
        let self = $('#group_step');
        let val = $(this).val();
        let text = $(this).text();
        self.val(text);
        self.attr('gid', val);
        getStepsList();
    })
}

function showHideListItems(value) {
    $('#group_step_list li').each(function (index, item) {
        console.log(value.indexOf($(item).text().toLowerCase()));
        ($(item).text().toLowerCase()).indexOf(value) > -1 ? $(item).show() : $(item).hide();
    })
}

function existInList(value) {
    let exist = false;
    $('#group_step_list li').each(function (index, item) {
        if ($(item).text() == value) {
            exist = true;
        }
    })
    return exist;
}

function getLastIndex() {
    let i = 0;
    $('._steps .step').each(function () {
        i += 1;
    });
    console.log(i + 1);
    return i + 1;
}

function updateStep() {
    $('.update-step').on('click', function (e) {
        let step = $(this).parent().parent();
        if (!checkValidation(step)) {
            return false;
        }
        let data = {
            id: $(this).attr('step-id'),
            name: step.find('._name').val(),
            description: step.find('._description').val()
        }
        $.ajax({
            url: "/admin/user/step/update",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            success: (response) => {
                getStepsList();
                $('.add-step').removeClass('active')
                    .find('input').val('')
                    .find('.step-information').fadeToggle();
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'Step Updated Successfully',
                    showConfirmButton: false,
                })
            },
            error: (error) => {
                Swal.fire("", "please try again", "error");
            }
        })

    })
}

function watchDelete() {
    $('.delete-step').on('click', function () {
        let id = $(this).attr('step-id');
        Swal.fire({
            title: 'Are you sure delete this step?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                $('._body_steps ._spinner').addClass('show');
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: '/admin/user/step/' + id,
                    type: 'delete',
                }).done(function (response) {
                    getStepsList();
                    Swal.fire({
                        position: 'center-center',
                        icon: 'success',
                        title: 'Step Removed Successfully',
                        showConfirmButton: false,
                    });
                }).fail(function () {
                    alert('Step could not be loaded.');
                });
            }
        })

    });
    $('.delete-group').on('click', function () {
        let id = $(this).attr('g-id');
        Swal.fire({
            title: 'Are you sure delete this group?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                ajax('/admin/user/gstep/' + id, 'delete', '', function (response) {
                    console.log('res', response)
                    if (response.success) {
                        getGroupStepList();
                        $('#group_step').val('');
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            title: 'Group Deleted Successfully',
                            showConfirmButton: false,
                        })
                        $('._body_steps').html('<div class="_spinner"></div>');
                        $('.step-inf').remove();
                    }
                })
            }
        })
    })

}

function getStepsList() {
    $.ajax({
        data: {
            group_id: $('#group_step').attr('gid') ? $('#group_step').attr('gid') : 0
        },
        beforeSend: function () {
            $('._body_steps ._spinner').addClass('show');
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: '/admin/country/step',
        type: 'get',
        success: (response) => {
            $('.ajax-place').html(response);
            watchCollapse();
            watchEvents();
            watchDelete();
            updateStep();
            $('.select-status').on('change', function () {
                let stepId = $(this).attr('step-id');
                let position = $(this).val();
                let data = {
                    step_id: stepId,
                    position: position
                }
                ajax('/admin/step/update-status', 'POST', data, function (response) {
                    if (response.success) {
                        setNotification('Change Position Save Successfully!', notification_status.success);
                        updateIndexSteps();
                    }
                })
            })

            $(init);

            $('._body_steps ._spinner').removeClass('show');


        },
        error: (error) => {
            Swal.fire("", "We Have a Problem 207", "error");
            $('._body_steps ._spinner').removeClass('show');
        }
    })
}

function getGroupStepList() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: '/admin/user/step-group/list',
        type: 'get',
        beforeSend: function () {
            $('.g-list ._spinner').addClass('show');
        },
        success: (response) => {
            let self = $('#group_step_list');
            self.html('');
            $(response.step_groups).each(function (index, item) {
                let option = '<li value="' + item.id + '">' + item.name + '</li>';
                self.prepend(option);
            })
            $('.g-list ._spinner').removeClass('show');
            $('._body_steps ._spinner').removeClass('show');
            groupStepList();
        },
        error: (error) => {
            Swal.fire("", "We Have a Problem 236", error);
            $('.g-list ._spinner').removeClass('show');
        }
    })

}

function watchEvents() {
    $('.add-step').on('click', function () {
        $(this).toggleClass('active');
        $(this).find('.step-information').fadeToggle();
    })
    $('.step-information').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
    })
    $('.add-document').on('click', function () {
        let name = $(this).parent().find('input').val();
        let group = $(this).attr('s_group_id');
        if (name) {
            let checkBox = '<label document-id="4" for="i-0"> ' + name + ' \n' +
                '                        <input checked s_group_id="' + group + '" class="document"  type="checkbox" value="' + name + '">\n' +
                '                    </label>'

            $(this).parent().parent().prepend(checkBox);
        }
    })
    $('.save-btn').on('click', function () {
        let self = $(this);
        let parent = $(this).parent().parent().parent();
        let gid = $(this).attr('group_id');
        let name = parent.find('._name').val();
        let description = parent.find('._description').val();
        if (!gid || gid <= 0) {
            setNotification('Please first select a group', notification_status.danger);
            return false;
        }
        if (!checkValidation(parent)) {
            return false;
        } else {
            $('._body_steps ._spinner').addClass('show');
            $.ajax({
                url: "/admin/user/step/store",
                data: {
                    name: name,
                    index: getLastIndex(),
                    position: $(this).attr('position'),
                    group_id: $(this).attr('group_id'),
                    description: description
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "post",
                success: (response) => {
                    getStepsList();
                    $('.add-step').removeClass('active')
                        .find('input').val('')
                        .find('.step-information').fadeToggle();

                    Swal.fire({
                        position: 'center-center',
                        icon: 'success',
                        title: 'Your New Step Added Successfully',
                        showConfirmButton: false,
                    })
                },
                error: (error) => {
                    Swal.fire("", "please try again ", error);
                }
            })
        }
    })

    $('.cancel-btn').on('click', function () {
        $('.step-information').fadeOut().find('input').val('');
        $('.add-step').removeClass('active');
    })
    $('.edit-group').on('click', function () {
        if (checkValidation($('.step-inf'))) {
            Swal.fire({
                title: 'Are you sure update group?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    let group = {
                        id: $(this).attr('g-id'),
                        name: $('.group-text .group-name').val(),
                        description: $('.group-text .group-description').val(),
                        documents: getDocuments()
                    }
                    ajax('/admin/user/gstep/update', 'post', group, function (response) {
                        if (response.success) {
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: 'Group Updated Successfully',
                                showConfirmButton: false,
                            })
                            getGroupStepList();
                            $('#group_step').val(response.gname);
                        }
                    })
                }
            })
        }
    })
}

function getDocuments() {
    let documents = {};
    $('.documents input:checked').each(function (index, doc) {
        if ($(doc).val()) {
            let document = {
                id: $(doc).attr('document-id'),
                name: $(doc).val(),
                step_group_id: $(doc).attr('s_group_id')
            }
            documents[index] = document;
        }
    })
    return documents;
}

function watchCollapse() {
    $('._steps .collapse-btn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).parent().find('.collapse-body').fadeToggle(100);
    })
}

function init() {
    $(".steps-holder").sortable({
        connectWith: ".connected-sortable",
        stack: '.connected-sortable ul',
        appendTo: ".content-holder",
        distance: 10,
        iframeFix: true,
        refreshPositions: true,
        revert: true,
        revertDuration: 200,
        scope: "tasks",
        scroll: false,
        scrollSensitivity: 100,
        scrollSpeed: 100,
        snap: true,
        snapMode: "inner",
        snapTolerance: 30,
        zIndex: 100,
        stop: function (event, ui) {
            updateIndexSteps();
        }
    }).disableSelection();
}

function updateIndexSteps() {
    setTimeout(() => {
        let step_index = [];
        let index = 1;
        $('._steps .step').each(function (row_index, item) {
            if ($(item).find('.select-status').val() == 0) {
                let temp = {
                    index: index,
                    step_id: $(item).attr('step-id')
                }
                step_index.push(temp);
                index = index + 1;
            }
        })
        ajax('/admin/user/step/indexingUpdate', 'post', {step_index}, function (response) {
            if (response.success) {
                setNotification('Your new indexing has been updated!', notification_status.success)
            }
        })
    }, 1000)
}
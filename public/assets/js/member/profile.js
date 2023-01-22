$(() => {
    $('._avatar').on('change', function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#imgPreview').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    })

    $('.save-phone').on('click', function () {
        let phone = $('#phone-number-value').val();
        if (phone.trim().length > 0) {
            ajax('/member/update-phone', 'POST', {phone}, function (response) {
                if (response.success) {
                    alert_success('Phone Updated!')
                }
            })
        }
    })

    $('.save-name').on('click', function () {
        let name = $('#name-value').val();
        if (name.trim().length > 0) {
            ajax('/member/update-name', 'POST', {name}, function (response) {
                if (response.success) {
                    alert_success('Name Updated!')
                }
            })
        }
    })


    $('.remove-avatar').on('click', function () {
        Swal.fire({
            title: 'Are You Sure Remove Avatar?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('.img-user-avatar').each(function (index, item) {
                    $(item).attr('src', $('#imgPreview').attr('data-placement'))
                })
                $('#imgPreview').attr('src', $('#imgPreview').attr('data-placement'));
                let self = $(this);
                self.addClass('load');
                ajax('/member/remove-avatar', 'POST', '', function (response) {
                    self.removeClass('load');
                })
            }
        })




    })

    $('.edit-avatar-btn').on('click', function () {
        let input = $('#_avatar');
        let file_data = input.prop("files")[0];
        if (!fileValidation(input)) {
            return;
        }
        let self = $(this);
        let file = new FormData;
        file.append('file', file_data);
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/member/edit-avatar',
            data: file,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                self.addClass('load');
                self.prop("disabled", true);
            },
            error: function (error) {
                if (error.status == 403) {
                    alert_403();
                }
            },
            success: function (response) {
                if (response.success) {
                    self.removeClass('load');
                    self.prop("disabled", false);
                    $('.img-user-avatar').each(function (index, item) {
                        $(item).attr('src', response.data)
                    })
                } else {
                    alert('Please select a valid file to upload.');
                }
            }
        });
    })


    profile.watch();

})

function fileValidation(input_file_element) {
    let fileExtension = ['jpeg', 'jpg', 'png'];
    let file_data = input_file_element.prop("files")[0];
    if (!file_data) {
        return false;
    } else if ((file_data.size > 2388608)) {
        alert('Your Document File Size Must Be Lower Than 2MB');
        return false;
    } else if ($.inArray(input_file_element.val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert('your file type not approved');
        return false;
    }
    return true;
}

function getMainInfo() {
    return {
        name: $('#name').val(),
        family: $('#family').val(),
        pass_id: $('#pass_id').val(),
        birthday: $('#birthday').val(),
        phone_no: $('#phone_no').val(),
        country: $('#country').val(),
        bio: $('#bio').val(),
        // userName: $('#username'),
        // password: $('#password')
    }
}

function getNewFamilyInfo() {
    let file = new FormData;
    let input = $('#new_family_avatar');
    let file_data = input.prop("files")[0];
    if (fileValidation(input)) {
        file.append('file', file_data);
    }
    file.append('name', $('#new_name').val());
    file.append('family', $('#new_family').val());
    file.append('pass_id', $('#new_pass_id').val());
    file.append('same_pass_id', $('#new_same_pass').is(':checked') ? '0' : '1');
    file.append('birthday', $('#new_birthday').val());
    file.append('relation', $('#new_relation').val());
    file.append('description', $('#new_description').val());
    return file;
}

var profile = {

    reloadInformationProfile: () => {
        ajax('/member/profile', 'GET', '', function (response) {
            $('#families').html(response);
            profile.watch();
        })
    },

    resetUserList: () => {
        $('.user-list li').each((index, item) => {
            $(item).removeClass('active');
        })
        $('.profile-body').each((index, item) => {
            $(item).removeClass('active');
        })
    },
    watch: () => {
        $('.add-new-user').on('click', function () {
            profile.resetUserList();
            $(this).addClass('active');
            $('.new-body').addClass('active');
            $('#families .card-title').html('Create New <span class="color-9">Family</span>')
        });

        $('.main-user').on('click', function () {
            profile.resetUserList();
            $('.main-body').addClass('active');
            $(this).addClass('active');
            $('#families .card-title').html('Your <span class="color-9">Information</span>')
        });

        $('.save-main-user').on('click', function () {
            let user = getMainInfo();
            ajax('/member/save-main-profile', 'POST', user, function (response) {
                if (response.success) {
                    alert_success('update Successfully!');
                }
            })
        })

        $(".birthday").each((index, item) => {
            $(item).datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true,
                yearRange: "c-100:c",
                onSelect: (dataText, inst) => {
                    console.log(dataText);
                    $(this).val(dataText);
                }
            });
        })

        $('.family_avatar').on('change', function () {
            const file = this.files[0];
            let self = $(this);
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    self.parent().parent().parent().find('input[type="text"]').val(file.name)
                    self.parent().parent().parent().find('.avatar-preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        })

        $('.same_pass_input').on('change', function () {
            let input_check_same = $(this);
            let pass_id_input = input_check_same.parent().parent().parent().find('.pass-id');
            if (input_check_same.is(':checked')) {
                console.log('is true');
                pass_id_input.val('').prop('disabled', true);
            } else {
                pass_id_input.prop('disabled', false);
            }
        })

        $('.add-family-btn').on('click', function () {
            let newFamily = getNewFamilyInfo();
            let btn = $(this);
            btn.prop('disabled', true);
            btn.addClass('load');
            uploadAjax('/member/set-family', 'POST', newFamily, function (response) {
                if (response.success) {
                    $('.box-information ._spinner-holder').addClass('active');
                    alert_success('Family Added Successfully!');
                    profile.reloadInformationProfile();
                }
            });
            btn.prop('disabled', false);
            btn.removeClass('load');
        })

        $('.delete-family-btn').on('click', function () {
            Swal.fire({
                title: 'Are You Sure Delete Family?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let familyId = $(this).attr('family-id');
                    ajax("/member/delete-family", "POST", {family_id: familyId}, function (response) {
                        if (response.success) {
                            alert_success('Family Deleted Successfully!')
                            profile.reloadInformationProfile();
                        }
                    })
                }
            })

        })

        $('.edit-family-btn').on('click', function () {
            let self = $(this);
            Swal.fire({
                title: 'Are You Sure Edite Family?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Edit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = self.attr('family-id');
                    let file = new FormData;
                    let input = $('#avatar-' + id);
                    let file_data = input.prop("files")[0];
                    if (fileValidation(input)) {
                        file.append('file', file_data);
                    }
                    file.append('name', $('#name-' + id).val());
                    file.append('family', $('#family-' + id).val());
                    file.append('family_id', id);
                    file.append('pass_id', $('#pass-id-' + id).val());
                    file.append('same_pass', $('#same_pass-' + id).is(':checked') ? '1' : '0');
                    file.append('birthday', $('#birthday-' + id).val());
                    file.append('relation', $('#relation-' + id).val());
                    file.append('description', $('#description-' + id).val());
                    uploadAjax("/member/edite-family", "POST", file, function (response) {
                        if (response.success) {
                            alert_success('Family Edited Successfully!')
                        }
                    })
                }
            })

        })


        $('.family-user').on('click', function () {
            profile.resetUserList();
            $(this).addClass('active');
            let index = $(this).attr('index');
            $('#families .bodies').find('.profile-body[index=' + index + ']').addClass('active');
            $('#families .card-title').html('Your Family <span class="color-9">Information</span>')
        })

    }

}
let profile = $('._admin-actions');
let selected_Admin = null;
let admins_List = $('.list-admins');
let add_btn = $('._add-new-admin');
let edit_btn = $('._edit-admin');
let password_holder = $('.password_input');

$(document).ready(function () {
    checkCoverImage();
    $('.list-admins')
        .on('click', '._admin-card', function () {
            if ($(this).hasClass('selected')) {
                return;
            }
            reset_List_Admin_Selected();
            let data = {
                id: $(this).find('._admin-data').attr('admin-id'),
                name: $(this).find('._admin-data').attr('admin-name'),
                img: $(this).find('._admin-img').attr('src'),
                phone: $(this).find('._admin-data').attr('admin-phone'),
                // password: $(this).find('._admin-data').attr('admin-password'),
                email: $(this).find('._admin-data').attr('admin-email'),
                role: $(this).find('._admin-data').attr('admin-role'),
            }
            $(this).addClass('selected');
            selected_Admin = $(this).find('._admin-data').attr('admin-id');
            $('._inputs-admin ._add-new-admin').hide();
            $('._inputs-admin ._edit-admin').fadeIn();
            $('._btn-holder ._remove-admin').fadeIn();
            $('._btn-holder ._add-new').fadeIn();
            set_Profile_Data(data);
            checkCoverImage();
        });
    $('._btn-holder ')
        .on('click', '._add-new', function () {
            reset_List_Admin_Selected();
            $(this).fadeOut();
            $('._inputs-admin ._add-new-admin').fadeIn();
            $('._btn-holder ._remove-admin').hide();
            $('._inputs-admin ._edit-admin').hide();
        })
        .on('click', '._remove-admin', function () {
            let id = selected_Admin;
            Swal.fire({
                title: "are you sure Remove Admin?",
                icon: "warning",
                showCancelButton: true,
                showConfirmButton: true,
            }).then(({
                         isConfirmed
                     }) => {
                if (isConfirmed) {
                    $('.list-admins-holder > ._spinner').addClass('show');
                    $.ajax({
                        url: "/admin/admin/" + id,
                        type: "DELETE",
                        data: {
                            id,
                        },
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },

                        beforeSend: function () {
                            $(".parent-loader").removeClass("d-none");
                        },
                        success: function (data) {
                            load_Admins_List();
                            setNotification('Successfully', notification_status.success);
                            reset_List_Admin_Selected();
                            $('._remove-admin').fadeOut();
                            selected_Admin = null;
                        },
                        error: function (error) {
                            console.log(error);
                            Swal.fire("", "please try again", "error");
                        },
                    });
                }
            });
        })
    $('._inputs-admin')
        .on('click', '._edit-admin', function () {
            if (!checkValidation()) {
                return;
            }
            let data = get_Profile_Data();
            if (!data) {
                setNotification('admin data is null', notification_status.danger);
                return;
            }
            $('.list-admins-holder > ._spinner').addClass('show');
            if (!checkValidation()) {
                return;
            }
            $.ajax({
                url: "/admin/admin/update/" + data.id,
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                data: {
                    name: data.name,
                    img: data.img,
                    email: data.email,
                    phone: data.phone,
                    role: data.role
                },
                type: "POST",
                success: (response) => {
                    load_Admins_List();
                    setNotification('update successfully', notification_status.success);

                    reset_List_Admin_Selected();
                },
                error: (error) => {
                    setNotification('error occurred', notification_status.danger);
                }
            })
        })
        .on('click', '._add-new-admin', function () {
            if (!checkValidation()) {
                return;
            }
            let data = get_Profile_Data();
            if (!data) {
                setNotification('admin data is null', notification_status.danger);
                return;
            }
            $('.list-admins-holder > ._spinner').addClass('show');
            $.ajax({
                url: '/admin/admin/create',
                data: {
                    name: data.name,
                    img: data.img,
                    email: data.email,
                    password: data.password,
                    phone: data.phone,
                    role: data.role
                },
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                }, success: function (response) {
                    if (response.status == 200) {
                        load_Admins_List();
                        setNotification('Add new Admin Successfully', notification_status.success);
                        reset_List_Admin_Selected();
                    } else {
                        load_Admins_List();
                        setNotification(response.message.errorInfo[2], notification_status.danger);

                    }
                },
                error: function (error) {
                    setNotification('error : ' + error, notification_status.danger);
                }
            });
        });
    $('._search-admin')
        .on('keyup', function () {
            let value = $(this).val().toLowerCase();
            $('.list-admins').find('._admin-card').each((index, item) => {
                let name = $(item).find('._admin-name').text();
                name.toLowerCase().indexOf(value) > -1 ? $(item).show() : $(item).hide();
            })
        });

    $('.remove-image-btn')
        .on('click', function () {
            $(this).parent().find('._cover-img').attr('src', '/assets/images/admin/icons/avatar-placeholder.png');
            $(this).hide();
        })
    load_Admins_List();
})

function load_Admins_List() {
    setTimeout(function () {
        $.ajax({
            url: "/admin/admin/get",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            type: "GET",
            success: function (response) {
                admins_List.html('');
                let list = response.data;
                console.log('list =>',list);
                $(list).each(function (index, item) {
                    let img = item.img ? item.img : '/assets/images/admin/icons/avatar-placeholder.png';
                    let li = '<li class="green-card _admin-card">\n' +
                        '                            <img class="_admin-img" src="'+ img +'" alt="' + item.name + '">\n' +
                        '                            <p class="_admin-name">' + item.name + '</p>\n' +
                        '                            <input class="_admin-data" admin-phone="' + item.phone_number + '" admin-name="' + item.name + '" admin-id="' + item.id + '" admin-email="' + item.email + '" admin-role="' + item.role + '" type="hidden">\n' +
                        '                        </li>';

                    admins_List.append(li);
                    $('.list-admins-holder > ._spinner').removeClass('show');
                })
            }
        });
    }, 50)
}

function reset_List_Admin_Selected() {
    $('.list-admins ._admin-card').each(function (index, item) {
        $(item).removeClass('selected');
    });
    profile.find('._cover-img').attr('src', '/assets/images/admin/icons/avatar-placeholder.png');
    $('#_admin-role').val('').trigger("change");
    $('#_admin-email').val('');
    $('#_admin-name').val('');
    $('#_admin-number').val('');
    $('#_admin-password').val('');
    edit_btn.hide();
    add_btn.show();
    setPassword('E');
    checkCoverImage();
}

function setPassword(status){
    if(status=='E'){
        password_holder.show();
        password_holder.find('input').addClass('required');
    }
    if(status=='D'){
        password_holder.hide();
        password_holder.find('input').removeClass('required');
    }
}

function get_Profile_Data() {
    let data = {
        name: profile.find('#_admin-name').val(),
        id: profile.find('#_admin-id').val(),
        img: profile.find('._cover-img').attr('src'),
        email: profile.find('#_admin-email').val(),
        password: profile.find('#_admin-password').val(),
        phone: profile.find('#_admin-number').val(),
        role: $('#_admin-role option:selected').val(),
    }
    return data;
}

function set_Profile_Data(data) {
    if (!data) {
        setNotification('No Admin Selected', notification_status.warning)
        return;
    }
    profile.find('._cover-img').attr('src', data.img);
    profile.find('#_admin-id').val(data.id);
    profile.find('#_admin-name').val(data.name);
    profile.find('#_admin-number').val(data.phone);
    profile.find('#_admin-email').val(data.email);
    profile.find('#_admin-role').val(data.role);
    setPassword('D');
}



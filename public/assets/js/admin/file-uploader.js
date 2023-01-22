var table;
var edit = false;
let payment_id;
var editId;
let countId = 0;
var serchUrl = new URLSearchParams(window.location.search).get("type");
let partner_name;
let user_name;
let folder = [];
let file = [];
let folder_id = null;
let backStack = [];
let image_holder = null;
let tinyMce = false;

$(document).ready(function () {
    render();
    $("._cover").on("click", ".img-icon", function () {
        $("#modal-explorer").modal("show");
        image_holder = $(this).parent();
        folder_id = null;
    });
    $("._video").on("click", function (e) {
        e.preventDefault();
        $("#modal-explorer").modal("show");
        image_holder = $(this).parent();
        folder_id = null;
    });
    $('.modal-header .close').on('click', function () {
        $("#modal-explorer").removeClass('show');
        $('body').removeClass('_overflow-hidden');
    })
    $(".full-explorer").on("click", ".explorer-item", function () {
        $(this)
            .closest(".full-explorer")
            .find("div.explorer-item")
            .removeClass("img-selected")
            .parent().removeClass("img-selected-parent");
        ;
        if ($(this).closest("div.panret-item-explorer").hasClass("file-kol")) {
            $(this).addClass("img-selected");
            $(this).parent().addClass("img-selected-parent");
        }
    });
    $(".add-img-url").on("click", function () {
        if(!tinyMce){
            $(".panret-item-explorer").each(function (i, el) {
                let src = $(el).find("div.img-selected img").attr("src");
                let video = $(el).find("div.img-selected source").attr("src")
                if (src != undefined && image_holder) {
                    image_holder.find('._cover-img').attr('src', src);
                    checkCoverImage();
                    image_holder = null;
                }else if(video != undefined && image_holder){
                    image_holder.find('.src-video').val(video);
                    image_holder = null;
                }
                $("#modal-explorer").modal("hide");
            });
        }
    });
    $(".avatar-users").on("click", ".remove-img", function () {
        $(".avatar-users").empty().append(`
            <button class="upload-img">
            <i class="fa fa-image">
            </i>
        </button>
            `);
    });
    $('.customer').on('click', '.pays', function () {
        $('table.payments tbody').empty();
        $("#modal-payment").modal("show");
        countId = 0;
        let tr = $(this).closest("tr");
        let row = table.row(tr);
        let idkol = row.data().id;
        user_name = row.data().name
        $.ajax({
            url: "/admin/customer/show/" + idkol,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            beforeSend: function () {
                $(".parent-loader").removeClass("d-none");
            },
            success: function (data) {
                $(".parent-loader").addClass("d-none");
                console.log("++++++++++++++", data);
                let pays = data.data.pays;
                partner_name = data.data.partner.name;
                payment_id = data.data.id;
                if (pays.length > 0) {
                    $('.create-payment').text('Edit')
                } else {
                    $('.create-payment').text('Add')
                }
                pays.forEach(function (element, index) {
                    $('table.payments tbody').append(`
                        <tr class="${element.type == 2 ? 'disabled-row' : ''}">
                            <td>${++index}</td>
                        <td><span class="partner-name">${partner_name}</span></td>
                        <td>
                        <select ${element.type == 2 ? 'disabled' : ''} class="form-control-me" name="typepays">
                        <option ${element.type == 1 ? 'selected' : ''} value="1">Processing</option>
                        <option ${element.type == 2 ? 'selected' : ''} value="2">paid</option>
                        </select>
                        </td>
                        <td><input force disabled value="${element.date}" style="width:120px" class="locale-en form-control-me"/></td>
                        <td><input force disabled value="${element.time}" class='clockpicker form-control-me' style="width:100px"  /></td>
                        <td><input ${element.type == 2 ? 'disabled' : ''} value="${element.commision}" style="width:150px" class="form-control-me " name='commision'/></td>
                        <td><button ${element.type == 2 ? 'disabled' : ''} class="btn-danger-me p-2" title="DELETE"><img width="100%"  src="{{ asset('assets/images/delete.svg') }}" /></button></td>
                        </tr>
                  `);
                    countId = index;
                });
                initDatepicker();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $('.modal-lg-pays').on('click', '.btn-add-pay', function () {
        if (countId < 3) {
            $('table.payments tbody').append(`
                <tr>
                <td>${++countId}</td>
                <td><span class="partner-name">${partner_name}</span></td>
                <td>
                <select class="form-control-me" name="typepays">
                <option value="1">Processing</option>
                <option value="2">paid</option>
                </select>
                </td>
                <td><input force disabled style="width:120px" class="locale-en form-control-me"/></td>
                <td><input force disabled class='clockpicker form-control-me' style="width:100px"  /></td>
                <td><input  style="width:150px" class="form-control-me" name='commision'/></td>
                <td><button class="btn-danger-me  p-2" title="DELETE"><img width="100%"  src="{{ asset('assets/images/delete.svg') }}" /></button></td>
                </tr>
                `);
        }
        initDatepicker();
    });
    $('table.payments').on('change', 'select[name=typepays]', function () {
        console.log($(this).val());
        if ($(this).val() == 1) {
            $(this).closest('tr').find('input.locale-en').attr('disabled', 'disabled').val('')
            $(this).closest('tr').find('input.clockpicker').attr('disabled', 'disabled').val('')
        } else {
            $(this).closest('tr').find('input.form-control-me').removeAttr('disabled')
        }
    });
    $('.table.payments tbody').on('click', 'button.btn-danger-me', function () {
        $(this).closest('tr').remove();
        countId = $('.table.payments tbody tr').length
    })
    $('.create-payment').on('click', function () {
        forseItem()
        if (!$(".modal-lg-pays").find(".is-invalid").length) {
            let formdata = new FormData();
            let data = [];
            $('table.payments tbody tr').each(function (index, element) {
                data.push({
                    partnerName: $(element).find('span.partner-name').text(),
                    type: $(element).find('select[name=typepays]').val(),
                    commision: $(element).find('input[name=commision]').val(),
                    time: $(element).find('input.clockpicker').val(),
                    date: $(element).find('input.locale-en').val(),
                    username: user_name
                });
            });
            $.ajax({
                url: "/admin/payment/create/" + payment_id,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                data: {
                    array: data
                },
                beforeSend: function () {
                    $(".parent-loader").removeClass("d-none");
                },
                success: function (data) {
                    $(".parent-loader").addClass("d-none");
                    console.log(data);
                    $("#modal-payment").modal("hide");
                    Swal.fire("", "successfully", "success");
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

    })
    $('.customer tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
    $(".customer").on("change", ".statuses", function () {
        let tr = $(this).closest("tr");
        let row = table.row(tr);
        let idkol = row.data().id;
        let status = $(this).val();
        $.ajax({
            url: "/admin/customer/status/" + idkol,
            type: "POST",

            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                status
            },
            beforeSend: function () {
                $(".parent-loader").removeClass("d-none");
            },
            success: function (data) {
                $(".parent-loader").addClass("d-none");
                Swal.fire("", "successfully", "success");
                console.log(data);
                table.ajax.reload(null, false);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $(".show-modal-admin").on("click", function () {
        $(".modal .btn-success").text("Add");
        forseItem(true);
        $("#modal-admin").modal("show");
        edit = false;
        $("input[name=name]").val("");
        $("input[name=email]").val("");
        $("input[name=password]").val("");
        $("select[name=type]").val(0);
        $("input[name=age]").val("");
        $("input[name=active]").prop("checked", false);
    });
    $(".customer").on("click", ".remove", function () {
        let tr = $(this).closest("tr");
        let row = table.row(tr);
        let idkol = row.data().id;
        $.ajax({
            url: "/admin/customer/" + idkol,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            beforeSend: function () {
                $(".parent-loader").removeClass("d-none");
            },
            success: function (data) {
                $(".parent-loader").addClass("d-none");
                console.log(data);
                table.ajax.reload(null, false);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $(".customer").on("click", ".editor", function () {
        let tr = $(this).closest("tr");
        let row = table.row(tr);
        let idkol = row.data().id;
        $("#modal-admin").modal("show");
        $.ajax({
            url: "/admin/customer/show/" + idkol,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            beforeSend: function () {
                $(".parent-loader").removeClass("d-none");
            },
            success: function (data) {
                console.log(data);
                let {
                    email,
                    name,
                    id,
                    type,
                    age,
                    partner_id,
                    img,
                    img_id
                } = data.data;
                $(".parent-loader").addClass("d-none");
                $("input[name=name]").val(name);
                $("input[name=email]").val(email);
                $("select[name=type]").val(type);
                $("select[name=partners]").val(partner_id);
                $("input[name=password]").val("");
                $('input[name=age]').val(age);
                if (img != null) {
                    $(".avatar-users").empty().append(`
                    <div class="w-100 h-100">
                    <div class="remove-img">
                    <i class="fa fa-times"></i>
                    </div>
                    <img id="${img_id}" width="100%" height="150px" src="${
                        url_root + img
                    }"/>
                    </div>
                    `);
                } else {
                    $(".avatar-users").empty().append(`
            <button class="upload-img">
            <i class="fa fa-image">
            </i>
        </button>
            `);
                }
                edit = true;
                $("#modal-admin .btn-success").text("Edit");
                forseItem();
                editId = id;
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $(".create-admin").on("click", function () {
        forseItem();
        if (!$("#modal-admin").find(".is-invalid").length) {
            let data = {
                name: $("input[name=name]").val(),
                email: $("input[name=email]").val(),
                password: $("input[name=password]").val(),
                age: $('input[name=age]').val(),
                type: serchUrl,
                img: $('.avatar-users img').attr('id') || null
            };
            if (serchUrl != 1) {
                data.partner_id = $('select[name=partners]').val();
            }
            if (edit == true) {
                $.ajax({
                    url: "/admin/customer/update/" + editId,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": token,
                    },
                    data: data,
                    beforeSend: function () {
                        $(".parent-loader").removeClass("d-none");
                    },
                    success: function (data) {
                        table.ajax.reload(null, false);
                        $(".parent-loader").addClass("d-none");
                        Swal.fire("", "edit successfully", "success");
                        $("#modal-admin").modal("hide");
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            } else {
                $.ajax({
                    url: "/admin/customer/create",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": token,
                    },
                    data: data,
                    beforeSend: function () {
                        $(".parent-loader").removeClass("d-none");
                    },
                    success: function (data) {
                        table.ajax.reload(null, false);
                        $(".parent-loader").addClass("d-none");
                        Swal.fire("", "Add successfully", "success");
                        $("#modal-admin").modal("hide");
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            }
        }
    });
    $(".folder-modal").on("click", function () {
        $("#modal-add-folder").find("input[name=name]").val("");
        $("#modal-add-folder").modal("show");
    });
    $(".files-upload").on("click", function () {
        $(".upload-img").click();
    });
    $(".upload-img").on("change", function () {
        uploadfile(this);
    });
    $(".create-folder").on("click", function () {
        createFolder();
    });
    $(".btn-refresh").on("click", function () {
        render();
    });
    $(".full-explorer").on("click", ".remove", function () {
        console.log('full-explorer');
        let id = $(this).closest("div.panret-item-explorer").attr("id");
        let type = $(this)
            .closest("div.panret-item-explorer")
            .hasClass("folder-kol");
        let parent_kol = $(this).closest("div.panret-item-explorer");
        if (type) {
            Swal.fire({
                title: "are you sure ?",
                icon: "warning",
                showCancelButton: true,
                showConfirmButton: true,
            }).then(({
                         isConfirmed
                     }) => {
                if (isConfirmed) {
                    $.ajax({
                        url: "/admin/explorer/folder",
                        type: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        data: {
                            id,
                        },
                        beforeSend: function () {
                            $('.modal-body ._spinner').addClass('show');
                        },
                        success: function (data) {
                            console.log(data);
                            $(".parent-loader").addClass("d-none");
                            $(parent_kol).fadeOut(10, function () {
                                $(parent_kol).remove();
                            });
                            render();
                        },
                        error: function (error) {
                            console.log(error);
                            $(".parent-loader").addClass("d-none");
                            Swal.fire("", "please try again", "error").then(
                                ({
                                     isConfirmed
                                 }) => {
                                    if (isConfirmed) {
                                        refresh();
                                    }
                                }
                            );
                        },
                    });
                }
            });
        } else {
            Swal.fire({
                title: "are you sure ?",
                icon: "warning",
                showCancelButton: true,
                showConfirmButton: true,
            }).then(({
                         isConfirmed
                     }) => {
                if (isConfirmed) {
                    $.ajax({
                        url: "/admin/explorer/file",
                        type: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        data: {
                            id,
                        },
                        beforeSend: function () {
                            $('.modal-body ._spinner').addClass('show');
                        },
                        success: function (data) {
                            console.log(data);
                            $(".parent-loader").addClass("d-none");
                            $(parent_kol).fadeOut(10, function () {
                                $(parent_kol).remove();
                            });
                            render();
                        },
                        error: function (error) {
                            console.log(error);
                            $('.modal-body ._spinner').removeClass('show');
                            Swal.fire("", "please try again", "error").then(
                                ({
                                     isConfirmed
                                 }) => {
                                    if (isConfirmed) {
                                        refresh();
                                    }
                                }
                            );
                        },
                    });
                }
            });
        }
    });
    $(".btn_backex").on("click", function () {
        if (backStack.length - 1 > 0) {
            backStack = backStack.slice(0, backStack.length - 1);
            folder_id = backStack[backStack.length - 1].id;
        } else {
            folder_id = null;
            backStack = [];
        }
        render();
    });
});


function forseItem(firstTime) {
    if (firstTime == true) {
        $("input[name=password]").parent().find("span.feedback").text("");
        $("input[name=password]").removeClass("is-invalid");
        $("[force]").each(function (index, element) {
            if ($(element).prop("nodeName") == "INPUT") {
                if ($(element).val().trim().length <= 0) {
                    $(element).removeClass("is-invalid");
                }
            } else if ($(element).prop("nodeName") == "SELECT") {
                if ($(element).val() == 0) {

                    $(element).removeClass("is-invalid");
                }
            }
        });
    } else {
        $("[force]").each(function (index, element) {
            if ($(element).prop("nodeName") == "INPUT") {
                if ($(element).val().trim().length <= 0) {
                    $(element).addClass("is-invalid");
                } else {
                    $(element).removeClass("is-invalid");
                }
            } else if ($(element).prop("nodeName") == "SELECT") {
                if ($(element).val() == 0) {
                    $(element).addClass("is-invalid");
                } else {
                    $(element).removeClass("is-invalid");
                }
            }
        });
        if (edit) {
            $("input[name=password]").parent().find("span.feedback").text("");
            $("input[name=password]").removeClass("is-invalid");
        }
        //  else {
        //     if ($("input[name=password]").val().trim().length < 8) {
        //         $("input[name=password]").addClass("is-invalid");
        //         $("input[name=password]")
        //             .parent()
        //             .find("span.feedback")
        //             .text("Must be larger than 8 digits");
        //     } else {
        //         $("input[name=password]").parent().find("span.feedback").text("");
        //         $("input[name=password]").removeClass("is-invalid");
        //     }
        // }
    }

}

function initDatepicker() {
    $('.locale-en').datepicker();
    $('.clockpicker').clockpicker({
        autoclose: true,
    });
}

function createFolder() {
    $.ajax({
        url: "/admin/explorer/folder",
        type: "POST",
        data: {
            name: $("input[name=name]").val(),
            parent_id: folder_id,
        },
        headers: {
            "X-CSRF-TOKEN": token,
        },
        beforeSend: function () {
            $(".parent-loader").removeClass("d-none");
        },
        success: function (data) {
            $(".parent-loader").addClass("d-none");
            folder.push(data.folder);
            // refresh();
            render();
            $("#modal-add-folder").modal("hide");
        },
        error: function (error) {
            console.log(error);
            $(".parent-loader").addClass("d-none");
            Swal.fire("", "please try again", "error");
        },
    });
}

function uploadfile(input) {
    if (input.files && input.files.length > 0) {

        let trust = true;
        var formData = new FormData();
        if (folder_id != null) {
            formData.append("folder_id", folder_id);
        }
        Array.from(input.files).forEach((file, i) => {
            formData.append("files[" + i + "]", file);
            if(file.size > 10 * 1024 * 1024){
                Swal.fire("Sry",
                    'Imported file '+file.name+ ' size is more than 5MB ' ,
                    "error");
                trust = false;
                return false;

            }
            file.name = file.name.replace(/\s+/g, '');
        });
        for (var pair of formData.entries()) {
            console.log(pair[0] + ", " + pair[1]);
        }
        if(trust){
            console.log('formData',formData);
            $.ajax({
                url: "/admin/explorer/file",
                type: "POST",
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                data: formData,
                beforeSend: function () {
                    $(".parent-loader").removeClass("d-none");
                    $('.modal-body ._spinner').addClass('show')
                },
                success: function (data) {
                    console.log(data);
                },
                complete: function (data) {
                    let resfile = data.responseJSON.file;
                    resfile.forEach((element) => {
                        file.push(element);
                        // refresh();
                    });
                    render();
                    $(".parent-loader").addClass("d-none");
                },
                error: function (er) {
                    $(".parent-loader").addClass("d-none");
                    Swal.fire("", "please try again", "error").then(
                        ({
                             isConfirmed
                         }) => {
                            if (isConfirmed) {
                                refresh();
                            }
                        }
                    );
                    console.log(er);
                },
            });
        }
    }
}

function arrangeFolder(folder) {
    $(".full-explorer").append(`
            <div id="${folder.id}" ondblclick="clickFolder(${folder.id},'${folder.name}')"  class="col-md-3 col-12 panret-item-explorer folder-kol my-3">
            <div class="explorer-item">
            <div class="remove">
            <i class="fa fa-times"></i>
            </div>
            <div class="name mt-4 ml-3">
            <p>${folder.name}</p>
            </div>
            <div class="text-center">
            <i class="fa fa-folder-open fa-5x"></i>
            </div>
         <div class="footer text-center">
         <p class="ml-2" style="font-size:10px">${folder.email}</p>
         </div>
            </div>
            </div>
            `);
}


function openFile(file) {
    var extension = file.substr((file.lastIndexOf('.') + 1));
    switch (extension) {
        case 'mp4':
        case 'MOV':
        case 'mov':
        case 'AVI':
        case 'AVCHD':
        case 'FLV':
        case 'MKV':
        case 'WEBM ':
            return 'video';  // There's was a typo in the example where
        case 'zip':
        case 'rar':
            return 'zip';
        default:
            return 'image'
    }
}

function arrangeFile(file) {
    let fileHolder = '';
    switch (openFile(file.img)) {
        case 'video':
            fileHolder = '' +
                '<div class="_video-holder">' +
                '<div class="_media-play">' +
                '<span class="play-icon"></span>' +
                '</div>' +
                // '<video width="100%" controls>\n' +
                // '  <source src='+file.img+' id="video_here">\n' +
                // '</video>' +
                '</div>';
            break;
        case 'zip':
            // code block
            fileHolder = '<img width="100%" height="100%" src="/assets/images/admin/icons/zip-file.png"  />';
            break;
        default:
            fileHolder = '<img width="100%" height="100%" src='+file.img+'  />';
    }
    $(".full-explorer").append(`
        <div id="${
        file.id
    }" class="col-md-3 col-12 panret-item-explorer file-kol my-3">
        <div class="explorer-item">
        <div class="remove">
        <i class="fa fa-times"></i>
        </div>
        <div class="text-center mt-4">
        ${fileHolder}
        </div>
        <div class="footer text-center">
        <p  class="ml-2" style="font-size:10px"> ${file.email}</p>
        </div>
        </div>
        </div>
        `);
}

function refresh() {
    $(".full-explorer").empty();
    folder.forEach((element) => {
        arrangeFolder(element);
    });
    file.forEach((element) => {
        arrangeFile(element);
    });
    $('.modal-body ._spinner').removeClass('show');
}

function render() {
    refreshAdrress();
    $.ajax({
        url: "/admin/explorer/list",
        data: {
            folder_id: folder_id,
        },
        headers: {
            "X-CSRF-TOKEN": token,
        },
        type: "POST",
        beforeSend: function () {
            $('.modal-body ._spinner').addClass('show');
        },
        success: function (data) {
            console.log(data);
            $(".parent-loader").addClass("d-none");
            folder = data.folder;
            file = data.file;
            refresh();
        },
        error: function (error) {
            console.log(error);
            $(".parent-loader").addClass("d-none");
            Swal.fire("", "please try again", "error").then(
                ({
                     isConfirmed
                 }) => {
                    if (isConfirmed) {
                        refresh();
                    }
                }
            );
        },
    });
}

function clickFolder(id, name) {
    folder_id = id;
    backStack.push({
        id: id,
        name: name
    });
    render();
}

function breadcrumbClick(id = null) {
    if (id != null) {
        let index = backStack.findIndex((item) => item.id == id);
        if (index != -1) {
            backStack = backStack.slice(0, index + 1);
            folder_id = backStack[index].id;
        }
    } else {
        backStack = [];
        folder_id = null;
    }
    render();
}

function refreshAdrress() {
    $(".breadcrumb-me").empty();
    $(".breadcrumb-me").append(
        `<li onclick="breadcrumbClick()" class='item' aria-current='page'>Home</li>`
    );
    backStack.forEach((folder) => {
        $(".breadcrumb-me").append(
            `<li onclick="breadcrumbClick(${folder.id})" class='item' aria-current='page'>${folder.name}</li>`
        );
    });
    $(".breadcrumb-me .item").last().addClass("active-bread-explorer");
}
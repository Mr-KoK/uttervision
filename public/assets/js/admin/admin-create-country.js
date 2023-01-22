$(document).ready(function () {
    let images = [];
    images.push($("#_flag"), $("#_cover-country-desktop"),$("#_cover-country-mobile"));
    $(images).each(function (index, item) {
        item.on("click", function () {
            $("#modal-explorer").modal("show");
            image_holder = $(this).parent();
            folder_id = null;
        });
    });
    $('#_short').on('change',function (){
        let flag = $(this).find('option:selected').attr('flag');
        $('#_flag').attr('src',flag);
    });
    $('#save-btn').on('click', function () {
        let data = getDataCountry();
        if (checkValidation()) {
            $('._summery').find('._spinner').addClass('show');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: data,
                url: '/admin/country',
                method: 'post',
                statusCode: {
                    500: function () {
                        Swal.fire({
                            position: 'center-center',
                            icon: 'error',
                            title: 'We Can`nt Connect To Server',
                            showConfirmButton: false,
                        })
                        $('._summery').find('._spinner').removeClass('show');
                    }
                }
            })
                .done((response) => {
                    // fillSummery();
                    if (response.status === 200) {
                        Swal.fire({
                            position: 'center-center',
                            icon: 'success',
                            title: 'Your New Country Added Successfully',
                            showConfirmButton: false,
                        })
                        $('._summery').find('._spinner').removeClass('show');
                    } else {
                        console.log(response);
                        Swal.fire({
                            position: 'center-center',
                            icon: 'error',
                            title: response.data.errorInfo[2],
                            showConfirmButton: false,
                        })
                        $('._summery').find('._spinner').removeClass('show');
                    }
                })
                .fail((response) => {
                    // fillSummery();
                    Swal.fire({
                        position: 'center-center',
                        icon: 'error',
                        title: response.errorInfo.data[2],
                        showConfirmButton: false,
                    })
                    $('._summery').find('._spinner').removeClass('show');
                })

        }

    })
    $('#_name').on('change input', function () {
        let slug = $('#_slug');
        let value = $(this).val();
        slug.val('');
        value = value.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        slug.val('visa-for-' + value)
    })
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 450,
        menubar: 'insert tools',
        a11y_advanced_options: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor image paste imagetools',
            'searchreplace visualblocks code fullscreen autosave',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            '| image ' +
            'bold italic backcolor preview code| alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        image_title: true,
        mobile: {
            theme: 'mobile',
            plugins: 'autosave lists autolink',
            toolbar: 'undo bold italic styleselect'
        },
        automatic_uploads: true,
        relative_urls: false,
        remove_script_host: true,
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            tinyMce = true;
            $("#modal-explorer").modal("show");
            console.log('click');
            $(".add-img-url").on("click", function () {
                $(".panret-item-explorer").each(function (i, el) {
                    let src = $(el).find("div.img-selected img").attr("src");
                    if (src != undefined) {
                        if (tinyMce) {
                            console.log('src',src);
                            cb(src, {title: 'test'});
                            tinyMce = false;
                        }
                        $(".add-img-url").off()
                    }
                    $("#modal-explorer").modal("hide");
                });
            });
        }
    });
    // fillSummery();
})

function getDataCountry() {
    return {
        name: $('#_name').val(),
        title: $('#_title').val(),
        abstract: $('#_summery').val(),
        meta_description: $('#_description').val(),
        meta_keyword: $('#_keywords').val(),
        show_on_map: $('#_show_on_map').is(':checked') ? 1 : 0,
        short_name: $('#_short').val(),
        slug: $('#_slug').val(),
        // body: tinymce.get('_body').getContent(),
        admin_id: $('#_admin').attr('admin-selected'),
        points_map: $('#_map').val(),
        cover_img: $('#_cover-country-desktop').attr('src'),
        cover_img_mobile: $('#_cover-country-mobile').attr('src'),
        img: $('#_flag').attr('src'),
        continent : $('#_short option:selected').attr('continent'),
        video: $('.src-video').val(),
        sGroup: $('#_step-group').val(),
    };
}
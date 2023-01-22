let visa_chart = $("#chartjs-4");
$(() => {
    $('.offer_timer').flipper('init')

    $('.save_docs').on('click', () => {
        let Files = [];
        $('.document').each((index, item) => {
            var fileExtension = ['jpeg', 'jpg', 'png'];
            let file = new FormData;
            if (item.files[0]) {
                if (item.files[0].size > 2388608) {
                    alert('Your Document File Size Must Be Lower Than 2MB');
                } else if ($.inArray($(item).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert('your file type not approved');
                }
                let data = {
                    file
                }
                file.append(index, item.files[0])
                ajax('/member/upload-documents', 'POST', data, () => {
                    alert('successfully!')
                })
            }
        })
    })

    $('.edit-answer').on('click', function () {
        $(this).parent().parent().toggleClass('active');
    })

    $('.answers_box .save-btn').on('click', function () {
        let type = $(this).parent().find('.user-answers').attr('type');
        let ul = $(this).parent().parent();
        let rows = {};
        switch (type) {
            case "0":
                console.log('0');
                $(this).parent().find('.user-answers input').each((index, row) => {
                    let answer = {
                        row_id: null,
                        selected: 0,
                        value: null
                    }
                    answer['row_id'] = $(row).attr('row-id');
                    answer['selected'] = $(row).val() ? 1 : 0;
                    answer['value'] = $(row).val() ? $(row).val() : null;
                    rows[index] = answer;
                })
                console.log(rows);
                break;
            case "1":
                $(this).parent().find('.user-answers .radio-item input').each((index, row) => {
                    let answer = {
                        row_id: null,
                        selected: 0,
                        value: null
                    }
                    console.log('1');
                    answer['row_id'] = $(row).attr('row-id');
                    answer['selected'] = $(row).is(':checked') ? 1 : 0;
                    answer['value'] = null;
                    rows[index] = answer;
                })
                break;
            case "2":
                console.log('2');
                $(this).parent().find('.user-answers option').each((index, option) => {
                    let answer = {
                        row_id: null,
                        selected: 0,
                        value: null
                    }
                    answer['row_id'] = $(option).attr('row-id');
                    answer['selected'] = $(option).is(':selected') ? 1 : 0;
                    answer['value'] = null;
                    if (answer['row_id']) {
                        rows[index] = answer;
                    }
                })
                console.log(rows);
                break;
            case "3":
                console.log('3');
                $(this).parent().find('.user-answers input').each((index, row) => {
                    let answer = {
                        row_id: null,
                        selected: 0,
                        value: null
                    }
                    answer['row_id'] = $(row).attr('row-id');
                    answer['selected'] = $(row).is(':checked') ? 1 : 0;
                    answer['value'] = null;
                    rows[index] = answer;
                })
                console.log(rows);
                break;
        }
        if (rows) {
            let data = {
                rows
            }
            ul.addClass('load');
            ajax('/member/updateRows', 'POST', data, function (response) {
                ul.removeClass('load');
            })
        }


    })

    $('.file-document').on('change', function () {
        var fileExtension = ['jpeg', 'jpg', 'png','pdf'];
        let file_data = $(this).prop("files")[0];
        let holder = $(this).parent().parent().parent();
        if (file_data) {
            if (($(this)[0].files[0].size > 2388608)) {
                alert('Your Document File Size Must Be Lower Than 2MB');
                return;
            } else if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert('your file type not approved');
                return;
            }
            let file = new FormData;
            file.append('file', file_data);
            file.append('doc-id', $(this).attr('doc-id'));

            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            holder.find(".progress-bar").width(percentComplete + '%');
                            holder.find(".progress-bar").html(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '/member/upload-documents',
                data: file,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    holder.find(".progress-bar").width('0%');
                    holder.addClass('load');
                },
                error: function (error) {
                    holder.find(".progress-bar").width('0%');
                    holder.removeClass('load');
                    if(error.status==403){
                        alert_403();
                    }
                },
                success: function (response) {
                    if (response.success) {
                        holder.find(".progress-bar").removeClass('bg-primary').addClass('bg-success');
                        holder.removeClass('load');
                        holder.find('.status').text('Pending').removeClass('badge-pink-light').addClass('badge-success');
                        holder.find('.file-name').text(response.data)
                    } else {
                        $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                    }
                }
            });


            // uploadAjax('/member/upload-documents',file,function (data, status, jqXHR){
            // console.log(data)
            // },function (percentComplete){
            // console.log(percentComplete)
            // });
            // console.log(file);
        }
    })

    var countDownDate = new Date($('#time-left').val()).getTime();
    console.log(countDownDate);

    setInterval(function () {
        var now = new Date().getTime();

        var timeleft = countDownDate - now;

        var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toLocaleString('en-US', {
            minimumIntegerDigits: 2,
            useGrouping: false
        });
        var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60)).toLocaleString('en-US', {
                minimumIntegerDigits: 2,
                useGrouping: false
            })
        ;
        var seconds = Math.floor((timeleft % (1000 * 60)) / 1000).toLocaleString('en-US', {
                minimumIntegerDigits: 2,
                useGrouping: false
            })
        ;
        $('.days-toleft').text(days);
        $('.hour-toleft').text(hours);
        $('.min-toleft').text(minutes);

    }, 1000)

    createNewVisaChar();
})

function createNewVisaChar() {
    let width = $(visa_chart).width();
    let height = width + width * .25;
    let data = [];
    let colors = [];
    let labels = [];
    visa_chart.parent().find('.chart-data > *').each(function () {
        data.push(parseInt($(this).attr('data-percent')));
        colors.push($(this).attr('data-color'));
        labels.push($(this).attr('data-label'));
    })
    visa_chart.attr('width', width).attr('height', height);
    new Chart(visa_chart, {
        "type": "doughnut",
        responsive: true,
        options: {
            legend: {
                display: false,
            }

        },
        maintainAspectRatio: false,
        "data": {
            "labels": labels,
            "datasets": [{
                "data": data,
                "backgroundColor": colors
            }]
        }
    });
}




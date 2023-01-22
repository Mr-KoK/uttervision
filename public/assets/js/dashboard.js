$(document).ready(function () {
    changeState();
    activeRoute();
    handelAddDate();
    $(window).resize(function () {
        changeState();
    });
    $('body').on('click', function (e) {
        let navbar = $('.navbar-hide-mobile');
        let accardion = $('.content-hide-small');
        if (navbar.width() == 260 || accardion.width() == 260) {
            if ($(e.target).closest('.navbar-hide-mobile').length == 0) {
                navbar.css({
                    width: "0",
                    padding: '0'
                })
            }
            if ($(e.target).closest('.content-hide-small').length == 0) {
                accardion.css({
                    width: "0",
                    padding: '0'
                })
            }
        }
    });
    $('.btn-under-bit').on('click', function () {
        navigator.clipboard.writeText('www.uttervision.com')
        $('.copy-notification').fadeIn();
        setTimeout(() => {
            $('.copy-notification').fadeOut();
        }, 400);
    });
    $('.content-hide-small a').on('click', function () {
        $('.content-hide-small').css({
            'width': '0',
            'padding': '0'
        });
    });
    $('.parent-hide-small button').on('click', function () {
        $('.content-hide-small').css({
            'width': '300px',
            'padding': '20px'
        });
    });
    $('.parent-hide-mobile button').on('click', function () {
        $('.navbar-hide-mobile').css({
            'width': '300px',
            'padding': '20px'
        });
    });
    $('.navbar-hide-mobile a').on('click', function () {
        $('.navbar-hide-mobile').css({
            'width': '0',
            'padding': '0'
        });
    });
    $('.type-applicant').each(function (index, element) {
        $(element).on('click', function () {
            $('.type-applicant').find('center').addClass('d-none');
            $('.type-applicant').find('b').css({
                color: "black"
            });
            let type = $(element).attr('type');
            console.log(type);
            $(element).find('center').removeClass('d-none');
            $(element).find('b').css({
                color: "#accd00"
            });
            $.ajax({
                url: "/partner/introduced/getall",
                type: "POST",
                data: {
                    type: `${type}`
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    let result = data.data;
                    $('.table-data tbody').empty();
                    console.log(result);
                    if (result.length > 0) {
                        result.map((prop, key) => {
                            $('.table-data tbody').append(`
                            <tr data-id="${prop.id}" >
                            <td>
                               ${seetAvator(prop.img)}
                            </td>
                            <td>
                                <p class="p-0 m-0 mt-1 text-nowrap">
                                    ${prop.name}
                                </p>
                            </td>
                            <td>
                                <p class="p-0 m-0 mt-1 text-nowrap">
                                ${setStatus(prop.status)}
                                </p>
                            </td>
                            <td>
                                <p class="p-0 m-0 mt-1 text-nowrap">
                                    ${setType(prop.type)} Visa
                                </p>
                            </td>
                            <td>
                                <div onclick="handelShowCommision(${prop.id})">
                                <img class="commision-img" src="/assets/images/icons_mastercard_credit_card.svg" alt="">
                                </div>
                            </td>
                        </tr>
                            `)
                        })
                    } else {
                        for (let i = 0; i < 2; i++) {
                            $('.table-data tbody').append(`
                        <tr data-id="${i}" >
                        <td>
                           ${seetAvator(null)}
                        </td>
                        <td>
                            <p class="p-0 m-0 mt-1 text-nowrap">
                              __
                            </p>
                        </td>
                        <td>
                            <p class="p-0 m-0 mt-1 text-nowrap">
                            ${setStatus(null)}
                            </p>
                        </td>
                        <td>
                            <p class="p-0 m-0 mt-1 text-nowrap">
                                ${setType(null)}
                            </p>
                        </td>
                        <td>
                            <div onclick="handelShowCommision(${i})">
                            <img class="commision-img" src="/assets/images/icons_mastercard_credit_card.svg" alt="">
                            </div>
                        </td>
                    </tr>
                          `);
                        }

                    }


                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        if (index == 0) {
            $(element).click();
        }
    });
    $('.change-info').on('click', function () {
        $.ajax({
            url: "/partner/introduced/update",
            type: "POST",
            data: {
                name: $('input[name=name]').val(),
                email: $('input[name=email]').val(),
                age: $('input[name=age]').val(),
                edit: "prof"
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                Swal.fire("", "Successfully", "success").then(
                    ({
                        isConfirmed
                    }) => {
                        if (isConfirmed) {
                            location.reload();
                        }
                    }
                );
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
    $('#modal-payment .close').on('click', function () {
        $('#modal-payment').modal('hide');
    })
    $('.change-password').on('click', function () {
        let newPass = $('input[name=new-password]').val();
        let existNewPass = newPass.length > 0;
        let confirmPass = $('input[name=confirm-new-password]').val();
        if (newPass == confirmPass && existNewPass) {
            $.ajax({
                url: "/partner/introduced/update",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    edit: 'pass',
                    pass: $('input[name=password]').val(),
                    newpass: $('input[name=new-password]').val()
                },
                success: function (data) {
                    console.log(data);
                    if (data.status === 401) {
                        Swal.fire("", "current passowrd wrong", "error");
                    }
                    if (data.status == 200) {
                        location.reload();
                    }
                }, error: function (error) {
                    console.log(error);
                }
            })
        }
    });
    $.ajax({
        url: "/partner/introduced/count",
        type: "GET",
        success: function (data) {
            console.log(data);
            $('.student-count').html(data.student);
            $('.count-investor').html(data.investor);
            $('.count-visitor').html(data.visitor);
            $('.count-sx').html(data['ex/sx']);
        }, error: function (error) {
            console.log(error);
        }
    });
    if (reset_pass == 0) {
        $('#modal-reset-pass').modal('show');
        $('.send-email-reset').on('click', function () {
            $.ajax({
                url: "/partner/resetpass",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    id: auth_user,
                    email: $('input[name=email-reset-pass]').val()
                },
                success: function (data) {
                    console.log(data);
                    $('.check-email-text').removeClass('d-none');
                },
                error: function (error) {
                    console.log(error);
                }
            })
        })
    }
});
function changeState() {
    if ($(window).width() <= 1199) {
        $('.table-all').removeClass('col-md-10').addClass('col-md-12');
        $('.status-all').addClass('d-none');
        $('.parent-hide-small').css({
            display: "block"
        });
    } else {
        $('.table-all').addClass('col-md-10').removeClass('col-md-12');
        $('.status-all').removeClass('d-none');
        $('.parent-hide-small').css({
            display: "none"
        });
    }
    if ($(window).width() <= 991) {
        $('.parent-navbar').css({
            display: "none"
        });
        $('.parent-hide-mobile').css({
            display: "block"
        });
        $('.parent-content').removeClass('col-md-9').addClass('col-md-12').addClass('px-2')
    } else {
        $('.parent-navbar').css({
            display: "block"
        });
        $('.parent-hide-mobile').css({
            display: "none"
        });
        $('.parent-content').addClass('col-md-9').removeClass('col-md-12').removeClass('px-2')
    }
}
const setType = (type) => {
    if (type == 2) {
        return 'Student Visa';
    } else if (type == 4) {
        return 'Vistior Visa';
    } else if (type == 3) {
        return 'Investor Visa'
    } else if (type == 5) {
        return 'SX/EX Visa';
    } else {
        return `_`
    }
}
const setStatus = (status) => {
    if (status == 1) {
        return `<img width="25px" src="/assets/images/icons8_metamorphose_2.svg"/>`
    } else if (status == 2) {
        return `<img width="25px" src="/assets/images/icons_meeting.svg"/>`
    } else if (status == 3) {
        return `<img width="25px" src="/assets/images/icons_pay_1.svg"/>`
    } else if (status == 4) {
        return `<img width="25px" src="/assets/images/icons8_canada.svg"/>`
    } else if (status == 5) {
        return `<img width="25px" src="/assets/images/icons8_cash.svg"/>`
    } else if (status == 6) {
        return `<img width="25px" src="/assets/images/icons_meeting.svg"/>`
    } else if (status == 7) {
        return `<img width="25px" src="/assets/images/icons8_delivery_time_1.svg"/>`
    } else {
        return `<p>_</p>`
    }
}
const seetAvator = (img) => {
    if (img) {
        return `<img class="img-table-data" width="36px" height="37px" src="${img}"/>`
    } else {
        return `<img class="img-table-data" width="36px" height="37px" src="/assets/images/img-null.png"/>`
    }
}
const handelShowCommision = (id) => {
    console.log(id);
    $.ajax({
        url: '/partner/payment/get/' + id,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").removeClass("d-none");
        },
        success: function (data) {
            $(".preloader").addClass("d-none");
            $('.append-table-payment').empty();
            let result = data.data;
            let totalPay = 0;
            console.log(result);
            $('.date-now-invoice').text(moment().locale("en").format("YYYY MMM DD"))
            result.forEach(function (element, index) {
                totalPay += parseInt(element.commision);
                $('.order-invoice').text(`order # ${element.id}`);
                if (element.type == 2) {
                    $('.append-table-payment').append(` 
                <h3 class="border-bottom w-25 text-nowrap pt-4">
                            ${moment(element.date).locale("en").format("YYYY MMM DD")}
                             <span class="ml-3">
                             ${element.time}
                             </span>
                 </h3>
                        <div class="parent-table-payment">
                            <table border="1"
                                class="table-responsive-lg table w-100 table-striped table-student nowrap text-center">
                                <thead>
                                    <tr>
                                        <td>
                                            Item
                                        </td>
                                        <td>
                                            Price
                                        </td>
                                        <td>
                                            Tax
                                        </td>
                                        <td>
                                            Total
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            ${index == 0 ? 'First' : index == 1 ? "Second" : index == 2 ? "Third" : ""} Commission
                                        </td>
                                        <td>
                                            $ ${element.commision}
                                        </td>
                                        <td>
                                            $ 0
                                        </td>
                                        <td>
                                            $ ${element.commision}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>`);
                }
            });
            $('.append-table-payment').append(`
            <div class="w-100 total-payment-show">
                <div class="d-flex justify-content-between px-3">
                <div><h4 class="text-white my-auto"><b>Total</b></h4></div> 
                <div><h4 class="text-white my-auto"><b>$ ${totalPay}</b></h4></div>   
                </div>
            </div>
            <div class="text-center mx-auto w-50 mt-4">
            <p>
                We sincerely appreciate your business,
and looking forward to working with you again soon!
</p>    
            </div>
            `);

            $('#modal-payment').modal('show')

        },
        error: function (error) {
            console.log(error);
        }
    })

}
const handelChangeImg = () => {
    $('input[name=file]').click();
}
$('input[name=file]').on('change', function (e) {
    let file = e.target.files[0];
    let formData = new FormData();
    formData.append('img', file);
    formData.append('edit', "img");
    $.ajax({
        url: "/partner/introduced/update",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            location.reload();
        }, error: function (error) {
            console.log(error);
        }
    })
});
const logout = () => {
    $.ajax({
        url: "/member/logout",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            location.href = "/partner/login";
        }, error: function (error) {
            console.log(error);
        }
    })
}
const activeRoute = () => {
    $('.navbar-panel li').each(function (index, element) {
        let tag = $(element).find('a').attr('href');

        if (tag == location.href) {
            $(element).addClass('active');
        }
    })
}
const handelAddDate = () => {
    $('.date-span').each(function (index, element) {
        $(element).html(moment().locale("en").format("YYYY/MM/DD"))
    })
}
const openNav = () => {
    if ($('.parent-hide-mobile').css('display') == "block") {
        $('.navbar-hide-mobile').css({
            width: "300px",
            padding: "20px"
        })
    }
}
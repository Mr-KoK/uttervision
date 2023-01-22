let pageUrl = window.location;
$(document).ready(function (){
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
        var url = $(this).attr('href');
        getCountries(url);
        window.history.pushState("", "", url);
    });
    $('._delete-country').on('click',function (e){
        let countryId = $(this).attr('country-id');
        e.preventDefault();
        console.log('run delete watch');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#25d9f8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('._countries ._spinner').addClass('show');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    method: 'DELETE',
                    url : '/admin/country/'+ countryId,

                }).done(function (data) {
                    getCountries(pageUrl);
                    Swal.fire(
                        'Deleted!',
                        'Your country has been deleted.',
                        'success'
                    )
                }).fail(function () {
                    alert('Country could not be loaded.');
                });

            }
        })
    })
    watchShowOnMap();
})
function getCountries(url) {
    $('._countries ._spinner').addClass('show');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        method: 'post',
        url : url
    }).done(function (data) {
        $('._countries').html(data);
        $('._countries ._spinner').removeClass('show');
        $('._delete-country').on('click',function (e){
            let countryId = $(this).attr('country-id');
            e.preventDefault();
            console.log('run delete watch');
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
                    $('._countries ._spinner').addClass('show');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        method: 'DELETE',
                        url : '/admin/country/'+ countryId,

                    }).done(function (data) {
                        getCountries(pageUrl);
                        Swal.fire(
                            'Deleted!',
                            'Your country has been deleted.',
                            'success'
                        )
                    }).fail(function () {
                        alert('Country could not be loaded.');
                    });
                }
            })
        })
        watchShowOnMap();
    }).fail(function () {
        alert('Country could not be loaded.');
    });
}

function watchShowOnMap(){
    $('._show_on_map').on('change',function (){
        let data ={
            country_status : $(this).is(':checked') ? 1 : 0,
            country : $(this).attr('country-id'),
        }
        ajax('/admin/country/update-show-map','post',data ,function (response){
            if (response.success){
                setNotification('Show On Map Updated!',notification_status.success)
            }
        })
    })
}
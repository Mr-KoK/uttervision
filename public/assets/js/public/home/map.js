$(document).ready(function () {
    $('._pointer ._get-start').on('click', function () {
        let destinationId = $(this).parent().parent().parent().parent().attr('country-id');
        window.location.href = '/steps?country=' + destinationId + '';
    })
    $('._point-info').mouseleave(function () {
        $(this).find('._learn-more').slideUp();
    })
    $('._get-learn').on('click', function (e) {
        $(this).parent().find('._learn-more').slideToggle();
    })
    // $('.map-point').on('click',function (e){
    //     e.stopPropagation();
    //     e.preventDefault();
    //     $(this).parent().parent().find('._point-info-select').fadeToggle();
    // })
    // $('body').on('click',function (){
    //     $('._point-info-select').fadeOut();
    // })
})








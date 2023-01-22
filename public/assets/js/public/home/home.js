class User  {
    constructor(destinationId = '' , visaType = '') {
        this.destination = destinationId
        this.visaType= visaType
    }
}
$(document).ready(function (){
    $('.map-blocks ._pointer').on('mouseenter',function (){
        $(this).find('._point-info').fadeIn('fast');
    })

    $('.map-blocks ._pointer').on('mouseleave',function (){
        $(this).find('._point-info').fadeOut('fast');
    })
})
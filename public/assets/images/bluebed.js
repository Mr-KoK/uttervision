$(document).ready(function () {
    //-----------Collapse---------------
    $('.collapse-btn').on('click',function (e){{
        e.preventDefault();
        e.stopPropagation();
        // $(this).parent().parent().find('.collapse').each(function (index,item){
        //     $(item).removeClass('active');
        // })
        $(this).parent().toggleClass('active');
    }});

});
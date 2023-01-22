$(document).ready(function () {
    $('.tab-btn').on('click', function () {
        $('.tab-btn').each(function (index, item) {
            $(item).removeClass('active');
        })
        $(this).addClass('active')
        let target = $(this).attr('data-bs-target');
        $('.tab-bodies .tab-body').each(function (key,body){
            let holder = $(body).attr('holder');
            target == holder ? $(body).addClass('active') : $(body).removeClass('active')
        })
    })

    $('.review-row ').on('change',function (){
        let rowId = $(this).attr('row-id');
        let status = $(this).val();
        let data ={
            row_id : rowId,
            status : status
        }
        ajax('/admin/user/updateRowStatus','Post',data,function (Response){
            if(Response.success){
                setNotification('Update Successfully!',notification_status.success)
            }
            else {
                setNotification('We Have a Problem!',notification_status.danger)
            }
        })
    })
})
$(()=>{
    $('.make-partner').on('click',function (){
        Swal.fire({
            title: 'Are you sure Promote This User To Partner?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Promote it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let data={
                    user_id : $(this).attr('user-id')
                }
                ajax('/admin/user/promote','POST',data,function (response){
                    if(response.success){
                        swal.fire({
                            icon:'success',
                            title:'User Promoted To Partner Successfully'
                        })
                    }
                })
            }
        })
    })
})
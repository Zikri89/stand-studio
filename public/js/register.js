const Toast = Swal.mixin({
    toast: true,
    position: 'top-start',//top-end,center,center-start,center-end,bottom,bottom-start,bottom-end
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

$(".save-data").on('click',function(event){
    event.preventDefault();
    var firstName   = $('.firstName').val();
    var lastName    = $('.lastName').val();
    var email       = $('.email').val();
    var password    = $('.password').val();
    var level       = $('.level').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/ajax-register",
        type:"POST",
        data:{firstName:firstName,lastName:lastName,email:email,password:password,level:level},
		dataType:"json",
        success:function(response){
            if($.isEmptyObject(response.error)){
                Toast.fire({
                    icon: 'success',
                    title: response.message
                })

                setTimeout(function(){
                    window.location.href='/login';
                }, 3000);
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.error
                })
            }
        },
        error: function(error) {
            console.log(error);
            Toast.fire({
                icon: 'error',
                title: 'Email Already Exist'
            })
        }
    });
});

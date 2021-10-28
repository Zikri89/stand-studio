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

$(".btn-login").on('click',function(event){
    event.preventDefault();
    var email = $('#email').val();
    var password = $("#password").val();
    if(email == ""){
        Toast.fire({
            icon: 'error',
            title: 'Email is require'
        });

        return false;
    }
    
    if(password == ""){
        Toast.fire({
            icon: 'error',
            title: 'Password is require'
        });

        return false;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/ajax-login",
        type:"POST",
        data:{email:email,password:password},
		dataType:"json",
        success:function(response){
            console.log(response);
            Toast.fire({
                icon: 'success',
                title: response.message
            })

            setTimeout(function(){
                window.location.href='/dashboard';
            }, 3000);
        },
        error: function(error) {
            Toast.fire({
                icon: 'error',
                title: error.responseJSON.message
            });
        }
    });
});

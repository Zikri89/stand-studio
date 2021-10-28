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
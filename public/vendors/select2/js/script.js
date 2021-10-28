$(".tireBrand,.truckBrand,.truckType").select2({
    tags: true,
    tokenSeparators: [','],
});

$('.submit').on('click', function(e){
    e.preventDefault();
    var submit = $(this).attr('id');
    if(submit=='save-tire-master'){
        var url = "ajax-order-tire"; 
        var dataMaster = $('.tireBrand').val();
    }else if(submit=='save-truck-brand'){
        var url = "ajax-order-truck-brand"; 
        var dataMaster = $('.truckBrand').val();
    }else {
        var url = "ajax-order-truck-type";
        var dataMaster = $('.truckType').val(); 
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type:"POST",
        data:{dataMaster:dataMaster},
		dataType:"json",
        success:function(response){
            console.log(response);
            Toast.fire({
                icon: 'success',
                title: response.message
            })
        },
        error: function(error) {
            console.log(error);
        }
    });
});
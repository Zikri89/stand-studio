var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").on('click',function(){
    var truckType = $('.truckType').val();
    var truckBrand = $('.truckBrand').val();
    var platNomor = $('.platNomor').val();

    if(truckType == null){
        Toast.fire({
            icon: 'error',
            title: 'Jenis Mobil Require'
        });
    }else if(truckBrand == null){
        Toast.fire({
            icon: 'error',
            title: 'Merek Mobil Require'
        });
    }else if(platNomor == ""){
        Toast.fire({
            icon: 'error',
            title: 'Plat Nomor Require'
        });
    }else{
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({'display': 'none','position': 'relative'});
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    }
});

$(".previous").on('click',function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;
            current_fs.css({'display': 'none','position': 'relative'});
            previous_fs.css({'opacity': opacity});
        },
        duration: 600
    });
});

$('.truckType').select2({
    placeholder: "Pilih Jenis Mobil...",
    ajax: {
		url: "/createTruckTypeJson",
		dataType: 'json',
		data: function (params) {
			return {
				q: $.trim(params.term)
			};
		},
		processResults: function (data) {
			return {
				results: data
			};
		},
		cache: true
	}
});

$('.truckBrand').select2({
    placeholder: "Pilih Merek Mobil...",
    ajax: {
		url: "/createTruckBrandJson",
		dataType: 'json',
		data: function (params) {
			return {
				q: $.trim(params.term)
			};
		},
		processResults: function (data) {
			return {
				results: data
			};
		},
		cache: true
	}
});

$('.brand').select2({
    placeholder: "Pilih Merek Ban...",
    ajax: {
		url: "/createBrandJson",
		dataType: 'json',
		data: function (params) {
			return {
				q: $.trim(params.term)
			};
		},
		processResults: function (data) {
			return {
				results: data
			};
		},
		cache: true
	}
});

$('.dateOrder').datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
});

$('.save-product-data').on('click', function(e){
    e.preventDefault();
    var datas = $('#msform').serialize();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/ajax-order-product",
        type:"POST",
        data:datas,
		dataType:"json",
        success:function(response){
            Toast.fire({
                icon: 'success',
                title: 'Data order already added'
            });

            setTimeout(function(){
                window.location.href='/list/product';
            }, 3000);
        },
        error: function(error) {
            console.log(error);
        }
    });
});

$('.edit-product-data').on('click', function(e){
    e.preventDefault();
    var datas = $('#msform').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/ajax-edit-product",
        type:"POST",
        data:datas,
		dataType:"json",
        success:function(response){
            Toast.fire({
                icon: 'success',
                title: 'Data order already added'
            });

            setTimeout(function(){
                window.location.href='/list/product';
            }, 3000);
        },
        error: function(error) {
            console.log(error);
        }
    });
});

$(document).on('click','.delete-product-data', function(){
    var ids = $(this).data('ids');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/ajax-delete-product",
        type:"POST",
        data:{ids:ids},
		dataType:"json",
        success:function(response){
            Toast.fire({
                icon: 'success',
                title: response.message
            });

            setTimeout(function(){
                $('.tableProduct').DataTable().ajax.reload();
            }, 3000);
        },
        error: function(error) {
            console.log(error);
        }
    });
});

//List Data Product  
var tableProduct = $('.tableProduct').DataTable({
    'paging'      	: true,
	'scrollX'       : true,
	'lengthChange'	: true,
	'searching'   	: true,
	'ordering'    	: false,
	'info'        	: true,
	'autoWidth'   	: true,
    'processing'	: true, //Feature control the processing indicator.
    'serverSide'	: true, //Feature control DataTables' server-side processing mode.
    'order': [], //Initial no order.
    // Load data for the table's content from an Ajax source
    'ajax': {
        'url': "/dataProduct",
    },
    'oLanguage': {'sProcessing': "Tunggu ya....!"},
    //Set column definition initialisation properties.
    'columns': [
        {data: 'truckTypeName', name: 'truck_types.name'},
        {data: 'name', name: 'truck_brands.name'},
        {data: 'brand', name: 'tire_brands.brand'},
        {data: 'platNomor', name: 'products.platNomor'},
        {data: 'sertifikat', name: 'products.sertifikat'},
        {data: 'speck', name: 'products.speck'},
        {data: 'qty', name: 'products.qty'},
        {data: 'safetyWarning', name: 'products.safetyWarning',
            render:function(data, type, row){
                return row.safetyWarning
            }
        },
        {data: 'dateOrder', name: 'products.dateOrder'},
        {data:'action', name:'action'}
    ]
});
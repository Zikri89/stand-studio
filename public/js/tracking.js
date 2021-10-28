//List Data Product  
var tableTracking = $('.tableTracking').DataTable({
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;

        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        total = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 4 ).footer() ).html(
            total + ' Tier'
        );
    },
    'paging'      	: false,
	'lengthChange'	: true,
	'searching'   	: false,
	'ordering'    	: false,
	'info'        	: true,
	'autoWidth'   	: true,
    'processing'	: true, //Feature control the processing indicator.
    'serverSide'	: true, //Feature control DataTables' server-side processing mode.
    'order': [], //Initial no order.
    // Load data for the table's content from an Ajax source
    'ajax': {
        'url': "/trackingProduct",
        'data': function (d) {
            d.brand = $('.brand').val(),
            d.platNomor = $('.platNomor').val()
        }
    },
    'oLanguage': {'sProcessing': "Tunggu ya....!"},
    //Set column definition initialisation properties.
    'columns': [
        {data: 'truckTypeName', name: 'truck_types.name'},
        {data: 'name', name: 'truck_brands.name'},
        {data: 'brand', name: 'tire_brands.brand'},
        {data: 'platNomor', name: 'products.platNomor'},
        {data: 'qty', name: 'products.qty',
            render:function(data, type, row){
                return row.qty + ' Tier '
            }
        },
        {data: 'dateOrder', name: 'products.dateOrder'},
    ],
});

$(".platNomor").on('keyup',function(){
    tableTracking.draw();
});

$(".brand").on('change',function(){
    tableTracking.draw();
});
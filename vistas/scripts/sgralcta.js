var tabla;

//Función que se ejecuta al inicio
function init(){
	$(window).on('load', function () {
			setTimeout(function () {
		$(".loader-page").css({visibility:"hidden",opacity:"0"})
	}, 1000);

	});

	fechanow();
	listar();
	$("#fecha_inicio").change(listar);
	$("#fecha_fin").change(listar);
}


/*------------------------------------*
| FUNCION PARA CALCULAR FECHA ACTUAL  |
.------------------------------------*/
function fechanow()
{
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
	$('#fecha_inicio').val(today);
	$('#fecha_fin').val(today);
}


/*---------------------------------*
| FUNCION PARA LISTAR S_GRAL_CTAS  |
.---------------------------------*/
function listar()
{
	var fecha_inicio = $("#fecha_inicio").val();
	var fecha_fin = $("#fecha_fin").val();

	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf',
								{
					extend: 'excelHtml5',
					autoFilter: true,
					text: 'Save as Excel',
					customize: function( xlsx ) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];
							$('row:first c', sheet).attr( 's', '20' );
						 // $('row c[r*="1"]', sheet).attr( 's', '25' );
					}
			}
		        ],
		  columnDefs: [
	 	    				{ width: 20, targets: 0 },
	 	            { width: 80, targets: 1 },
								{ width: 130, targets: 2 },
								{ width: 120, targets: 9 },
								{ width: 100, targets: 10 }
	 					      ],
		"ajax":
				{
					url: '../ajax/sgralcta.php?op=excel_ctas_generales',
					data:{fecha_inicio: fecha_inicio,fecha_fin: fecha_fin},
					type : "get",
					dataType : "json",
					error: function(e){
						console.log(e.responseText);
					}
				},
		"bDestroy": true,
		"iDisplayLength": 15,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	}).DataTable();
}



init();

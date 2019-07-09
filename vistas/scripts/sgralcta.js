var tabla;

//Función que se ejecuta al inicio
function init(){

	$(document).on('focusout', '.update', function() {

	var id = $(this).data("id");
	var columna_nombre = $(this).data("column");
	var valorcol = $(this).text();
	bootbox.confirm("¿Está Seguro de realizar la modificacion del Reporte?", function(result) {
		if (result) {
			update_data(id, columna_nombre, valorcol);
		}else {
			$('#tbllistado').DataTable().ajax.reload(null, false);
		}
	})
	});

	$(window).on('load', function () {
			setTimeout(function () {
		$(".loader-page").css({visibility:"hidden",opacity:"0"})
	}, 1000);

	});

	fechanow();
	listar();
	listar_excel_renglones();
	listar_excel_programas();

	$("#fecha_inicio").change(listar);
	$("#fecha_fin").change(listar);
	$("#año").change(listar_excel_renglones);
	$("#añopro").change(listar_excel_programas);
}


/*---------------------------------------------*
| FUNCION JS PARA ABRIR CON DOBLE CLICK LA ROW |
.---------------------------------------------*/
function listenForDoubleClick(element) {
	element.contentEditable = true;
	setTimeout(function() {
		if (document.activeElement !== element) {
			element.contentEditable = false;
		}
	}, 300);
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
								{
			            text: '<i class="fas fa-file-excel" style="color:green;"></i> Reporte',
			            className: 'btn btn-default btnAddJob',
			            titleAttr: 'Reporte de Consolidado de Cuentas',
			            action: function (dt, node, config) {
											var uri = "../reportes/RE_contabilidad_ctasgrles.php?fecha_inicio_excel="+fecha_inicio+"&fecha_fin_excel="+fecha_fin;
											window.location = uri;
			            	}
        				},
		            'csvHtml5',
								{
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'TABLOID'
            		}
		        ],
		  columnDefs: [
	 	    				{ width: 20, targets: 0 },
	 	            { width: 80, targets: 1 },
								{ width: 130, targets: 2 },
								{ width: 90, targets: 3 },
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


/*----------------------------------------------*
| FUNCION PARA LISTAR CONSOLIDADO POR RENGLONES |
.----------------------------------------------*/
function listar_excel_renglones()
{
	 var año = $("#año").val();

	 tabla=$('#tbllistado_renglones').dataTable(

	 {
	 		"aProcessing": true,
	 		"aServerSide": true,
	 		"deferRender": true,
			  "language": {
					'loadingRecords': '<i class="fas fa-circle-notch fa-spin fa-1x fa-fw"></i><br>&nbsp;&nbsp;Cargando...'
			 	},
	 		dom: 'Bfrtip',
	 		buttons: [
	 							'copyHtml5',
	 							{
	 								text: '<i class="fas fa-file-excel" style="color:green;"></i> Reporte',
	 								className: 'btn btn-default btnAddJob',
	 								titleAttr: 'Reporte de Consolidado de Cuentas',
	 								action: function (dt, node, config) {
	 										var uri2 = "../reportes/RE_contabilidad_renglones.php?año="+año;
	 										window.location = uri2;
	 									}
	 							},
	 							'csvHtml5',
	 							{
	 							extend: 'pdfHtml5',
	 							orientation: 'landscape',
	 							pageSize: 'TABLOID'
	 							}
	 					],
	 	"ajax":
	 			{
	 				url: '../ajax/sgralcta.php?op=excel_renglones',
	 				data:{año: año},
	 				type : "get",
	 				dataType : "json",
	 				error: function(e){
	 					console.log(e.responseText);
	 				}
	 			},
				"deferRender": true,
	 			// "initComplete": function(settings, json) {},
	 			"bDestroy": true,
	 			"iDisplayLength": 10,//Paginación
	 			"order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	 }).DataTable();

}


/*------------------------------------------------*
| FUNCION PARA LISTAR CONSOLIDADO POR PROVEEDORES |
.------------------------------------------------*/
function listar_excel_programas()
{
	 var añox = $("#añopro").val();

	 tabla=$('#tbllistado_programas').dataTable(

	 {
	 		"aProcessing": true,
	 		"aServerSide": true,
	 		"deferRender": true,
			  "language": {
					'loadingRecords': '<i class="fas fa-circle-notch fa-spin fa-1x fa-fw"></i><br>&nbsp;&nbsp;Cargando...'
			 	},
	 		dom: 'Bfrtip',
	 		buttons: [
	 							'copyHtml5',
	 							// {
	 							// 	text: '<i class="fas fa-file-excel" style="color:green;"></i> Reporte',
	 							// 	className: 'btn btn-default btnAddJob',
	 							// 	titleAttr: 'Reporte de Consolidado de Cuentas',
	 							// 	action: function (dt, node, config) {
	 							// 			var uri2 = "../reportes/RE_contabilidad_programas.php?año2="+año2;
	 							// 			window.location = uri2;
	 							// 		}
	 							// },
	 							'csvHtml5',
	 							{
	 							extend: 'pdfHtml5',
	 							orientation: 'landscape',
	 							pageSize: 'TABLOID'
	 							}
	 					],
	 	"ajax":
	 			{
	 				url: '../ajax/sgralcta.php?op=excel_programas',
	 				data:{añopro: añox},
	 				type : "get",
	 				dataType : "json",
	 				error: function(e){
	 					console.log(e.responseText);
	 				}
	 			},
				"deferRender": true,
	 			// "initComplete": function(settings, json) {},
	 			"bDestroy": true,
	 			"iDisplayLength": 10,//Paginación
	 			"order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	 }).DataTable();

}

/*--------------------------------------------*
| FUNCION JS PARA EDITAR DATOS DEL COMPROMISO |
.--------------------------------------------*/
function update_data(id, columna_nombre, valorcol) {


	$.ajax({
		url: "../ajax/sgralcta.php?op=editardatos",
		method: "POST",
		data: {
			id: id,
			columna_nombre: columna_nombre,
			valorcol: valorcol
		},

		success: function(datos) {
			bootbox.alert(datos);
			$('#tbllistado').DataTable().ajax.reload(null, false);
		}

	});
}



init();

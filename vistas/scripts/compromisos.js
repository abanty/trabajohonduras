var tabla;

//Función que se ejecuta al inicio
function init() {

	$(document).on('focusout', '.update', function() {

	var id = $(this).data("id");
	var columna_nombre = $(this).data("column");
	var valorcol = $(this).text();
	bootbox.confirm("¿Está Seguro de realizar la modificacion del compromiso?", function(result) {
		if (result) {
			update_data(id, columna_nombre, valorcol);
		}else {
			$('#tbllistado').DataTable().ajax.reload(null, false);
		}
	})
	});

mostrar_loader();


	mostrarform(false);


	listar();


	$("#formulario").on("submit", function(e) {
		guardaryeditar(e);
	})


	$(document).on("keypress", 'form', function(e) {
		var code = e.keyCode || e.which;
		if (code == 13) {
			e.preventDefault();
			return false;
		}
	});


	//Cargamos los items al select categoria
	$.post("../ajax/compromisos.php?op=selectProveedores", function(r) {
		$("#idproveedores").html(r);
		$('#idproveedores').selectpicker('refresh');
	});

	//Cargamos los items al select cliente
	$.post("../ajax/compromisos.php?op=selectPrograma", function(r) {
		$("#idprograma").html(r);
		$('#idprograma').selectpicker('refresh');
	});



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


/*-------------------------------*
| FUNCION JS PARA MOSTRAR LOADER |
.-------------------------------*/
function mostrar_loader(){
	$(window).on('load', function() {
		setTimeout(function() {
			$(".loader-page").css({
				visibility: "hidden",
				opacity: "0"
			})
		}, 1000);
	});
}


/*-------------------------------*
| FUNCION JS PARA LIMPIAR CAMPOS |
.-------------------------------*/
function limpiar() {
	// $("#idprograma").val("");
	// $("#programa").val("");
	// $("#idproveedores").val("");
	// $("#casa_comercial").val("");
	$("#numfactura").val("");
	$("#total_compra").val("");

	$("#total_compra").val("");
	$(".filas").remove();
	$("#total").html("0");

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear() + "-" + (month) + "-" + (day);
	$('#fecha_hora').val(today);
}


/*-----------------------------------*
| FUNCION JS PARA MOSTRAR FORMULARIO |
.-----------------------------------*/
function mostrarform(flag) {

	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
		$("#btnAgregarArt").show();
		listarPresupuesto_disponible();

	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();

	}
}


/*-------------------------*
| FUNCION JS PARA CANCELAR |
.-------------------------*/
function cancelarform() {
	limpiar();
	mostrarform(false);
}


/*-----------------------*
| FUNCION JS PARA LISTAR |
.-----------------------*/
function listar() {
	tabla = $('#tbllistado').dataTable({
		"aProcessing": true, //Activamos el procesamiento del datatables

		language : {

				sLoadingRecords : '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>',
				'processing': 'Loading...',
		},
		"aServerSide": true, //Paginación y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdf'
		],
		columnDefs: [{
				width: 100,
				targets: 0
			},
			{
				width: 80,
				targets: 1
			},
			{
				width: 0,
				targets: 2
			},
			{
				width: 0,
				targets: 3
			},
			{
				width: 0,
				targets: 4
			},
			{
				width: 140,
				targets: 5
			},
			{
				width: 0,
				targets: 6
			},
			{
				width: 0,
				targets: 7
			},
			{
				width: 0,
				targets: 8
			}
		],
		"ajax": {
			url: '../ajax/compromisos.php?op=listar',
			type: "get",
			dataType: "json",
			error: function(e) {
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 10, //Paginación
		"order": [
			[8, "asc"]
		] //Ordenar (columna,orden)
	}).DataTable();
}


/*---------------------------------------------*
| FUNCION JS PARA LISTA PRESUPUESTO DISPONIBLE |
.---------------------------------------------*/
function listarPresupuesto_disponible() {
	tabla = $('#tblpresupuesto_disponible').dataTable({
		"aProcessing": true, //Activamos el procesamiento del datatables
		"aServerSide": true, //Paginación y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla
		buttons: [

		],
		"ajax": {
			url: '../ajax/compromisos.php?op=listarPresupuesto_disponible',
			type: "get",
			dataType: "json",
			error: function(e) {
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 5, //Paginación
		"order": [
			[0, "desc"]
		] //Ordenar (columna,orden)
	}).DataTable();
}


/*----------------------------------------------*
| FUNCION JS PARA INSERTAR DATOS DEL COMPROMISO |
.----------------------------------------------*/
function guardaryeditar(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/compromisos.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos) {
			bootbox.alert(datos);
			mostrarform(false);
			listar();
		}

	});
	limpiar();
}


/*--------------------------------------------*
| FUNCION JS PARA EDITAR DATOS DEL COMPROMISO |
.--------------------------------------------*/
function update_data(id, columna_nombre, valorcol) {


	$.ajax({
		url: "../ajax/compromisos.php?op=editardatos",
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


function mostrar(idcompromisos) {

	$.post("../ajax/compromisos.php?op=mostrar", {
		idcompromisos: idcompromisos
	}, function(data, status) {
		data = JSON.parse(data);
		mostrarform(true);


		$("#idproveedor").val(data.idproveedor);
		$("#idproveedor").selectpicker('refresh');
		$("#idprograma").val(data.idprograma);
		$("#idprograma").selectpicker('refresh');
		$("#fecha_hora").val(data.fecha);
		$("#tipo_registro").val(data.$tipo_registro);
		$("#tipo_registro").selectpicker('refresh');
		$("#numfactura").val(data.numfactura);
		$("#idcompromisos").val(data.idcompromisos);
		$("#total").html("L. " + number_format(data.total_compra, 2, '.', ','));
		$("#btnAgregarArt").hide();

	})

	$.post("../ajax/compromisos.php?op=listar_C_Detalle&id=" + idcompromisos, function(r) {
		$("#detalles tbody").html(r);
	});

}

//Función para desactivar registros
function pagado(idcompromisos) {
	bootbox.confirm("¿Está Seguro de validar el compromiso a pagado?", function(result) {
		if (result) {
			$.post("../ajax/compromisos.php?op=pagado", {
				idcompromisos: idcompromisos
			}, function(e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//Función para activar registros
function tramitar(idcompromisos) {
	bootbox.confirm("¿Está Seguro de realizar el Tramite de retencion?", function(result) {
		if (result) {
			$.post("../ajax/compromisos.php?op=tramitar", {
				idcompromisos: idcompromisos
			}, function(e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//Función para activar registros
function destramitar(idcompromisos) {
	bootbox.confirm("¿Está Seguro de deshacer el Tramite de retencion?", function(result) {
		if (result) {
			$.post("../ajax/compromisos.php?op=destramitar", {
				idcompromisos: idcompromisos
			}, function(e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//Función para eliminar registros
function eliminar(idcompromisos) {
	bootbox.confirm("¿Está Seguro de eliminar el Compromiso?", function(result) {
		if (result) {
			$.post("../ajax/compromisos.php?op=eliminar", {
				idcompromisos: idcompromisos
			}, function(e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont = 0;
var detalles = 0;
//$("#guardar").hide();
$("#btnGuardar").hide();

function agregarDetalle(idpresupuesto_disponible, presupuesto_disponible, codigo) {

	var valor = 0;

	if (idpresupuesto_disponible != "") {
		var subtotal = valor;
		var fila = '<tr class="filas" id="fila' + cont + '">' +
			'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle(' + cont + ')">x</button></td>' +
			'<td><input type="hidden" name="idpresupuesto_disponible[]" value="' + idpresupuesto_disponible + '">' + presupuesto_disponible + '</td>' +
			'<td><input type="text" class="form-control input-sm prec" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="valor[]" value="' + valor + '"></td>' +
			'<td><span name="subtotal" id="subtotal' + cont + '">' + subtotal + '</span></td>' +
			'</tr>';
		cont++;
		detalles = detalles + 1;
		$(function() {
			$('.prec').maskMoney({
				thousands: ',',
				decimal: '.',
				allowZero: true
			});
		});
		$('#detalles').append(fila);
		modificarSubototales();
	} else {
		alert("Error al ingresar el detalle, revisar los datos del presupuesto disponible");
	}
}


function number_format(number, decimals, dec_point, thousands_sep) {
	// Strip all characters but numerical ones.
	number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
	var n = !isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		s = '',
		toFixedFix = function(n, prec) {
			var k = Math.pow(10, prec);
			return '' + Math.round(n * k) / k;
		};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}



function modificarSubototales() {
	var valor = document.getElementsByName("valor[]");
	var sub = document.getElementsByName("subtotal");

	for (var i = 0; i < valor.length; i++) {
		var inpC = valor[i];
		var inpS = sub[i];

		var preci_unit_valor = parseFloat((inpC.value).replace(/,/g, ''));

		inpS.value = preci_unit_valor * 1;
		var valuesubt = parseFloat(Math.round(inpS.value * 100) / 100).toFixed(2);
		document.getElementsByName("subtotal")[i].innerHTML = "Lps. " + number_format(valuesubt, 2, '.', ',');
	}
	calcularTotales();

}


function calcularTotales() {
	var sub = document.getElementsByName("subtotal");
	var total = 0.0;

	for (var i = 0; i < sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
		totales = parseFloat(Math.round(total * 100) / 100).toFixed(2);
	}
	$("#total").html("L. " + number_format(totales, 2, '.', ','));
	$("#total_compra").val(total);
	evaluar();
}

function evaluar() {
	if (detalles > 0) {
		$("#btnGuardar").show();
	} else {
		$("#btnGuardar").hide();
		cont = 0;
	}
}

function eliminarDetalle(indice) {
	$("#fila" + indice).remove();
	calcularTotales();
	detalles = detalles - 1;
	evaluar();
}


init();

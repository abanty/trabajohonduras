var tabla;

//Función que se ejecuta al inicio
function init(){
	$(window).on('load', function () {
			setTimeout(function () {
		$(".loader-page").css({visibility:"hidden",opacity:"0"})
	}, 1000);

	});

	mostrarform(false);
	listar();
	listar_pres_detallado();
	fechanow();
	$("#detalles tbody").html('<td id="mynewtd" colspan="5" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
	$(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
});
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	});
}

//Función limpiar
function limpiar()
{
	$("#detalles tbody").html('<td id="mynewtd" colspan="5" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
	$("#numf01").val("");
	$("#fecha_hora").val("");

	$("#total_importe").val("");
	$(".filas").remove();
	$("#total").html("Lps 0.00");

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
	$('#fecha_hora').val(today);
}

//Función mostrar formulario
function mostrarform(flag)
{
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarPresupuesto_disponible();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();



	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}

}


//Función cancelarform
function cancelarform()
{
	limpiar();
	fechanow();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/ingreso.php?op=listar',
					type : "get",
					dataType : "json",
					error: function(e){
						console.log(e.responseText);
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function listar_pres_detallado()
{
	tabla=$('#tbllistado_detallado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		 columnDefs:[
								{"visible": false, "targets":0}
						],
		"ajax":
				{
					url: '../ajax/ingreso.php?op=listar_Presupuesto_Detallado',
					type : "get",
					dataType : "json",
					error: function(e){
						console.log(e.responseText);
					}
				},
		"bDestroy": true,
		// "iDisplayLength": 10,//Paginación
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
			rowGroup: {
						startRender: function ( rows, group ) {
								return '<div style="text-align:center;padding-top: 10px;">AÑO DE DETALLADO : ' + group + ' ( ' +rows.count()+ ' Renglones Gestionado )</div>';
						},
					 dataSrc: 0
			 }
	}).DataTable();
}




//Función Listar presupuesto_disponible

function listarPresupuesto_disponible()
{
	tabla=$('#tblpresupuesto_disponible').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [

		        ],
		"ajax":
				{
					url: '../ajax/ingreso.php?op=listar_Presupuesto_disponible',
					type : "get",
					dataType : "json",
					error: function(e){
						console.log(e.responseText);
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}



//Función para guardar o editar
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/ingreso.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {
	          bootbox.alert(datos);
	          mostrarform(false);
	          listar();
	    }

	});
	limpiar();
}

function mostrar(idingreso)
{
	$.post("../ajax/ingreso.php?op=mostrar",{idingreso : idingreso}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);


		$("#numf01").val(data.numf01);
		$("#fecha_hora").val(data.fecha);
		$("#idingreso").val(data.idingreso);

		$("#total").html("L. " + number_format(data.total_importe, 2, '.', ','));
		$("#total_importe").val(number_format(data.total_importe, 2, '.', ','));



		//Ocultar y mostrar los botones
		$("#Guardar").show();
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/ingreso.php?op=listarDetalle&id="+idingreso,function(r){
	        $("#detalles tbody").html(r);
	});
}

//Función para anular registros
function anular(idingreso)
{
	bootbox.confirm("¿Está Seguro de anular el ingreso?", function(result){
		if(result)
        {
        	$.post("../ajax/ingreso.php?op=anular", {idingreso : idingreso}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont=0;
var detalles=0;
//$("#guardar").hide();
$("#btnGuardar").hide();

function agregarDetalle(idpresupuesto_disponible,presupuesto_disponible,codigo)
  {

    var monto=0.00;

    if (idpresupuesto_disponible!="")
    {
    	var subtotal=monto;


    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">x</button></td>'+
    	'<td><input type="hidden" class="form-control input-sm" name="any[]" value=""><input type="hidden" class="form-control input-sm" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+presupuesto_disponible+'</td>'+
	    '<td><input type="text" class="form-control input-sm" name="actividad[]" value=""></td>'+
			'<td><input type="text" class="form-control input-sm prec" step="0.1" name="monto[]" onchange="modificarSubototales()" onkeyup="modificarSubototales()" value="'+monto+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
			$(function() {
				$('.prec').maskMoney({thousands:',', decimal:'.', allowZero:true});
			});
    	$('#detalles').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del presupuesto disponible");
    }
  }


	function number_format (number, decimals, dec_point, thousands_sep) {
	    // Strip all characters but numerical ones.
	    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
	    var n = !isFinite(+number) ? 0 : +number,
	        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	        s = '',
	        toFixedFix = function (n, prec) {
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



 function modificarSubototales()
  {

  	var monto = document.getElementsByName("monto[]");
		var any = document.getElementsByName("any[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <monto.length; i++) {
			var varR=any[i];
    	var inpC=monto[i];
    	var inpS=sub[i];

			varR.value = inpC.value;

			var preci_unit_valor = parseFloat((inpC.value).replace(/,/g, ''));

    	inpS.value=preci_unit_valor*1;
			var valuesubt = parseFloat(Math.round(inpS.value * 100) / 100).toFixed(2);
			document.getElementsByName("subtotal")[i].innerHTML = "Lps. " + 	number_format(valuesubt, 2, '.', ',');

    }
    calcularTotales();

  }
  function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
		totales = parseFloat(Math.round(total * 100) / 100).toFixed(2);
	}
	$("#total").html("Lps. " + number_format(totales, 2, '.', ','));

$("#total_importe").val(total);
    evaluar();
  }

  function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar").show();
			$("#mynewtd").remove();
    }
    else
    {
			$("#detalles tbody").html('<td id="mynewtd" colspan="5" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
      $("#btnGuardar").hide();
      cont=0;
    }
  }

  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar();
  }


init();

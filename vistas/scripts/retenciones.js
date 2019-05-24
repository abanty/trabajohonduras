/*----------------------------------*
| DECLARACION DE VARIABLES GLOBALES |
.----------------------------------*/

var tabla;

/*---------------*
| FUNCION INICIO |
.---------------*/
function init(){

	$(window).on('load', function () {
			setTimeout(function () {
		$(".loader-page").css({visibility:"hidden",opacity:"0"})
	}, 1000);

	});

	mostrarform(false);

	fechanow();

	listar();

	//Ejecutamos el evento Submit del boton y guardar los campos llenados
	$("#formulario").on("submit",function(e)
	{
		//Cargamos los items al select categoria
		$.post("../ajax/retenciones.php?op=ValidarNumDocReten", function(datos){
			datos = JSON.parse(datos);

			var num_d_reten = $('#numdocumento').val();

			if (datos.includes(num_d_reten)) {
				alert('Dato ya existe en la bd, digite otro por favor');
				$('#numdocumento').val("");
				$("#numdocumento").focus();

			}else {
				guardaryeditar(e);
			}
		});
		return false;
	})

	//Desabilitamos el evento de activacion del boton ITNRO
	$(document).on("keypress", 'form', function (e) {
		var code = e.keyCode || e.which;
		if (code == 13) {
				e.preventDefault();
				return false;
		}
	});

	//Cargamos los items al select Proveedor
	$.post("../ajax/retenciones.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');
				});

	//Selecionamos Proveedores del SelectBOX para ejecutar funcion
	$('#idproveedores').change(function() {
	  setrtn();
	});

}
//FIN INICIO


/*---------------------------------*
| FUNCION MOSTRAR RTN EN INPUT RTN |
.---------------------------------*/
function setrtn()
{
	rtn=$("#idproveedores").val();
	$.post("../ajax/retenciones.php?op=get_rtn",{idproveedores : rtn}, function(data, status)
	{
				datax = JSON.parse(data);
				$("#rtn").val(datax.rtn);
	});
}


/*----------------*
| FUNCION LIMPIAR |
.----------------*/
function limpiar()
{
	$("#idproveedores").selectpicker('val',"");
	$("#idproveedores").selectpicker('refresh');
	$("#rtn").val("");
  $("#idretenciones").val("");
	$("#numdocumento").val("");
	$("#tipo_impuesto").val("");
	$("#descripcion").val("");
	$("#base_imponible").val("");
	$("#imp_retenido").val("");
	$("#total_oc").val("");
	$(".filas").remove();
	$("#total").html("0");
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


/*---------------------------------------------*
| FUNCION PARA MOSTRAR EL FORMULARIO PRINCIPAL |
.---------------------------------------------*/
function mostrarform(flag)
{

	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnagregar").hide();
		listarCompromisos();
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


/*-----------------------------*
| FUNCION ACCIONES AL CANCELAR |
.-----------------------------*/
function cancelarform()
{
	limpiar();
	mostrarform(false);
}


/*-----------------------------*
| FUNCION LISTAR EN DATATABLE  |
.-----------------------------*/
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
						columnDefs: [
			 			  				{ width: 100, targets: 0 },			 			         

			 			      ],
		"ajax":
				{
					url: '../ajax/retenciones.php?op=listar',
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


/*-------------------------------------------*
| FUNCION LISTAR EN DATATABLE DENTRO DE MODAL |
.--------------------------------------------*/
function listarCompromisos()
{
	tabla=$('#tblcompromisos').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [

		        ],
		"ajax":
				{
					url: '../ajax/retenciones.php?op=listarCompromisos',
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


/*-------------------------*
| FUNCION GUARDAR Y EDITAR |
.-------------------------*/
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/retenciones.php?op=guardaryeditar",
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


/*----------------------*
| FUNCION MOSTRAR DATOS |
.----------------------*/
function mostrar(idretenciones)
{
	$.post("../ajax/retenciones.php?op=mostrar",{idretenciones : idretenciones}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

 		$("#idproveedores").val(data.idproveedores);
		$("#idproveedores").selectpicker('refresh');
		$("#rtn").val(data.rtn);
		$("#numdocumento").val(data.numdocumento);
		$("#fecha_hora").val(data.fecha);
		$("#tipo_impuesto").selectpicker('refresh');
		$("#tipo_impuesto").val(data.tipo_impuesto);
		$("#descripcion").val(data.descripcion);
		$("#base_imponible").val(data.base_imponible);
		$("#imp_retenido").val(data.imp_retenido);
		$("#total_oc").val(data.total_oc);
		$("#idretenciones").val(data.idretenciones);

		//Ocultar y mostrar los botones
		$("#Guardar").show();
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/retenciones.php?op=listarDetalle&id="+idretenciones,function(r){
	        $("#detalles tbody").html(r);
	});
}


/*---------------------*
| FUNCION ANULAR DATOS |
.---------------------*/
function anular(idretenciones)
{
	bootbox.confirm("¿Está Seguro de anular la retencion?", function(result){
		if(result)
        {
        	$.post("../ajax/retenciones.php?op=anular", {idretenciones : idretenciones}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}


/*---------------------------------------------*
| FUNCION CONVERTIR ENTEROS A MILLARES FORMATO |
.----------------------------------------------*/
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

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont=0;
var detalles=0;
//$("#guardar").hide();
$("#btnGuardar").hide();


/*---------------------------------------------------------------*
| FUNCION PARA AGREGAR DETALLES DEL MODAL A LA TABLA DE DETALLES |
.---------------------------------------------------------------*/
function agregarDetallefacturas(idcompromisos,numfactura)
  {

    var valorbase=0.00;

    if (idcompromisos!="")
    {
    	var subtotal=valorbase;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">x</button></td>'+
    	'<td><input type="hidden" class="form-control input-sm" name="idcompromisos[]" value="' + idcompromisos + '">'+numfactura+'</td>'+
    	'<td><input type="text" class="form-control input-sm prec" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="valorbase[]" value="'+valorbase+'"></td>'+
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


/*---------------------------------*
| FUNCION PARA CALCULAR SUBTOTALES |
.---------------------------------*/
 function modificarSubototales()
  {
		var idcom = document.getElementsByName("idcompromisos[]");
  	var valor = document.getElementsByName("valorbase[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <idcom.length; i++) {

			var inpC=idcom[i];
    	var inpV=valor[i];
    	var inpS=sub[i];
			var newvalue = inpV.value;
			var unit_valor = parseFloat(newvalue.replace(/,/g, ''));
    	inpS.value= unit_valor*1;
			var valuesubt = parseFloat(Math.round(inpS.value * 100) / 100).toFixed(2);
			document.getElementsByName("subtotal")[i].innerHTML = "Lps. " + 	number_format(valuesubt, 2, '.', ',');

    }
    calcularTotales();
  }


	/*------------------------------*
	| FUNCION PARA CALCULAR TOTALES |
	.------------------------------*/
  function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;

 		var tipo_imp = $("#tipo_impuesto").val();

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;

		newsubtotal_imp = total * tipo_imp;
		new_total = total + newsubtotal_imp;
		total_total = parseFloat(Math.round(new_total * 100) / 100).toFixed(2);
		impuesto_impuesto = parseFloat(Math.round(newsubtotal_imp * 100) / 100).toFixed(2);
		$("#imp_retenido").val(impuesto_impuesto);
	}

		$("#sub_total").html("Lps. " + number_format(total, 2, '.', ','));
		$("#base_imponible").val(total);
		$("#montototal").html("Lps. " + number_format(total_total, 2, '.', ','));
		$("#total_oc").val(total_total);

    evaluar();
  }

	/*------------------------------------*
	| FUNCION PARA EVALUAR ROW EXISTENTES |
	.------------------------------------*/
  function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar").show();
    }
    else
    {
      $("#btnGuardar").hide();
      cont=0;
    }
  }


/*---------------------------*
| FUNCION PARA ELIMINAR ROWS |
.---------------------------*/
  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar();
  }


init();

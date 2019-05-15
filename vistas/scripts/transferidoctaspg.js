var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
	fechanow();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	});
}

$(function() {
	$('#total').maskMoney({thousands:',', decimal:'.', allowZero:true});
});

//Función limpiar
function limpiar()
{

  $("#tipo_transf").selectpicker('val',"");
	$("#tipo_transf").selectpicker('refresh');
	$("#numexpediente").val("");
	$("#numtransferencia").val("");


	$("#valor_transferido").val("");
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
		listarCtasbancarias();
		$("#tipo_transf").change(change_input_by_tipodoc);

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

var selecttipodoc
function change_input_by_tipodoc()
{
	 selecttipodoc = $("#tipo_transf option:selected").val();

		if(selecttipodoc == 'Transf/Cuentas'){
				$('.ththis').hide();
				$('.tdthis').hide();

		}else{
			$('.ththis').show();
				$('.tdthis').show();
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
					url: '../ajax/transferidoctaspg.php?op=listar',
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



//Función Listar ctasbancarias

function listarCtasbancarias()
{
	tabla=$('#tblctasbancarias').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [

		        ],
		"ajax":
				{
					url: '../ajax/transferidoctaspg.php?op=listarCtasbancarias',
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
		url: "../ajax/transferidoctaspg.php?op=guardaryeditar",
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

function mostrar(idtransferidoctaspg)
{
	$.post("../ajax/transferidoctaspg.php?op=mostrar",{idtransferidoctaspg : idtransferidoctaspg}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);
    $("#tipo_transf").val(data.tipo_transf).selectpicker('refresh')
		$("#numexpediente").val(data.numexpediente);
		$("#numtransferencia").val(data.numtransferencia);
		$("#fecha_hora").val(data.fecha);
		$("#idtransferidoctaspg").val(data.idtransferidoctaspg);

		if (data.tipo_transf == 'Transf/Cuentas') {
			$('.ththisx').hide();
			$('.tdthis').hide();
		}else{
			$('.ththis').show();
			$('.tdthis').show();
		}
		//Ocultar y mostrar los botones
		$("#Guardar").show();
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/transferidoctaspg.php?op=listarDetalle&id="+idtransferidoctaspg,function(r){
	        $("#detalles").html(r);
	});
}

//Función para anular registros
function anular(idtransferidoctaspg)
{
	bootbox.confirm("¿Está Seguro de eliminar la transferencia?", function(result){
		if(result)
        {
        	$.post("../ajax/transferidoctaspg.php?op=anular", {idtransferidoctaspg : idtransferidoctaspg}, function(e){
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

function agregarDetalle(idctasbancarias,ctasbancarias,numctapg)
  {
  	var num_precompromiso = "";
    var valor=0.00;

    if ((selecttipodoc == 'Transf/Cuentas')&&(idctasbancarias!=""))
    {
    	var subtotal=valor;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">x</button></td>'+
    	'<td><input type="hidden" class="form-control input-sm" name="idctasbancarias[]" value="'+idctasbancarias+'">'+ctasbancarias+'</td>'+
    	'<td class="tdthis" style="display:none;"><input type="number" class="form-control input-sm" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" name="num_precompromiso[]" value="'+num_precompromiso+'"></td>'+
    	'<td><input type="text" class="form-control input-sm prec" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="valor[]" value="'+valor+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
			$(function() {
				$('.prec').maskMoney({thousands:',', decimal:'.', allowZero:true});
			});
    	$('#detalles').append(fila);
    	modificarSubototales();
    }else if (idctasbancarias!="")
		    {
		    	var subtotal=valor;
		    	var fila='<tr class="filas" id="fila'+cont+'">'+
		    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">x</button></td>'+
		    	'<td><input type="hidden" class="form-control input-sm" name="idctasbancarias[]" value="'+idctasbancarias+'">'+ctasbancarias+'</td>'+
		    	'<td class="tdthis"><input type="number" class="form-control input-sm" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" name="num_precompromiso[]" value="'+num_precompromiso+'"></td>'+
		    	'<td><input type="text" class="form-control input-sm prec" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="valor[]" value="'+valor+'"></td>'+
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
    	alert("Error al ingresar el detalle, revisar los datos de las cuentas bancarias");
    }
  }

	/*---------------------------------------------------*
	|FUNCION PARA LIMPIAR CAMPOS DETALLE VENTA AL INICIAR|
	.---------------------------------------------------*/
		window.onInputFocus = function(e) {


		    var elm = $(e.target);
		    elm.data('orig-value', elm.val());
		    elm.val('');
		}

		window.onInputBlur = function(e) {
		    var elm = $(e.target);
		    if (!elm.val()) {
		        elm.val(elm.data('orig-value'));
		    }
		}


 function modificarSubototales()
  {
  	var valor = document.getElementsByName("valor[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <valor.length; i++) {
    	var inpC=valor[i];
    	var inpS=sub[i];

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

$("#valor_transferido").val(total);
    evaluar();
  }

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

  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar();
  }


init();

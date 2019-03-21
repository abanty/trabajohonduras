var tabla;

//Función que se ejecuta al inicio
function init(){


	$.post("../ajax/administrar_ordenes.php?op=button_add",function(r){
					$("#here_inside").html(r);
	});

	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	});
	//Cargamos los items al select cliente
	$.post("../ajax/administrar_ordenes.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');
	});


	//Cargamos los items al select cliente
	$.post("../ajax/administrar_ordenes.php?op=selectPrograma", function(r){
	            $("#idprograma").html(r);
	            $('#idprograma').selectpicker('refresh');
	});
}


//-----------------------------
// FUNCION PARA LIMPIAR CAMPOS |
//-----------------------------
function limpiar()
{
	$("#idadministrar_ordenes").val("");
	$("#num_orden").val("");
	$("#num_comprobante").val("");
	$("#descripcion_orden").text("");
	$("#descuento_total").val("0.00000");
	$("#impuesto").val("0.00000");

	$("#idprograma").val("").selectpicker({style: "btn-default btn-sm", title: 'Elige un Programa'});
	$("#idproveedores").val("").selectpicker({style: "btn-default btn-sm", title: 'Elige un Proveedor'});
	$("#tipo_impuesto").val("").selectpicker({style: "btn-default btn-sm", title: 'Elige un Impuesto'});

	$(".filas").remove();
	$("#sub_total").html("L. 0.00");
	$("#montototal").html("L. 0.00");

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

	$('#fecha_hora').val(today);

  //Marcamos el primer tipo_documento
	$("#tipo_impuesto").selectpicker('refresh');
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarPresupuesto_disponible();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").show();
		detalles=0;
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
					url: '../ajax/administrar_ordenes.php?op=listar',
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
					url: '../ajax/administrar_ordenes.php?op=listarPresupuesto_disponible',
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


//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/administrar_ordenes.php?op=guardaryeditar",
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

function mostrar(idadministrar_ordenes)
{
	$.post("../ajax/administrar_ordenes.php?op=mostrar",{idadministrar_ordenes : idadministrar_ordenes}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#idprograma").val(data.idprograma);
		$("#idprograma").selectpicker('refresh');
		$("#idproveedores").val(data.idproveedores);
		$("#idproveedores").selectpicker('refresh');

		$("#tipo_impuesto").val(data.tipo_impuesto);
		$("#tipo_impuesto").selectpicker('refresh');

		$("#num_orden").val(data.num_orden);
		$("#num_comprobante").val(data.num_comprobante);
		$("#fecha_hora").val(data.fecha);
		$("#impuesto").val(data.impuesto);
		$("#idadministrar_ordenes").val(data.idadministrar_ordenes);

		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/administrar_ordenes.php?op=listarDetalle&id="+idadministrar_ordenes,function(r){
	        $("#detalles").html(r);
	});
}

//Función para anular registros
function anular(idadministrar_ordenes)
{
	bootbox.confirm("¿Está Seguro de anular la orden?", function(result){
		if(result)
        {
        	$.post("../ajax/administrar_ordenes.php?op=anular", {idadministrar_ordenes : idadministrar_ordenes}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}


//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var impuesto=15;
var impuesto=12.5;
var cont=0;

var cont_factura=1;
var detalles=0;

var detalles_factura=0;


$("#btnGuardar").hide();


function agregarDetalle(idpresupuesto_disponible,codigo,presupuesto_disponible)
  {
		var presupuestoformat = parseFloat(presupuesto_disponible.replace(/,/g, ''));
  	var cantidad = 1;
  	var unidad = "";
  	var descripcion = "";
  	var precio_unitario = 1;

    if ((idpresupuesto_disponible!="")&&(presupuestoformat>0))
    {
    var subtotal=cantidad*precio_unitario;
		var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="hidden" class="form-control input-sm" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+codigo+'</td>'+
			'<td><input type="text" class="form-control input-sm" size="5" name="unidad[]" id="unidad" value="'+unidad+'"></td>'+
			'<td><input type="number" class="form-control input-sm" onchange="modificarSubototales()" onkeyup="modificarSubototales()" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" style="width: 90px;" min="0" name="cantidad[]" id="cantidad" value="'+cantidad+'"></td>'+
			'<td><textarea class="form-control input-sm" rows="2" cols="50" name="descripcion[]" value="'+descripcion+'"></textarea></td>'+
    	'<td><input type="number" class="form-control input-sm" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" onchange="modificarSubototales()" onkeyup="modificarSubototales()"  step=".01" style="width: 140px;" min="0" name="precio_unitario[]" value="'+precio_unitario+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
			'<td style="display:none;"><input type="number" name="presupuesto_disponible[]" value="'+presupuestoformat+'"></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fab fa-rev fa-lg"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);

    	modificarSubototales();
    }
    else
    {
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Insuficiente Saldo para realizar una transacción',
			}).catch(swal.noop);
    	// alert("Insuficiente Saldo para realizar una transacción");
    }
  }



	function agregarfilafactura(num_factura)
	  {
			var fecha_factura = Date.now();
			var valor_factura = 0;

				var filafactura = '<tr class="filafactura" id="filafactura'+cont_factura+'">'+
				'<td><input type="number" form="formulario" class="form-control input-sm" size="5" name="num_factura[]" id="" value="'+num_factura+'"></td>'+
				'<td><input type="date" form="formulario" class="form-control input-sm" name="fecha_factura[]" id="" value="'+fecha_factura+'"></td>'+
				'<td><input type="number" form="formulario" step=".01"  class="form-control input-sm" name="valor_factura[]" id="" value="'+valor_factura+'"></td>'+
				'<td><button type="button" class="btn btn-danger" onclick="eliminarDetallefac('+cont_factura+')">X</button></td>'+
				'</tr>';

	    	cont_factura++;

	    	detalles_factura=detalles_factura+1;

	    	$('#detallesfactura').append(filafactura);


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
  	var cant = document.getElementsByName("cantidad[]");
  	var pre = document.getElementsByName("precio_unitario[]");
    var sub = document.getElementsByName("subtotal");

		var presu = document.getElementsByName("presupuesto_disponible[]");


    for (var i = 0; i <cant.length; i++) {
    	var canti=cant[i];
    	var preci=pre[i];
    	var subt=sub[i];

				var presdis=presu[i];

    	subt.value=(canti.value*preci.value);

			if (subt.value > presdis.value) {
				swal({
					type: 'warning',
					title: 'Oops...',
					text: 'Insuficiente Saldo para realizar una transacción',
				}).catch(swal.noop);

				preci.value = 0;
				subt.value = 0;
			}

    		document.getElementsByName("subtotal")[i].innerHTML = "Lps. " + parseFloat(Math.round(subt.value * 100) / 100).toFixed(2);
    }
    calcularTotales();
  }


  function calcularTotales(){

  	 var sub = document.getElementsByName("subtotal");
  	 var total = 0.0;

  	 var desc = $("#descuento_total").val();
		 var tipo_imp = $("#tipo_impuesto").val();

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;

		newsubtotal = total - desc;

 // alert(newsubtotal);

		newsubtotal_imp = newsubtotal * tipo_imp;

		new_total = newsubtotal_imp + newsubtotal;

		total_total = parseFloat(Math.round(new_total * 100) / 100).toFixed(2);
		sub_sub_total = parseFloat(Math.round(newsubtotal * 100) / 100).toFixed(2);
		impuesto_impuesto = parseFloat(Math.round(newsubtotal_imp * 100) / 100).toFixed(2);

		 $("#impuesto").val(impuesto_impuesto);
		 $("#subtotales").val(sub_sub_total);
		 // $("#subtotal").val(newsubtotal);

	}

	$("#sub_total").html("L. " + sub_sub_total);

	$("#montototal").html("L. " + total_total);




	$("#monto_total").val(total_total);
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

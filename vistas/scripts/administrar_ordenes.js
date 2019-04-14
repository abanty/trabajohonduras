var tabla;

//Función que se ejecuta al inicio
function init(){

	fechanow();

	$("#detalles tbody").html('<td id="mynewtd" colspan="7" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
	$("#detallesfactura tbody").html('<td id="mynewtd_factura" colspan="4" style="text-align: center; padding: 15px;"> -- Ninguna factura en la tabla -- </td>');
	$("#tipo_impuesto_div").hide();

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


//Seleccionamos un numero de cuenta contactenado con el nombtre del banco
	$.post("../ajax/administrar_ordenes.php?op=select_cta_banco", function(r){
	            $("#idctasbancarias").html(r);
	            $('#idctasbancarias').selectpicker('refresh');
	});


}

//-----------------------------
// FUNCION PARA LIMPIAR CAMPOS |
//-----------------------------
function limpiar()
{
	fechanow();

	$("#detalles tbody").html('<td id="mynewtd" colspan="7" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
	$("#detallesfactura tbody").html('<td id="mynewtd_factura" colspan="4" style="text-align: center; padding: 15px;"> -- Ninguna factura en la tabla -- </td>');
	$("#idadministrar_ordenes").val('');
	$("#num_orden").val('');
	$("#titulo_orden").val('');
	$("#num_comprobante").val('');
	$("#descripcion_orden").val('');

	$("#tipo_impuesto").selectpicker('val',"");
	$("#tipo_impuesto").selectpicker('refresh');
	$("#idprograma").selectpicker('val',"");
	$("#idprograma").selectpicker('refresh');
	$("#idproveedores").selectpicker('val',"");
	$("#idproveedores").selectpicker('refresh');

	$("#descuento_total").val('0.00000');
	$("#impuesto").val("0.00000");


	// LIMPIAR CAMPOS CONTABILIDAD
	$("#creditos").val('');
	$("#debitos").val('');
	$("#contabilidad").val('');
	$("#num_transferencia").val('');

	$("#idctasbancarias").selectpicker('val',"");
	$("#idctasbancarias").selectpicker('refresh');
	$("#tipopago").selectpicker('val',"");
	$("#tipopago").selectpicker('refresh');
	$("#btnaddfact").show();

	$(".filas").remove();
	$(".filafactura").remove();

	$("#sub_total").html("L. 0.00");
	$("#montototal").html("L. 0.00");
}


function fechanow(){
	// Obtenemos la fecha actual
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
		// $("#tipo_impuesto_div").show();
		$("#btnagregar").hide();
		listarPresupuesto_disponible();

		// $("#btnGuardar").hide();
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
	$("#tipo_impuesto_div").hide();
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

     columnDefs: [
			          { width: 120, targets: 0 }
			          // { width: 150, targets: 1 }
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
		scrollCollapse: true,
		"sPaginationType": "full_numbers", //barra de paginacion
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
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/administrar_ordenes.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,


			beforeSend: function(xhr){
					 mostrarform(false);
		       $('#preloader').show();  // #info must be defined somehwere
		   },
	    success: function(datos)
	    {

						 $('#preloader').hide();
					    bootbox.alert(datos);
	          mostrarform(false);
	          listar();
	    }

	});
	limpiar();
}


function orden_mostrar(idadministrar_ordenes)
{
		$("#tipo_impuesto_div").show();

	$.post("../ajax/administrar_ordenes.php?op=mostrar_orden_edit",{idadministrar_ordenes : idadministrar_ordenes}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#idprograma").val(data.idprograma).selectpicker('refresh');
		$("#idproveedores").val(data.idproveedores).selectpicker('refresh');
		$("#tipo_impuesto").val(data.tipo_impuesto).selectpicker('refresh');

		$("#titulo_orden").val(data.titulo_orden);
		$("#num_orden").val(data.num_orden);
		$("#num_comprobante").val(data.num_comprobante);
		$("#descripcion_orden").val(data.descripcion_orden);
		$("#fecha_hora").val(data.fecha);

		// FOOTER DETAIL
		$("#subtotales").val(data.subtotal);
		$("#sub_total").text(data.subtotal);
		$("#descuento_total").val(data.descuento_total);
		$("#impuesto").val(data.impuesto);
		$("#monto_total").val(data.monto_total);
		$("#montototal").text(data.monto_total);


		//DETALLE COMPROBANTE
		$("#debitos").val(data.debitos);
		$("#tipopago").val(data.tipo_pago).selectpicker('refresh');
		$("#num_transferencia").val(data.numero_transferencia);
		$("#contabilidad").val(data.contabilidad);
		$("#creditos").val(data.creditos);

		$("#idctasbancarias").val(data.idctasbancarias).selectpicker('refresh');
		$("#idadministrar_ordenes").val(data.idadministrar_ordenes);

		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
		$("#btnaddfact").hide();
 	});



 	$.post("../ajax/administrar_ordenes.php?op=listar_Orden_Detalle&id="+idadministrar_ordenes,function(r){
				  $("#detalles tbody").html(r);
	});

	$.post("../ajax/administrar_ordenes.php?op=listar_Orden_Facturas&id="+idadministrar_ordenes,function(r){
				  $("#detallesfactura tbody").html(r);
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

var cont_factura=0;
var detalles=0;

var detalles_factura=0;


$("#btnGuardar").hide();


var array = [];
var contenido = 0;
function agregarDetalle(idpresupuesto_disponible,codigo,presupuesto_disponible){

									var presupuestoformat = parseFloat(presupuesto_disponible.replace(/,/g, ''));
							  	var cantidad = 1;
							  	var unidad = "";
							  	var descripcion = "";
							  	var precio_unitario = 0;
									// getvalue('+cont+')
					    if ((idpresupuesto_disponible!="")&&(presupuestoformat>0))
					    {
					    var subtotal= cantidad*precio_unitario;
							var fila='<tr class="filas" id="fila'+cont+'">'+
					    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
					    	'<td><input type="hidden" class="form-control input-sm" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+codigo+'</td>'+
								'<td><input type="text" class="form-control input-sm" size="5" name="unidad[]" id="unidad" value="'+unidad+'"></td>'+
								'<td><input type="number" class="form-control input-sm" onchange="modificarSubototales()" onkeyup="modificarSubototales()" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" style="width: 90px;" min="0" name="cantidad[]" id="cantidad" value="'+cantidad+'"></td>'+
								'<td><textarea class="form-control input-sm" rows="2" cols="50" name="descripcion[]" value="'+descripcion+'"></textarea></td>'+
					    	'<td><input type="number" class="form-control input-sm" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" onchange="modificarSubototales()" onkeyup="modificarSubototales()" onclick="getId(this)" step=".01" style="width: 140px;" min="0" name="precio_unitario[]" value="'+precio_unitario+'"></td>'+
					    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
								'<td style="display:none;"><input type="number" name="presupuesto_disponible[]" value="'+presupuestoformat+'"></td>'+
								'<td style="display:none;"><input type="number" name="codigo[]" value="'+codigo+'"></td>'+
								'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info btn-sm"><i class="fab fa-rev fa-lg"></i></button></td>'+
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
					    }
  }

	function  getId(element) {
    contenido = element.parentNode.parentNode.rowIndex - 1;
		console.log(contenido);
	}


	function agregarfilafactura()
	  {
			var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

			var fecha_factura = today;
			var num_factura = "";
			var valor_factura = parseFloat(Math.round(0 * 100) / 100).toFixed(2);

			var filafactura = '<tr class="filafactura" id="filafactura'+cont_factura+'">'+
			'<td><input type="number" class="form-control input-sm" form="formulario" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" size="5" name="num_factura[]" id="" value="'+num_factura+'"></td>'+
			'<td><input type="date" class="form-control input-sm" form="formulario" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" name="fecha_factura[]" id="" value="'+fecha_factura+'"></td>'+
			'<td><input type="number" class="form-control input-sm" form="formulario" step=".01" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" name="valor_factura[]" id="" value="'+valor_factura+'"></td>'+
			'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle_factura('+cont_factura+')">X</button></td>'+
			'</tr>';

    	cont_factura++;

    	detalles_factura=detalles_factura+1;

    	$('#detallesfactura').append(filafactura);

			evaluar_factura();

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
		array= [];
		var totalprecio = 0;
		var idpre = document.getElementsByName("idpresupuesto_disponible[]");
  	var cant = document.getElementsByName("cantidad[]");
  	var pre = document.getElementsByName("precio_unitario[]");
    var sub = document.getElementsByName("subtotal");
		var cod = document.getElementsByName("codigo[]");
		var presu = document.getElementsByName("presupuesto_disponible[]");

    for (var i = 0; i <cant.length; i++) {

			var idprec=idpre[i];
    	var canti=cant[i];
    	var precic=pre[contenido];
			var preci=pre[i];
    	var subt=sub[i];
			var subtc=sub[contenido];
			var code=cod[i];
			var presdis=presu[i];

				if (precic.value > 0) {
					precic.style.background = '#fff';
					precic.style.color = '#000000';
				  precic.style.fontWeight="bold";
				}

				subt.value=(canti.value*preci.value);

				array.push({montodisponible:presdis.value, subtotales:subt.value});

				var map = array.reduce(function (map, e) {
					map[e.montodisponible] = +e.subtotales + (map[e.montodisponible] || 0)
					return map
				}, {})

				var result = Object.keys(map).map(function (k) {
					return { montodisponible: k*1, subtotales: map[k]}
				})

				var resultx = result.filter(function(v, i) {
					if ((v["subtotales"] > v["montodisponible"])) {
							swal({
								type: 'warning',
								title: 'Oops...',
								text: 'Insuficiente Saldo para realizar una transacción',
							}).catch(swal.noop);
							precic.style.color = '#dd4b39';
							precic.style.background = '#ffdfdf';
							precic.value = 0;
							subtc.value =  0;
							document.getElementsByName("subtotal")[contenido].innerHTML = "Lps. " + parseFloat(Math.round(subtc.value * 100) / 100).toFixed(2);
					}
				})

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

		newsubtotal_imp = newsubtotal * tipo_imp;

		new_total = newsubtotal_imp + newsubtotal;

		total_total = parseFloat(Math.round(new_total * 100) / 100).toFixed(2);
		sub_sub_total = parseFloat(Math.round(newsubtotal * 100) / 100).toFixed(2);
		impuesto_impuesto = parseFloat(Math.round(newsubtotal_imp * 100) / 100).toFixed(2);

		 $("#impuesto").val(impuesto_impuesto);
		 $("#subtotales").val(sub_sub_total);
	 	}

		$("#sub_total").html("L. " + sub_sub_total);
		$("#montototal").html("L. " + total_total);
		$("#monto_total").val(total_total);
    evaluar();

  }


  function evaluar(){
  	if (detalles>0)
    {
			$("#tipo_impuesto_div").show();
      $("#btnGuardar").show();
			$("#mynewtd").remove();
    }
    else
    {
			$("#detalles tbody").html('<td id="mynewtd" colspan="7" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
			$("#impuesto").val("0.00000");
			$("#sub_total").text("L. 0.00");
			$("#montototal").text("L. 0.00");

			$("#tipo_impuesto_div").hide();
      $("#btnGuardar").hide();
      cont=0;
    }
  }

	function evaluar_factura(){
		if (detalles_factura>0)
		{
			$("#mynewtd_factura").remove();
		}
		else
		{
		$("#detallesfactura tbody").html('<td id="mynewtd_factura" colspan="4" style="text-align: center; padding: 15px;"> -- Ninguna factura en la tabla -- </td>');

			cont_factura=0;
		}
	}

  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
		// console.log(detalles);
  	evaluar();
		modificarSubototales();
  }


	function eliminarDetalle_factura(indice_factura){
		$("#filafactura" + indice_factura).remove();
		detalles_factura=detalles_factura-1;
		evaluar_factura();
	}

init();

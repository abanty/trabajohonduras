var tabla;

//Función que se ejecuta al inicio
function init(){

	$(function() {
		$('#descuento_total').maskMoney({thousands:',', decimal:'.', allowZero:true});
	});

	fechanow();

	$("#detalles tbody").html('<td id="mynewtd" colspan="10" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
	$("#detallesfactura tbody").html('<td id="mynewtd_factura" colspan="4" style="text-align: center; padding: 15px;"> -- Ninguna factura en la tabla -- </td>');

	$.post("../ajax/administrar_ordenes.php?op=button_add",function(r){
					$("#here_inside").html(r);
	});

	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	});
	//Cargamos los items al select Proveedores
	$.post("../ajax/administrar_ordenes.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');
	});


	//Cargamos los items al select Progra,a
	$.post("../ajax/administrar_ordenes.php?op=selectPrograma", function(r){
	            $("#idprograma").html(r);
	            $('#idprograma').selectpicker('refresh');
	});


//Seleccionamos un numero de cuenta contactenado con el nombtre del banco
	$.post("../ajax/administrar_ordenes.php?op=select_cta_banco", function(r){
	            $("#idctasbancarias").html(r);
	            $('#idctasbancarias').selectpicker('refresh');
	});


	//Seleccionamos nombre de la tabla Uuss
		$.post("../ajax/administrar_ordenes.php?op=selectUuss", function(r){
		            $("#iduuss").html(r);
		            $('#iduuss').selectpicker('refresh');
		});


}

//-----------------------------
// FUNCION PARA LIMPIAR CAMPOS |
//-----------------------------
function limpiar()
{
	fechanow();

	$("#detalles tbody").html('<td id="mynewtd" colspan="10" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');

	$("#detallesfactura tbody").html('<td id="mynewtd_factura" colspan="4" style="text-align: center; padding: 15px;"> -- Ninguna factura en la tabla -- </td>');
	$("#idadministrar_ordenes").val('');

	$("#titulo_orden").val('');
	$("#num_orden").val('');
	$("#num_comprobante").val('');
	$("#descripcion_orden").val('');

	$("#idprograma").selectpicker('val',"");
	$("#idprograma").selectpicker('refresh');

	$("#iduuss").selectpicker('val',"");
	$("#iduuss").selectpicker('refresh');

	$("#idproveedores").selectpicker('val',"");
	$("#idproveedores").selectpicker('refresh');

	$("#tipo_documento").selectpicker('val',"");
	$("#tipo_documento").selectpicker('refresh');

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



function limpiarFooterCalculos(){

	$("#subtotal_inicial").val('');
	$("#sub_total_inicial").html("L. 0.00");

	$("#descuento_total").val('');

	$("#subtotales").val('');
	$("#sub_total").html("L. 0.00");

	$("#monto_total").val('');
	$("#montototal").html("L. 0.00");

	$("#total_neto").val('');
	$("#totalneto").html("L. 0.00");

// TOTALES ACUERDO
	$("#showsubtotal").html("L. 0.00");
	$("#showtotal").html("L. 0.00");
	$("#showtotalneto").html("L. 0.00");

	$("#impuestosv").val('0');
	$("#valor_sv").val('');
	$("#tasasv").val('');

	$("#impuesto").val('0');
	$("#valor_impuesto").val('');
	$("#tasaimpuesto").val('');

	$("#retencionisv").val('0');
	$("#valor_isv").val('');
	$("#tasaretencionisv").val('');

	$("#retencionisr").val('0');
	$("#valor_isr").val('');
	$("#tasaretencionisr").val('');

}




function limpiarCamposOrden(){

	fechanow();
	detalles=0;
	$("#detalles tbody").html('<td id="mynewtd" colspan="10" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');

	$("#detallesfactura tbody").html('<td id="mynewtd_factura" colspan="4" style="text-align: center; padding: 15px;"> -- Ninguna factura en la tabla -- </td>');
	$("#idadministrar_ordenes").val('');

	$("#titulo_orden").val('');
	$("#num_orden").val('');
	$("#num_comprobante").val('');
	$("#descripcion_orden").val('');
	$("#num_comprobante").val('');
	$("#descripcion_orden").val('');
	$("#num_acuerdo").val('');
	$("#inputfr").val('');
	$("#refbank").val('');

	$("#idprograma").selectpicker('val',"");
	$("#idprograma").selectpicker('refresh');

	$("#iduuss").selectpicker('val',"");
	$("#iduuss").selectpicker('refresh');

	$("#idproveedores").selectpicker('val',"");
	$("#idproveedores").selectpicker('refresh');

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

	limpiarFooterCalculos();

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
		$('#num_acuerdo').change(function() {
				$('#num_orden').val($(this).val());
		});

		$('#inputfr').change(function() {
				$('#num_orden').val($(this).val());
		});

		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnagregar").hide();
		$("#tipo_documento").change(change_input_by_tipodoc);

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


function change_input_by_tipodoc()
{
	var selecttipodoc = $("#tipo_documento option:selected").val();

		if(selecttipodoc == 'Acuerdo'){

			limpiarCamposOrden();
			$("#sol").hide();
			$("#No_ord").hide();
			$("#No_acuerdo").show();
			$("#uni_sup").hide();
			$("#th_uni").hide();
			$("#No_refbancaria").hide();
			$("#th_descr").hide();
			$("#No_fr").hide();
		  $("#detalles tfoot").hide();
			document.getElementById("content_table_details").className = "col-lg-8 col-sm-8 col-md-8 col-xs-8";
			$("#table_invoce").show();
			// $("#detalles tbody tr").remove();
			$("#content_tfoot").hide();
			$("#divprov").show();

			document.getElementById("descripcion_orden").rows = "5";

		}else if (selecttipodoc == 'O/C') {

				limpiarCamposOrden();
				// $("#detalles tbody tr").remove();
				$("#table_invoce").hide();
				document.getElementById("content_table_details").className = "col-lg-12 col-sm-12 col-md-12 col-xs-12";
				 $("#uni_sup").show();
				 $("#th_uni").show();
				 $("#No_fr").hide();
				 $("#No_refbancaria").hide();
				 $("#th_descr").show();
				 $("#sol").show();
				 $("#No_ord").show();
				 $("#No_acuerdo").hide();
				 document.getElementById("descripcion_orden").rows = "9";
				 $("#divprov").show();
				 $("#content_tfoot").show();

				}else if (selecttipodoc == 'F.R.') {

					limpiarCamposOrden();
					$("#sol").hide();
					$("#No_ord").hide();
					$("#No_acuerdo").hide();
					$("#No_fr").show();
					$("#No_refbancaria").hide();
					$("#uni_sup").hide();
					$("#th_uni").hide();
					$("#th_descr").hide();
					document.getElementById("content_table_details").className = "col-lg-12 col-sm-12 col-md-12 col-xs-12";
					$("#table_invoce").hide();
					// $("#detalles tbody tr").remove();
					// $("#detalles tfoot").show();
					$("#content_tfoot").show();
					$("#divprov").show();
					document.getElementById("descripcion_orden").rows = "5";

				}else if ((selecttipodoc == 'Alimentacion')||(selecttipodoc == 'Becas')) {


					limpiarCamposOrden();
					$("#sol").hide();
					$("#No_ord").hide();
					$("#No_acuerdo").hide();
					$("#No_fr").hide();
					$("#No_refbancaria").show();
					$("#uni_sup").hide();
					$("#th_uni").hide();
					$("#th_descr").hide();
					document.getElementById("content_table_details").className = "col-lg-8 col-sm-8 col-md-8 col-xs-8";
					$("#table_invoce").show();
					// $("#detalles tbody tr").remove();
					$("#content_tfoot").hide();
					document.getElementById("descripcion_orden").rows = "5";
					$("#divprov").hide();

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

     columnDefs: [
			  				{ width: 125, targets: 0 },
			          { width: 60, targets: 1 },
								{ width: 95, targets: 3 },
								{ width: 70, targets: 4 },
								{ width: 75, targets: 5 },
								{ width: 125, targets: 6 }
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
		"iDisplayLength": 8,//Paginación
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


function orden_mostrar(idadministrar_ordenes)
{

	$.post("../ajax/administrar_ordenes.php?op=mostrar_orden_edit",{idadministrar_ordenes : idadministrar_ordenes}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#idprograma").val(data.idprograma).selectpicker('refresh');
		$("#idproveedores").val(data.idproveedores).selectpicker('refresh');
		$("#tipo_documento").val(data.tipo_documento).selectpicker('refresh');
		$("#iduuss").val(data.iduuss).selectpicker('refresh');


		$("#titulo_orden").val(data.titulo_orden);
		$("#num_orden").val(data.num_orden);
		$("#num_comprobante").val(data.num_comprobante);
		$("#descripcion_orden").val(data.descripcion_orden);
		$("#fecha_hora").val(data.fecha);

		// FOOTER DETAIL
		$("#sub_total_inicial").html("L. " + number_format(data.subtotal_inicial, 2, '.', ','));

		$("#descuento_total").val(number_format(data.descuento_total, 2, '.', ','));

		$("#sub_total").html("L. " +  number_format(data.subtotal, 2, '.', ','));
		$("#impuestosv").val(number_format(data.impuesto_sv, 2, '.', ','));
		$("#impuesto").val(number_format(data.impuesto, 2, '.', ','));
		// PRIMER TOTAL
		$("#montototal").html("L. " + number_format(data.monto_total, 2, '.', ','));


		$("#retencionisv").val(number_format(data.retencion_isv, 2, '.', ','));
		$("#retencionisr").val(number_format(data.retencion_isr, 2, '.', ','));
		$("#totalneto").html("L. " + number_format(data.total_neto, 2, '.', ','));

		// % IMPUESTOS Y RETENCIONES
			$("#tasasv").val(data.tasa_sv);
				$("#tasaimpuesto").val(data.tasa_imp);
					$("#tasaretencionisv").val(data.tasa_retencion_isv);
						$("#tasaretencionisr").val(data.tasa_retencion_isr);

							// VALORES DE IMPUESTOS
							$("#valor_sv").val(number_format(data.valor_sv, 2, '.', ','));
								$("#valor_impuesto").val(number_format(data.valor_impuesto, 2, '.', ','));
									$("#valor_isv").val(number_format(data.valor_isv, 2, '.', ','));
										$("#valor_isr").val(number_format(data.valor_isr, 2, '.', ','));

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
//sus detalles versionando ahora
var impuesto=15;
var impuesto=12.5;
var cont=0;
var cont_factura=0;
var detalles=0;
var detalles_factura=0;
$("#btnGuardar").hide();


function agregarDetalle(idpresupuesto_disponible,codigo,presupuesto_disponible){

									var presupuestoformat = parseFloat(presupuesto_disponible.replace(/,/g, ''));
							  	var cantidad = 1;
							  	var unidad = "";
							  	var descripcion = "";
							  	var precio_unitario = 0.00;

						var selecttipodoc = $("#tipo_documento option:selected").val();
						if((selecttipodoc == 'Acuerdo')||(selecttipodoc == 'F.R.')||(selecttipodoc == 'Alimentacion')||(selecttipodoc == 'Becas')&&(idpresupuesto_disponible!="")){
							var subtotal= cantidad*precio_unitario;
							var fila='<tr role="row" class="filas" id="fila'+cont+'">'+
								/*BOTON ELIMINAR FILAS*/
								'<td role="cell" class="rowperson"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarDetalle('+cont+')"><i class="fas fa-trash-alt"></i></button></td>'+
								/*IDPRESUPUESTO Y CODIGO*/
								'<td role="cell"><input type="hidden" class="form-control input-sm" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+codigo+'</td>'+
								/*UNIDAD*/
								'<td id="td_uni" style="display:none; role="cell"><input type="text" class="form-control input-sm" size="5" name="unidad[]" id="unidad" value="'+unidad+'"></td>'+
								/*CANTIDAD onblur="onInputBlur(event)" onfocus="onInputFocus(event)"  */
								'<td role="cell"><input type="number" class="form-control input-sm" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" onchange="modificarSubototales()" onkeyup="modificarSubototales()" style="width: 90px;" min="0" name="cantidad[]" id="cantidad" value="'+cantidad+'"></td>'+
								/*DESCRIPCION*/
								'<td id="td_descri" style="display:none;" colspan="4" role="cell"><textarea class="form-control input-sm" rows="2" cols="50" name="descripcion[]" value="'+descripcion+'"></textarea></td>'+
								/*PRECIO UNITARIO   onblur="onInputBlur(event)" onfocus="onInputFocus(event)" step=".01" style="width: 140px;" min="0" onchange="modificarSubototales()" onkeyup="modificarSubototales()" */
								'<td role="cell"><input type="text" class="form-control input-sm prec"  id="currency" name="precio_unitario[]" onchange="modificarSubototales()" onkeyup="modificarSubototales()" onclick="getId(this)" value="'+precio_unitario+'"></td>'+
								/*SUB TOTAL*/
								'<td role="cell"><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
								/*CAMPO OCULTO PRESUPUESTO_DISPONIBLE*/
								'<td role="cell" style="display:none;"><input type="number" name="presupuesto_disponible[]" value="'+presupuestoformat+'"></td>'+
								/*CAMPO OCULTO CODIGO*/
								'<td role="cell" style="display:none;"><input type="number" name="codigo[]" value="'+codigo+'"></td>'+
							'</tr>';

							cont++;
							detalles=detalles+1;
							$(function() {
								$('.prec').maskMoney({thousands:',', decimal:'.', allowZero:true});
							});
							$('#detalles').append(fila);
	console.log(precio_unitario);
							modificarSubototales();
						}else if (idpresupuesto_disponible!="") {

					    var subtotal= cantidad*precio_unitario;
							var fila='<tr role="row" class="filas" id="fila'+cont+'">'+
								/*BOTON ELIMINAR FILAS*/
								'<td role="cell" class="rowperson"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarDetalle('+cont+')"><i class="fas fa-trash-alt"></i></button></td>'+
								/*IDPRESUPUESTO Y CODIGO*/
								'<td role="cell"><input type="hidden" class="form-control input-sm" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+codigo+'</td>'+
								/*UNIDAD*/
								'<td id="td_uni" role="cell"><input type="text" class="form-control input-sm" size="5" name="unidad[]" id="unidad" value="'+unidad+'"></td>'+
								/*CANTIDAD onblur="onInputBlur(event)" onfocus="onInputFocus(event)"  */
								'<td role="cell"><input type="number" class="form-control input-sm" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" onchange="modificarSubototales()" onkeyup="modificarSubototales()" style="width: 90px;" min="0" name="cantidad[]" id="cantidad" value="'+cantidad+'"></td>'+
								/*DESCRIPCION*/
								'<td id="td_descri" colspan="4" role="cell"><textarea class="form-control input-sm" rows="2" cols="50" name="descripcion[]" value="'+descripcion+'"></textarea></td>'+
								/*PRECIO UNITARIO   onblur="onInputBlur(event)" onfocus="onInputFocus(event)" step=".01" style="width: 140px;" min="0" onchange="modificarSubototales()" onkeyup="modificarSubototales()" */
								'<td role="cell"><input type="text" class="form-control input-sm prec"  id="currency" name="precio_unitario[]" onchange="modificarSubototales()" onkeyup="modificarSubototales()" onclick="getId(this)" value="'+precio_unitario+'"></td>'+
								/*SUB TOTAL*/
								'<td role="cell"><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
								/*CAMPO OCULTO PRESUPUESTO_DISPONIBLE*/
								'<td role="cell" style="display:none;"><input type="number" name="presupuesto_disponible[]" value="'+presupuestoformat+'"></td>'+
								/*CAMPO OCULTO CODIGO*/
								'<td role="cell" style="display:none;"><input type="number" name="codigo[]" value="'+codigo+'"></td>'+
							'</tr>';

					    cont++;
					    detalles=detalles+1;
							$(function() {
								$('.prec').maskMoney({thousands:',', decimal:'.', allowZero:true});
							});
					   	$('#detalles').append(fila);
	console.log(precio_unitario);
					   	modificarSubototales();
					    }else{
								swal({
									type: 'error',
									title: 'Oops...',
									text: 'Insuficiente Saldo para realizar una transacción',
								}).catch(swal.noop);
					    }
  }

	function  getId(element) {
    contenido = element.parentNode.parentNode.rowIndex - 1;
		// console.log(contenido);
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
			'<td><input type="text" class="form-control input-sm" form="formulario" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" size="5" name="num_factura[]" id="" value="'+num_factura+'"></td>'+
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
			var preci=pre[i];
    	var subt=sub[i];
			var code=cod[i];
			var presdis=presu[i];

			var newpreci = preci.value;
			var preci_unit_valor = parseFloat(newpreci.replace(/,/g, ''));

			if (preci_unit_valor > 0) {
					preci.style.background = '#fff';
					preci.style.color = '#000000';
				  preci.style.fontWeight="bold";
			}



				subt.value=(canti.value*preci_unit_valor);

				document.getElementsByName("subtotal")[i].innerHTML = "Lps. " + parseFloat(Math.round(subt.value * 100) / 100).toFixed(2);
		}
    calcularTotales();
  }


	function CalcularImpuestoSV(){
		var percentsv = $("#tasasv").val();
		var ofnumber = $("#valor_sv").val();
		var ofnumber_valid = ofnumber.replace(/,/g, '');
		var resultpercent = percentsv / 100;
		var resultabsolute = parseFloat(Math.round((ofnumber_valid * resultpercent) * 100) / 100).toFixed(2);
		$("#impuestosv").val(number_format(resultabsolute, 2, '.', ','));
		$("#tasaretencionisv").val(percentsv);
		CalcularImpuestoISV();
		calcularTotales();
	}

	function CalcularImpuestosimple(){
		var percentimp = $("#tasaimpuesto").val();
		var ofnumberimp = $("#valor_impuesto").val();
		var ofnumberimp_valid = ofnumberimp.replace(/,/g, '');
		var resultpercentimp = percentimp / 100;
		var resultabsoluteimp = parseFloat(Math.round((ofnumberimp_valid * resultpercentimp) * 100) / 100).toFixed(2);
		$("#impuesto").val(number_format(resultabsoluteimp, 2, '.', ','));
		calcularTotales();
	}

	function CalcularImpuestoISV(){
		var percentisv = $("#tasaretencionisv").val();
		var ofnumberisv = $("#valor_isv").val();
		var ofnumberisv_valid = ofnumberisv.replace(/,/g, '');
		var resultpercentisv = percentisv / 100;
		var resultabsoluteisv = parseFloat(Math.round((ofnumberisv_valid * resultpercentisv) * 100) / 100).toFixed(2);
		$("#retencionisv").val(number_format(resultabsoluteisv, 2, '.', ','));
		calcularTotales();
	}

	function CalcularImpuestoISR(){
		var percentisr = $("#tasaretencionisr").val();
		var ofnumberisr = $("#valor_isr").val();
		var ofnumberisr_valid = ofnumberisr.replace(/,/g, '');
		var resultpercentisr = percentisr / 100;
		var resultabsoluteisr = parseFloat(Math.round((ofnumberisr_valid * resultpercentisr) * 100) / 100).toFixed(2);
		$("#retencionisr").val(number_format(resultabsoluteisr, 2, '.', ','));
		calcularTotales();
	}

  function calcularTotales(){

  	 var sub = document.getElementsByName("subtotal");
  	 var total = 0.0;

		 var desc_before = $("#descuento_total").val();
		 var desc =  desc_before.replace(/,/g, '');

		 var val_imp_before = $("#impuesto").val();
		 var val_imp = val_imp_before.replace(/,/g, '');

		 var val_impsv_before = $("#impuestosv").val();
		 var val_impsv = val_impsv_before.replace(/,/g, '');

		 var val_isv_before = $("#retencionisv").val();
		 var val_isv = val_isv_before.replace(/,/g, '');

		 var val_isr_before = $("#retencionisr").val();
		 var val_isr = val_isr_before.replace(/,/g, '');

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;

		newsubtotal = total - desc;

		new_total = (parseFloat(val_imp) + parseFloat(val_impsv)+parseFloat(newsubtotal));

		new_total_minus = new_total - (parseFloat(val_isv) + parseFloat(val_isr))

		inicial = parseFloat(Math.round(total * 100) / 100).toFixed(2);
		total_total = parseFloat(Math.round(new_total * 100) / 100).toFixed(2);
		sub_sub_total = parseFloat(Math.round(newsubtotal * 100) / 100).toFixed(2);
		total_total_neto = parseFloat(Math.round(new_total_minus * 100) / 100).toFixed(2);
	 	}

		//SUBTOTAL INICIAL
		$("#sub_total_inicial").html("L. " + number_format(inicial, 2, '.', ','));
		$("#subtotal_inicial").val(inicial);
		//SUBTOTAL NETO
		$("#sub_total").html("L. " + number_format(sub_sub_total, 2, '.', ','));
		$("#subtotales").val(sub_sub_total);
		//PRIMER TOTAL
		$("#montototal").html("L. " + number_format(total_total, 2, '.', ','));
		$("#monto_total").val(total_total);
		//TOTAL NETO
		$("#totalneto").html("L. " + number_format(total_total_neto, 2, '.', ','));
		$("#total_neto").val(total_total_neto);


		//DATOS CALCULADOS DE OTRO CONTENEDORES

		$("#showsubtotal").html("L. " + number_format(sub_sub_total, 2, '.', ','));
		$("#showtotal").html("L. " + number_format(total_total, 2, '.', ','));
		$("#showtotalneto").html("L. " + number_format(total_total_neto, 2, '.', ','));

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
			$("#detalles tbody").html('<td id="mynewtd" colspan="10" style="text-align: center; padding: 25px;"> -- Ningun registro en la tabla -- </td>');
			$("#impuesto").val("0.00000");
			$("#sub_total").text("L. 0.00");
			$("#montototal").text("L. 0.00");

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
  }


	function eliminarDetalle_factura(indice_factura){
		$("#filafactura" + indice_factura).remove();
		detalles_factura=detalles_factura-1;
		evaluar_factura();
	}

init();

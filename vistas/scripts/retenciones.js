var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	})

	//Cargamos los items al select Proveedor
	$.post("../ajax/retenciones.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');
});

}

//Función limpiar
function limpiar()
{
	$("#rtn").val("");
	$("#idproveedores").val("");
  $("#proveedores").val("");
	$("#numdocumento").val("");
	$("#tipo_impuesto").val("");
	$("#descripcion").val("");
	$("#base_imponible").val("");
	$("#imp_retenido").val("");
	$("#total_oc").val("");
	$(".filas").remove();
	$("#total").html("0");

//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);


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



//Función Listar listarCompromisos

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



//Función para guardar o editar
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
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
	        $("#detalles").html(r);
	});
}

//Función para anular registros
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

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont=0;
var detalles=0;
//$("#guardar").hide();
$("#btnGuardar").hide();

function agregarDetalle(idcompromisos,compromisos,numfactura)
  {

    var valor=0;

    if (idcompromisos!="")
    {
    	var subtotal=valor;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">x</button></td>'+
    	'<td><input type="hidden" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+presupuesto_disponible+'</td>'+
    	'<td><input type="text" name="valor[]" value="'+valor+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fab fa-rev fa-lg"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del presupuesto disponible");
    }
  }


//
//  function modificarSubototales()
//   {
//   	var monto = document.getElementsByName("monto[]");
//     var sub = document.getElementsByName("subtotal");
//
//     for (var i = 0; i <monto.length; i++) {
//     	var inpC=monto[i];
//     	var inpS=sub[i];
//
//     	inpS.value=inpC.value*1;
//     	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
//     }
//     calcularTotales();
//
//   }
//   function calcularTotales(){
//   	var sub = document.getElementsByName("subtotal");
//   	var total = 0.0;
//
//   	for (var i = 0; i <sub.length; i++) {
// 		total += document.getElementsByName("subtotal")[i].value;
// 	}
// 	$("#total").html("L. " + total);
// $("#total_importe").val(total);
//     evaluar();
//   }
//
//   function evaluar(){
//   	if (detalles>0)
//     {
//       $("#btnGuardar").show();
//     }
//     else
//     {
//       $("#btnGuardar").hide();
//       cont=0;
//     }
//   }
//
//   function eliminarDetalle(indice){
//   	$("#fila" + indice).remove();
//   	calcularTotales();
//   	detalles=detalles-1;
//   	evaluar();
//   }


init();

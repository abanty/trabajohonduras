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

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	});
}


	//Cargamos los items al select cliente
	$.post("../ajax/crear_acuerdo.php?op=selectPrograma", function(r){
	            $("#idprograma").html(r);
	            $('#idprograma').selectpicker('refresh');
	});

			//Cargamos los items al select categoria
	$.post("../ajax/crear_acuerdo.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');
});


//Función limpiar
function limpiar()
{
	$("#tipo_documento").val("");
	$("#fecha_hora").val("");
	$("#numdocumento").val("");
	$("#numcomprobante").val("");
	$("#idproveedores").val("");
	$("#proveedores").val("");
	$("#idprograma").val("");
	$("#programa").val("");

	$("#total_importe").val("");
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
					url: '../ajax/crear_acuerdo.php?op=listar',
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
					url: '../ajax/crear_acuerdo.php?op=listarPresupuesto_disponible',
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
		url: "../ajax/crear_acuerdo.php?op=guardaryeditar",
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

function mostrar(idcrear_acuerdo)
{
	$.post("../ajax/crear_acuerdo.php?op=mostrar",{idcrear_acuerdo : idcrear_acuerdo}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);


		$("#tipo_documento").val(data.tipo_documento);
		$("#fecha_hora").val(data.fecha_hora);
		$("#numdocumento").val(data.numdocumento);
		$("#numcomprobante").val(data.numcomprobante);
		$("#idproveedores").val(data.idproveedores);
		$("#idproveedores").selectpicker('refresh');
		$("#idprograma").val(data.programa);
		$("#idprograma").selectpicker('refresh');
		$("#idcrear_acuerdo").val(data.idcrear_acuerdo);

		//Ocultar y mostrar los botones
		// $("#Guardar").show();
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/crear_acuerdo.php?op=listarDetalle&id="+idcrear_acuerdo,function(r){
	        $("#detalles").html(r);
	});
}

//Función para anular registros
function anular(idcrear_acuerdo)
{
	bootbox.confirm("¿Está Seguro de anular el Documento?", function(result){
		if(result)
        {
        	$.post("../ajax/crear_acuerdo.php?op=anular", {idcrear_acuerdo : idcrear_acuerdo}, function(e){
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

    var monto=1;

    if (idpresupuesto_disponible!="")
    {
    	var subtotal=monto;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">x</button></td>'+
    	'<td><input type="hidden" name="idpresupuesto_disponible[]" value="'+idpresupuesto_disponible+'">'+presupuesto_disponible+'</td>'+
    	'<td><input type="text" name="monto[]" value="'+monto+'"></td>'+
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



 function modificarSubototales()
  {
  	var monto = document.getElementsByName("monto[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <monto.length; i++) {
    	var inpC=monto[i];
    	var inpS=sub[i];

    	inpS.value=inpC.value*1;
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();

  }
  function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("L. " + total);
$("#total_importe").val(total);
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

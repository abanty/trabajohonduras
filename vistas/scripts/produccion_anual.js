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
	})
}

//Función limpiar
function limpiar()
{
	$("#idproduccion").val("");
	$("#indicativo").val("");
	$("#nombre_producto").val("");
	$("#tipo_producto").val("");
	$("#primario_noprimario").val("");
  $("#periodicidad").val("");

}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
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
					url: '../ajax/produccion_anual.php?op=listar',
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
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/produccion_anual.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {
	          bootbox.alert(datos);
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idproduccion)
{
	$.post("../ajax/produccion_anual.php?op=mostrar",{idproduccion : idproduccion}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#indicativo").val(data.indicativo);
		$("#nombre_producto").val(data.nombre_producto);
		$("#tipo_producto").val(data.tipo_producto);
		$("#primario_noprimario").val(data.primario_noprimario);
    $("#periodicidad").val(data.periodicidad);
 		$("#idproduccion").val(data.idproduccion);

 	})
}

//Función para desactivar registros
function desactivar(idproduccion)
{
	bootbox.confirm("¿Está Seguro de desactivar el producto?", function(result){
		if(result)
        {
        	$.post("../ajax/produccion_anual.php?op=desactivar", {idproduccion : idproduccion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(idproduccion)
{
	bootbox.confirm("¿Está Seguro de activar el producto?", function(result){
		if(result)
        {
        	$.post("../ajax/produccion_anual.php?op=activar", {idproduccion : idproduccion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}


init();

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
	$("#idconfiguracion").val("");
	$("#rango").val("");
	$("#nombre").val("");
	$("#cargo").val("");
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
					url: '../ajax/configuracion.php?op=listar',
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
		url: "../ajax/configuracion.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {
	          bootbox.alert(datos);
	          mostrarform(false);
	          $("#tbllistado").dataTable().api().ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idconfiguracion)
{
	$.post("../ajax/configuracion.php?op=mostrar",{idconfiguracion : idconfiguracion}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);


	$("#rango").val(data.rango);
	$("#nombre").val(data.nombre);
	$("#cargo").val(data.cargo);
	$("#idconfiguracion").val(data.idconfiguracion);

 	})
}

//Función para desactivar registros
function desactivar(idconfiguracion)
{
	bootbox.confirm("¿Está Seguro de desactivar ?", function(result){
		if(result)
        {
        	$.post("../ajax/configuracion.php?op=desactivar", {idconfiguracion : idconfiguracion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(idconfiguracion)
{
	bootbox.confirm("¿Está Seguro de activar?", function(result){
		if(result)
        {
        	$.post("../ajax/configuracion.php?op=activar", {idconfiguracion : idconfiguracion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}


init();

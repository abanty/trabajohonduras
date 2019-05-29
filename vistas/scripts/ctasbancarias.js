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
	$("#idctasbancarias").val("");
	$("#cuentapg").val("");
	$("#bancopg").val("");
	$("#tipoctapg").val("");
	$("#numctapg").val("");
	$("#fondos_disponibles").val("");
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
					url: '../ajax/ctasbancarias.php?op=listar',
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
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/ctasbancarias.php?op=guardaryeditar",
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

function mostrar(idctasbancarias)
{
	$.post("../ajax/ctasbancarias.php?op=mostrar",{idctasbancarias : idctasbancarias}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#cuentapg").val(data.cuentapg);
		$("#bancopg").val(data.bancopg);
		$("#tipoctapg").val(data.tipoctapg);
		$("#numctapg").val(data.numctapg);
		$("#fondos_disponibles").val(data.fondos_disponibles);
 		$("#idctasbancarias").val(data.idctasbancarias);

 	})
}

//Función para desactivar registros
function desactivar(idctasbancarias)
{
	bootbox.confirm("¿Está Seguro de desactivar la cuenta?", function(result){
		if(result)
        {
        	$.post("../ajax/ctasbancarias.php?op=desactivar", {idctasbancarias : idctasbancarias}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(idctasbancarias)
{
	bootbox.confirm("¿Está Seguro de activar la cuenta?", function(result){
		if(result)
        {
        	$.post("../ajax/ctasbancarias.php?op=activar", {idctasbancarias : idctasbancarias}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}


init();

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
	//Cargamos los items al select categoria
	$.post("../ajax/proveedores.php?op=ValidarNumeroRtn", function(datos) {
		datos = JSON.parse(datos);

		var rtn = $('#rtn').val();

		if (datos.includes(rtn)) {
			alert('Dato ya existe en la bd, digite otro por favor');
			$('#rtn').val("");
			$("#rtn").focus();

		} else {
			guardaryeditar(e);
	})

	$("#imagenmuestra").hide();
}




//Función limpiar
function limpiar()
{
	$("#casa_comercial").val("");
	$("#rtn").val("");
	$("#nombre_banco").val("");

	$("#num_cuenta").val("");
	$("#tipo_cuenta").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#idproveedores").val("");


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
	  	columnDefs: [

 							{ width: 110, targets: 5 },

 						      ],
		"ajax":
				{
					url: '../ajax/proveedores.php?op=listarp',
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
		url: "../ajax/proveedores.php?op=guardaryeditar",
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

function mostrar(idproveedores)
{
	$.post("../ajax/proveedores.php?op=mostrar",{idproveedores : idproveedores}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#casa_comercial").val(data.casa_comercial);
		$("#rtn").val(data.rtn);
		$("#nombre_banco").val(data.nombre_banco);

		$("#num_cuenta").val(data.num_cuenta);
		$("#tipo_cuenta").val(data.tipo_cuenta);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/autorizaciones/"+data.imagen);
		$("#imagenactual").val(data.imagen);
 		$("#idproveedores").val(data.idproveedores);


 	})
}

//Función para desactivar registros
function desactivar(idproveedores)
{
	bootbox.confirm("¿Está Seguro de desactivar el proveedor?", function(result){
		if(result)
        {
        	$.post("../ajax/proveedores.php?op=desactivar", {idproveedores : idproveedores}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(idproveedores)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/proveedores.php?op=activar", {idproveedores : idproveedores}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Función para eliminar registros
function eliminar(idproveedores)
{
	bootbox.confirm("¿Está Seguro de eliminar el proveedor?", function(result){
		if(result)
        {
        	$.post("../ajax/proveedores.php?op=eliminar", {idproveedores : idproveedores}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

init();

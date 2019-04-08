var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	})
	//Cargamos los items al select categoria
	$.post("../ajax/transferenciabch.php?op=selectCtasbancarias", function(r){
	            $("#idctasbancarias").html(r);
	            $('#idctasbancarias').selectpicker('refresh');

	});

		//Cargamos los items al select categoria
	$.post("../ajax/transferenciabch.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');

	});


}

//Función limpiar
function limpiar()
{
	$("#serie_transf").val("");
	$("#num_transf").val("");
	$("#monto_acreditar").val("");
	$("#descripcion").val("");
	$("#idtransferenciabch").val("");

}

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);
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
		$("#btnGuardar").show();

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
					url: '../ajax/transferenciabch.php?op=listar',
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
		url: "../ajax/transferenciabch.php?op=guardaryeditar",
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

function mostrar(idtransferenciabch)
{
	$.post("../ajax/transferenciabch.php?op=mostrar",{idtransferenciabch : idtransferenciabch}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#btnGuardar").hide();

	$("#idproveedor").val(data.idproveedor);
	$("#idproveedor").selectpicker('refresh');
	$("#idctasbancarias").val(data.idctasbancarias);
	$("#idctasbancarias").selectpicker('refresh');
	$("#serie_transf").val(data.serie_transf);
	$("#num_transf").val(data.num_transf);
	$("#monto_acreditar").val(data.monto_acreditar);


	$("#descripcion").val(data.descripcion);
 		$("#idtransferenciabch").val(data.idtransferenciabch);




 	})
}

//Función para desactivar registros
function desactivar(idtransferenciabch)
{
	bootbox.confirm("¿Está Seguro de validar la Transferencia?", function(result){
		if(result)
        {
        	$.post("../ajax/transferenciabch.php?op=desactivar", {idtransferenciabch : idtransferenciabch}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

//Función para activar registros
function activar(idtransferenciabch)
{
	bootbox.confirm("¿Está Seguro de activar el Transferencia?", function(result){
		if(result)
        {
        	$.post("../ajax/transferenciabch.php?op=activar", {idtransferenciabch : idtransferenciabch}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}


//Función para desactivar registros
//Función para eliminar registros
function eliminar(idtransferenciabch)
{
	bootbox.confirm("¿Está Seguro de eliminar la solicitud?", function(result){
		if(result)
        {
        	$.post("../ajax/transferenciabch.php?op=eliminar", {idtransferenciabch : idtransferenciabch}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});
        }
	})
}

init();

var tabla;

//Función que se ejecuta al inicio
function init(){
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
	$("#idpresupuesto_anual").val("");
	$("#nombre_objeto").val("");
	$("#codigo").val("");
	$("#monto_aprobado").val("");
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
					url: '../ajax/presupuesto_anual.php?op=listar',
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
		url: "../ajax/presupuesto_anual.php?op=guardaryeditar",
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

function mostrar(idpresupuesto_anual)
{
	$.post("../ajax/presupuesto_anual.php?op=mostrar",{idpresupuesto_anual : idpresupuesto_anual}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);



	$("#nombre_objeto").val(data.nombre_objeto);
	$("#codigo").val(data.codigo);
	$("#monto_aprobado").val(data.monto_aprobado);
	$("#idpresupuesto_anual").val(data.idpresupuesto_anual);

 	})
}

//Función para desactivar registros
function desactivar(idpresupuesto_anual)
{
	bootbox.confirm("¿Está Seguro de desactivar el presupuesto?", function(result){
		if(result)
        {
        	$.post("../ajax/presupuesto_anual.php?op=desactivar", {idpresupuesto_anual : idpresupuesto_anual}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idpresupuesto_anual)
{
	bootbox.confirm("¿Está Seguro de activar el presupuesto?", function(result){
		if(result)
        {
        	$.post("../ajax/presupuesto_anual.php?op=activar", {idpresupuesto_anual : idpresupuesto_anual}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();

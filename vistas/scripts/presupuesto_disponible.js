var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
// 	//Cargamos los items al select categoria
// 	$.post("../ajax/presupuesto_disponible.php?op=selectPresupuesto_anual", function(r){
// 	            $("#idpresupuesto_anual").html(r);
// 	            $('#idpresupuesto_anual').selectpicker('refresh');

// 	});
// 		$.post("../ajax/presupuesto_disponible.php?op=selectCodigo", function(r){
// 	            $("#codigo").html(r);
// 	            $('#codigo').selectpicker('refresh');
// });
}	

//Función limpiar
function limpiar()
{
	$("#nombre_objeto").val("");
	$("#grupo").val("");
	$("#subgrupo").val("");
	$("#codigo").val("");

	$("#presupuesto_anual").val("");
	$("#fondos_disponibles").val("");
	$("#idpresupuesto_disponible").val("");
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
					url: '../ajax/presupuesto_disponible.php?op=listar',
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
		url: "../ajax/presupuesto_disponible.php?op=guardaryeditar",
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

function mostrar(idpresupuesto_disponible)
{
	$.post("../ajax/presupuesto_disponible.php?op=mostrar",{idpresupuesto_disponible : idpresupuesto_disponible}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);


		$("#nombre_objeto").val(data.nombre_objeto);
		$("#grupo").val(data.grupo);
		$("#subgrupo").val(data.subgrupo);
		$("#codigo").val(data.codigo);
		$("#presupuesto_anual").val(data.presupuesto_anual);	
		$("#fondos_disponibles").val(data.fondos_disponibles);
 		$("#idpresupuesto_disponible").val(data.idpresupuesto_disponible);


 	})
}

//Función para desactivar registros
function desactivar(idpresupuesto_disponible)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/presupuesto_disponible.php?op=desactivar", {idpresupuesto_disponible : idpresupuesto_disponible}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idpresupuesto_disponible)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/presupuesto_disponible.php?op=activar", {idpresupuesto_disponible : idpresupuesto_disponible}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();
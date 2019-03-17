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
	//Cargamos los items al select cliente
	$.post("../ajax/compromisos.php?op=selectPrograma", function(r){
	            $("#idprograma").html(r);
	            $('#idprograma').selectpicker('refresh');
	});	

			//Cargamos los items al select categoria
	$.post("../ajax/compromisos.php?op=selectProveedores", function(r){
	            $("#idproveedores").html(r);
	            $('#idproveedores').selectpicker('refresh');
});

}	

//Función limpiar
function limpiar()
{ 
	// $("#idprograma").val("");
	// $("#programa").val("");
	// $("#idproveedores").val("");
	// $("#casa_comercial").val("");
	$("#numfactura").val("");
	$("#total_compra").val("");

	$("#total_compra").val("");
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
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarPresupuesto_disponible();

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
					url: '../ajax/compromisos.php?op=listar',
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
					url: '../ajax/compromisos.php?op=listarPresupuesto_disponible',
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
		url: "../ajax/compromisos.php?op=guardaryeditar",
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

function mostrar(idcompromisos)
{
	$.post("../ajax/compromisos.php?op=mostrar",{idcompromisos : idcompromisos}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);


		$("#idproveedor").val(data.idproveedor);
		$("#idproveedor").selectpicker('refresh');
		$("#idprograma").val(data.idprograma);
		$("#idprograma").selectpicker('refresh');
		$("#fecha_hora").val(data.fecha);
		$("#numfactura").val(data.numfactura);
 		$("#idcompromisos").val(data.idcompromisos);


 	})
}

//Función para desactivar registros
function pagado(idcompromisos)
{
	bootbox.confirm("¿Está Seguro de desactivar el Compromiso?", function(result){
		if(result)
        {
        	$.post("../ajax/compromisos.php?op=pagado", {idcompromisos : idcompromisos}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function pendiente(idcompromisos)
{
	bootbox.confirm("¿Está Seguro de activar el Compromiso?", function(result){
		if(result)
        {
        	$.post("../ajax/compromisos.php?op=pendiente", {idcompromisos : idcompromisos}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
//Función para eliminar registros
function eliminar(idcompromisos)
{
	bootbox.confirm("¿Está Seguro de eliminar el Compromiso?", function(result){
		if(result)
        {
        	$.post("../ajax/compromisos.php?op=eliminar", {idcompromisos : idcompromisos}, function(e){
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

    var valor=1;

    if (idpresupuesto_disponible!="")
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



 function modificarSubototales()
  {
  	var valor = document.getElementsByName("valor[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <valor.length; i++) {
    	var inpC=valor[i];
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
$("#total_compra").val(total);
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



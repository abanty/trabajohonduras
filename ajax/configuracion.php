<?php 
require_once "../modelos/Configuracion.php";

$configuracion=new configuracion();

$idconfiguracion=isset($_POST["idconfiguracion"])? limpiarCadena($_POST["idconfiguracion"]):"";
$rango=isset($_POST["rango"])? limpiarCadena($_POST["rango"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idconfiguracion)){
			$rspta=$configuracion->insertar($rango,$nombre,$cargo);
			echo $rspta ? " registrado" : "no se pudo registrar";
		}
		else {
			$rspta=$configuracion->editar($idconfiguracion,$rango,$nombre,$cargo);
			echo $rspta ? "Dato actualizado" : "Dato no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$configuracion->desactivar($idconfiguracion);
 		echo $rspta ? " Desactivado" : "No se puede desactivar";
	break;

	case 'activar':
		$rspta=$configuracion->activar($idconfiguracion);
 		echo $rspta ? "Activado" : "No se puede activar";
	break;

	case 'mostrar':
		$rspta=$configuracion->mostrar($idconfiguracion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$configuracion->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idconfiguracion.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idconfiguracion.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idconfiguracion.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idconfiguracion.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->rango,
 				"2"=>$reg->nombre,
 				"3"=>$reg->cargo,
 				"4"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>
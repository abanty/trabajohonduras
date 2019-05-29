<?php
require_once "../modelos/Programa.php";

$programa=new Programa();

$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$codigop=isset($_POST["codigop"])? limpiarCadena($_POST["codigop"]):"";
$nombrep=isset($_POST["nombrep"])? limpiarCadena($_POST["nombrep"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idprograma)){
			$rspta=$programa->insertar($codigop,$nombrep);
			echo $rspta ? "Programa registrado" : "Programa no se pudo registrar";
		}
		else {
			$rspta=$programa->editar($idprograma,$codigop,$nombrep);
			echo $rspta ? "Programa actualizado" : "Programa no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$programa->desactivar($idprograma);
 		echo $rspta ? "Programa Desactivado" : "Programa no se puede desactivar";
	break;

	case 'activar':
		$rspta=$programa->activar($idprograma);
 		echo $rspta ? "Programa activado" : "Programa no se puede activar";
	break;

	case 'mostrar':
		$rspta=$programa->mostrar($idprograma);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$programa->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idprograma.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idprograma.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idprograma.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idprograma.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->codigop,
 				"2"=>$reg->nombrep,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

<?php 
require_once "../modelos/presupuesto_anual.php";

$presupuesto_anual=new presupuesto_anual();

$idpresupuesto_anual=isset($_POST["idpresupuesto_anual"])? limpiarCadena($_POST["idpresupuesto_anual"]):"";


$nombre_objeto=isset($_POST["nombre_objeto"])? limpiarCadena($_POST["nombre_objeto"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$monto_aprobado=isset($_POST["monto_aprobado"])? limpiarCadena($_POST["monto_aprobado"]):"";
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idpresupuesto_anual)){
			$rspta=$presupuesto_anual->insertar($nombre_objeto,$codigo,$monto_aprobado);
			echo $rspta ? "Presupuesto registrada" : "Presupuesto no se pudo registrar";
		}
		else {
			$rspta=$presupuesto_anual->editar($idpresupuesto_anual,$nombre_objeto,$codigo,$monto_aprobado);
			echo $rspta ? "Presupuesto actualizada" : "Presupuesto no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$presupuesto_anual->desactivar($idpresupuesto_anual);
 		echo $rspta ? "Presupuesto Desactivada" : "Presupuesto no se puede desactivar";
	break;

	case 'activar':
		$rspta=$presupuesto_anual->activar($idpresupuesto_anual);
 		echo $rspta ? "Presupuesto activada" : "Presupuesto no se puede activar";
	break;

	case 'mostrar':
		$rspta=$presupuesto_anual->mostrar($idpresupuesto_anual);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$presupuesto_anual->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpresupuesto_anual.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idpresupuesto_anual.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idpresupuesto_anual.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idpresupuesto_anual.')"><i class="fas fa-check"></i></button>',
 				
 				"1"=>$reg->nombre_objeto,
 				"2"=>$reg->codigo,
 				"3"=>$reg->monto_aprobado,
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
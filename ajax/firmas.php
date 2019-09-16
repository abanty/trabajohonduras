<?php
require_once "../modelos/Firmas.php";

$firmas=new Firmas();

$idfirmas=isset($_POST["idfirmas"])? limpiarCadena($_POST["idfirmas"]):"";
$grado=isset($_POST["grado"])? limpiarCadena($_POST["grado"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$serie=isset($_POST["serie"])? limpiarCadena($_POST["serie"]):"";
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idfirmas)){
			$rspta=$firmas->insertar($grado,$nombre,$cargo,$serie);
			echo $rspta ? "Firma registrada" : "Firma no se pudo registrar";
		}
		else {
			$rspta=$firmas->editar($idfirmas,$grado,$nombre,$cargo,$serie);
			echo $rspta ? "Firma actualizada" : "Firma no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$firmas->desactivar($idfirmas);
 		echo $rspta ? "Firma Desactivada" : "Firma no se puede desactivar";
	break;

	case 'activar':
		$rspta=$firmas->activar($idfirmas);
 		echo $rspta ? "Firma activada" : "Firma no se puede activar";
	break;

	case 'mostrar':
		$rspta=$firmas->mostrar($idfirmas);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$firmas->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idfirmas.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idfirmas.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idfirmas.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idfirmas.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->grado,
 				"2"=>$reg->nombre,
				"3"=>$reg->cargo,
				"4"=>$reg->serie,
 				"5"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

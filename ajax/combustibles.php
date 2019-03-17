<?php 
require_once "../modelos/Combustibles.php";
 
$combustibles=new Combustibles();

$idcombustibles=isset($_POST["idcombustibles"])? limpiarCadena($_POST["idcombustibles"]):"";
$categoria=isset($_POST["categoria"])? limpiarCadena($_POST["categoria"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$total_compras=isset($_POST["total_compras"])? limpiarCadena($_POST["total_compras"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcombustibles)){
			$rspta=$combustibles->insertar($categoria,$nombre,$total_compras);
			echo $rspta ? "combustibles registrado" : "combustibles no se pudo registrar";
		}
		else {
			$rspta=$combustibles->editar($idcombustibles,$categoria,$nombre,$total_compras);
			echo $rspta ? "combustibles actualizado" : "combustibles no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$combustibles->desactivar($idcombustibles);
 		echo $rspta ? "combustibles Desactivado" : "combustibles no se puede desactivar";
	break;

	case 'activar':
		$rspta=$combustibles->activar($idcombustibles);
 		echo $rspta ? "combustibles activado" : "combustibles no se puede activar";
	break;

	case 'mostrar':
		$rspta=$combustibles->mostrar($idcombustibles);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$combustibles->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcombustibles.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcombustibles.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcombustibles.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcombustibles.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->categoria,
 				"2"=>$reg->nombre,
 				"3"=>$reg->total_compras,
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
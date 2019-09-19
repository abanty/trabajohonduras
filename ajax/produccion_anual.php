<?php
require_once "../modelos/Produccion_anual.php";

$produccion_anual=new Produccion_anual();

$idproduccion=isset($_POST["idproduccion"])? limpiarCadena($_POST["idproduccion"]):"";
$indicativo=isset($_POST["indicativo"])? limpiarCadena($_POST["indicativo"]):"";
$nombre_producto=isset($_POST["nombre_producto"])? limpiarCadena($_POST["nombre_producto"]):"";
$tipo_producto=isset($_POST["tipo_producto"])? limpiarCadena($_POST["tipo_producto"]):"";
$primario_noprimario=isset($_POST["primario_noprimario"])? limpiarCadena($_POST["primario_noprimario"]):"";
$periodicidad=isset($_POST["periodicidad"])? limpiarCadena($_POST["periodicidad"]):"";
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idproduccion)){
			$rspta=$produccion_anual->insertar($indicativo,$nombre_producto,$tipo_producto,$primario_noprimario,$periodicidad);
			echo $rspta ? "El producto se ha registrado" : "El producto no se pudo registrar";
		}
		else {
			$rspta=$produccion_anual->editar($idproduccion,$indicativo,$nombre_producto,$tipo_producto,$primario_noprimario,$periodicidad);
			echo $rspta ? "El producto se ha actualizado" : "El producto no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$produccion_anual->desactivar($idproduccion);
 		echo $rspta ? "El producto se ha Desactivado" : "El producto no se puede desactivar";
	break;

	case 'activar':
		$rspta=$produccion_anual->activar($idproduccion);
 		echo $rspta ? "El producto se ha activado" : "El producto no se puede activar";
	break;

	case 'mostrar':
		$rspta=$produccion_anual->mostrar($idproduccion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$produccion_anual->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idproduccion.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idproduccion.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idproduccion.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idproduccion.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->indicativo,
 				"2"=>$reg->nombre_producto,
				"3"=>$reg->tipo_producto,
				"4"=>$reg->primario_noprimario,
				"5"=>$reg->periodicidad,
 				"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

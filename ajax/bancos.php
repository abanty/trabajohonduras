<?php 
require_once "../modelos/bancos.php";

$bancos=new Bancos();

$idbancos=isset($_POST["idbancos"])? limpiarCadena($_POST["idbancos"]):"";
$clasificacion=isset($_POST["clasificacion"])? limpiarCadena($_POST["clasificacion"]):"";
$nombre_banco=isset($_POST["nombre_banco"])? limpiarCadena($_POST["nombre_banco"]):"";
$referencia=isset($_POST["referencia"])? limpiarCadena($_POST["referencia"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idbancos)){
			$rspta=$bancos->insertar($clasificacion,$nombre_banco,$referencia);
			echo $rspta ? "Banco registrado" : "Banco no se pudo registrar";
		}
		else {
			$rspta=$bancos->editar($idbancos,$clasificacion,$nombre_banco,$referencia);
			echo $rspta ? "Banco actualizado" : "Banco no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$bancos->desactivar($idbancos);
 		echo $rspta ? "Banco Desactivado" : "Banco no se puede desactivar";
	break;

	case 'activar':
		$rspta=$bancos->activar($idbancos);
 		echo $rspta ? "Banco activado" : "Banco no se puede activar";
	break;

	case 'mostrar':
		$rspta=$bancos->mostrar($idbancos);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$bancos->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idbancos.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idbancos.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idbancos.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idbancos.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->clasificacion,
 				"2"=>$reg->nombre_banco,
 				"3"=>$reg->referencia,
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
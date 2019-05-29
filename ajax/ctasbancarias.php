<?php
require_once "../modelos/Ctasbancarias.php";

$ctasbancarias=new Ctasbancarias();

$idctasbancarias=isset($_POST["idctasbancarias"])? limpiarCadena($_POST["idctasbancarias"]):"";

$cuentapg=isset($_POST["cuentapg"])? limpiarCadena($_POST["cuentapg"]):"";
$bancopg=isset($_POST["bancopg"])? limpiarCadena($_POST["bancopg"]):"";
$tipoctapg=isset($_POST["tipoctapg"])? limpiarCadena($_POST["tipoctapg"]):"";
$numctapg=isset($_POST["numctapg"])? limpiarCadena($_POST["numctapg"]):"";
$fondos_disponibles=isset($_POST["fondos_disponibles"])? limpiarCadena($_POST["fondos_disponibles"]):"";
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idctasbancarias)){
			$rspta=$ctasbancarias->insertar($cuentapg,$bancopg,$tipoctapg,$numctapg,$fondos_disponibles);
			echo $rspta ? "Cuenta registrada" : "Cuenta no se pudo registrar";
		}
		else {
			$rspta=$ctasbancarias->editar($idctasbancarias,$cuentapg,$bancopg,$tipoctapg,$numctapg,$fondos_disponibles);
			echo $rspta ? "Cuenta actualizada" : "Cuenta no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$ctasbancarias->desactivar($idctasbancarias);
 		echo $rspta ? "Cuenta Desactivada" : "Cuenta no se puede desactivar";
	break;

	case 'activar':
		$rspta=$ctasbancarias->activar($idctasbancarias);
 		echo $rspta ? "Cuenta activada" : "Cuenta no se puede activar";
	break;

	case 'mostrar':
		$rspta=$ctasbancarias->mostrar($idctasbancarias);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$ctasbancarias->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idctasbancarias.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idctasbancarias.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idctasbancarias.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idctasbancarias.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->cuentapg,
 				"2"=>$reg->bancopg,
 				"3"=>$reg->tipoctapg,
 				"4"=>$reg->numctapg,
 				"5"=>$reg->fondos_disponibles,
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

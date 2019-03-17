<?php 
require_once "../modelos/Presupuesto_disponible.php";

$presupuesto_disponible=new presupuesto_disponible();

$idpresupuesto_disponible=isset($_POST["idpresupuesto_disponible"])? limpiarCadena($_POST["idpresupuesto_disponible"]):"";
$nombre_objeto=isset($_POST["nombre_objeto"])? limpiarCadena($_POST["nombre_objeto"]):"";
$grupo=isset($_POST["grupo"])? limpiarCadena($_POST["grupo"]):"";
$subgrupo=isset($_POST["subgrupo"])? limpiarCadena($_POST["subgrupo"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$presupuesto_anual=isset($_POST["presupuesto_anual"])? limpiarCadena($_POST["presupuesto_anual"]):"";
$fondos_disponibles=isset($_POST["fondos_disponibles"])? limpiarCadena($_POST["fondos_disponibles"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':


		if (empty($idpresupuesto_disponible)){
			$rspta=$presupuesto_disponible->insertar(
				$nombre_objeto,
				$grupo,
				$subgrupo,
				$codigo,
				$presupuesto_anual,
				$fondos_disponibles);
			echo $rspta ? "Presupuesto registrado" : "Presupuesto no se pudo registrar";
		}
		else {
			$rspta=$presupuesto_disponible->editar(
				$idpresupuesto_disponible,
				$nombre_objeto,
				$grupo,
				$subgrupo,
				$codigo,
				$presupuesto_anual,
				$fondos_disponibles);
		echo $rspta ? "Presupuesto actualizado" : "Presupuesto no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$presupuesto_disponible->desactivar($idpresupuesto_disponible);
 		echo $rspta ? "Presupuesto Desactivado" : "Presupuesto no se puede desactivar";
	break;

	case 'activar':
		$rspta=$presupuesto_disponible->activar($idpresupuesto_disponible);
 		echo $rspta ? "Presupuesto activado" : "Presupuesto no se puede activar";
	break;

	case 'mostrar':
		$rspta=$presupuesto_disponible->mostrar($idpresupuesto_disponible);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$presupuesto_disponible->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpresupuesto_disponible.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idpresupuesto_disponible.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idpresupuesto_disponible.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idpresupuesto_disponible.')"><i class="fas fa-check"></i></button>',
 				"1"=>$reg->nombre_objeto,
 				"2"=>$reg->codigo,
 				"3"=>$reg->presupuesto_anual,
 				"4"=>$reg->fondos_disponibles,
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

	// case "selectPresupuesto_anual":
	// 	require_once "../modelos/presupuesto_anual.php";
		
	// 	$nombre_objeto = new presupuesto_anual();


	// 	$rspta = $nombre_objeto->select();
		
	// 	while ($reg = $rspta->fetch_object())
	// 			{
	// 				echo 
	// 				'<option value=' . $reg->idpresupuesto_anual . '>' . $reg->nombre_objeto . '</option>';

					
	// 			}
	// break;

	// case "selectCodigo":
	// 	require_once "../modelos/presupuesto_anual.php";
	// 	$codigo = new presupuesto_anual();

	// 	$rspta = $codigo->select();
		
	// 	while ($reg = $rspta->fetch_object())
	// 			{
	// 				echo 
	// 				'<option value=' . $reg->codigo . '>' . $reg->codigo . '</option>';
	// 			}
	// break;




}
?>
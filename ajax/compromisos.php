<?php
require_once "../modelos/Compromisos.php";

$compromisos=new Compromisos();

$idcompromisos=isset($_POST["idcompromisos"])? limpiarCadena($_POST["idcompromisos"]):"";
$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$numfactura=isset($_POST["numfactura"])? limpiarCadena($_POST["numfactura"]):"";
$total_compra=isset($_POST["total_compra"])? limpiarCadena($_POST["total_compra"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':


		if (empty($idcompromisos)){
			$rspta=$compromisos->insertar(
		$idprograma,
		$idproveedores,
		$fecha_hora,
		$numfactura,
		$total_compra,
				$_POST["idpresupuesto_disponible"],
				$_POST["valor"]);
			echo $rspta ? "Compromiso registrado" : "Compromiso no se pudo registrar";
		}
		else {
		// 	$rspta=$compromisos->editar(
		// $idcompromisos,
		// $idprograma,
		// $idproveedores,
		// $fecha_hora,
		// $numfactura,
		// $total_compra,
		// 		$_POST["idcompromisos"],
		// 		$_POST["idpresupuesto_disponible"],
		// 		$_POST["valor"]);
		// 	echo $rspta ? "Compromiso actualizado" : "El compromiso no se pudo actualizar";
		}
	break;


		case 'pagado':
		$rspta=$compromisos->pagado($idcompromisos);
 		echo $rspta ? "Compromiso Desactivado" : "Compromiso no se puede desactivar";
	break;

	case 'pendiente':
		$rspta=$compromisos->pendiente($idcompromisos);
 		echo $rspta ? "Compromiso activado" : "Compromiso no se puede activar";
	break;


	case 'eliminar':
		$rspta=$compromisos->eliminar($idcompromisos);
 		echo $rspta ? "El compromiso fue eliminada" : "El compromiso no se puede eliminar";
	break;


	case 'mostrar':
		$rspta=$compromisos->mostrar($idcompromisos);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;



	case 'listar':
		$rspta=$compromisos->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){

 			$data[]=array(
 				"0"=>($reg->condicion==0)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcompromisos.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->idcompromisos.')"><i class="fas fa-trash"></i></button>'.
 					//' <button class="btn btn-info" onclick = "print('.$reg->idcompromisos.')"> <i class="fas fa-print"> </i></button>'.
 					// '<a target="_blank" href="'.$url.$reg->idcompromisos.'"> <button class="btn btn-info"><i class="fas fa-print"></i></button></a>'.
 					' <button class="btn btn-danger" onclick="pagado('.$reg->idcompromisos.')"><i class="fas fa-times"></i></button>':
					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcompromisos.')"><i class="fas fa-pen"></i></button>'.
					' <button class="btn btn-primary" onclick="pendiente('.$reg->idcompromisos.')"><i class="fas fa-check"></i></button>',

 				"1"=>$reg->fecha,
 				"2"=>$reg->programa,
 				"3"=>$reg->proveedor,
 				"4"=>$reg->numfactura,
 				"5"=>$reg->total_compra,
 				"6"=>($reg->condicion==1)?'<span class="label bg-green">Pagado</span>':
 				'<span class="label bg-red">Pendiente</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


	case "selectProveedores":
		require_once "../modelos/proveedores.php";
		$casa_comercial = new proveedores();

		$rspta = $casa_comercial->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproveedores. '>' . $reg->casa_comercial . '</option>';
				}
	break;

		case "selectPrograma":
		require_once "../modelos/programa.php";
		$codigop = new Programa();

		$rspta = $codigop->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idprograma . '>' . $reg->codigop ."&nbsp;".'('. $reg->nombrep .')'. ' - ' . $reg->idprograma .'</option>';
				}

	break;

	case 'listarPresupuesto_disponible':
		require_once "../modelos/Presupuesto_disponible.php";
		$presupuesto_disponible=new Presupuesto_disponible();

		$rspta=$presupuesto_disponible->listarPresupuestoActivos();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idpresupuesto_disponible.',\''.$reg->codigo.'\')"><span class="fas fa-plus-circle"></span></button>',
 				"1"=>$reg->nombre_objeto,
 				"2"=>$reg->codigo,
 				"3"=>$reg->fondos_disponibles,
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

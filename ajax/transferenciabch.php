<?php
require_once "../modelos/Transferenciabch.php";

$transferenciabch=new transferenciabch();

$idtransferenciabch=isset($_POST["idtransferenciabch"])? limpiarCadena($_POST["idtransferenciabch"]):"";
$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$idctasbancarias=isset($_POST["idctasbancarias"])? limpiarCadena($_POST["idctasbancarias"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$serie_transf=isset($_POST["serie_transf"])? limpiarCadena($_POST["serie_transf"]):"";
$num_transf=isset($_POST["num_transf"])? limpiarCadena($_POST["num_transf"]):"";
$monto_acreditar=isset($_POST["monto_acreditar"])? limpiarCadena($_POST["monto_acreditar"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':


		if (empty($idtransferenciabch)){
			$rspta=$transferenciabch->insertar(
		$idproveedores,
		$idctasbancarias,
		$fecha_hora,
		$serie_transf,
		$num_transf,
		$monto_acreditar,
		$descripcion);
			echo $rspta ? "Transferencia registrada" : "Transferencia no se pudo registrar";
		}
		else {}
	break;


		case 'desactivar':
		$rspta=$transferenciabch->desactivar($idtransferenciabch);
 		echo $rspta ? "Transferencia Desactivado" : "Transferencia no se puede desactivar";
	break;

	case 'activar':
		$rspta=$transferenciabch->activar($idtransferenciabch);
 		echo $rspta ? "Transferencia activado" : "Transferencia no se puede activar";
	break;


	case 'eliminar':
		$rspta=$transferenciabch->eliminar($idtransferenciabch);
 		echo $rspta ? "Solicitud fue eliminada" : "La solicitud no se puede eliminar";
	break;


	case 'mostrar':
		$rspta=$transferenciabch->mostrar($idtransferenciabch);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;



	case 'listar':
		$rspta=$transferenciabch->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){

 				$url='../extensiones/tcpdf/pdf/solicitudbch.php?id=';


 			$data[]=array(
 				"0"=>($reg->condicion)?
 				'<button class="btn btn-warning" onclick="mostrar('.$reg->idtransferenciabch.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->idtransferenciabch.')"><i class="fas fa-trash"></i></button>'.
 					//' <button class="btn btn-info" onclick = "print('.$reg->idtransferenciabch.')"> <i class="fas fa-print"> </i></button>'.
 					'<a target="_blank" href="'.$url.$reg->idtransferenciabch.'"> <button class="btn btn-info"><i class="fas fa-print"></i></button></a>'.
 					' <button class="btn btn-success" onclick="desactivar('.$reg->idtransferenciabch.')"><i class="fas fa-check"></i></button>':
					'<button class="btn btn-warning" onclick="mostrar('.$reg->idtransferenciabch.')"><i class="fas fa-pen"></i></button>'.
					' <button class="btn btn-primary" onclick="activar('.$reg->idtransferenciabch.')"><i class="fas fa-check"></i></button>',


 				"1"=>$reg->fecha,
 				"2"=>$reg->casa_comercial,
 				"3"=>$reg->serie_transf.'-'.$reg->num_transf,
 				"4"=>$reg->monto_acreditar,

 				"5"=>($reg->condicion)?'<span class="label bg-yellow label-bs">Pendiente</span>':
 				'<span class="label bg-green ">Pagado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;




	case "selectCtasbancarias":
		require_once "../modelos/ctasbancarias.php";
		$cuentapg = new Ctasbancarias();

		$rspta = $cuentapg->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idctasbancarias . '>' . $reg->cuentapg ."&nbsp;".'('. $reg->numctapg .')'. "&nbsp;".'('. $reg->fondos_disponibles .')'. '</option>';
				}
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

}
?>

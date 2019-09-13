<?php
require_once "../modelos/Proveedores.php"; // Las clases se nombran en mayúsculas, aunque ese no es el problema

$proveedores=new Proveedores();

$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$casa_comercial=isset($_POST["casa_comercial"])? htmlspecialchars_decode(limpiarCadena($_POST["casa_comercial"])):"";
$rtn=isset($_POST["rtn"])? limpiarCadena($_POST["rtn"]):"";
$nombre_banco=isset($_POST["nombre_banco"])? limpiarCadena($_POST["nombre_banco"]):"";
$num_cuenta=isset($_POST["num_cuenta"])? limpiarCadena($_POST["num_cuenta"]):"";
$tipo_cuenta=isset($_POST["tipo_cuenta"])? limpiarCadena($_POST["tipo_cuenta"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/autorizaciones/" . $imagen);
			}

		}
		if (empty($idproveedores)){
			$rspta=$proveedores->insertar(

			    $casa_comercial,
					$rtn,
			    $nombre_banco,
			    $num_cuenta,
			    $tipo_cuenta,
			    $imagen);
			echo $rspta ? "Proveedor registrado" : "Proveedor no se pudo registrar";
		}
		else {
			$rspta=$proveedores->editar(
				$idproveedores,
			    $casa_comercial,
					$rtn,
			    $nombre_banco,
			    $num_cuenta,
			    $tipo_cuenta,
			    $imagen);
			echo $rspta ? "Proveedor actualizado" : "Proveedor no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$proveedores->desactivar($idproveedores);
 		echo $rspta ? "Proveedor Desactivado" : "Proveedor no se puede desactivar";
	break;

	case 'activar':
		$rspta=$proveedores->activar($idproveedores);
 		echo $rspta ? "Proveedor activado" : "Proveedor no se puede activar";
	break;

	case 'mostrar':
		$rspta=$proveedores->mostrar($idproveedores);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'ValidarNumRtn':

		$rspta=$proveedores->validarnumrtnduplicados();
		//Vamos a declarar un array
		$data= Array();

		while ($reg=$rspta->fetch_object()){

			$data[]=$reg->rtn;

		}
		echo json_encode($data);

	break;

	case 'listarp':
		$rspta=$proveedores->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idproveedores.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="desactivar('.$reg->idproveedores.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idproveedores.')"><i class="fas fa-pen"></i></button>'.
 					' <button class="btn btn-primary btn-sm" onclick="activar('.$reg->idproveedores.')"><i class="fas fa-check"></i></button>',
 				//"1"=>$reg->casa?comercial, // Aquí hay un error, la forma correcta es como está debajo
 				"1"=>$reg->casa_comercial,
				"2"=>$reg->rtn,
 				"3"=>$reg->nombre_banco, // este dato está faltando
 				"4"=>$reg->num_cuenta,
 				"5"=>$reg->tipo_cuenta,
 				"6"=>"<img src='../files/autorizaciones/".$reg->imagen."' height='50px' width='50px' >",
 				"7"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

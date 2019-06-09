<?php
require_once "../modelos/Consultas_compromisos.php";

$consultas_compromisos=new Consultas_compromisos();


switch ($_GET["op"]){
	case 'compromisosfecha':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];

		$rspta=$consultas_compromisos->compromisosfecha($fecha_inicio,$fecha_fin);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha,
        "1"=>$reg->tipo_registro,
 				"2"=>$reg->casa_comercial,
 				"3"=>$reg->nombre_objeto,
 				"4"=>$reg->codigo,
 				"5"=>$reg->unidad,
 				"6"=>$reg->numfactura,
 				"7"=>$reg->valor,
 				"8"=>($reg->condicion==1)?'<span class="label bg-green">Pagado</span>':
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


	// case 'ventasfechacliente':
	// 	$fecha_inicio=$_REQUEST["fecha_inicio"];
	// 	$fecha_fin=$_REQUEST["fecha_fin"];
	// 	$idcliente=$_REQUEST["idcliente"];

	// 	$rspta=$consulta->ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente);
 // 		//Vamos a declarar un array
 // 		$data= Array();

 // 		while ($reg=$rspta->fetch_object()){
 // 			$data[]=array(
 // 				"0"=>$reg->fecha,
 // 				"1"=>$reg->usuario,
 // 				"2"=>$reg->cliente,
 // 				"3"=>$reg->tipo_comprobante,
 // 				"4"=>$reg->serie_comprobante.' '.$reg->num_comprobante,
 // 				"5"=>$reg->total_venta,
 // 				"6"=>$reg->impuesto,
 // 				"7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 // 				'<span class="label bg-red">Anulado</span>'
 // 				);
 // 		}
 // 		$results = array(
 // 			"sEcho"=>1, //Información para el datatables
 // 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 // 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 // 			"aaData"=>$data);
 // 		echo json_encode($results);

	// break;
}
?>

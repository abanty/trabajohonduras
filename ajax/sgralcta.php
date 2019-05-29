<?php
require_once "../modelos/Consultas.php";

$consulta=new Consultas();


switch ($_GET["op"]){
	case 'excel_ctas_generales':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];

		$rspta=$consulta->consolidado_ctas_generales($fecha_inicio,$fecha_fin);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->num,
 				"1"=>$reg->fecha,
 				"2"=>$reg->unidad_superficie,
 				"3"=>$reg->cheque,
 				"4"=>'<span style="font-weight:bold; text-decoration: underline;">'.$reg->proveedor.':        '.'</span>'.$reg->descripcion,
 				"5"=>$reg->oc,
				"6"=>$reg->cp,
				"7"=>$reg->acdo,
				"8"=>$reg->unidadbase,
 				"9"=>$reg->num_trans,
				"10"=>$reg->objeto_gastp,
				"11"=>$reg->monto_total
 				// "7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 				// '<span class="label bg-red">Anulado</span>'
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
	//
	// 	$rspta=$consulta->ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente);
 	// 	//Vamos a declarar un array
 	// 	$data= Array();
	//
 	// 	while ($reg=$rspta->fetch_object()){
 	// 		$data[]=array(
 	// 			"0"=>$reg->fecha,
 	// 			"1"=>$reg->usuario,
 	// 			"2"=>$reg->cliente,
 	// 			"3"=>$reg->tipo_comprobante,
 	// 			"4"=>$reg->serie_comprobante.' '.$reg->num_comprobante,
 	// 			"5"=>$reg->total_venta,
 	// 			"6"=>$reg->impuesto,
 	// 			"7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 	// 			'<span class="label bg-red">Anulado</span>'
 	// 			);
 	// 	}
 	// 	$results = array(
 	// 		"sEcho"=>1, //Información para el datatables
 	// 		"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 	// 		"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 	// 		"aaData"=>$data);
 	// 	echo json_encode($results);
	//
	// break;
}
?>

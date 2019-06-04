<?php
require_once "../modelos/Consultas.php";

$consulta=new Consultas();


switch ($_GET["op"]){

	/*--------------------------------------*
	| CASE PARA EDITAR DATOS DEL COMPROMISO |
	.--------------------------------------*/
		case 'editardatos':
				$rspta=$consulta->modificardatos($_POST["id"],$_POST["columna_nombre"],$_POST["valorcol"]);
				echo $rspta ? "Compromiso modificado" : "Compromiso no se puede modificar";
		break;


		case 'excel_ctas_generales':
			$fecha_inicio=$_REQUEST["fecha_inicio"];
			$fecha_fin=$_REQUEST["fecha_fin"];

			$rspta=$consulta->consolidado_ctas_generales($fecha_inicio,$fecha_fin);
	 		//Vamos a declarar un array
	 		$data= Array();

	 		while ($reg=$rspta->fetch_object()){

				($reg->proveedor == "-")? $newgetprovider = ''.$dospuntos = '' :$newgetprovider = $reg->proveedor.$dospuntos = ":";;
				($reg->cheque == '0000000')||($reg->cheque == '')? $reg->cheque = '<span style="color:red; font-size:12px;">NO ASIGNADO</span>':$reg->cheque = '<span style="color:black; font-size:14px;">'.$reg->cheque.'</span>';
				($reg->num_trans == '0000000')||($reg->num_trans == '')? $reg->num_trans = '<span style="color:red; font-size:12px;">NO ASIGNADO</span>':$reg->num_trans = '<span style="color:black; font-size:14px;">'.$reg->num_trans.'</span>';

				$data[]=array(
	 				"0"=>$reg->num,
	 				"1"=>$reg->fecha,
	 				"2"=>$reg->unidad_superficie,
	 				"3"=>'<div onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;"  class="update" data-id="'.$reg->num.'" data-column="tipo_pago">' .$reg->cheque. '</div>',
	 				"4"=>'<span style="font-weight:bold; text-decoration: underline;">'.$newgetprovider.'</span> '.$dospuntos.' '.$reg->descripcion,
	 				"5"=>$reg->oc,
					"6"=>$reg->cp,
					"7"=>$reg->acdo,
					"8"=>$reg->unidadbase,
					"9"=>'<div onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;"  class="update" data-id="'.$reg->num.'" data-column="numero_transferencia">' .$reg->num_trans. '</div>',
	 				"10"=>$reg->objeto_gastp,
					"11"=>$reg->monto_total
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

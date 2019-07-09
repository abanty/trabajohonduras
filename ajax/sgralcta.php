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


	/*-------------------------------------*
	| CASE REPORTE EXCEL CUENTAS GENERALES |
	.-------------------------------------*/
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
	 				"10"=>$reg->objeto_gasto,
					"11"=>number_format($reg->subtotal, 2, '.', ',')
	 				);
	 		}
	 		$results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
	 		echo json_encode($results);
		break;


	/*----------------------------------------------*
	| CASE REPORTE EXCEL CUENTAS GENERALES DETALLADO|
	.----------------------------------------------*/
		case 'excel_ctas_detalles':
			$fecha_inicio_det=$_REQUEST["fecha_inicio_det"];
			$fecha_fin_det=$_REQUEST["fecha_fin_det"];

			$rspta=$consulta->consolidado_detalles($fecha_inicio_det,$fecha_fin_det);
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
					"10"=>$reg->objeto_gasto,
					"11"=>number_format($reg->isvr, 2, '.', ','),
					"12"=>number_format($reg->isrr, 2, '.', ','),
					"13"=>number_format($reg->subtotal, 2, '.', ',')
					);
			}
			$results = array(
				"sEcho"=>1, //Información para el datatables
				"iTotalRecords"=>count($data), //enviamos el total registros al datatable
				"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
				"aaData"=>$data);
			echo json_encode($results);
		break;


	/*-----------------------------------------*
	| CASE REPORTE EXCEL CUENTAS POR RENGLONES |
	.-----------------------------------------*/
		case 'excel_renglones':
			$año=$_REQUEST["año"];
			$rspta=$consulta->contabilidad_renglones($año);
			//Vamos a declarar un array
			$data= Array();
			while ($reg=$rspta->fetch_object()){

				$contenido = '<span style="color:blue;">'.number_format($reg->ACUMULADO, 2, '.', ',').'</span>';
				$reg->ACUMULADO == null?$content = '' : $content = $contenido;

				$data[]=array(
					"0"=>$reg->RENGLON,
					"1"=>$reg->CONCEPTO,
					"2"=>$reg->ENERO,
					"3"=>$reg->FEBRERO,
					"4"=>$reg->MARZO,
					"5"=>$reg->ABRIL,
					"6"=>$reg->MAYO,
					"7"=>$reg->JUNIO,
					"8"=>$reg->JULIO,
					"9"=>$reg->AGOSTO,
					"10"=>$reg->SEPTIEMBRE,
					"11"=>$reg->OCTUBRE,
					"12"=>$reg->NOVIEMBRE,
					"13"=>$reg->DICIEMBRE,
					"14"=>$content
					);
			}
			$results = array(
				"sEcho"=>1, //Información para el datatables
				"iTotalRecords"=>count($data), //enviamos el total registros al datatable
				"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
				"aaData"=>$data);
			echo json_encode($results);
		break;


	/*-----------------------------------------*
	| CASE REPORTE EXCEL CUENTAS POR PROGRAMAS |
	.-----------------------------------------*/
		case 'excel_programas':
			$año2=$_REQUEST["añopro"];
			$rspta=$consulta->contabilidad_programas($año2);
			//Vamos a declarar un array
			$data= Array();
			while ($reg=$rspta->fetch_object()){

				$contenido = '<span style="color:blue;">'.number_format($reg->ACUMULADO, 2, '.', ',').'</span>';
				$reg->ACUMULADO == null?$content = '' : $content = $contenido;

				$data[]=array(
					"0"=>'<span>'.$reg->PROGRAMA.'</span>',
					"1"=>$reg->ENERO,
					"2"=>$reg->FEBRERO,
					"3"=>$reg->MARZO,
					"4"=>$reg->ABRIL,
					"5"=>$reg->MAYO,
					"6"=>$reg->JUNIO,
					"7"=>$reg->JULIO,
					"8"=>$reg->AGOSTO,
					"9"=>$reg->SEPTIEMBRE,
					"10"=>$reg->OCTUBRE,
					"11"=>$reg->NOVIEMBRE,
					"12"=>$reg->DICIEMBRE,
					"13"=>$content
					);
			}
			$results = array(
				"sEcho"=>1, //Información para el datatables
				"iTotalRecords"=>count($data), //enviamos el total registros al datatable
				"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
				"aaData"=>$data);
			echo json_encode($results);
		break;

	/*------------------------------------*
	| CASE REPORTE EXCEL CUENTAS POR UUSS |
	.------------------------------------*/
		case 'excel_uuss':
			$añou=$_REQUEST["añouuss"];
			$rspta=$consulta->contabilidad_uuss($añou);
			//Vamos a declarar un array
			$data= Array();
			while ($reg=$rspta->fetch_object()){

				$contenido = '<span style="color:blue;">'.number_format($reg->ACUMULADO, 2, '.', ',').'</span>';
				$reg->ACUMULADO == null?$content = '' : $content = $contenido;

			$data[]=array(
				"0"=>'<span>'.$reg->UNIDAD_SUPERFICIE.'</span>',
				"1"=>$reg->ENERO,
				"2"=>$reg->FEBRERO,
				"3"=>$reg->MARZO,
				"4"=>$reg->ABRIL,
				"5"=>$reg->MAYO,
				"6"=>$reg->JUNIO,
				"7"=>$reg->JULIO,
				"8"=>$reg->AGOSTO,
				"9"=>$reg->SEPTIEMBRE,
				"10"=>$reg->OCTUBRE,
				"11"=>$reg->NOVIEMBRE,
				"12"=>$reg->DICIEMBRE,
				"13"=>$content
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

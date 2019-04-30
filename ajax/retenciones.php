<?php
if (strlen(session_id()) < 1)
  session_start();
require_once "../modelos/Retenciones.php";

$reten=new Retenciones();

$idretenciones=isset($_POST["idretenciones"])? limpiarCadena($_POST["idretenciones"]):"";
$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$rtn=isset($_POST["rtn"])? limpiarCadena($_POST["rtn"]):"";
$numdocumento=isset($_POST["numdocumento"])? limpiarCadena($_POST["numdocumento"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$tipo_impuesto=isset($_POST["tipo_impuesto"])? limpiarCadena($_POST["tipo_impuesto"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$base_imponible=isset($_POST["base_imponible"])? limpiarCadena($_POST["base_imponible"]):"";
$imp_retenido=isset($_POST["imp_retenido"])? limpiarCadena($_POST["imp_retenido"]):"";
$total_oc=isset($_POST["total_oc"])? limpiarCadena($_POST["total_oc"]):"";


// $idcompromisos=isset($_POST["idcompromisos"])? limpiarCadena($_POST["idcompromisos"]):"";
// $valor_base=isset($_POST["valor_base"])? limpiarCadena($_POST["valor_base"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idretenciones)){
			$rspta=$reten->insertar($idproveedores,$rtn,$numdocumento,$fecha_hora,$tipo_impuesto,$descripcion,$base_imponible,
			$imp_retenido,$total_oc,$_POST["idcompromisos"]);

			echo $rspta ? "Retencion registrada" : "Retencion no registrada";
		}else{
		}
	break;

	case 'anular':
		$rspta=$reten->anular($idretenciones);
 		echo $rspta ? "retencion anulada" : "La retencion no se puede anular";
	break;

	case 'mostrar':
		$rspta=$reten->mostrar($idretenciones);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	// case 'listarDetalle':
	// 	//Recibimos el idretenciones
	// 	$id=$_GET['id'];

	// 	$rspta = $retenciones->listarDetalle($id);
	// 	$total=0;
	// 	echo '<thead style="background-color:#A9D0F5">
  //                                   <th>Opciones</th>
  //                                   <th>N. Facturas</th>
  //                                   <th>Valor Base</th>
  //                                   <th>Subtotal</th>
  //                               </thead>';
  //
	// 	while ($reg = $rspta->fetch_object())
	// 			{
	// 				echo '<tr class="filas">
  //         <td>
  //         </td>
  //         <td>'.$reg->numfactura.'</td>
  //         <td>'.$reg->valor_base.'</td>
  //         <td>'.$reg->valor_base==$reg->valor_base.'</td></tr>';
	// 				$total=$total+($reg->valor_base==$reg->valor_base);
	// 			}
	// 	echo '<tfoot>
  //                                   <th>TOTAL</th>
  //                                   <th></th>
  //                                   <th></th>
  //                                   <th></th>
  //                                   <th></th>
  //                                   <th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_compra" id="total_compra"></th>
  //                               </tfoot>';
	// break;

	case 'listar':
		$rspta=$reten->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idretenciones.')"><i class="fa fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idretenciones.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idretenciones.')"><i class="fa fa-eye"></i></button>').
 					'<a target="_blank" href="../reportes/exretenciones.php?id='.$reg->idretenciones.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>',
 				"1"=>$reg->proveedor,
 				"2"=>$reg->rtn,
 				"3"=>$reg->numdocumento,
 				"4"=>$reg->fecha,
        "5"=>$reg->tipo_impuesto,
 				"6"=>$reg->descripcion,
        "7"=>$reg->base_imponible,
 				"8"=>$reg->imp_retenido,
 				"9"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 				'<span class="label bg-red">Anulado</span>'
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
		require_once "../modelos/Proveedores.php";
		$casa_comercial = new Proveedores();

		$rspta = $casa_comercial->select_proveedor();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproveedores. '>' . $reg->casa_comercial . '</option>';
				}

	break;

	case 'listarCompromisos':
		require_once "../modelos/Compromisos.php";
		$compromisos=new Compromisos();

		$rspta=$compromisos->listarCompromisos();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetallefacturas('.$reg->idcompromisos.',\''.$reg->numfactura.'\')"><span class="fa fa-plus"></span></button>',
 				"1"=>$reg->proveedor,
 				"2"=>$reg->numfactura,
 				"3"=>$reg->total_compra,
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

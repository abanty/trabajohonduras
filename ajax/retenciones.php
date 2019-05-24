<?php
if (strlen(session_id()) < 1)
  session_start();
require_once "../modelos/Retenciones.php";

$reten=new Retenciones();

/*------------------------------------------------------------*
| DECLARACION DE VARIABLES PARA ALMACEN VALOR POR METODO POST |
.------------------------------------------------------------*/
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

switch ($_GET["op"]){
  /*----------------------------*
	| CASE PARA GUARDAR REGISTROS |
	.----------------------------*/
	case 'guardaryeditar':
		if (empty($idretenciones)){
			$rspta=$reten->insertar($idproveedores,$rtn,$numdocumento,$fecha_hora,$tipo_impuesto,$descripcion,$base_imponible,
			$imp_retenido,$total_oc,$_POST['idcompromisos'],$_POST['valorbase']);

			echo $rspta ? "Retencion registrada" : "Retencion no registrada";
		}else{
		}
	break;


  /*---------------------------*
  | CASE PARA ANULAR REGISTROS |
  .---------------------------*/
	case 'anular':
		$rspta=$reten->anular($idretenciones);
 		echo $rspta ? "retencion anulada" : "La retencion no se puede anular";
	break;


  /*----------------------------*
	| CASE PARA MOSTRAR REGISTROS |
	.----------------------------*/
	case 'mostrar':
		$rspta=$reten->mostrar($idretenciones);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;


  /*-------------------------------------*
	| CASE PARA OBTENER RTN DE PROVEEDORES |
	.-------------------------------------*/
  case 'get_rtn':
    require_once "../modelos/Proveedores.php";
    $provider=new Proveedores();
		$rspta=$provider->get_rtn_proveedor($idproveedores);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;


  /*--------------------------------------------*
  | CASE PARA VALIDAR N° DE DOCUMENTO DUPLICADO |
  .--------------------------------------------*/
  case 'ValidarNumDocReten':

    $rspta=$reten->validar_doc_reten();
    $data= Array();

    while ($reg=$rspta->fetch_object()){
      $data[]=$reg->numdocumento;
    }
    echo json_encode($data);

  break;


  /*---------------------------*
  | CASE PARA LISTAR REGISTROS |
  .---------------------------*/
	case 'listar':
		$rspta=$reten->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idretenciones.')"><i class="fa fa-eye"></i></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="anular('.$reg->idretenciones.')"><i class="fa fa-trash"></i></button>':
 					'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idretenciones.')"><i class="fa fa-eye"></i></button>').
 					'<a target="_blank" href="../reportes/exretenciones.php?id='.$reg->idretenciones.'"> <button class="btn btn-info btn-sm"><i class="fa fa-print"></i></button></a>',
 				"1"=>$reg->proveedor,
 				"2"=>$reg->rtn,
 				"3"=>$reg->numdocumento,
 				"4"=>$reg->fecha,
        "5"=>$reg->tipo_impuesto,
 				"6"=>$reg->descripcion,
        "7"=>number_format($reg->base_imponible, 2, '.', ','),
 				"8"=>number_format($reg->imp_retenido, 2, '.', ','),
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


  /*--------------------------------------------------*
  | CASE PARA SELECCIONAR PROVEEDORES EN UN SELECTBOX |
  .--------------------------------------------------*/
  case "selectProveedores":
		require_once "../modelos/Proveedores.php";
		$casa_comercial = new Proveedores();

		$rspta = $casa_comercial->select_proveedor();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproveedores. '>' . $reg->casa_comercial . '</option>';
				}

	break;


  /*----------------------*
  | CASE PARA VER DETALLE |
  .----------------------*/
  case 'listar_reten_Detalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $reten->listarDetalle_retencion($id);
		$total=0;



		while ($reg = $rspta->fetch_object())
				{
					echo
          '<tr class="filas"><td style="text-align:center;"><i class="fas fa-check" style="color: green;"></i></td>
    					<td>'.$reg->numfactura.'</td>
    					<td>'.number_format($reg->valorbase, 2, '.', ',').'</td>
    					<td>'.number_format($reg->subtotal, 2, '.', ',').'</td>
          </tr>';
				}

	break;

  /*-----------------------------------------*
  | CASE PARA LISTAR COMPROMISOS EN UN MODAL |
  .-----------------------------------------*/
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

<?php
if (strlen(session_id()) < 1)
  session_start();

require_once "../modelos/Administrar_ordenes.php";
// GUARDANDO UN COMIT ahora mismo
$admin_ord=new Administrar_ordenes();

$idadministrar_ordenes=isset($_POST["idadministrar_ordenes"])? limpiarCadena($_POST["idadministrar_ordenes"]):"";
$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$idusuario=$_SESSION["idusuario"];
$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$iduuss=isset($_POST["iduuss"])? limpiarCadena($_POST["iduuss"]):"";
$num_orden=isset($_POST["num_orden"])? limpiarCadena($_POST["num_orden"]):"";
$num_comprobante=isset($_POST["num_comprobante"])? limpiarCadena($_POST["num_comprobante"]):"";
$titulo_orden =isset($_POST["titulo_orden"])? limpiarCadena($_POST["titulo_orden"]):"";
$descripcion_orden=isset($_POST["descripcion_orden"])? limpiarCadena($_POST["descripcion_orden"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";

$subtotalinicial=isset($_POST["subtotal_inicial"])? limpiarCadena($_POST["subtotal_inicial"]):"";
$descuentototal=isset($_POST["descuento_total"])? limpiarCadena($_POST["descuento_total"]):"";
$subtotal=isset($_POST["subtotales"])? limpiarCadena($_POST["subtotales"]):"";
$impuestosv=isset($_POST["impuestosv"])? limpiarCadena($_POST["impuestosv"]):"";
$tasaimpuestosv=isset($_POST["tasasv"])? limpiarCadena($_POST["tasasv"]):"";
$valor_sv=isset($_POST["valor_sv"])? limpiarCadena($_POST["valor_sv"]):"";
$impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
$tasaimpuesto=isset($_POST["tasaimpuesto"])? limpiarCadena($_POST["tasaimpuesto"]):"";
$valor_impuesto=isset($_POST["valor_impuesto"])? limpiarCadena($_POST["valor_impuesto"]):"";
$monto_total=isset($_POST["monto_total"])? limpiarCadena($_POST["monto_total"]):"";
$retencionisv=isset($_POST["retencionisv"])? limpiarCadena($_POST["retencionisv"]):"";
$tasaretencionisv=isset($_POST["tasaretencionisv"])? limpiarCadena($_POST["tasaretencionisv"]):"";
$valor_isv=isset($_POST["valor_isv"])? limpiarCadena($_POST["valor_isv"]):"";
$retencionisr=isset($_POST["retencionisr"])? limpiarCadena($_POST["retencionisr"]):"";
$tasaretencionisr=isset($_POST["tasaretencionisr"])? limpiarCadena($_POST["tasaretencionisr"]):"";
$valor_isr=isset($_POST["valor_isr"])? limpiarCadena($_POST["valor_isr"]):"";
$totalneto=isset($_POST["total_neto"])? limpiarCadena($_POST["total_neto"]):"";

// VARIABLES FUNCION Comprobante
$idctasbancarias=isset($_POST["idctasbancarias"])? limpiarCadena($_POST["idctasbancarias"]):"";
$tipopago=isset($_POST["tipopago"])? limpiarCadena($_POST["tipopago"]):"";
$num_transferencia=isset($_POST["num_transferencia"])? limpiarCadena($_POST["num_transferencia"]):"";
$debitos=isset($_POST["debitos"])? limpiarCadena($_POST["debitos"]):"";
$creditos=isset($_POST["creditos"])? limpiarCadena($_POST["creditos"]):"";
$contabilidad=isset($_POST["contabilidad"])? limpiarCadena($_POST["contabilidad"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

    $idproveedores == null ? $idproveedores='1' : $idproveedores;
  	$iduuss == null ? $iduuss='1' : $iduuss;
    $idprograma == null ? $idprograma='1' : $idprograma;
		if (empty($idadministrar_ordenes)){

      $variable_factura= isset($_POST["num_factura"]);

      if ($variable_factura && $contabilidad){

        $rspta=$admin_ord->insertar_orden_factura_comprobante($idproveedores,$idusuario,$idprograma,$iduuss,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,$fecha_hora,
        $subtotalinicial,str_replace(',','',$descuentototal),$subtotal,str_replace(',','',$impuestosv),$tasaimpuestosv,str_replace(',','',$valor_sv),str_replace(',','',$impuesto),$tasaimpuesto,str_replace(',','',$valor_impuesto),$monto_total,str_replace(',','',$retencionisv),
        $tasaretencionisv,str_replace(',','',$valor_isv),str_replace(',','',$retencionisr),$tasaretencionisr,str_replace(',','',$valor_isr),$totalneto,$_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"],
        str_replace(',','',$_POST["precio_unitario"]),$_POST["num_factura"],$_POST["fecha_factura"],$_POST["valor_factura"],
        $idctasbancarias,$tipopago,$num_transferencia,$debitos,$creditos,$contabilidad);

          }elseif ($variable_factura) {

            $rspta=$admin_ord->insertar_orden_factura($idproveedores,$idusuario,$idprograma,$iduuss,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,$subtotalinicial,$fecha_hora,
            str_replace(',','',$descuentototal),$subtotal,str_replace(',','',$impuestosv),$tasaimpuestosv,str_replace(',','',$valor_sv),str_replace(',','',$impuesto),$tasaimpuesto,str_replace(',','',$valor_impuesto),$monto_total,str_replace(',','',$retencionisv),
            $tasaretencionisv,str_replace(',','',$valor_isv),str_replace(',','',$retencionisr),$tasaretencionisr,str_replace(',','',$valor_isr),$totalneto,$_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],
            $_POST["descripcion"],str_replace(',','',$_POST["precio_unitario"]),$_POST["num_factura"],$_POST["fecha_factura"],$_POST["valor_factura"]);

                }elseif ($contabilidad) {

                  $rspta=$admin_ord->insertar_orden_comprobante($idproveedores,$idusuario,$idprograma,$iduuss,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
                   $fecha_hora,$subtotalinicial,str_replace(',','',$descuentototal),$subtotal,str_replace(',','',$impuestosv),$tasaimpuestosv,str_replace(',','',$valor_sv),str_replace(',','',$impuesto),$tasaimpuesto,str_replace(',','',$valor_impuesto),$monto_total,str_replace(',','',$retencionisv),
                   $tasaretencionisv,str_replace(',','',$valor_isv),str_replace(',','',$retencionisr),$tasaretencionisr,str_replace(',','',$valor_isr),$totalneto,$_POST["idpresupuesto_disponible"],
                   $_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"],str_replace(',','',$_POST["precio_unitario"]),$idctasbancarias,$tipopago,$num_transferencia,$debitos,
                   $creditos,$contabilidad);

                          }else {
                            $rspta=$admin_ord->insertar_orden($idproveedores,$idusuario,$idprograma,$iduuss,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
                                  $fecha_hora,$subtotalinicial,str_replace(',','',$descuentototal),$subtotal,str_replace(',','',$impuestosv),$tasaimpuestosv,str_replace(',','',$valor_sv),str_replace(',','',$impuesto),$tasaimpuesto,str_replace(',','',$valor_impuesto),$monto_total,str_replace(',','',$retencionisv),
                                  $tasaretencionisv,str_replace(',','',$valor_isv),str_replace(',','',$retencionisr),$tasaretencionisr,str_replace(',','',$valor_isr),$totalneto,
                                  $_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"],str_replace(',','',$_POST["precio_unitario"]));
                          }

        echo $rspta ? "Orden de Compra registrada" : "No se pudieron registrar todos los datos de la orden de compra";

  	}else {



		}
	break;


/*-------------------------------------*
| FUNCION PARA CAMBIAR ESTADO A ANULADO |
.-------------------------------------*/
	case 'anular':
		$rspta=$admin_ord->anular($idadministrar_ordenes);
 		echo $rspta ? "Orden de compra anulada" : "Orden de compra no se puede anular";
	break;

/*-------------------------------------*
| FUNCION PARA CAMBIAR ESTADO A PAGADO |
.-------------------------------------*/
  case 'pagar':
    $rspta=$admin_ord->pagar($idadministrar_ordenes,$tipo_documento,$retencionisv,$retencionisr);
    echo $rspta ? "Orden de compra pagada" : "Orden de compra no se puede pagar";
  break;

/*-------------------------------------------------------*
| FUNCION PARA CAMBIAR MOSTRAR LA INFORMACION DE ORDENES |
.-------------------------------------------------------*/
	case 'mostrar_orden_edit':

		$rspta=$admin_ord->mostrar_orden($idadministrar_ordenes);

 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);

	break;



	case 'listar_Orden_Detalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $admin_ord->listarDetalle_orden($id);
		$total=0;

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas"><td style="text-align:center;"><i class="fas fa-check" style="color: green;"></i></td>
					<td>'.$reg->codigo.'</td>
          <td class="tdunit" >'.$reg->unidad.'</td>
        	<td>'.$reg->cantidad.'</td>
					<td class="tddesc" colspan="4">'.$reg->descripcion.'</td>
					<td>'.number_format($reg->precio_unitario, 2, '.', ',').'</td>
					<td>'.number_format($reg->precio_unitario * $reg->cantidad, 2, '.', ',').'</td></tr>';
				}

	break;


  case 'listar_Orden_Facturas':
    //Recibimos el idingreso
    $id=$_GET['id'];

    $rspta = $admin_ord->listarFactura_orden($id);
    $total=0;

    while ($reg = $rspta->fetch_object())
        {
          echo '<tr class="filafactura">
          <td style="width: 224px;">'.$reg->num_factura.'</td>
          <td style="width: 205px;">'.$reg->fecha_factura.'</td>
          <td style="width: 225px;">'.$reg->valor_factura.'</td>
          <td style="width: 95px; text-align:center;"><i class="fas fa-check" style="color: green;"></i></td></tr>';
        }

  break;

 case 'button_add':
      echo '<button class="btn btn-warning" id="btnaddfact" onclick="agregarfilafactura()" type="button" name="button"><i class="fa fa-plus"></i> Añadir Factura</button>';
 break;

	case 'listar':
		$rspta=$admin_ord->listarOrden();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){

        $urlorden='../reportes/OrdenCompra.php?id=';
        $urlcomprobante='../reportes/Comprobante_orden.php?id=';
        $urlsolicitudcompra='../reportes/SolicitudCompra.php?id=';

        $var_tipo_doc = $reg->tipo_documento;
        switch ($var_tipo_doc) {

            case "F.R.":
            $var_tipo_doc = '<a style="color:rgb(245, 126, 126); font-weight:bold;">'.$var_tipo_doc.'</a>' ;
            $contenido_li =  '<ul class="dropdown-menu">
                   <li><a target="_blank" href="'.$urlcomprobante.$reg->idadministrar_ordenes.'">Comprobante de pago</a></li>
              </ul>';
            break;

            case "Alimentacion":
            $var_tipo_doc = '<a style="color:rgb(214, 116, 244); font-weight:bold;">'.$var_tipo_doc.'</a>' ;
            $contenido_li =  '';
            break;

            case "Acuerdo":
            $var_tipo_doc = '<a style="color:rgb(93, 155, 212); font-weight:bold;">'.$var_tipo_doc.'</a>' ;
            $contenido_li =  '<ul class="dropdown-menu">
               <li><a target="_blank" href="'.$urlcomprobante.$reg->idadministrar_ordenes.'">Comprobante de pago</a></li>
              </ul>';
            break;

            case "O/C":
            $var_tipo_doc = '<a style="color:rgb(31, 208, 128); font-weight:bold;">'.$var_tipo_doc.'</a>';
            $contenido_li =  '<ul class="dropdown-menu">
               <li id="pdfordencompra"><a target="_blank" href="'.$urlorden.$reg->idadministrar_ordenes.'">Orden de compra</a></li>
               <li><a target="_blank" href="'.$urlcomprobante.$reg->idadministrar_ordenes.'">Comprobante de pago</a></li>
               <li><a target="_blank" href="'.$urlsolicitudcompra.$reg->idadministrar_ordenes.'">Solicitud de Compra</a></li>
              </ul>';
            break;

            case "Becas":
            $var_tipo_doc = '<a style="color:rgb(211, 246, 137); font-weight:bold;">'.$var_tipo_doc.'</a>';
            $contenido_li =  '';
            break;

            case "Planillas":
            $var_tipo_doc = '<a style="color:rgb(50, 17, 129); font-weight:bold;">'.$var_tipo_doc.'</a>';
            $contenido_li =  '';
            break;

            case "Otros":
            $var_tipo_doc = '<a style="color:rgb(191, 80, 33); font-weight:bold;">'.$var_tipo_doc.'</a>';
            $contenido_li =  '';
            break;

            default :
            $contenido_li;
            $var_tipo_doc;
            break;

      };
 			$data[]=array(
 				"0"=>(($reg->estado=='Pendiente')?'<button class="btn btn-warning btn-sm" onclick="orden_mostrar('.$reg->idadministrar_ordenes.')"><i class="fas fa-eye"></i></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="anular('.$reg->idadministrar_ordenes.')"><i class="fas fa-times-circle"></i></button>'.
          ' <button class="btn btn-primary btn-sm" onclick="pagar('.$reg->idadministrar_ordenes.'  ,  \''.limpiarCadena($reg->tipo_documento).'\'  ,  \''.$reg->retencion_isv.'\'  ,  \''.$reg->retencion_isr.'\')"><i class="fas fa-coins"></i></button>':
          (($reg->estado=='Pagado')?'<button class="btn btn-warning btn-sm" onclick="orden_mostrar('.$reg->idadministrar_ordenes.')"><i class="fas fa-eye"></i></button>'.
          ' <button class="btn btn-danger btn-sm" onclick="anular('.$reg->idadministrar_ordenes.')"><i class="fas fa-times-circle"></i></button>':
        '<button class="btn btn-warning btn-sm" onclick="orden_mostrar('.$reg->idadministrar_ordenes.')"><i class="fas fa-eye"></i></button>')).


          '<li style="list-style:none; display: inline-block; margin-left: 4px;" class="dropdown">
              <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" aria-expanded="true">
                <i class="fas fa-print" aria-hidden="true"></i>
              </a>'.$contenido_li.'</li>',

 				"1"=>$reg->fecha,
 				"2"=>$reg->proveedor,
 				"3"=>$reg->usuario,
 				"4"=>$reg->codigop,
        "5"=>$var_tipo_doc,
  			"6"=>$reg->num_orden,
 				"7"=>$reg->num_comprobante,
 				"8"=>number_format("$reg->monto_total", 2, '.', ','),
 				"9"=>($reg->estado=='Pendiente')?'<span class="label bg-green">Pendiente</span>':(($reg->estado=='Pagado')?'<span class="label bg-yellow">Pagado</span>'
        :'<span class="label bg-red">Anulado</span>'));
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
		$proveedores = new Proveedores();

		$rspta = $proveedores->select_proveedor();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproveedores. '>' . $reg->casa_comercial . '</option>';
				}

	break;

  case "select_cta_banco":
		require_once "../modelos/Ctasbancarias.php";
		$ctasbancos = new Ctasbancarias();

		$rspta = $ctasbancos->select_ctas_bancarias();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idctasbancarias. '>' . $reg->bancopg . ' - ' . $reg->numctapg . '</option>';
				}

	break;


	case "selectPrograma":
		require_once "../modelos/Programa.php";
		$programa = new Programa();

		$rspta = $programa->select_programa();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idprograma . '>' . $reg->codigop ."&nbsp;".'('. $reg->nombrep .')'. '</option>';
				}

	break;

  case "selectUuss":
    require_once "../modelos/Uuss.php";
    $uuss = new Uuss();

    $rspta = $uuss->selectUuss();

    while ($reg = $rspta->fetch_object())
        {
          echo '<option value=' . $reg->iduuss . '>' . $reg->nombre. '</option>';
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
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idpresupuesto_disponible.',\''.$reg->codigo.'\',\''.$reg->presupuesto_anual.'\')"><span class="fas fa-plus-circle"></span></button>',
 				"1"=>$reg->nombre_objeto,
 				"2"=>$reg->codigo,
        "3"=>($reg->presupuesto_anual<'0')?'<span style="font-size:13px;" class="label bg-red">'.$reg->presupuesto_anual.'</span>':	$reg->presupuesto_anual
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

<?php
if (strlen(session_id()) < 1)
  session_start();

require_once "../modelos/Administrar_ordenes.php";

$admin_ord=new Administrar_ordenes();

$idadministrar_ordenes=isset($_POST["idadministrar_ordenes"])? limpiarCadena($_POST["idadministrar_ordenes"]):"";
$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$idusuario=$_SESSION["idusuario"];
$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$num_orden=isset($_POST["num_orden"])? limpiarCadena($_POST["num_orden"]):"";
$num_comprobante=isset($_POST["num_comprobante"])? limpiarCadena($_POST["num_comprobante"]):"";
$titulo_orden =isset($_POST["titulo_orden"])? limpiarCadena($_POST["titulo_orden"]):"";
$descripcion_orden=isset($_POST["descripcion_orden"])? limpiarCadena($_POST["descripcion_orden"]):"";
$tipo_impuesto=isset($_POST["tipo_impuesto"])? limpiarCadena($_POST["tipo_impuesto"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
$subtotal=isset($_POST["subtotales"])? limpiarCadena($_POST["subtotales"]):"";
$descuento_total=isset($_POST["descuento_total"])? limpiarCadena($_POST["descuento_total"]):"";
$monto_total=isset($_POST["monto_total"])? limpiarCadena($_POST["monto_total"]):"";


// VARIABLES FUNCION Comprobante

$idbancos=isset($_POST["idbancos"])? limpiarCadena($_POST["idbancos"]):"";
$tipopago=isset($_POST["tipopago"])? limpiarCadena($_POST["tipopago"]):"";
$num_transferencia=isset($_POST["num_transferencia"])? limpiarCadena($_POST["num_transferencia"]):"";
$debitos=isset($_POST["debitos"])? limpiarCadena($_POST["debitos"]):"";
$creditos=isset($_POST["creditos"])? limpiarCadena($_POST["creditos"]):"";
$contabilidad=isset($_POST["contabilidad"])? limpiarCadena($_POST["contabilidad"]):"";

// $num_factura = isset($_POST["num_factura"])? limpiarCadena($_POST["num_factura"]):"";
// $fecha_factura = isset($_POST["fecha_factura"])? limpiarCadena($_POST["fecha_factura"]):"";
// $valor_factura = isset($_POST["valor_factura"])? limpiarCadena($_POST["valor_factura"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

		if (empty($idadministrar_ordenes)){

      $variable_factura= isset($_POST["num_factura"]);

      if ($variable_factura && $contabilidad){

        $rspta=$admin_ord->insertar_orden_factura_comprobante($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_impuesto,
               $fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"]
               ,$_POST["precio_unitario"],$_POST["num_factura"],$_POST["fecha_factura"],$_POST["valor_factura"],$idbancos,$tipopago,$num_transferencia,$debitos,$creditos,$contabilidad);

          }elseif ($variable_factura) {

            $rspta=$admin_ord->insertar_orden_factura($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_impuesto,
            $fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"]
            ,$_POST["precio_unitario"],$_POST["num_factura"],$_POST["fecha_factura"],$_POST["valor_factura"]);

                }elseif ($contabilidad) {

                  $rspta=$admin_ord->insertar_orden_comprobante($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_impuesto,
                   $fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"]
                   ,$_POST["precio_unitario"],$idbancos,$tipopago,$num_transferencia,$debitos,$creditos,$contabilidad);

                          }else {

                            $rspta=$admin_ord->insertar_orden($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_impuesto,
                                  $fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$_POST["idpresupuesto_disponible"],$_POST["unidad"],$_POST["cantidad"],$_POST["descripcion"]
                                  ,$_POST["precio_unitario"]);
                          }

        echo $rspta ? "Orden de Compra registrada" : "No se pudieron registrar todos los datos de la orden de compra";

  	}else {


		}
	break;

	case 'anular':
		$rspta=$admin_ord->anular($idadministrar_ordenes);
 		echo $rspta ? "Orden de compra anulada" : "Orden de compra no se puede anular";
	break;

	case 'mostrar':
		$rspta=$admin_ord->mostrar($idadministrar_ordenes);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	// case 'listarDetalle':
	// 	//Recibimos el idingreso
	// 	$id=$_GET['id'];

	// 	$rspta = $administrar_ordenes->listarDetalle($id);
	// 	$total=0;
	// 	echo '<thead style="background-color:#A9D0F5">
 //                                    <th>Opciones</th>
 //                                    <th>Objeto_gasto</th>
 //                                    <th>Unidad</th>
 //                                    <th>Cantidad</th>
 //                                    <th>Descripcion</th>
 //                                    <th>Precio Unitario</th>
 //                                    <th>Descuento</th>
 //                                    <th>Subtotal</th>
 //                                </thead>';

	// 	while ($reg = $rspta->fetch_object())
	// 			{
	// 				echo '<tr class="filas"><td></td>
	// 				<td>'.$reg->codigo.'</td>
	// 				<td>'.$reg->unidad.'</td>
	// 				<td>'.$reg->cantidad.'</td>
	// 				<td>'.$reg->descripcion.'</td>
	// 				<td>'.$reg->precio_unitario.'</td>
	// 				<td>'.$reg->descuento.'</td>
	// 				<td>'.$reg->subtotal.'</td></tr>';
	// 				$total=$total+($reg->precio_unitario*$reg->cantidad-$reg->descuento);
	// 			}
	// 	echo '<tfoot>
 //                                    <th>TOTAL</th>
 //                                    <th></th>
 //                                    <th></th>
 //                                    <th></th>
 //                                    <th></th>
 //                                    <th></th>
 //                                    <th></th>
 //                                    <th><h4 id="total">L.'.$total.'</h4><input type="hidden" name="total_administrar_ordenes" id="total_administrar_ordenes"></th>
 //                                </tfoot>';
	// break;

 case 'button_add':
      echo '<button class="btn btn-warning" onclick="agregarfilafactura()" type="button" name="button"><i class="fa fa-plus"></i> Añadir Factura</button>';
 break;

	case 'listar':
		$rspta=$admin_ord->listarOrden();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){

 				$url='../reportes/OrdenCompra.php?id=';

 			$data[]=array(
 				"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idadministrar_ordenes.')"><i class="fas fa-eye"></i></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="anular('.$reg->idadministrar_ordenes.')"><i class="fas fa-times-circle"></i></button>':
 					'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idadministrar_ordenes.')"><i class="fas fa-eye"></i></button>').

          '<li style="list-style:none; display: inline-block; margin-left: 4px;" class="dropdown open">
              <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" aria-expanded="true">
                <i class="fas fa-print" aria-hidden="true"></i>
              </a>
                <ul class="dropdown-menu">
                  <li><a target="_blank" href="'.$url.$reg->idadministrar_ordenes.'">Solicitud de compra</a></li>
                  <li><a target="_blank" href="">Orden de compra</a></li>
                  <li><a target="_blank" href="">Comprobante de pago</a></li>
                </ul>
          </li>',


          // '<a target="_blank" href="'.$url.$reg->idadministrar_ordenes.'"> <button class="btn btn-info btn-sm"><i class="fas fa-print"></i></button></a>',
 				"1"=>$reg->fecha,
 				"2"=>$reg->proveedor,
 				"3"=>$reg->usuario,
 				"4"=>$reg->codigop,
  			"5"=>$reg->num_orden,
 				"6"=>$reg->num_comprobante,
 				"7"=>$reg->monto_total,

 				"8"=>$reg->impuesto,
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
		require_once "../modelos/Bancos.php";
		$bancos = new Bancos();

		$rspta = $bancos->select_ctas_bancos();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idbancos. '>' . $reg->nombre_banco . ' - ' . $reg->numctapg . '</option>';
				}

	break;


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
 				"3"=>$reg->presupuesto_anual,
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

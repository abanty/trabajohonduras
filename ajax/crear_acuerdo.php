<?php
if (strlen(session_id()) < 1)
  session_start();

require_once "../modelos/Crear_acuerdo.php";

$crear_acuerdo=new Crear_acuerdo();

$idcrear_acuerdo=isset($_POST["idcrear_acuerdo"])? limpiarCadena($_POST["idcrear_acuerdo"]):"";
$idusuario=$_SESSION["idusuario"];

$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$numdocumento=isset($_POST["numdocumento"])? limpiarCadena($_POST["numdocumento"]):"";
$numcomprobante=isset($_POST["numcomprobante"])? limpiarCadena($_POST["numcomprobante"]):"";
$total_importe=isset($_POST["total_importe"])? limpiarCadena($_POST["total_importe"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcrear_acuerdo)){
			$rspta=$crear_acuerdo->insertar(
		$idusuario,
		$idproveedores,
		$idprograma,
		$fecha_hora,
		$tipo_documento,
		$numdocumento,
		$numcomprobante,
		$total_importe,
		$_POST["idcrear_acuerdo"],
		$_POST["idpresupuesto_disponible"],
		$_POST["monto"]);

			echo $rspta ? "Documento registrado registrado" : "No se pudieron registrar los datos o el numero de Documento  ya existe.";
		}
		else {
		}
	break;

	case 'anular':
		$rspta=$crear_acuerdo->anular($idcrear_acuerdo);
 		echo $rspta ? "Documento Anulado anulado" : "Documento Anulado no se puede anular";
	break;

	case 'mostrar':
		$rspta=$crear_acuerdo->mostrar($idcrear_acuerdo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

case 'listarDetalle':
		//Recibimos el idcrear_acuerdo
		$id=$_GET['id'];



		$rspta = $crear_acuerdo->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
		                            <th>Opciones</th>
                                    <th>Nombre Objeto</th>
                                    <th>Valor</th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas">
					<td>
					</td>
					<td>'.$reg->codigo.'</td>
					<td>'.$reg->monto.'</td>
					<td>'.$reg->monto.'</td>
					</tr>';

					$total=$total+$reg->monto;
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">L.&nbsp'.$total.' </h4><input type="hidden" name="total_importe" id="total_importe" step"0.02">
                                </tfoot>';
	break;




	case 'listar':
		$rspta=$crear_acuerdo->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcrear_acuerdo.')"><i class="fas fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idcrear_acuerdo.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcrear_acuerdo.')"><i class="fas fa-eye"></i></button>',

 				"1"=>$reg->fecha,
 				"2"=>$reg->tipo_documento,
 				"3"=>$reg->numdocumento,
 				"4"=>$reg->numcomprobante,
 				"5"=>$reg->proveedor,
 				"6"=>$reg->unidad,
 				"7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
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
		require_once "../modelos/proveedores.php";
		$casa_comercial = new proveedores();

		$rspta = $casa_comercial->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproveedores. '>' . $reg->casa_comercial . '</option>';
				}
	break;

		case "selectPrograma":
		require_once "../modelos/programa.php";
		$codigop = new Programa();

		$rspta = $codigop->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idprograma . '>' . $reg->codigop ."&nbsp;".'('. $reg->nombrep .')'. ' - ' . $reg->idprograma .'</option>';
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
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idpresupuesto_disponible.',\''.$reg->codigo.'\')"><span class="fas fa-plus-circle"></span></button>',
 				"1"=>$reg->nombre_objeto,
 				"2"=>$reg->codigo,
 				"3"=>$reg->fondos_disponibles,
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

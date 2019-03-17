<?php 
if (strlen(session_id()) < 1) 
  session_start();

require_once "../modelos/Ingreso.php";

$ingreso=new Ingreso();

$idingreso=isset($_POST["idingreso"])? limpiarCadena($_POST["idingreso"]):"";
$idusuario=$_SESSION["idusuario"];
$numf01=isset($_POST["numf01"])? limpiarCadena($_POST["numf01"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$total_importe=isset($_POST["total_importe"])? limpiarCadena($_POST["total_importe"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idingreso)){
			$rspta=$ingreso->insertar(
		$idusuario,
		$numf01,
		$fecha_hora,
		$total_importe,
		$_POST["idingreso"],
		$_POST["idpresupuesto_disponible"],
		$_POST["monto"]);

			echo $rspta ? "Ingreso registrado" : "No se pudieron registrar los datos o el numero F01 ya existe.";
		}
		else {
		}
	break;
 
	case 'anular':
		$rspta=$ingreso->anular($idingreso);
 		echo $rspta ? "Ingreso anulado" : "Ingreso no se puede anular";
	break;

	case 'mostrar':
		$rspta=$ingreso->mostrar($idingreso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];



		$rspta = $ingreso->listarDetalle($id);
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
		$rspta=$ingreso->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idingreso.')"><i class="fas fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idingreso.')"><i class="fas fa-times"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idingreso.')"><i class="fas fa-eye"></i></button>',
 				
 				"1"=>$reg->fecha,
 				"2"=>$reg->usuario,
 				"3"=>$reg->numf01,
 				"4"=>$reg->total_importe,
 				"5"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
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

	case 'listarPresupuesto_disponible':
		require_once "../modelos/Presupuesto_disponible.php";
		$presupuesto_disponible=new Presupuesto_disponible();

		$rspta=$presupuesto_disponible->listarActivos();
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
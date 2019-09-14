<?php
if (strlen(session_id()) < 1)
  session_start();

require_once "../modelos/Ingreso.php";

$ingreso=new Ingreso();

$idingreso=isset($_POST["idingreso"])? limpiarCadena($_POST["idingreso"]):"";
$idusuario=$_SESSION["idusuario"];
$tipo_presupuesto=isset($_POST["tipo_presupuesto"])? limpiarCadena($_POST["tipo_presupuesto"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$numf01=isset($_POST["numf01"])? limpiarCadena($_POST["numf01"]):"";
$total_importe=isset($_POST["total_importe"])? limpiarCadena($_POST["total_importe"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idingreso)){
			$rspta=$ingreso->insertar($idusuario,$tipo_presupuesto,$fecha_hora,$numf01,str_replace(',','',$total_importe),
      $_POST["idpresupuesto_disponible"],str_replace(',','',$_POST["any"]),$_POST["actividad"],str_replace(',','',$_POST["monto"]));
			echo $rspta ? "Ingreso registrado" : "No se pudieron registrar los datos";
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
		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas">
					<td style="text-align:center;"><i class="fas fa-check" style="color: green;"></i></td>
					<td>'.$reg->codigo.'</td>
					<td>'.$reg->monto.'</td>
					<td>'.$reg->monto.'</td>
					</tr>';
				}

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


  case 'listar_Presupuesto_Detallado':
    $rspta=$ingreso->listaPresupuestoDetallado();
    //Vamos a declarar un array
    $data= Array();

    while ($reg=$rspta->fetch_object()){
      $data[]=array(
        "0"=>date('Y',strtotime($reg->fecha_hora)),
        "1"=>'<span style="color:black; font-weight: bold;">'.$reg->nombre_objeto.'</span>',
        "2"=>'<span style="color:black; font-weight: bold;">'.$reg->grupo.'</span>',
        "3"=>'<span style="color:black; font-weight: bold;">'.$reg->subgrupo.'</span>',
        "4"=>'<span style="color:blue; font-weight: bold;">'.$reg->pres_init.'</span>',
        "5"=>'<span style="color:blue; font-weight: bold;">'.$reg->pres_siafi.'</span>',
        "6"=>'<span style="color:blue; font-weight: bold;">'.$reg->pres_cong.'</span>',
        "7"=>'<span style="color:blue; font-weight: bold;">'.$reg->pres_aum.'</span>',
        "8"=>'<span style="color:blue; font-weight: bold;">'.$reg->pres_dis.'</span>',
        "9"=>'<span style="color:blue; font-weight: bold;">'.$reg->monto.'</span>'
        );
    }
    $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

  break;


	case 'listar_Presupuesto_disponible':
		require_once "../modelos/Presupuesto_disponible.php";
		$predis=new Presupuesto_disponible();

		$rspta=$predis->listarPresupuestoActivos();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idpresupuesto_disponible.',\''.$reg->codigo.'\')"><span class="fas fa-plus-circle"></span></button>',
 				"1"=>$reg->nombre_objeto,
 				"2"=>$reg->codigo
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

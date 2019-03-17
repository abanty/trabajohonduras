<?php 
if (strlen(session_id()) < 1) 
  session_start();
 
require_once "../modelos/Transferidoctaspg.php";

$transferidoctaspg=new transferidoctaspg();

$idtransferidoctaspg=isset($_POST["idtransferidoctaspg"])? limpiarCadena($_POST["idtransferidoctaspg"]):"";
$idusuario=$_SESSION["idusuario"];
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$numexpediente=isset($_POST["numexpediente"])? limpiarCadena($_POST["numexpediente"]):"";
$numtransferencia=isset($_POST["numtransferencia"])? limpiarCadena($_POST["numtransferencia"]):"";

$valor_transferido=isset($_POST["valor_transferido"])? limpiarCadena($_POST["valor_transferido"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idtransferidoctaspg)){
			$rspta=$transferidoctaspg->insertar(
		$idusuario,
		$fecha_hora,
		$numexpediente,
		$numtransferencia,		
		$valor_transferido,
		$_POST["idtransferidoctaspg"],
		$_POST["idctasbancarias"],
		$_POST["num_precompromiso"],
		$_POST["valor"]);

			echo $rspta ? "transferencia registrada" : "No se pudieron registrar los datos o el numero de transferencia ya existe.";
		}
		else {
		}
	break;
 
	case 'anular':
		$rspta=$transferidoctaspg->anular($idtransferidoctaspg);
 		echo $rspta ? "transferencia anulada" : "La transferencia no se puede anular";
	break;

	case 'mostrar':
		$rspta=$transferidoctaspg->mostrar($idtransferidoctaspg);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

case 'listarDetalle':
		//Recibimos el idtransferidoctaspg
		$id=$_GET['id'];



		$rspta = $transferidoctaspg->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Numero Cuenta</th>
                                    <th>No. Precompromiso</th>
                                    <th>Valor</th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas">
					<td>
					</td>
					<td>'.$reg->numctapg.'</td>
					<td>'.$reg->num_precompromiso.'</td>
					<td>'.$reg->valor.'</td>
					<td>'.$reg->valor.'</td>
					</tr>';

					$total=$total+$reg->valor;
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">L.&nbsp'.$total.' </h4><input type="hidden" name="valor_transferido" id="valor_transferido" step"0.02"> 
                                </tfoot>';
	break;




	case 'listar':
		$rspta=$transferidoctaspg->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idtransferidoctaspg.')"><i class="fas fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idtransferidoctaspg.')"><i class="fas fa-trash"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idtransferidoctaspg.')"><i class="fas fa-eye"></i></button>',
 				
 				"1"=>$reg->fecha,
 				"2"=>$reg->usuario,
 				"3"=>$reg->numexpediente,
 				"4"=>$reg->numtransferencia,
 				"5"=>$reg->valor_transferido,
 				"6"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
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

	case 'listarCtasbancarias':
		require_once "../modelos/ctasbancarias.php";
		$ctasbancarias=new Ctasbancarias();

		$rspta=$ctasbancarias->listarActivos();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idctasbancarias.',\''.$reg->numctapg.'\')"><span class="fas fa-plus-circle"></span></button>',
 				"1"=>$reg->cuentapg,
 				"2"=>$reg->bancopg,
 				"3"=>$reg->tipoctapg,
 				"4"=>$reg->numctapg, 				
 				"5"=>$reg->fondos_disponibles,
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

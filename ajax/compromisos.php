<?php
// REQUERIR CLASE DEL MODELO PERTENECIENTE
require_once "../modelos/Compromisos.php";

$compromisos=new Compromisos(); // Instanciar Clase en una variable
/*----------------------------------*
| DEFINICION DE VARIABLES GENERALES |
.----------------------------------*/
$idcompromisos=isset($_POST["idcompromisos"])? limpiarCadena($_POST["idcompromisos"]):"";
$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$idproveedores=isset($_POST["idproveedores"])? limpiarCadena($_POST["idproveedores"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$tipo_registro=isset($_POST["tipo_registro"])? limpiarCadena($_POST["tipo_registro"]):"";
$numfactura=isset($_POST["numfactura"])? limpiarCadena($_POST["numfactura"]):"";
$total_compra=isset($_POST["total_compra"])? limpiarCadena($_POST["total_compra"]):"";
$condicion=isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]):"";

//Declara la variable para evitar error de notificacion
$idpresupuesto_disponible = isset($_POST['idpresupuesto_disponible']) ? $_POST['idpresupuesto_disponible']: null ;
$valor = isset($_POST['valor']) ? $_POST['valor']: null ;


/*----------------------------------------------*
| SWITCH PARA INSTANCIAR CASE COMO TIPO FUNCION |
.----------------------------------------------*/
switch ($_GET["op"]){
	/*----------------------*
	| CASE GUARDAR Y EDITAR |
	.----------------------*/
		case 'guardaryeditar':
			if (empty($idcompromisos)){
				$rspta=$compromisos->insertar(
			$idprograma,
			$idproveedores,
			$fecha_hora,
			$tipo_registro,
			$numfactura,
			$total_compra,
			$condicion,
					$_POST["idpresupuesto_disponible"],
					str_replace(',','',$_POST["valor"]));
				echo $rspta ? "Compromiso registrado" : "Compromiso no se pudo registrar";
			}
		break;


	/*--------------------------------------*
	| CASE PARA EDITAR DATOS DEL COMPROMISO |
	.--------------------------------------*/
		case 'editardatos':
				$rspta=$compromisos->modificardatos($_POST["id"],$_POST["columna_nombre"],$_POST["valorcol"]);
				echo $rspta ? "Compromiso modificado" : "Compromiso no se puede modificar";
		break;


	/*----------------------------------*
	| CASE PARA CAMBIAR ESTADO A PAGADO |
	.----------------------------------*/
		case 'pagado':
				$rspta=$compromisos->pagado($idcompromisos);
		 		echo $rspta ? "Compromiso Pagado" : "Compromiso no se puede Pagar";
		break;


	/*-------------------------------------*
	| CASE PARA CAMBIAR ESTADO A TRAMITADO |
	.-------------------------------------*/
		case 'tramitar':
				$rspta=$compromisos->tramitar($idcompromisos);
	 			echo $rspta ? "Compromiso Pagado" : "Compromiso no se puede Pagar";
		break;


	/*----------------------------------------*
	| CASE PARA CAMBIAR ESTADO A DESTRAMITADO |
	.----------------------------------------*/
		case 'destramitar':
				$rspta=$compromisos->destramitar($idcompromisos);
				echo $rspta ? "Tramite desecho" : "Tramite no se puede deshacer";
		break;



	/*-------------------------------------------------*
	| CASE PARA VALIDAR NUMEROS DE FACTURAS DUPLICADAS |
	.-------------------------------------------------*/
		case 'ValidarNumeroFactura':

			$rspta=$compromisos->validarnumfacturasduplicadas();
			//Vamos a declarar un array
			$data= Array();

			while ($reg=$rspta->fetch_object()){

				$data[]=$reg->numfactura;

			}
			echo json_encode($data);

		break;

	/*-----------------------------------*
	| CASE PARA CAMBIAR ESTADO A ANULADO |
	.-----------------------------------*/
		case 'eliminar':
				$rspta=$compromisos->eliminar($idcompromisos);
	 			echo $rspta ? "El compromiso fue eliminada" : "El compromiso no se puede eliminar";
		break;


	/*---------------------------------------*
	| CASE PARA MOSTRAR DATOS DEL FORMULARIO |
	.---------------------------------------*/
		case 'mostrar':
			$rspta=$compromisos->mostrar($idcompromisos);
	 		//Codificar el resultado utilizando json
	 		echo json_encode($rspta);
		break;


	/*---------------------------------------*
	| CASE PARA MOSTRAR DATOS DEL FORMULARIO |
	.---------------------------------------*/
		case 'listar_C_Detalle':
				//Recibimos el idingreso
				$id=$_GET['id'];

				$rspta = $compromisos->listarDetalle($id);
				$total=0;

				while ($reg = $rspta->fetch_object())
				{
					 echo '<tr class="filas"><td style="text-align:center;"><i class="fas fa-check" style="color: green;"></i></td>
					 <td>'.$reg->codigo.'</td>
					 <td>'.number_format($reg->valor, 2, '.', ',').'</td>
					 <td>'.number_format($reg->valor, 2, '.', ',').'</td>
					 </tr>';
				}
		break;


	/*-----------------------------*
	| CASE PARA LISTAR COMPROMISOS |
	.-----------------------------*/
		case 'listar':
				$rspta=$compromisos->listar();
		 		//Vamos a declarar un array
		 		$data= Array();
		 		while ($reg=$rspta->fetch_object()){
		 			$data[]=array(
		 				"0"=>($reg->condicion==0)?'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idcompromisos.')"><i class="fas fa-pen"></i></button>'.
		 					' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idcompromisos.')"><i class="fas fa-trash"></i></button>'.
							' <button data-toggle="tooltip" title="Realizar pago!" data-placement="right" class="btn btn-success btn-sm" onclick="pagado('.$reg->idcompromisos.')"><i class="fas fa-coins"></i></button>'
		 					:
							(($reg->condicion==1)?'<button class="btn btn-primary btn-sm" onclick="mostrar('.$reg->idcompromisos.')"><i class="fas fa-pen"></i></button>'.
							' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idcompromisos.')"><i class="fas fa-trash"></i></button>'.
							' <button data-toggle="tooltip" title="Realizar pago con retencion!" data-placement="right" class="btn btn-success btn-sm" onclick="tramitar('.$reg->idcompromisos.')"><i class="fas fa-coins"></i></button>'
							:
							(($reg->condicion==2)?'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idcompromisos.')"><i class="fas fa-pen"></i></button>'.
							' <button class="btn btn-danger btn-sm" onclick="elminar('.$reg->idcompromisos.')"><i class="fas fa-trash"></i></button>'.
							' <button  data-toggle="tooltip" title="Pago realizado!" data-placement="right" class="btn btn-success btn-sm red-tooltip" onclick="tramitar('.$reg->idcompromisos.')" disabled><i class="fas fa-coins"></i></button>'
							:
							(($reg->condicion==3)?'<button class="btn btn-primary btn-sm" onclick="mostrar('.$reg->idcompromisos.')"><i class="fas fa-pen"></i></button>'.
							' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idcompromisos.')"><i class="fas fa-trash"></i></button>'.
							' <button data-toggle="tooltip" title="Pago realizado!" data-placement="right" class="btn btn-success btn-sm red-tooltip" onclick="tramitar('.$reg->idcompromisos.')" disabled><i class="fas fa-coins"></i></button>'
							:''))),
		 				"1"=>$reg->fecha,
						"2"=>'<div onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;"  class="update" data-id="'.$reg->idcompromisos.'" data-column="tipo_registro">' .$reg->tipo_registro. '</div>',
		 				"3"=>$reg->programa,
		 				"4"=>$reg->proveedor,
						"5"=>'<div onclick="listenForDoubleClick(this);" onblur="this.contentEditable=false;"  class="update" data-id="'.$reg->idcompromisos.'" data-column="numfactura">' .$reg->numfactura. '</div>',
		 				"6"=>$reg->total_compra,
						"7"=>$reg->fechareg,
						"8"=>($reg->condicion==0)?'<span class="label bg-green">PENDIENTE  <i class="fas fa-check"></i></span>':
						(($reg->condicion==1)?'<span class="label bg-green">PENDIENTE  <i class="fas fa-check"></i></span>':
						(($reg->condicion==2)?'<span class="label bg-red"><i class="fas fa-hand-holding-usd"></i>  PAGADO </span>':
						(($reg->condicion==3)?'<span class="label bg-red"><i class="fas fa-hand-holding-usd"></i>  PAGADO </span>':
		 				'<span class="label bg-red">ANULADO </span>'))));
		 		}
		 				$results = array(
		 				"sEcho"=>1, //Informaci贸n para el datatables
		 				"iTotalRecords"=>count($data), //enviamos el total registros al datatable
		 				"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
		 				"aaData"=>$data);
		 				echo json_encode($results);
				break;


	/*---------------------------------------*
	| CASE PARA MOSTRAR DATOS DEL FORMULARIO |
	.---------------------------------------*/
		case "selectProveedores":
				require_once "../modelos/Proveedores.php";
				$casa_comercial = new Proveedores();

				$rspta = $casa_comercial->listar();

				while ($reg = $rspta->fetch_object())
				{
							echo '<option value=' . $reg->idproveedores. '>' . $reg->casa_comercial . '</option>';
				}
		break;


	/*---------------------------------------*
	| CASE PARA MOSTRAR DATOS DEL FORMULARIO |
	.---------------------------------------*/
		case "selectPrograma":
				require_once "../modelos/Programa.php";
				$codigop = new Programa();

				$rspta = $codigop->select_programa();

				while ($reg = $rspta->fetch_object())
				{
						echo '<option value=' . $reg->idprograma . '>' . $reg->codigop ."&nbsp;".'('. $reg->nombrep .')'. ' - ' . $reg->idprograma .'</option>';
				}
		break;


	/*-----------------------------*
	| CASE PARA LISTAR PRESUPUESTO |
	.-----------------------------*/
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
	 			"sEcho"=>1, //Informaci贸n para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
	 		echo json_encode($results);

	break;
}

?>

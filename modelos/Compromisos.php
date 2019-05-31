<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Compromisos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(
		$idprograma,
		$idproveedores,
		$fecha_hora,
		$tipo_registro,
		$numfactura,
		$total_compra,

		// $idcompromisos,
		$idpresupuesto_disponible,
		$valor)
	{
		$sql="INSERT INTO compromisos (
		idprograma,
		idproveedores,
		fecha_hora,
		fecha_registro,
		tipo_registro,
		numfactura,
		total_compra,
		condicion)
		VALUES (
		'$idprograma',
		'$idproveedores',
		'$fecha_hora',
		CURRENT_TIMESTAMP,
		'$tipo_registro',
		'$numfactura',
		'$total_compra',
		'0')";
		//return ejecutarConsulta($sql);
		$idingresonew=ejecutarConsulta_retornarID($sql);


		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($idpresupuesto_disponible))
		{


			$sql_detalle = "INSERT INTO detalle_compromisos(
			idcompromisos,
			 idpresupuesto_disponible,
			 valor,
			 condicion) VALUES (
			  '$idingresonew',
			  '$idpresupuesto_disponible[$num_elementos]',
			  '$valor[$num_elementos]',
			  '0')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
		// return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	// public function editar(
	// 	$idcompromisos,
	// 	$idprograma,
	// 	$idproveedores,
	// 	$fecha_hora,
	// 	$numfactura,
	// 	$total_compra)
	// {
	// 	$sql="UPDATE compromisos SET
	// 	 idprograma='$idprograma',
	// 	 idproveedores='$idproveedores',
	// 	 fecha_hora='$fecha_hora',
	// 	 numfactura='$numfactura',
	// 	 total_compra='$total_compra'
	// 	 WHERE idcompromisos='$idcompromisos'";
	// 	return ejecutarConsulta($sql);
	// }

	//Implementamos un método para eliminar categorías
	public function eliminar($idcompromisos)
	{
		$sql="DELETE FROM compromisos WHERE idcompromisos='$idcompromisos'";
		 ejecutarConsulta($sql);
		$sql="DELETE FROM detalle_compromisos WHERE idcompromisos='$idcompromisos'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function pagado($idcompromisos)
	{
		$sql="UPDATE detalle_compromisos SET condicion='1' WHERE idcompromisos='$idcompromisos'";
		ejecutarConsulta($sql);
		$sql="UPDATE compromisos SET condicion='1' WHERE idcompromisos='$idcompromisos'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function pendiente($idcompromisos)
	{
		$sql="UPDATE detalle_compromisos SET condicion='0' WHERE idcompromisos='$idcompromisos'";
		ejecutarConsulta($sql);
		$sql="UPDATE compromisos SET condicion='0' WHERE idcompromisos='$idcompromisos'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcompromisos)
	{
		$sql="SELECT
					 q.idcompromisos,
					 DATE(q.fecha_hora) as fecha,
					 q.tipo_registro,
					 q.idprograma,
					 w.nombrep as programa,
					 q.idproveedores,
					 e.casa_comercial as proveedor,
					 q.numfactura,
					 q.total_compra,
					 q.condicion
			FROM compromisos as q INNER JOIN programa as w
			ON q.idprograma=w.idprograma
			INNER JOIN proveedores as e
			ON q.idproveedores = e.idproveedores WHERE idcompromisos='$idcompromisos'";
		return ejecutarConsultaSimpleFila($sql);
	}


	//Implementar un método para listar los registros
	public function listarDetalle($idcompromisos)
	{
		$sql="SELECT
		dc.idcompromisos,
		dc.idpresupuesto_disponible,
		r.nombre_objeto,
		r.codigo,
		dc.valor as valor
		FROM detalle_compromisos dc INNER JOIN presupuesto_disponible r ON
		dc.idpresupuesto_disponible=r.idpresupuesto_disponible
		WHERE dc.idcompromisos='$idcompromisos'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT
					 q.idcompromisos,
					 DATE(q.fecha_hora) as fecha,
					 DATE(q.fecha_registro) as fechareg,
					 q.tipo_registro,
					 q.idprograma,
					 w.nombrep as programa,
					 q.idproveedores,
					 e.casa_comercial as proveedor,
					 q.numfactura,
					 FORMAT(q.total_compra,2) as total_compra,
					 q.condicion
			FROM compromisos as q INNER JOIN programa as w
			ON q.idprograma=w.idprograma
			INNER JOIN proveedores as e
			ON q.idproveedores = e.idproveedores ORDER BY q.idcompromisos desc";
		return ejecutarConsulta($sql);
	}

	// 	//Implementar un método para listar los registros activos
	public function listarCompromisos()
	{
		$sql="SELECT
    c.idcompromisos,
    c.idprograma,
    c.idproveedores,
    c.fecha_hora,
		c.tipo_registro,
    c.numfactura,
    c.total_compra,
    c.condicion,
    pgr.codigop,
    pgr.codigop,
    pr.casa_comercial as proveedor
		FROM
		    compromisos c
		INNER JOIN programa pgr ON
		    c.idprograma = pgr.idprograma
		INNER JOIN proveedores pr ON
		    c.idproveedores = pr.idproveedores
		WHERE
    c.condicion = '1'";
		return ejecutarConsulta($sql);
	}





}



?>

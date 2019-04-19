<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Crear_acuerdo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(

		$idusuario,
		$idproveedores,
		$idprograma,
		$fecha_hora,
		$tipo_documento,
		$numdocumento,
		$numcomprobante,
		$total_importe,
		$idcrear_acuerdo,
		$idpresupuesto_disponible,
		$monto)
	{
		$sql="INSERT INTO crear_acuerdo (
		idusuario,
		idproveedores,
		idprograma,
		fecha_hora,
		tipo_documento,
		numdocumento,
		numcomprobante,
		total_importe,
		estado)
		VALUES (
		'$idusuario',
		'$idproveedores',
		'$idprograma',
		'$fecha_hora',
		'$tipo_documento',
		'$numdocumento',
		'$numcomprobante',
		'$total_importe',
		'Aceptado')";
		//return ejecutarConsulta($sql);
		$idcrear_acuerdonew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		// $total = (int)$total_importe;
		// $idpresupuesto = (int)$idpresupuesto_disponible;

		if($idcrear_acuerdonew!=0){

		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$idpresupuesto = (int)$idpresupuesto_disponible[$num_elementos];

			$sql= " UPDATE presupuesto_disponible
					SET `fondos_disponibles` = (fondos_disponibles + '$monto[$num_elementos]')
					WHERE `idpresupuesto_disponible` = $idpresupuesto_disponible[$num_elementos]";
			ejecutarConsulta($sql);

			$sql_detalle = "INSERT INTO detalle_crear_acuerdo(
			idcrear_acuerdo,
			idpresupuesto_disponible,
			monto)
			VALUES (
			'$idcrear_acuerdonew',
			'$idpresupuesto_disponible[$num_elementos]',
			'$monto[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}return $sw;

	}else
	{
		return false;
	}


	}


	//Implementamos un método para anular categorías
	public function anular($idcrear_acuerdo)
	{
		$sql="UPDATE presupuesto_disponible as a INNER JOIN detalle_crear_acuerdo b
			on a.idpresupuesto_disponible = b.idpresupuesto_disponible
			INNER JOIN crear_acuerdo c on c.idcrear_acuerdo=b.idcrear_acuerdo
			SET a.fondos_disponibles = (a.fondos_disponibles-b.monto)
			WHERE c.idcrear_acuerdo=$idcrear_acuerdo and b.idpresupuesto_disponible = a.idpresupuesto_disponible";
			ejecutarConsulta($sql);
		$sql="DELETE FROM crear_acuerdo WHERE idcrear_acuerdo='$idcrear_acuerdo'";
		 ejecutarConsulta($sql);
		$sql="DELETE FROM detalle_crear_acuerdo WHERE idcrear_acuerdo='$idcrear_acuerdo'";
		return ejecutarConsulta($sql);

	}
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcrear_acuerdo)
	{
		$sql="SELECT i.idcrear_acuerdo,	DATE(i.fecha_hora) as fecha, u.nombre as usuario,
		i.tipo_documento, i.numdocumento, i.numcomprobante,	l.casa_comercial as proveedor,
		w.nombrep as unidad, FORMAT(i.total_importe, 2) as total_importe,	i.estado
		FROM crear_acuerdo i
		INNER JOIN usuario u ON	i.idusuario=u.idusuario
		INNER JOIN proveedores l ON i.idproveedores=l.idproveedores
		INNER JOIN programa w ON i.idprograma=w.idprograma
		WHERE i.idcrear_acuerdo='$idcrear_acuerdo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarDetalle($idcrear_acuerdo)
	{
		$sql="
		SELECT
		di.idcrear_acuerdo,
		di.idpresupuesto_disponible,
		a.nombre_objeto,
		a.codigo,
		di.monto as monto
		FROM detalle_crear_acuerdo di INNER JOIN presupuesto_disponible a on
		di.idpresupuesto_disponible=a.idpresupuesto_disponible
		where di.idcrear_acuerdo='$idcrear_acuerdo'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT i.idcrear_acuerdo,	DATE(i.fecha_hora) as fecha,	u.nombre as usuario, i.tipo_documento, i.numdocumento,
		i.numcomprobante,	l.casa_comercial as proveedor,	w.nombrep as unidad,	FORMAT(i.total_importe, 2) as total_importe, i.estado
		FROM crear_acuerdo i
		INNER JOIN usuario u ON	i.idusuario=u.idusuario
		INNER JOIN proveedores l ON i.idproveedores=l.idproveedores
		INNER JOIN programa w ON i.idprograma=w.idprograma
		ORDER BY i.idcrear_acuerdo desc";

		return ejecutarConsulta($sql);
	}

}

?>

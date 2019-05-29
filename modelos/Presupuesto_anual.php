<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Presupuesto_anual
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(
		$nombre_objeto,
		$codigo,
		$monto_aprobado)
	{
		$sql="INSERT INTO presupuesto_anual (nombre_objeto,
		codigo,
		monto_aprobado,
		condicion)
		VALUES (
		'$nombre_objeto',
		'$codigo',
		'$monto_aprobado',
		'1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar(
		$idpresupuesto_anual,
		$nombre_objeto,
		$codigo,
		$monto_aprobado)
	{
		$sql="UPDATE presupuesto_anual SET nombre_objeto='$nombre_objeto',codigo='$codigo',monto_aprobado='$monto_aprobado' WHERE idpresupuesto_anual='$idpresupuesto_anual'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idpresupuesto_anual)
	{
		$sql="UPDATE presupuesto_anual SET condicion='0' WHERE idpresupuesto_anual='$idpresupuesto_anual'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idpresupuesto_anual)
	{
		$sql="UPDATE presupuesto_anual SET condicion='1' WHERE idpresupuesto_anual='$idpresupuesto_anual'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpresupuesto_anual)
	{
		$sql="SELECT * FROM presupuesto_anual WHERE idpresupuesto_anual='$idpresupuesto_anual'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM presupuesto_anual";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM presupuesto_anual where condicion=1";
		return ejecutarConsulta($sql);		
	}


}

?>
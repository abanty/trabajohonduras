<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Firmas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($grado,$nombre,$cargo,$serie)
	{
		$sql="INSERT INTO firmas (grado,nombre,cargo,serie,condicion)
		VALUES ('$grado','$nombre','$cargo','$serie','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idfirmas,$grado,$nombre,$cargo,$serie)
	{
		$sql="UPDATE firmas SET grado='$grado',nombre='$nombre',cargo='$cargo',serie='$serie' WHERE idfirmas='$idfirmas'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idfirmas)
	{
		$sql="UPDATE firmas SET condicion='0' WHERE idfirmas='$idfirmas'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idfirmas)
	{
		$sql="UPDATE firmas SET condicion='1' WHERE idfirmas='$idfirmas'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idfirmas)
	{
		$sql="SELECT * FROM firmas WHERE idfirmas='$idfirmas'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM firmas WHERE idfirmas NOT IN (1)";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select_firmas()
	{
		$sql="SELECT * FROM firmas where condicion=1";
		return ejecutarConsulta($sql);
	}
}

?>

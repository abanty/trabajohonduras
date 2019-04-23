<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Configuracion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($rango,$nombre,$cargo)
	{
		$sql="INSERT INTO configuracion (rango,nombre,cargo,condicion)
		VALUES ('$rango','$nombre','$cargo','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idconfiguracion,$rango,$nombre,$cargo)
	{
		$sql="UPDATE configuracion SET rango='$rango',nombre='$nombre',cargo='$cargo' WHERE idconfiguracion='$idconfiguracion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idconfiguracion)
	{
		$sql="UPDATE configuracion SET condicion='0' WHERE idconfiguracion='$idconfiguracion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idconfiguracion)
	{
		$sql="UPDATE configuracion SET condicion='1' WHERE idconfiguracion='$idconfiguracion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idconfiguracion)
	{
		$sql="SELECT * FROM configuracion WHERE idconfiguracion='$idconfiguracion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM configuracion";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM configuracion where condicion=1";
		return ejecutarConsulta($sql);
	}

}

?>

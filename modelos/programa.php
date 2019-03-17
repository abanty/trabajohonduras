<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Programa
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($codigop,$nombrep)
	{
		$sql="INSERT INTO programa (codigop,nombrep,condicion)
		VALUES ('$codigop','$nombrep','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idprograma,$codigop,$nombrep)
	{
		$sql="UPDATE programa SET codigop='$codigop',nombrep='$nombrep' WHERE idprograma='$idprograma'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idprograma)
	{
		$sql="UPDATE programa SET condicion='0' WHERE idprograma='$idprograma'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idprograma)
	{
		$sql="UPDATE programa SET condicion='1' WHERE idprograma='$idprograma'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idprograma)
	{
		$sql="SELECT * FROM programa WHERE idprograma='$idprograma'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM programa";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select_programa()
	{
		$sql="SELECT * FROM programa where condicion=1";
		return ejecutarConsulta($sql);
	}
}

?>

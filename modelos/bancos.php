<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Bancos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($clasificacion,$nombre_banco,$referencia)
	{
		$sql="INSERT INTO bancos (clasificacion,nombre_banco,referencia,condicion)
		VALUES ('$clasificacion','$nombre_banco','$referencia','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idbancos,$clasificacion,$nombre_banco,$referencia)
	{
		$sql="UPDATE bancos SET clasificacion='$clasificacion',nombre_banco='$nombre_banco',referencia='$referencia' WHERE idbancos='$idbancos'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idbancos)
	{
		$sql="UPDATE bancos SET condicion='0' WHERE idbancos='$idbancos'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idbancos)
	{
		$sql="UPDATE bancos SET condicion='1' WHERE idbancos='$idbancos'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idbancos)
	{
		$sql="SELECT * FROM bancos WHERE idbancos='$idbancos'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM bancos";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM bancos where condicion=1";
		return ejecutarConsulta($sql);		
	}

}

?>
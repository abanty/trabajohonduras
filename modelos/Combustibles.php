<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Combustibles
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($categoria,$nombre,$total_compras
	)
	{
		$sql="INSERT INTO combustibles (categoria,nombre,total_compras,condicion)
		VALUES ('$categoria','$nombre','$total_compras','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcombustibles,$categoria,$nombre,$total_compras)
	{
		$sql="UPDATE combustibles SET categoria='$categoria',nombre='$nombre',total_compras='$total_compras' WHERE idcombustibles='$idcombustibles'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcombustibles)
	{
		$sql="UPDATE combustibles SET condicion='0' WHERE idcombustibles='$idcombustibles'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcombustibles)
	{
		$sql="UPDATE combustibles SET condicion='1' WHERE idcombustibles='$idcombustibles'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcombustibles)
	{
		$sql="SELECT * FROM combustibles WHERE idcombustibles='$idcombustibles'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM combustibles";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM combustibles where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>
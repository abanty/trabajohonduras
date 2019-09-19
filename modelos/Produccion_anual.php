<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Produccion_anual
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($indicativo,$nombre_producto,$tipo_producto,$primario_noprimario,$periodicidad)
	{
		$sql="INSERT INTO produccion_anual(indicativo,nombre_producto,tipo_producto,primario_noprimario,periodicidad,condicion)
		VALUES ('$indicativo','$nombre_producto','$tipo_producto','$primario_noprimario','$periodicidad','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idproduccion,$indicativo,$nombre_producto,$tipo_producto,$primario_noprimario,$periodicidad)
	{
		$sql="UPDATE produccion_anual SET indicativo='$indicativo',nombre_producto='$nombre_producto',tipo_producto='$tipo_producto',primario_noprimario='$primario_noprimario',periodicidad='$periodicidad', WHERE idproduccion='$idproduccion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idproduccion)
	{
		$sql="UPDATE produccion_anual SET condicion='0' WHERE idproduccion='$idproduccion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idproduccion)
	{
		$sql="UPDATE produccion_anual SET condicion='1' WHERE idproduccion='$idproduccion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idproduccion)
	{
		$sql="SELECT * FROM produccion_anual WHERE idproduccion='$idproduccion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM produccion_anual WHERE idproduccion NOT IN (1)";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function selectproduccion_anual()
	{
		$sql="SELECT * FROM produccion_anual where condicion=1";
		return ejecutarConsulta($sql);
	}
}

?>

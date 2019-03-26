<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ctasbancarias
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($cuentapg,$bancopg,$tipoctapg,$numctapg,$fondos_disponibles)
	{
		$sql="INSERT INTO ctasbancarias (
		cuentapg,
		bancopg,
		tipoctapg,
		numctapg,
		fondos_disponibles,
		condicion)
		VALUES (
		'$cuentapg',
		'$bancopg',
		'$tipoctapg',
		'$numctapg,
		'$fondos_disponibles,
		'1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idctasbancarias,$cuentapg,$bancopg,$tipoctapg,$numctapg,$fondos_disponibles)
	{
		$sql="UPDATE
		ctasbancarias SET
		cuentapg='$cuentapg',
		bancopg='$bancopg',
		tipoctapg='$tipoctapg',
		numctapg='$numctapg',
		fondos_disponibles='$fondos_disponibles'
		WHERE idctasbancarias='$idctasbancarias'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idctasbancarias)
	{
		$sql="UPDATE ctasbancarias SET condicion='0' WHERE idctasbancarias='$idctasbancarias'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idctasbancarias)
	{
		$sql="UPDATE ctasbancarias SET condicion='1' WHERE idctasbancarias='$idctasbancarias'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idctasbancarias)
	{
		$sql="SELECT * FROM ctasbancarias WHERE idctasbancarias='$idctasbancarias'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT
		idctasbancarias,
		cuentapg,
		bancopg,
		tipoctapg,
		numctapg,
		FORMAT(fondos_disponibles,2) AS fondos_disponibles,
		condicion FROM ctasbancarias";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function listarActivos()
	{
		$sql="SELECT
		idctasbancarias,
		cuentapg,
		bancopg,
		tipoctapg,
		numctapg,
		fondos_disponibles,
		condicion FROM ctasbancarias where condicion=1";
		return ejecutarConsulta($sql);
	}


	public function select_ctas_bancarias()
	{
		$sql="SELECT idctasbancarias, cuentapg,bancopg, tipoctapg, numctapg, fondos_disponibles,condicion
		FROM ctasbancarias
		WHERE condicion=1";
		return ejecutarConsulta($sql);
	}


}

?>

<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Uuss
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros


	// 	//Implementar un método para listar los registros activos
	public function selectUuss()
	{
		$sql="SELECT iduuss,nombreuuss as nombre FROM uuss";
		return ejecutarConsulta($sql);
	}

	/*-------------------------------------------*
	| FUNCION PARA INSERTAR DATOS DEL COMPROMISO |
	.-------------------------------------------*/
	public function datosphpexcel(){

		$sqlexcel = "SELECT iduuss, nombreuuss, rhfn
								 FROM uuss";
		return ejecutarConsulta($sqlexcel);

	}





}

?>

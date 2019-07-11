<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas_graficos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


  /*----------------------------------------------------*
  | FUNCION PARA LISTAR REPORTE DE CONSOLIDADOS PAGADOS |
  .----------------------------------------------------*/
	public function totalctasbancarias()
{
	$sql="SELECT IFNULL(SUM(fondos_disponibles),0) as fondos_disponibles FROM ctasbancarias";
	return ejecutarConsulta($sql);
}

public function totalcompromisos()
{
	$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM compromisos WHERE DATE(fecha_hora)";
	return ejecutarConsulta($sql);
}

public function totaladministrar_ordenes()
{
$sql="SELECT IFNULL(SUM(total_neto),0) as total_neto FROM administrar_ordenes WHERE estado='Pagado'";
return ejecutarConsulta($sql);
}



}

?>

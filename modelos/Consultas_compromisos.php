<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas_compromisos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function compromisosfecha($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT
		DATE(com.fecha_hora) as fecha,
		pro.casa_comercial,
		pre.nombre_objeto,
		pre.codigo,
		prog.nombrep as unidad,
		com.numfactura,
		FORMAT(det.valor,2) as valor,
		com.condicion FROM compromisos AS com INNER JOIN detalle_compromisos AS det ON com.idcompromisos=det.idcompromisos INNER JOIN proveedores AS pro ON com.idproveedores=pro.idproveedores INNER JOIN presupuesto_disponible AS pre ON det.idpresupuesto_disponible=pre.idpresupuesto_disponible INNER JOIN programa AS prog ON com.idprograma=prog.idprograma
		WHERE DATE(com.fecha_hora)>='$fecha_inicio' AND DATE(com.fecha_hora)<='$fecha_fin'";
		return ejecutarConsulta($sql);
	}

	// public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente)
	// {
	// 	$sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";
	// 	return ejecutarConsulta($sql);
	// }


		public function totalctasbancariashoy()
	{
		$sql="SELECT IFNULL(SUM(fondos_disponibles),0) as fondos_disponibles FROM ctasbancarias";
		return ejecutarConsulta($sql);
	}

	public function totalcompromisoshoy()
	{
		$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM compromisos WHERE DATE(fecha_hora)";
		return ejecutarConsulta($sql);
	}

	public function totaladministrar_ordeneshoy()
{
	$sql="SELECT IFNULL(SUM(total_neto),0) as total_neto FROM administrar_ordenes WHERE estado='Pagado'";
	return ejecutarConsulta($sql);
}
	// public function totalventahoy()
	// {
	// 	$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
	// 	return ejecutarConsulta($sql);
	// }

	public function comprasultimos_10dias()
	{
		$sql="SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) as fecha,SUM(total_compra) as total FROM ingreso GROUP by fecha_hora ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}



	// Salgo General de las Cuentas de la Pagaduria de la Fuerza Naval()

	public function sgralcta($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT
		DATE(com.fecha_hora) as fecha,
		pro.casa_comercial,
		pre.nombre_objeto,
		pre.codigo,
		prog.nombrep as unidad,
		com.numfactura,
		FORMAT(det.valor,2) as valor,
		com.condicion FROM compromisos AS com INNER JOIN detalle_compromisos AS det ON com.idcompromisos=det.idcompromisos INNER JOIN proveedores AS pro ON com.idproveedores=pro.idproveedores INNER JOIN presupuesto_disponible AS pre ON det.idpresupuesto_disponible=pre.idpresupuesto_disponible INNER JOIN programa AS prog ON com.idprograma=prog.idprograma
		WHERE DATE(com.fecha_hora)>='$fecha_inicio' AND DATE(com.fecha_hora)<='$fecha_fin'";
		return ejecutarConsulta($sql);
	}

// 	public function ventasultimos_12meses()
// 	{
// 		$sql="SELECT DATE_FORMAT(fecha_hora,'%M') as fecha,SUM(total_venta) as total FROM venta GROUP by MONTH(fecha_hora) ORDER BY fecha_hora DESC limit 0,10";
// 		return ejecutarConsulta($sql);
// 	}
 }

?>

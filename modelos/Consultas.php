<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	// public function consolidado_ctas_generales($fecha_inicio,$fecha_fin)
	// {
	// 	$sql="SELECT DATE(i.fecha_hora) as fecha,u.nombre as usuario, p.nombre as proveedor,i.tipo_comprobante,i.serie_comprobante,i.num_comprobante,i.total_compra,i.impuesto,i.estado
	// 	FROM ingreso i
	// 	INNER JOIN persona p
	// 	ON i.idproveedor=p.idpersona
	// 	INNER JOIN usuario u
	// 	ON i.idusuario=u.idusuario
	// 	WHERE DATE(i.fecha_hora)>='$fecha_inicio'
	// 	AND DATE(i.fecha_hora)<='$fecha_fin'";
	// 	return ejecutarConsulta($sql);
	// }


	public function consolidado_ctas_generales($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT a.idadministrar_ordenes as num, a.fecha_hora as fecha, u.nombreuuss as unidad_superficie,
		c.tipo_pago as cheque, pro.casa_comercial as proveedor,a.descripcion_orden as descripcion,
		(SELECT num_orden FROM administrar_ordenes
		 WHERE tipo_documento = 'O/C' and idadministrar_ordenes = a.idadministrar_ordenes) as oc,
		a.num_comprobante as cp,
		(SELECT num_orden FROM administrar_ordenes
		 WHERE tipo_documento = 'Acuerdo' and idadministrar_ordenes = a.idadministrar_ordenes) as acdo,
		pg.nombrep as unidadbase, c.numero_transferencia as num_trans, GROUP_CONCAT(pd.codigo SEPARATOR ', ') as objeto_gastp,
		a.total_neto as total FROM administrar_ordenes a
		LEFT JOIN contabilidad c
		ON c.idadministrar_ordenes = a.idadministrar_ordenes
		INNER JOIN detalle_orden de
		ON de.idadministrar_ordenes = a.idadministrar_ordenes
		INNER JOIN presupuesto_disponible pd
		ON pd.idpresupuesto_disponible = de.idpresupuesto_disponible
		INNER JOIN uuss u ON u.iduuss = a.iduuss
		INNER JOIN proveedores pro ON pro.idproveedores = a.idproveedores
		INNER JOIN programa pg ON pg.idprograma = a.idprograma
		WHERE DATE(a.fecha_hora)>='$fecha_inicio'
		AND DATE(a.fecha_hora)<='$fecha_fin'
		GROUP BY a.idadministrar_ordenes";
		return ejecutarConsulta($sql);
	}


	public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente)
	{
		$sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";
		return ejecutarConsulta($sql);
	}

	public function totalcomprahoy()
	{
		$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM ingreso WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function totalventahoy()
	{
		$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function comprasultimos_10dias()
	{
		$sql="SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) as fecha,SUM(total_compra) as total FROM ingreso GROUP by fecha_hora ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function ventasultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_hora,'%M') as fecha,SUM(total_venta) as total FROM venta GROUP by MONTH(fecha_hora) ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}
}

?>

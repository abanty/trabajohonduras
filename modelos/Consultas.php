<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


  /*----------------------------------------------------*
  | FUNCION PARA LISTAR REPORTE DE CONSOLIDADOS PAGADOS |
  .----------------------------------------------------*/
	public function consolidado_ctas_generales($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT a.idadministrar_ordenes as num, a.fecha_hora as fecha, u.nombreuuss as unidad_superficie,
		c.tipo_pago as cheque, pro.casa_comercial as proveedor,a.descripcion_orden as descripcion,
		(SELECT num_orden FROM administrar_ordenes
		 WHERE tipo_documento = 'O/C' and idadministrar_ordenes = a.idadministrar_ordenes) as oc,
		a.num_comprobante as cp,
		(SELECT num_orden FROM administrar_ordenes
		 WHERE tipo_documento = 'Acuerdo' and idadministrar_ordenes = a.idadministrar_ordenes) as acdo,
		pg.nombrep as unidadbase, c.numero_transferencia as num_trans, GROUP_CONCAT(DISTINCT pd.codigo SEPARATOR ', ') as objeto_gastp,
		a.monto_total,a.total_neto as total FROM administrar_ordenes a
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
		AND a.estado = 'pagado'
		GROUP BY a.idadministrar_ordenes";
		return ejecutarConsulta($sql);
	}



	/*----------------------------------------------------*
	| FUNCION PARA LISTAR REPORTE DE CONSOLIDADOS PAGADOS |
	.----------------------------------------------------*/
	public function contabilidad_renglones()
	{
		$sql="SELECT pd.codigo as 'RENGLON',pd.nombre_objeto as 'CONCEPTO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 1 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'ENERO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 2 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'FEBRERO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 3 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'MARZO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 4 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'ABRIL',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 5 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'MAYO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 6 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'JUNIO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 7 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'JULIO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 8 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'AGOSTO',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 9 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'SEPTIEMBRE',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 10 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'OCTUBRE',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 11 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'NOVIEMBRE',
		(SELECT sum(deo.precio_unitario*deo.cantidad) FROM detalle_orden deo inner join administrar_ordenes aor on aor.idadministrar_ordenes = deo.idadministrar_ordenes
					where MONTH(aor.fecha_hora) = 12 and deo.idpresupuesto_disponible = de.idpresupuesto_disponible) as 'DICIEMBRE',
					sum((de.cantidad*de.precio_unitario)) as 'ACUMULADO'
		FROM detalle_orden de
		RIGHT JOIN presupuesto_disponible pd
	  ON pd.idpresupuesto_disponible = de.idpresupuesto_disponible
		GROUP BY pd.codigo";
		return ejecutarConsulta($sql);
	}








	/*----------------------------------------------------*
	| FUNCION PARA INSERTAR Y EDITAR DATOS DEL COMPROMISO |
	.----------------------------------------------------*/
	 public function modificardatos($id,$columna_nombre,$valor)
	 {
		 $sql_update = "UPDATE contabilidad SET ".$columna_nombre."='".$valor."' WHERE idadministrar_ordenes = '".$id."'";
			return ejecutarConsulta($sql_update);
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

<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Administrar_ordenes
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_impuesto,$fecha_hora,$impuesto,$subtotal,
	$descuento_total,$monto_total,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,$precio_unitario,$num_factura,$fecha_factura,$valor_factura)
	{
		$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_impuesto,fecha_hora,impuesto,
		subtotal,descuento_total,monto_total,estado)
		VALUES ('$idproveedores','$idusuario','$idprograma','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_impuesto','$fecha_hora',
		'$impuesto','$subtotal','$descuento_total','$monto_total','Aceptado')";

		$idadministrar_ordenesnew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$sql_detalle = "INSERT INTO detalle_orden(idadministrar_ordenes,idpresupuesto_disponible,unidad,cantidad,descripcion,precio_unitario)
			VALUES ('$idadministrar_ordenesnew','$idpresupuesto_disponible[$num_elementos]','$unidad[$num_elementos]','$cantidad[$num_elementos]',
			'$descripcion[$num_elementos]','$precio_unitario[$num_elementos]')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		$sqlfac = "INSERT INTO factura_orden(idadministrar_ordenes,num_factura,fecha_factura,valor_factura)
		VALUES ('$idadministrar_ordenesnew','$num_factura','$fecha_factura','$valor_factura')";
		ejecutarConsulta($sqlfac);

		return $sw;
	}






	//Implementamos un método para anular la venta
	public function anular($idadministrar_ordenes)
	{
		$sql="UPDATE Administrar_ordenes SET estado='Anulado' WHERE idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idadministrar_ordenes)
	{
		$sql="
		SELECT
		v.idadministrar_ordenes,
		DATE(v.fecha_hora) as fecha,
		v.idproveedores,
		p.casa_comercial as proveedor,
		u.idusuario,
		u.nombre as usuario,
		w.idprograma,
		w.codigop as codigo,
		v.num_orden,
		v.num_comprobante,
		v.tipo_impuesto,
		v.monto_total,
		v.impuesto,
		v.estado
		FROM orden_compra v
		INNER JOIN proveedores p ON
		v.idproveedores=p.idproveedores
		INNER JOIN usuario u ON
		 v.idusuario=u.idusuario
		INNER JOIN programa w ON
		 v.idprograma=w.idprograma
		 WHERE v.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsultaSimpleFila($sql);
	}

public function listarDetalle($idadministrar_ordenes)
{
	$sql="
	SELECT
	dv.idadministrar_ordenes,
	dv.idpresupuesto_disponible,
	a.codigo,
	dv.unidad,
	dv.cantidad,
	dv.descripcion,
	dv.precio_unitario,
	dv.descuento,
	(dv.cantidad*dv.precio_unitario-dv.descuento) as subtotal
	 FROM detalle_orden dv inner join Presupuesto_disponible a on dv.
	 idpresupuesto_disponible=a.idpresupuesto_disponible where dv.idadministrar_ordenes='$idadministrar_ordenes'";
	return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listarOrden()
	{
		$sql="SELECT v.idadministrar_ordenes,	DATE(v.fecha_hora) as fecha, v.idproveedores,	p.casa_comercial as proveedor,
		u.idusuario,	u.nombre as usuario,	w.idprograma,	w.codigop,	v.num_orden,	v.num_comprobante,
		v.tipo_impuesto,	v.monto_total,	v.impuesto,	v.estado
		FROM administrar_ordenes v
		INNER JOIN proveedores p ON	v.idproveedores=p.idproveedores
		INNER JOIN usuario u ON	 v.idusuario=u.idusuario
		INNER JOIN programa w ON	 v.idprograma=w.idprograma
		ORDER by v.idadministrar_ordenes desc";
		return ejecutarConsulta($sql);
	}

	public function administrar_ordenes_cabecera($idadministrar_ordenes){
		$sql="SELECT ao.idadministrar_ordenes, pro.casa_comercial as proveedor, ao.idproveedores, ao.idusuario, us.nombre as usuario, ao.idprograma, pr.nombrep as programa,
		ao.num_orden, ao.num_comprobante,ao.titulo_orden, ao.descripcion_orden, ao.tipo_impuesto,  lower(DATE_FORMAT(ao.fecha_hora,'%e/%c/%Y')) as fecha,ao.impuesto,ao.subtotal,
		(ao.subtotal+ao.descuento_total) as subtotal_origen,
		ao.descuento_total, ao.monto_total , ao.estado
 		FROM administrar_ordenes ao INNER JOIN proveedores pro ON ao.idproveedores = pro.idproveedores
		INNER JOIN usuario us ON ao.idusuario = us.idusuario
		INNER JOIN programa pr ON ao.idprograma = pr.idprograma
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}

	public function administrar_ordenes_detalle($idadministrar_ordenes){
		$sql="SELECT dp.nombre_objeto as objeto, dp.codigo,
		do.unidad, do.cantidad,	do.descripcion, do.precio_unitario, (do.cantidad*do.precio_unitario) as subtot
	FROM detalle_orden do INNER JOIN presupuesto_disponible dp ON
		do.idpresupuesto_disponible=dp.idpresupuesto_disponible WHERE do.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}

}
?>

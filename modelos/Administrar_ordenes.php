<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Administrar_ordenes
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	// --------------------------------------------------------------------
	// METODO PARA INSERTAR DATOS EN MULTIPLES TABLA MEDIANTE MSQLI QUERY:|
	// --------------------------------------------------------------------
	public function insertar_orden_comprobante($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
	$tipo_impuesto,$fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,
	$precio_unitario,$idctasbancarias,$tipopago,$num_transferencia,$debitos,$creditos,$contabilidad)
	{
		$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_documento,
											tipo_impuesto,fecha_hora,impuesto,subtotal,descuento_total,monto_total,estado)
											VALUES ('$idproveedores','$idusuario','$idprograma','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_documento',
															'$tipo_impuesto','$fecha_hora','$impuesto','$subtotal','$descuento_total','$monto_total','Aceptado')";

		$idadministrar_ordenesnew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$num_elementos_fact=0;
		$sw=true;

		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$sql_detalle = "INSERT INTO detalle_orden(idadministrar_ordenes,idpresupuesto_disponible,unidad,cantidad,descripcion,precio_unitario)
			VALUES ('$idadministrar_ordenesnew','$idpresupuesto_disponible[$num_elementos]','$unidad[$num_elementos]','$cantidad[$num_elementos]',
			'$descripcion[$num_elementos]','$precio_unitario[$num_elementos]')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		$sql_comprobante="INSERT INTO contabilidad(idadministrar_ordenes,idctasbancarias,tipo_pago,numero_transferencia,debitos,creditos,contabilidad)
		VALUES ('$idadministrar_ordenesnew','$idctasbancarias','$tipopago','$num_transferencia','$debitos','$creditos','$contabilidad')";
		ejecutarConsulta($sql_comprobante);

		return $sw;
	}


	// --------------------------------------------------------------------
	// METODO PARA INSERTAR DATOS EN MULTIPLES TABLA MEDIANTE MSQLI QUERY:|
	// --------------------------------------------------------------------
	public function insertar_orden_factura($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
	$tipo_impuesto,$fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,
	$precio_unitario,$num_factura,$fecha_factura,$valor_factura)
	{
		$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_documento,
											tipo_impuesto,fecha_hora,impuesto,subtotal,descuento_total,monto_total,estado)
											VALUES ('$idproveedores','$idusuario','$idprograma','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_documento',
															'$tipo_impuesto','$fecha_hora','$impuesto','$subtotal','$descuento_total','$monto_total','Aceptado')";

		$idadministrar_ordenesnew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$num_elementos_fact=0;
		$sw=true;


		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$sql_detalle = "INSERT INTO detalle_orden(idadministrar_ordenes,idpresupuesto_disponible,unidad,cantidad,descripcion,precio_unitario)
			VALUES ('$idadministrar_ordenesnew','$idpresupuesto_disponible[$num_elementos]','$unidad[$num_elementos]','$cantidad[$num_elementos]',
			'$descripcion[$num_elementos]','$precio_unitario[$num_elementos]')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		while ($num_elementos_fact < count($num_factura))
	 {
			$sqlfac = "INSERT INTO factura_orden(idadministrar_ordenes,num_factura,fecha_factura,valor_factura)
			VALUES ('$idadministrar_ordenesnew','$num_factura[$num_elementos_fact]','$fecha_factura[$num_elementos_fact]','$valor_factura[$num_elementos_fact]')";
			ejecutarConsulta($sqlfac) or $sw = false;
			$num_elementos_fact=$num_elementos_fact + 1;
		}


		return $sw;
	}


	// --------------------------------------------------------------------
	// METODO PARA INSERTAR DATOS EN MULTIPLES TABLA MEDIANTE MSQLI QUERY:|
	// --------------------------------------------------------------------
	public function insertar_orden_factura_comprobante($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
	$tipo_impuesto,$fecha_hora,$impuesto,$subtotal,$descuento_total,$monto_total,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,
	$precio_unitario,$num_factura,$fecha_factura,$valor_factura,$idctasbancarias,$tipopago,$num_transferencia,$debitos,$creditos,$contabilidad)
	{
		$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_documento,
											tipo_impuesto,fecha_hora,impuesto,subtotal,descuento_total,monto_total,estado)
											VALUES ('$idproveedores','$idusuario','$idprograma','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_documento',
															'$tipo_impuesto','$fecha_hora','$impuesto','$subtotal','$descuento_total','$monto_total','Aceptado')";

		$idadministrar_ordenesnew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$num_elementos_fact=0;
		$sw=true;


		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$sql_detalle = "INSERT INTO detalle_orden(idadministrar_ordenes,idpresupuesto_disponible,unidad,cantidad,descripcion,precio_unitario)
			VALUES ('$idadministrar_ordenesnew','$idpresupuesto_disponible[$num_elementos]','$unidad[$num_elementos]','$cantidad[$num_elementos]',
			'$descripcion[$num_elementos]','$precio_unitario[$num_elementos]')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		while ($num_elementos_fact < count($num_factura))
   {
			$sqlfac = "INSERT INTO factura_orden(idadministrar_ordenes,num_factura,fecha_factura,valor_factura)
			VALUES ('$idadministrar_ordenesnew','$num_factura[$num_elementos_fact]','$fecha_factura[$num_elementos_fact]','$valor_factura[$num_elementos_fact]')";
			ejecutarConsulta($sqlfac) or $sw = false;
			$num_elementos_fact=$num_elementos_fact + 1;
		}

		$sql_comprobante="INSERT INTO contabilidad(idadministrar_ordenes,idctasbancarias,tipo_pago,numero_transferencia,debitos,creditos,contabilidad)
		VALUES ('$idadministrar_ordenesnew','$idctasbancarias','$tipopago','$num_transferencia','$debitos','$creditos','$contabilidad')";
		ejecutarConsulta($sql_comprobante);


		return $sw;
	}


	// --------------------------------------------------------------------
	// METODO PARA INSERTAR DATOS EN MULTIPLES TABLA MEDIANTE MSQLI QUERY:|
	// --------------------------------------------------------------------
	public function insertar_orden($idproveedores,$idusuario,$idprograma,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,$tipo_impuesto,$fecha_hora,$impuesto,$subtotal,
	$descuento_total,$monto_total,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,$precio_unitario)
	{
		$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_documento,tipo_impuesto,fecha_hora,impuesto,
		subtotal,descuento_total,monto_total,estado)
		VALUES ('$idproveedores','$idusuario','$idprograma','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_documento','$tipo_impuesto','$fecha_hora',
		'$impuesto','$subtotal','$descuento_total','$monto_total','Aceptado')";

		$idadministrar_ordenesnew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$num_elementos_fact=0;
		$sw=true;

		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$sql_detalle = "INSERT INTO detalle_orden(idadministrar_ordenes,idpresupuesto_disponible,unidad,cantidad,descripcion,precio_unitario)
			VALUES ('$idadministrar_ordenesnew','$idpresupuesto_disponible[$num_elementos]','$unidad[$num_elementos]','$cantidad[$num_elementos]',
			'$descripcion[$num_elementos]','$precio_unitario[$num_elementos]')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}


		return $sw;
	}


	// ----------------------------
	// METODO PARA ANULAR ORDENES:|
	// ----------------------------
	public function anular($idadministrar_ordenes)
	{
		$sql="UPDATE Administrar_ordenes SET estado='Anulado' WHERE idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	// -------------------------------------------
	// METODO PARA MOSTRAR REGISTROS DE LA ORDEN:|
	// -------------------------------------------
	public function mostrar_orden($idadministrar_ordenes)
	{
		$sql="SELECT	ao.idadministrar_ordenes, ao.idproveedores, ao.idusuario, ao.idprograma, ao.num_orden, ao.num_comprobante,
		ao.titulo_orden, ao.descripcion_orden, ao.tipo_documento, ao.tipo_impuesto, DATE(ao.fecha_hora) as fecha, ao.impuesto, ao.subtotal, ao.descuento_total,
		ao.monto_total, ao.estado, p.casa_comercial as proveedor, u.nombre as usuario, w.nombrep, w.codigop, cb.idctasbancarias, cb.tipo_pago,
		cb.numero_transferencia, cb.debitos, cb.creditos, cb.contabilidad
									FROM administrar_ordenes ao
									LEFT JOIN proveedores p ON
									ao.idproveedores=p.idproveedores
									LEFT JOIN usuario u ON
									ao.idusuario=u.idusuario
									LEFT JOIN programa w ON
									ao.idprograma=w.idprograma
									LEFT JOIN contabilidad cb ON
									cb.idadministrar_ordenes = ao.idadministrar_ordenes
		 			WHERE ao.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsultaSimpleFila($sql);
	}




	// ---------------------------------------------
	// METODO PARA LISTAR LOS DETALLES DE LA ORDEN:|
	// ---------------------------------------------
	public function listarDetalle_orden($idadministrar_ordenes)
	{
		$sql="SELECT dor.iddetalle_orden, dor.idadministrar_ordenes, dor.idpresupuesto_disponible, dor.unidad, dor.cantidad, dor.descripcion,
		dor.precio_unitario, pd.nombre_objeto, pd.grupo, pd.subgrupo, pd.codigo, pd.presupuesto_anual, pd.fondos_disponibles, pd.condicion
		FROM detalle_orden dor INNER JOIN presupuesto_disponible pd ON pd.idpresupuesto_disponible = dor.idpresupuesto_disponible
		WHERE dor.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	// ---------------------------------------------
	// METODO PARA LISTAR LAS FACTURAS DE LA ORDEN:|
	// ---------------------------------------------
	public function listarFactura_orden($idadministrar_ordenes)
	{
		$sql="SELECT fo.idfactura_orden,fo.idadministrar_ordenes, fo.num_factura, fo.fecha_factura, fo.valor_factura
		FROM factura_orden fo INNER JOIN administrar_ordenes ao ON fo.idadministrar_ordenes = ao.idadministrar_ordenes
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}

	// ---------------------------------------------------------------
	// METODO PARA LISTAR LAS FACTURAS DE LA ORDEN 10 PRIMERAS FILAS:|
	// ---------------------------------------------------------------
	public function listarFactura_orden_10firts($idadministrar_ordenes)
	{
		$sql="SELECT fo.idfactura_orden,fo.idadministrar_ordenes, fo.num_factura, fo.fecha_factura, fo.valor_factura
		FROM factura_orden fo INNER JOIN administrar_ordenes ao ON fo.idadministrar_ordenes = ao.idadministrar_ordenes
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes' limit 10";
		return ejecutarConsulta($sql);
	}

	// ----------------------------------------------------------------
	// METODO PARA LISTAR LAS FACTURAS DE LA ORDEN SIGUIENTE 10 FILAS:|
	// ----------------------------------------------------------------
	public function listarFactura_orden_10next($idadministrar_ordenes)
	{
		$sql="SELECT fo.idfactura_orden,fo.idadministrar_ordenes, fo.num_factura, fo.fecha_factura, fo.valor_factura
		FROM factura_orden fo INNER JOIN administrar_ordenes ao ON fo.idadministrar_ordenes = ao.idadministrar_ordenes
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes' limit 10,10";
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
		$sql="SELECT ao.idadministrar_ordenes, pro.casa_comercial as proveedor, ao.idproveedores, ao.idusuario, us.nombre as usuario, ao.idprograma, pr.nombrep as programa,pr.cargar,
		ao.num_orden, ao.num_comprobante,ao.titulo_orden, ao.descripcion_orden, ao.tipo_documento, ao.tipo_impuesto,  lower(DATE_FORMAT(ao.fecha_hora,'%e/%c/%Y')) as fecha,ao.impuesto,ao.subtotal,
		(ao.subtotal+ao.descuento_total) as subtotal_origen,
		ao.descuento_total, ao.monto_total , ao.estado
 		FROM administrar_ordenes ao INNER JOIN proveedores pro ON ao.idproveedores = pro.idproveedores
		INNER JOIN usuario us ON ao.idusuario = us.idusuario
		INNER JOIN programa pr ON ao.idprograma = pr.idprograma
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	// ---------------------------------------------------
	// METODO PARA MOSTRAR DATOS DPF COMPROBANTE DE PAGO |
	// ---------------------------------------------------
	public function mostrar_datos_comprobante($idadministrar_ordenes)
	{
		$sql="SELECT	ao.idadministrar_ordenes, ao.idproveedores, ao.idusuario, ao.idprograma, ao.num_orden, ao.num_comprobante,
		ao.titulo_orden, ao.descripcion_orden, ao.tipo_documento, ao.tipo_impuesto, DATE(ao.fecha_hora) as fecha, ao.impuesto, ao.subtotal, ao.descuento_total,(ao.subtotal+ao.descuento_total) as subtotal_origen,
		ao.monto_total, ao.estado, p.casa_comercial as proveedor, u.nombre as usuario, w.nombrep, w.codigop, cb.idctasbancarias, cb.tipo_pago,
		cb.numero_transferencia, cb.debitos, cb.creditos, cb.contabilidad, cts.bancopg as banco
		FROM administrar_ordenes ao
		LEFT JOIN proveedores p ON
		ao.idproveedores=p.idproveedores
		LEFT JOIN usuario u ON
		ao.idusuario=u.idusuario
		LEFT JOIN programa w ON
		ao.idprograma=w.idprograma
		LEFT JOIN contabilidad cb ON
		cb.idadministrar_ordenes = ao.idadministrar_ordenes
    LEFT JOIN ctasbancarias cts ON
    cb.idctasbancarias = cts.idctasbancarias
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	public function administrar_ordenes_detalle($idadministrar_ordenes){
		$sql="SELECT dp.nombre_objeto as objeto, dp.codigo,dp.grupo,dp.subgrupo,
		dor.unidad, dor.cantidad,	dor.descripcion, dor.precio_unitario, (dor.cantidad*dor.precio_unitario) as subtot
		FROM detalle_orden dor INNER JOIN presupuesto_disponible dp ON
		dor.idpresupuesto_disponible=dp.idpresupuesto_disponible
		WHERE dor.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}



	public function administrar_ordenes_detalle_grouping($idadministrar_ordenes){
		$sql="SELECT p.idpresupuesto_disponible,'' as grupo,'' as subgrupo,p.codigo as cod, ''  as uni ,'' as cant,'' as descripcion,'' as precu, '' as subtot,SUM((de.cantidad*de.precio_unitario)) as total
		FROM detalle_orden de
		INNER JOIN presupuesto_disponible p
		ON p.idpresupuesto_disponible = de.idpresupuesto_disponible
		WHERE de.idadministrar_ordenes = '$idadministrar_ordenes'
		GROUP BY de.idpresupuesto_disponible
		UNION ALL
		SELECT p.idpresupuesto_disponible,p.grupo,p.subgrupo,'' as cod,de.unidad as uni, de.cantidad as cant,de.descripcion as descripcion,de.precio_unitario as precu,de.precio_unitario as subtot,'' as total
		FROM detalle_orden de
		INNER JOIN presupuesto_disponible p
		ON p.idpresupuesto_disponible = de.idpresupuesto_disponible
		WHERE de.idadministrar_ordenes = '$idadministrar_ordenes'
		order by idpresupuesto_disponible,descripcion";
		return ejecutarConsulta($sql);
	}

}
?>

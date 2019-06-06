<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Administrar_ordenes
{

	//Implementamos nuestro constructor
	public function __construct()
	{

	}
		/*----------------------------------------------------------------------------------------*
		| FUNCION PARA INSERTAR DATOS DE ORDEN Y FACTURA EN MULTIPLES TABLA MEDIANTE MSQLI QUERY: |
		.----------------------------------------------------------------------------------------*/
		public function insertar_orden_factura($idproveedores,$idusuario,$idprograma,$iduuss,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
		$fecha_hora,$subtotalinicial,$descuentototal,$subtotal,$impuestosv,$tasaimpuestosv,$valor_sv,$impuesto,$tasaimpuesto,$valor_impuesto,$monto_total,$retencionisv,
		$tasaretencionisv,$valor_isv,$retencionisr,$tasaretencionisr,$valor_isr,$totalneto,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,$precio_unitario,
		$num_factura,$fecha_factura,$valor_factura)
		{
			$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,iduuss,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_documento,
												fecha_hora,subtotal_inicial,descuento_total,subtotal,impuesto_sv,tasa_sv,valor_sv,impuesto,tasa_imp,valor_impuesto,monto_total,retencion_isv,
												tasa_retencion_isv,valor_isv,retencion_isr,tasa_retencion_isr,valor_isr,total_neto,estado)

						VALUES ('$idproveedores','$idusuario','$idprograma','$iduuss','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_documento',
										'$fecha_hora','$subtotalinicial','$descuentototal','$subtotal','$impuestosv','$tasaimpuestosv','$valor_sv','$impuesto','$tasaimpuesto','$valor_impuesto',
										'$monto_total','$retencionisv','$tasaretencionisv','$valor_isv','$retencionisr','$tasaretencionisr','$valor_isr','$totalneto','Pendiente')";

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

			$sql_comprobante="INSERT INTO contabilidad(idadministrar_ordenes,tipo_pago,numero_transferencia)
			VALUES ('$idadministrar_ordenesnew',null,null)";
			ejecutarConsulta($sql_comprobante);


			return $sw;
		}

		/*-----------------------------------------------------------------------------------*
		| FUNCION PARA INSERTAR DATOS DE SOLO ORDEN EN MULTIPLES TABLA MEDIANTE MSQLI QUERY: |
		.-----------------------------------------------------------------------------------*/
		public function insertar_orden($idproveedores,$idusuario,$idprograma,$iduuss,$num_orden,$num_comprobante,$titulo_orden,$descripcion_orden,$tipo_documento,
		$fecha_hora,$subtotalinicial,$descuentototal,$subtotal,$impuestosv,$tasaimpuestosv,$valor_sv,$impuesto,$tasaimpuesto,$valor_impuesto,$monto_total,
		$retencionisv,$tasaretencionisv,$valor_isv,$retencionisr,$tasaretencionisr,$valor_isr,$totalneto,$idpresupuesto_disponible,$unidad,$cantidad,$descripcion,
		$precio_unitario)
		{
			$sql="INSERT INTO administrar_ordenes(idproveedores,idusuario,idprograma,iduuss,num_orden,num_comprobante,titulo_orden,descripcion_orden,tipo_documento,
												fecha_hora,subtotal_inicial,descuento_total,subtotal,impuesto_sv,tasa_sv,valor_sv,impuesto,tasa_imp,valor_impuesto,monto_total,retencion_isv,
												tasa_retencion_isv,valor_isv,retencion_isr,tasa_retencion_isr,valor_isr,total_neto,estado)

					  VALUES ('$idproveedores','$idusuario','$idprograma','$iduuss','$num_orden','$num_comprobante','$titulo_orden','$descripcion_orden','$tipo_documento',
					  				'$fecha_hora','$subtotalinicial','$descuentototal','$subtotal','$impuestosv','$tasaimpuestosv','$valor_sv','$impuesto','$tasaimpuesto',
										'$valor_impuesto','$monto_total','$retencionisv','$tasaretencionisv','$valor_isv','$retencionisr','$tasaretencionisr','$valor_isr','$totalneto',
										'Pendiente')";

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

			$sql_comprobante="INSERT INTO contabilidad(idadministrar_ordenes,tipo_pago,numero_transferencia)
			VALUES ('$idadministrar_ordenesnew',null,null)";
			ejecutarConsulta($sql_comprobante);

			return $sw;
		}


	/* ----------------------------*
	|  METODO PARA ANULAR ORDENES:  |
	. ----------------------------*/
	public function anular($idadministrar_ordenes)
	{
		$sql="UPDATE administrar_ordenes SET estado='Anulado' WHERE idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	/* ----------------------------*
	|  METODO PARA PAGAR ORDENES:  |
	. ----------------------------*/
	public function pagar($idadministrar_ordenes)
	{
		// if ($tipo_documento == 'O/C') {,$tipo_documento,$retencionisv,$retencionisr
		// 	$actualizarrentencionisv = "UPDATE presupuesto_disponible
		// 															 SET presupuesto_anual = presupuesto_anual - $retencionisv
		// 															 WHERE idpresupuesto_disponible = '41'";
		// 															 ejecutarConsulta($actualizarrentencionisv);
		//
		// 	$actualizarrentencionisr = "UPDATE presupuesto_disponible
		// 															 SET presupuesto_anual = presupuesto_anual - $retencionisr
		// 															 WHERE idpresupuesto_disponible = '40'";
		// 															 ejecutarConsulta($actualizarrentencionisr);
		// }

		$sql="UPDATE administrar_ordenes SET estado='Pagado' WHERE idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	/* ------------------------------------------*
	| METODO PARA MOSTRAR REGISTROS DE LA ORDEN: |
	. ------------------------------------------*/
	public function mostrar_orden($idadministrar_ordenes)
	{
		$sql="SELECT	ao.idadministrar_ordenes, ao.idproveedores,ao.iduuss, ao.idusuario, ao.idprograma, ao.num_orden, ao.num_comprobante,
		ao.titulo_orden, ao.descripcion_orden, ao.tipo_documento, DATE(ao.fecha_hora) as fecha, ao.subtotal_inicial,ao.descuento_total,
		ao.subtotal,ao.impuesto_sv,ao.tasa_sv,ao.impuesto,ao.tasa_imp,ao.monto_total,ao.retencion_isv,ao.tasa_retencion_isv,ao.retencion_isr,
		ao.tasa_retencion_isr,ao.total_neto,ao.estado, p.casa_comercial as proveedor, u.nombre as usuario, w.nombrep, w.codigop, cb.idctasbancarias, cb.tipo_pago,
		cb.numero_transferencia, cb.debitos, cb.creditos, cb.contabilidad,ao.valor_sv,ao.valor_impuesto,ao.valor_isv,ao.valor_isr
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


	/* --------------------------------------------*
	| METODO PARA LISTAR LOS DETALLES DE LA ORDEN: |
	. --------------------------------------------*/
	public function listarDetalle_orden($idadministrar_ordenes)
	{
		$sql="SELECT dor.iddetalle_orden, dor.idadministrar_ordenes, dor.idpresupuesto_disponible, dor.unidad, dor.cantidad, dor.descripcion,
		dor.precio_unitario, pd.nombre_objeto, pd.grupo, pd.subgrupo, pd.codigo, pd.presupuesto_anual, pd.fondos_disponibles, pd.condicion
		FROM detalle_orden dor INNER JOIN presupuesto_disponible pd ON pd.idpresupuesto_disponible = dor.idpresupuesto_disponible
		WHERE dor.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}


	/* --------------------------------------------*
	| METODO PARA LISTAR LAS FACTURAS DE LA ORDEN: |
	. --------------------------------------------*/
	public function listarFactura_orden($idadministrar_ordenes)
	{
		$sql="SELECT fo.idfactura_orden,fo.idadministrar_ordenes, fo.num_factura, fo.fecha_factura, fo.valor_factura
		FROM factura_orden fo INNER JOIN administrar_ordenes ao ON fo.idadministrar_ordenes = ao.idadministrar_ordenes
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}

	/*---------------------------------------------------------------*
	| METODO PARA LISTAR LAS FACTURAS DE LA ORDEN 10 PRIMERAS FILAS: |
	. --------------------------------------------------------------*/
	public function listarFactura_orden_10firts($idadministrar_ordenes)
	{
		$sql="SELECT fo.idfactura_orden,fo.idadministrar_ordenes, fo.num_factura, fo.fecha_factura, fo.valor_factura
		FROM factura_orden fo INNER JOIN administrar_ordenes ao ON fo.idadministrar_ordenes = ao.idadministrar_ordenes
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes' limit 10";
		return ejecutarConsulta($sql);
	}


	/*----------------------------------------------------------------*
	| METODO PARA LISTAR LAS FACTURAS DE LA ORDEN SIGUIENTE 10 FILAS: |
	. ---------------------------------------------------------------*/
	public function listarFactura_orden_10next($idadministrar_ordenes)
	{
		$sql="SELECT fo.idfactura_orden,fo.idadministrar_ordenes, fo.num_factura, fo.fecha_factura, fo.valor_factura
		FROM factura_orden fo INNER JOIN administrar_ordenes ao ON fo.idadministrar_ordenes = ao.idadministrar_ordenes
		WHERE ao.idadministrar_ordenes='$idadministrar_ordenes' limit 10,10";
		return ejecutarConsulta($sql);
	}


	/*---------------------------------------*
	| METODO PARA LISTAR REGISTROS ORDENES : |
	. --------------------------------------*/
	public function listarOrden()
	{
		$sql="SELECT v.idadministrar_ordenes,	DATE(v.fecha_hora) as fecha, v.idproveedores,	p.casa_comercial as proveedor,
		u.idusuario,	u.nombre as usuario,	w.idprograma,	w.codigop, v.tipo_documento,	v.num_orden,	v.num_comprobante,
		v.retencion_isv,v.retencion_isr, v.monto_total,v.total_neto,	v.impuesto,	v.estado
		FROM administrar_ordenes v
		INNER JOIN proveedores p ON	v.idproveedores=p.idproveedores
		INNER JOIN usuario u ON	 v.idusuario=u.idusuario
		INNER JOIN programa w ON	 v.idprograma=w.idprograma
		ORDER by v.idadministrar_ordenes desc";
		return ejecutarConsulta($sql);
	}


	/*---------------------------------------*
	| METODO PARA LISTAR REGISTROS ORDENES : |
	. --------------------------------------*/
	public function administrar_ordenes_cabecera($idadministrar_ordenes){
		$sql="SELECT ao.idadministrar_ordenes, pro.casa_comercial as proveedor, ao.idproveedores, ao.idusuario, us.nombre as usuario, ao.idprograma, pr.nombrep as programa,pr.cargar,
		ao.num_orden, ao.num_comprobante,ao.titulo_orden, ao.descripcion_orden, ao.tipo_documento,lower(DATE_FORMAT(ao.fecha_hora,'%e/%c/%Y')) as fecha,ao.impuesto,ao.retencion_isv,ao.subtotal,
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
		ao.titulo_orden, ao.descripcion_orden, ao.tipo_documento,DATE(ao.fecha_hora) as fecha, ao.subtotal_inicial,ao.descuento_total,
		ao.subtotal,ao.impuesto_sv,ao.tasa_sv,ao.impuesto,ao.tasa_imp,ao.monto_total,ao.retencion_isv,ao.tasa_retencion_isv,ao.retencion_isr,
		ao.tasa_retencion_isr,ao.total_neto, ao.estado, p.casa_comercial as proveedor, u.nombre as usuario, w.nombrep, w.codigop, cb.idctasbancarias,
		cb.tipo_pago,cb.numero_transferencia, cb.debitos, cb.creditos, cb.contabilidad, cts.bancopg as banco,ao.valor_sv,ao.valor_impuesto,ao.valor_isv,ao.valor_isr
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


	/*---------------------------------------*
	| METODO PARA LISTAR REGISTROS ORDENES : |
	. --------------------------------------*/
	public function administrar_ordenes_detalle($idadministrar_ordenes){
		$sql="SELECT dp.nombre_objeto as objeto, dp.codigo,dp.grupo,dp.subgrupo,
		dor.unidad, dor.cantidad,	dor.descripcion, dor.precio_unitario, (dor.cantidad*dor.precio_unitario) as subtot
		FROM detalle_orden dor INNER JOIN presupuesto_disponible dp ON
		dor.idpresupuesto_disponible=dp.idpresupuesto_disponible
		WHERE dor.idadministrar_ordenes='$idadministrar_ordenes'";
		return ejecutarConsulta($sql);
	}



	public function administrar_ordenes_detalle_grouping($idadministrar_ordenes){
		$sql="SELECT p.idpresupuesto_disponible,'' as grupo,'' as subgrupo,p.codigo as cod, ''  as uni ,'' as cant,UPPER(p.nombre_objeto) as descripcion,'' as precu, '' as subtot,SUM((de.cantidad*de.precio_unitario)) as total
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
		order by idpresupuesto_disponible, cant";
		return ejecutarConsulta($sql);
	}


	public function administrar_ordenes_detalle_sum($idadministrar_ordenes){
		$sql="SELECT p.idpresupuesto_disponible,p.grupo ,p.subgrupo,p.codigo, de.unidad ,de.cantidad,de.descripcion,
		de.precio_unitario,SUM((de.cantidad*de.precio_unitario)) as total
		FROM detalle_orden de
		INNER JOIN presupuesto_disponible p
		ON p.idpresupuesto_disponible = de.idpresupuesto_disponible
		WHERE de.idadministrar_ordenes = '$idadministrar_ordenes'
		GROUP BY de.idpresupuesto_disponible";
		return ejecutarConsulta($sql);
	}



}
?>

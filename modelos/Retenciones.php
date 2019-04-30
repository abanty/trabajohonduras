<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Retenciones
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	// --------------------------------------------------------------------
	// METODO PARA INSERTAR DATOS EN MULTIPLES TABLA MEDIANTE MSQLI QUERY:|
	// --------------------------------------------------------------------
	public function insertar_retenciones($idproveedores,$rtn,$numdocumento,$fecha_hora,$tipo_impuesto,$descripcion,$base_imponible,
	$imp_retenido,$total_oc,$idcompromisos,$valor_base)
	{
		$sql="INSERT INTO retenciones (idproveedores,rtn,numdocumento,fecha_hora,tipo_impuesto,descripcion,base_imponible,imp_retenido,total_oc,estado)
		VALUES ('$idproveedores','$rtn','$numdocumento','$fecha_hora','$tipo_impuesto','$descripcion','$base_imponible','$imp_retenido','$total_oc','Aceptado')";
		$idretencionew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($idcompromisos))
		{
			$sql_reten = "INSERT INTO detalle_retenciones(idretenciones,idcompromisos,valor_base)
			VALUES ('$idretencionew','$idcompromisos[$num_elementos]','$valor_base[$num_elementos])";
			ejecutarConsulta($sql_reten) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;
	}


	//Implementamos un método para anular categorías
	public function anular($idretenciones)
	{
		$sql="UPDATE retenciones SET estado='Anulado' WHERE idretenciones='$idretenciones'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idingreso)
	{
		$sql="SELECT
		r.idretenciones,
		DATE(r.fecha_hora) as fecha,
		r.idproveedores,
		p.casa_comercial as proveedor,
		r.rtn,
		r.numdocumento,
		r.tipo_impuesto,
		r.descripcion,
		r.base_imponible,
		r.imp_retenido,
		r.estado FROM retenciones r INNER JOIN proveedores p ON i.idproveedores=p.idproveedores  WHERE r.idretenciones='$idretenciones'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function listarDetalle($idretenciones)
	{
		$sql="SELECT
		di.idretenciones,
		di.idcompromisos,
		a.numfactura,
		di.valor_base FROM detalle_retenciones di inner join compromisos a on di.idcompromisos=a.idcompromisos where di.idretenciones='$idretenciones'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT
		r.idretenciones,
		DATE(r.fecha_hora) as fecha,
		r.idproveedores,
		p.casa_comercial as proveedor,
		r.rtn,
		r.numdocumento,
		r.tipo_impuesto,
		r.descripcion,
		r.base_imponible,
		r.imp_retenido,
		r.estado FROM retenciones r INNER JOIN proveedores p ON r.idproveedores=p.idproveedores ORDER BY r.idretenciones desc";
		return ejecutarConsulta($sql);
	}

	// public function retencionescabecera($idretenciones){
	// 	$sql="SELECT
	// 	i.idingreso,
	// 	i.idproveedor,
	// 	p.nombre as proveedor,
	// 	p.direccion,
	// 	p.tipo_documento,
	// 	p.num_documento,
	// 	p.email,
	// 	p.telefono,
	// 	i.idusuario,
	// 	u.nombre as usuario,
	// 	i.tipo_comprobante,
	// 	i.serie_comprobante,
	// 	i.num_comprobante,
	// 	date(i.fecha_hora) as fecha,
	// 	i.impuesto,
	// 	i.total_compra FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE i.idingreso='$idingreso'";
	// 	return ejecutarConsulta($sql);
	// }

	// public function ingresodetalle($idingreso){
	// 	$sql="SELECT a.nombre as articulo,a.codigo,d.cantidad,d.precio_compra,d.precio_venta,(d.cantidad*d.precio_compra) as subtotal FROM detalle_ingreso d INNER JOIN articulo a ON d.idarticulo=a.idarticulo WHERE d.idingreso='$idingreso'";
	// 	return ejecutarConsulta($sql);
	// }
}

?>

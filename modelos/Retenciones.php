<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Retenciones
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	/*---------------------------------------------------------------------*
	| FUNCION PARA INSERTAR DATOS EN MULTIPLES TABLA MEDIANTE MSQLI QUERY: |
	.----------------------------------------------------------------------*/
	public function insertar(
		$idproveedores,
		$rtn,
		$numdocumento,
		$fecha_hora,
		$tipo_impuesto,
		$descripcion,
	  $base_imponible,
		$imp_retenido,
		$total_oc,
		$idcompromisos,
		$valorbase)
	{
		$sqlx="INSERT INTO retenciones (idproveedores,rtn,numdocumento,fecha_hora,tipo_impuesto,descripcion,base_imponible,imp_retenido,total_oc,estado)
		VALUES ('$idproveedores','$rtn','$numdocumento','$fecha_hora','$tipo_impuesto','$descripcion','$base_imponible','$imp_retenido','$total_oc','Aceptado')";
		$idretencionew=ejecutarConsulta_retornarID($sqlx);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($idcompromisos))
		{
			$sql_reten = "INSERT INTO detalle_retenciones(idretenciones,idcompromisos,valorbase)
			VALUES ('$idretencionew','$idcompromisos[$num_elementos]','$valorbase[$num_elementos]')";

			ejecutarConsulta($sql_reten) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;

		}


	/*------------------------------*
	| FUNCION PARA LISTAR REGISTROS |
	.-------------------------------*/
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
		r.total_oc,
		r.estado
		FROM retenciones r
		INNER JOIN proveedores p ON r.idproveedores=p.idproveedores
		ORDER BY r.idretenciones desc";
		return ejecutarConsulta($sql);
	}


	/*------------------------------*
	| FUNCION PARA MOSTRAR REGISTROS |
	.-------------------------------*/
	public function mostrar($idretenciones)
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
		r.total_oc,
		r.estado
		FROM retenciones r
		INNER JOIN proveedores p ON r.idproveedores=p.idproveedores
		WHERE r.idretenciones = '$idretenciones'";

		return ejecutarConsultaSimpleFila($sql);
	}


	/*--------------------------------------------------------*
	| FUNCION PARA VALIDAR NUMERODOC DE RETENCIONES REPETIDOS |
	.---------------------------------------------------------*/
	public function validar_doc_reten()
	{
		$sql="SELECT numdocumento FROM retenciones";
		return ejecutarConsulta($sql);
	}


	/*-------------------------------------------------*
	| FUNCION PARA MOSTRAR DETALLES DE RETENCIONES PDF |
	.-------------------------------------------------*/
	public function listarDetalle_retencion($idretenciones)
	{
		$sql="SELECT c.numfactura,dt.valorbase, (dt.valorbase*1) as subtotal
		FROM detalle_retenciones dt
		INNER JOIN retenciones r
		ON r.idretenciones = dt.idretenciones
		INNER JOIN compromisos c
		ON c.idcompromisos = dt.idcompromisos
		WHERE r.idretenciones = '$idretenciones'";
		return ejecutarConsulta($sql);
	}


	/*-------------------------------------------------*
	| FUNCION PARA MOSTRAR DETALLES DE RETENCIONES PDF |
	.-------------------------------------------------*/
	public function pdf_detalle_retenciones($idretenciones)
	{
		$sql="SELECT c.fecha_hora,c.numfactura, r.base_imponible,r.imp_retenido,r.descripcion,(r.tipo_impuesto * 100) as impuesto
		FROM detalle_retenciones dt
		INNER JOIN retenciones r
		ON r.idretenciones = dt.idretenciones
		INNER JOIN compromisos c
		ON c.idcompromisos = dt.idcompromisos
		WHERE r.idretenciones = '$idretenciones'";
		return ejecutarConsulta($sql);
	}


	/*-------------------------------------------------------*
	| FUNCION PARA MOSTRAR DETALLES DE RETENCIONES PDF TOP 4 |
	.-------------------------------------------------------*/
	public function pdf_detalle_compromiso($idretenciones)
	{
		$sql="SELECT c.fecha_hora,c.numfactura
		FROM detalle_retenciones dt
		INNER JOIN compromisos c
		ON c.idcompromisos = dt.idcompromisos
        INNER JOIN retenciones r
        ON r.idretenciones = dt.idretenciones
		WHERE r.idretenciones = '$idretenciones'
		limit 4";
		return ejecutarConsulta($sql);
	}


	/*-----------------------------------------------------*
	| FUNCION PARA MOSTRAR CAMPOS DE RETENCIONES PDF POR ID|
	.-----------------------------------------------------*/
	public function pdf_retenciones($idretenciones)
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
		r.estado
		FROM retenciones r
		INNER JOIN proveedores p ON r.idproveedores=p.idproveedores
		WHERE r.idretenciones = '$idretenciones'";
		return ejecutarConsulta($sql);
	}




}

?>

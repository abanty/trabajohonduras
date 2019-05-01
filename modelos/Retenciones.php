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
	public function insertar($idproveedores,$rtn,$numdocumento,$fecha_hora,$tipo_impuesto,$descripcion,
	$base_imponible,$imp_retenido,$total_oc)
	{
		$sqlx="INSERT INTO retenciones (idproveedores,rtn,numdocumento,fecha_hora,tipo_impuesto,descripcion,base_imponible,imp_retenido,total_oc,estado)
		VALUES ('$idproveedores','$rtn','$numdocumento','$fecha_hora','$tipo_impuesto','$descripcion','$base_imponible','$imp_retenido','$total_oc','Aceptado')";
		$idretencionew=ejecutarConsulta_retornarID($sqlx);
		//
		// $num_elementos=0;
		// $sw=true;
		//
		$idcp,´rp = '20';
		// while ($num_elementos < count($idcompromisos))
		// {
			$sql_reten = "INSERT INTO detalle_retenciones(idretenciones,idcompromisos)
			VALUES ('$idretencionew','$idretencionew')";
		return	ejecutarConsulta($sql_reten);


			// ejecutarConsulta($sqlx);

		}




		// return $sw;
	// }

	// //Implementar un método para listar los registros
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

}

?>

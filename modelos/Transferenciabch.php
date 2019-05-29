<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Transferenciabch
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	/*----------------------------------------------------*
	| FUNCION PARA INSERTAR REGISTROS DE MULTIPLES TABLAS |
	.-----------------------------------------------------*/
	public function insertar(
		$idproveedores,
		$idctasbancarias,
		$fecha_hora,
		$tipo_transfbch,
		$serie_transf,
		$num_transf,
		$monto_acreditar,
		$descripcion )
	{
		$sql="INSERT INTO transferenciabch (idproveedores,idctasbancarias,fecha_hora,tipo_transfbch,serie_transf,num_transf,monto_acreditar,descripcion,
		condicion)	VALUES ('$idproveedores','$idctasbancarias','$fecha_hora','$tipo_transfbch','$serie_transf','$num_transf','$monto_acreditar','$descripcion',
		'1')";
		ejecutarConsulta($sql);

		$sql="UPDATE ctasbancarias AS a INNER JOIN transferenciabch as b
		ON a.idctasbancarias = b.idctasbancarias
		SET a.fondos_disponibles = (a.fondos_disponibles-$monto_acreditar)
		WHERE b.idctasbancarias = '$idctasbancarias'";

		return ejecutarConsulta($sql);
	}


	/*--------------------------------*
  | FUNCION PARA ELIMINAR REGISTROS |
  .--------------------------------*/
	public function eliminar($idtransferenciabch)
	{
		$sql="UPDATE ctasbancarias AS a INNER JOIN transferenciabch as b
		ON a.idctasbancarias = b.idctasbancarias
		SET a.fondos_disponibles = (a.fondos_disponibles+b.monto_acreditar)
		WHERE idtransferenciabch='$idtransferenciabch'";
		ejecutarConsulta($sql);

		$sql="DELETE FROM transferenciabch WHERE idtransferenciabch='$idtransferenciabch'";
		return ejecutarConsulta($sql);
	}


	/*----------------------------------*
	| FUNCION PARA DESACTIVAR REGISTROS |
	.-----------------------------------*/
	public function desactivar($idtransferenciabch)
	{
		$sql="UPDATE transferenciabch SET condicion='0' WHERE idtransferenciabch='$idtransferenciabch'";
		return ejecutarConsulta($sql);
	}


	/*--------------------------------*
	|  FUNCION PARA ACTIVAR REGISTROS |
	.--------------------------------*/
	public function activar($idtransferenciabch)
	{
		$sql="UPDATE transferenciabch SET condicion='1' WHERE idtransferenciabch='$idtransferenciabch'";
		return ejecutarConsulta($sql);
	}


	/*-------------------------------*
	| FUNCION PARA MOSTRAR REGISTROS |
	.-------------------------------*/
	public function mostrar($idtransferenciabch)
	{
		$sql="SELECT a.idtransferenciabch,	a.idproveedores,	a.idctasbancarias,	DATE(a.fecha_hora) as fecha, a.tipo_transfbch,	a.serie_transf,
		a.num_transf,	b.cuentapg,	b.numctapg,	c.casa_comercial,	c.tipo_cuenta,	c.nombre_banco,	a.monto_acreditar,	a.descripcion,
		a.condicion
		FROM transferenciabch a
		INNER JOIN ctasbancarias b ON a.idctasbancarias=b.idctasbancarias
		INNER JOIN proveedores c ON a.idproveedores=c.idproveedores
		WHERE a.idtransferenciabch = '$idtransferenciabch'";
		return ejecutarConsultaSimpleFila($sql);
	}


	/*------------------------------*
	| FUNCION PARA LISTAR REGISTROS |
	.-------------------------------*/
	public function listar()
	{
		$sql="SELECT a.idtransferenciabch,a.idproveedores,a.idctasbancarias,DATE(a.fecha_hora) as fecha, a.tipo_transfbch, a.serie_transf,a.num_transf,b.cuentapg,
		b.numctapg,	c.casa_comercial,	c.tipo_cuenta,	c.nombre_banco,	FORMAT(a.monto_acreditar,2) as monto_acreditar,	a.descripcion,
		a.condicion
		FROM transferenciabch a
		INNER JOIN ctasbancarias b ON a.idctasbancarias=b.idctasbancarias
		INNER JOIN proveedores c ON a.idproveedores=c.idproveedores
		ORDER BY a.idtransferenciabch desc";
		return ejecutarConsulta($sql);
	}


	/*---------------------------------------------------------*
	| FUNCION PARA OBTENER EL PRESUPUESTO DE CUENTAS BANCARIAS |
	.---------------------------------------------------------*/
	public function obtenerpresupuesto($idpresupuesto)
	{
		$sql="SELECT	fondos_disponibles FROM ctasbancarias WHERE idctasbancarias = $idpresupuesto";
		return ejecutarConsultaSimpleFila($sql);
	}


	/*--------------------------------------------------------*
	| FUNCION PARA VALIDAR NUMEROS DE TRANSFERENCIA REPETIDOS |
	.---------------------------------------------------------*/
	public function validarnumtransferenciaduplicados()
	{
		$sql="SELECT num_transf FROM transferenciabch";
		return ejecutarConsulta($sql);
	}


	/*------------------------------------------------------------*
	| FUNCION PARA MOSTRAR DATOS DE LA SOLICITUD DE TRANSFERENCIA |
	.-------------------------------------------------------------*/
	public function solicitud_transferencias($sol){
		$sql="SELECT t.idtransferenciabch,t.idproveedores,t.idctasbancarias,t.fecha_hora,t.tipo_transfbch,t.serie_transf,t.num_transf,t.monto_acreditar,
		t.descripcion,t.condicion,p.casa_comercial,p.nombre_banco,p.num_cuenta,p.tipo_cuenta as tp_prov,c.cuentapg,c.bancopg,c.tipoctapg,
		c.numctapg,c.fondos_disponibles
		FROM transferenciabch t
		INNER JOIN proveedores p ON t.idproveedores = p.idproveedores
		INNER JOIN ctasbancarias c ON t.idctasbancarias = c.idctasbancarias
		WHERE t.idtransferenciabch='$sol'";
		return ejecutarConsulta($sql);
	}


}

?>

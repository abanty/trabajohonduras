<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Transferenciabch
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(
		$idproveedores,
		$idctasbancarias,
		$fecha_hora,
		$serie_transf,
		$num_transf,
		$monto_acreditar,
		$descripcion)


	{
		$sql="INSERT INTO transferenciabch (
		idproveedores,
		idctasbancarias,
		fecha_hora,
		serie_transf,
		num_transf,
		monto_acreditar,
		descripcion,
		condicion)
		VALUES (
		'$idproveedores',
		'$idctasbancarias',
		'$fecha_hora',
		'$serie_transf',
		'$num_transf',
		'$monto_acreditar',
		'$descripcion',
		'1')";
		 ejecutarConsulta($sql);


		$sql="UPDATE ctasbancarias AS a INNER JOIN transferenciabch as b
		ON a.idctasbancarias = b.idctasbancarias
		SET a.fondos_disponibles = (a.fondos_disponibles-$monto_acreditar)
		WHERE b.idctasbancarias = '$idctasbancarias'";

		return ejecutarConsulta($sql);

	}

	//Implementamos un método para editar registros
	// public function editar(
	// 	$idtransferenciabch,
	// 	$idproveedores,
	// 	$idctasbancarias,
	// 	$fecha_hora,
	// 	$serie_transf,
	// 	$num_transf,
	// 	$monto_acreditar,
	// 	$descripcion)
	// {


	// 	$sql="SELECT monto_acreditar
	// 	FROM transferenciabch
	// 	WHERE idtransferenciabch='$idtransferenciabch'";
	// 	$monto = ejecutarConsultaSimpleFila($sql);

	// 	$implo = implode ( $monto );

	// 	if($monto_acreditar == $implo){
	// 		// return var_dump($implo);
	// 		$sql="UPDATE transferenciabch SET
	// 		 idproveedores='$idproveedores',
	// 		 idctasbancarias='$idctasbancarias',
	// 		 fecha_hora='$fecha_hora',
	// 		 serie_transf='$serie_transf',
	// 		 num_transf='$num_transf',
	// 		 descripcion='$descripcion'
	// 		 WHERE idtransferenciabch='$idtransferenciabch'";
	// 		 return ejecutarConsulta($sql);
	// 	}
	// 		else{
	// 	$sql="UPDATE transferenciabch SET
	// 	 idproveedores='$idproveedores',
	// 	 idctasbancarias='$idctasbancarias',
	// 	 fecha_hora='$fecha_hora',
	// 	 serie_transf='$serie_transf',
	// 	 num_transf='$num_transf',
	// 	 monto_acreditar='$monto_acreditar',
	// 	 descripcion='$descripcion'
	// 	 WHERE idtransferenciabch='$idtransferenciabch'";
	// 	  ejecutarConsulta($sql);

	// 	   $sql="UPDATE ctasbancarias AS a INNER JOIN transferenciabch as b
	// 	ON a.idctasbancarias = b.idctasbancarias
	// 	SET a.fondos_disponibles = (a.fondos_disponibles-$monto_acreditar)
	// 	WHERE b.idctasbancarias = '$idctasbancarias'";

	// 	return ejecutarConsulta($sql);
	// 	}

	// }

	//Implementamos un método para eliminar categorías
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

	//Implementamos un método para desactivar registros
	public function desactivar($idtransferenciabch)
	{
		$sql="UPDATE transferenciabch SET condicion='0' WHERE idtransferenciabch='$idtransferenciabch'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idtransferenciabch)
	{
		$sql="UPDATE transferenciabch SET condicion='1' WHERE idtransferenciabch='$idtransferenciabch'";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para mostrar los datos de un registro a modificar

	// public function mostrar($idtransferenciabch)
	// {
	// 	$sql="SELECT * FROM transferenciabch WHERE idtransferenciabch='$idtransferenciabch'";
	// 	return ejecutarConsultaSimpleFila($sql);
	// }




	public function mostrar($idtransferenciabch)
	{
		$sql="SELECT
		a.idtransferenciabch,
		a.idproveedores,
		a.idctasbancarias,
		DATE(a.fecha_hora) as fecha,
		a.serie_transf,
		a.num_transf,
		b.cuentapg,
		b.numctapg,
		c.casa_comercial,
		c.tipo_cuenta,
		c.nombre_banco,
		a.monto_acreditar,
		a.descripcion,
		a.condicion FROM transferenciabch a INNER JOIN ctasbancarias b ON a.idctasbancarias=b.idctasbancarias INNER JOIN proveedores c ON a.idproveedores=c.idproveedores WHERE a.idtransferenciabch = '$idtransferenciabch'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT
		a.idtransferenciabch,
		a.idproveedores,
		a.idctasbancarias,
		DATE(a.fecha_hora) as fecha,
		a.serie_transf,
		a.num_transf,
		b.cuentapg,
		b.numctapg,
		c.casa_comercial,
		c.tipo_cuenta,
		c.nombre_banco,
		FORMAT(a.monto_acreditar,2) as monto_acreditar,
		a.descripcion,
		a.condicion FROM transferenciabch a INNER JOIN ctasbancarias b ON a.idctasbancarias=b.idctasbancarias INNER JOIN proveedores c ON a.idproveedores=c.idproveedores ORDER BY a.idtransferenciabch desc";
		return ejecutarConsulta($sql);
	}


	public function obtenerpresupuesto($idpresupuesto)
	{
		$sql="SELECT	fondos_disponibles FROM ctasbancarias WHERE idctasbancarias = $idpresupuesto";
		return ejecutarConsultaSimpleFila($sql);
	}

		//Implementar un método para listar los registros activos
	// public function listarActivos()
	// {
	// 	$sql="SELECT
	// 	a.idtransferenciabch,
	// 	a.idproveedores,
	// 	a.idctasbancarias,
	// 	DATE(a.fecha_hora) as fecha,
	// 	a.serie_transf,
	// 	a.num_transf,
	// 	b.cuentapg,
	// 	b.numctapg,
	// 	FORMAT(a.monto_debitar,2) as monto_debitar,
	// 	c.casa_comercial,
	// 	c.tipo_cuenta,
	// 	c.nombre_banco,
	// 	FORMAT(a.monto_acreditar,2) as monto_acreditar,
	// 	a.descripcion,
	// 	a.condicion FROM transferenciabch a INNER JOIN ctasbancarias b ON a.idctasbancarias=b.idctasbancarias INNER JOIN proveedores c ON a.idproveedores=c.idproveedores WHERE a.condicion='1'";
	// 	return ejecutarConsulta($sql);
	// }



	// public function transferenciabchcabecera($idtransferenciabch){
	// 	$sql="SELECT
	// 	a.idtransferenciabch,
	// 	a.idproveedores,
	// 	a.idctasbancarias,
	// 	DATE(a.fecha_hora) as fecha,
	// 	a.serie_transf,
	// 	a.num_transf,
	// 	b.cuentapg,
	// 	b.numctapg,
	// 	FORMAT(a.monto_debitar,2) as monto_debitar,
	// 	c.casa_comercial,
	// 	c.tipo_cuenta,
	// 	c.nombre_banco,
	// 	FORMAT(a.monto_acreditar,2) as monto_acreditar,
	// 	a.descripcion,
	// 	a.condicion FROM transferenciabch a INNER JOIN ctasbancarias b ON a.idctasbancarias=b.idctasbancarias INNER JOIN proveedores c ON a.idproveedores=c.idproveedores
	// 	WHERE a.idtransferenciabch='$idtransferenciabch'";
	// 	return ejecutarConsulta($sql);
	// }

	// public function ventadetalle($idventa){
	// 	$sql="
	// 	SELECT
	// 	a.nombre as articulo,
	// 	a.codigo,
	// 	d.cantidad,
	// 	d.precio_venta,
	// 	d.descuento,(d.cantidad*d.precio_venta-d.descuento) as subtotal FROM detalle_venta d INNER JOIN articulo a ON d.idarticulo=a.idarticulo WHERE d.idventa='$idventa'";
	// 	return ejecutarConsulta($sql);
	// }

		// public function sumar_a_ctas ($valor, $idcta){
		// 	$sql = "UPDATE ctasbancarias SET fondos_disponibles = (fondos_disponibles+60000) WHERE idctasbancarias = 1";
		// 	return ejecutarConsulta($sql);
		// }
}
?>

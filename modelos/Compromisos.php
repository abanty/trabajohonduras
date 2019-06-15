<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

/**
 *
 */
/*------------------*
| CLASE COMPROMISOS |
.------------------*/
Class Compromisos
{
	//Implementamos nuestro constructor
	public function __construct()
	{
		// Empty
	}

		/*-------------------------------------------*
		| FUNCION PARA INSERTAR DATOS DEL COMPROMISO |
		.-------------------------------------------*/
		  public function insertar(
				$idprograma,
				$idproveedores,
				$fecha_hora,
				$tipo_registro,
				$numfactura,
				$total_compra,
				$condicion,
				$idpresupuesto_disponible,
				$valor)
				{
				$sql="INSERT INTO compromisos (idprograma,idproveedores,fecha_hora,fecha_registro,tipo_registro,numfactura,total_compra,condicion)
							VALUES ('$idprograma','$idproveedores','$fecha_hora',CURRENT_TIMESTAMP,'$tipo_registro','$numfactura','$total_compra','$condicion')";

				$idingresonew=ejecutarConsulta_retornarID($sql);

				$num_elementos=0;
				$sw=true;

				while ($num_elementos < count($idpresupuesto_disponible))
				{
					$sql_detalle = "INSERT INTO detalle_compromisos(idcompromisos,idpresupuesto_disponible,valor,condicion)
												  VALUES ('$idingresonew','$idpresupuesto_disponible[$num_elementos]','$valor[$num_elementos]','0')";
					ejecutarConsulta($sql_detalle) or $sw = false;
					$num_elementos=$num_elementos + 1;
				}

			return $sw;
		}


		/*---------------------------------------------------------*
		| FUNCION PARA EDITAR DATOS DEL COMPROMISO POR TABLA CELLS |
		.---------------------------------------------------------*/
		 public function modificardatos($id,$columna_nombre,$valor)
			 {
				 $sql_update = "UPDATE compromisos SET ".$columna_nombre."='".$valor."' WHERE idcompromisos = '".$id."'";

							return ejecutarConsulta($sql_update);
			 }


		/*-----------------------------------------*
		| FUNCION PARA EDITAR DATOS DEL COMPROMISO |
		.-----------------------------------------*/
			public function editar(
				$idcompromisos,
				$idprograma,
				$idproveedores,
				$fecha_hora,
				$numfactura,
				$total_compra,
				$condicion)
			{
				$sql="UPDATE compromisos SET idprograma='$idprograma',idproveedores='$idproveedores',fecha_hora='$fecha_hora',numfactura='$numfactura',
				total_compra='$total_compra',condicion='$condicion'
				 			WHERE idcompromisos='$idcompromisos'";
				return ejecutarConsulta($sql);
			}


	/*-------------------------------------------*
	| FUNCION PARA ELIMINAR DATOS DEL COMPROMISO |
	.-------------------------------------------*/
			public function eliminar($idcompromisos)
				{
					$sql="DELETE FROM compromisos WHERE idcompromisos='$idcompromisos'";
					 ejecutarConsulta($sql);
					$sql="DELETE FROM detalle_compromisos WHERE idcompromisos='$idcompromisos'";
					return ejecutarConsulta($sql);
				}


	/*-------------------------------*
	| FUNCION PARA PAGAR COMPROMISOS |
	.-------------------------------*/
			public function pagado($idcompromisos)
			{
				$sql="UPDATE compromisos SET condicion='2' WHERE idcompromisos='$idcompromisos'";
				return ejecutarConsulta($sql);
			}


	/*----------------------------------*
	| FUNCION PARA TRAMITAR COMPROMISOS |
	.----------------------------------*/
			public function tramitar($idcompromisos)
			{
				$sql="UPDATE compromisos SET condicion='3' WHERE idcompromisos='$idcompromisos'";
				return ejecutarConsulta($sql);
			}


	/*-------------------------------------*
	| FUNCION PARA DESTRAMITAR COMPROMISOS |
	.-------------------------------------*/
	public function destramitar($idcompromisos)
			{
				$sql="UPDATE compromisos SET condicion='0' WHERE idcompromisos='$idcompromisos'";
				return ejecutarConsulta($sql);
			}


	/*--------------------------------------------------------*
	| FUNCION PARA VALIDAR NUMEROS DE TRANSFERENCIA REPETIDOS |
	.---------------------------------------------------------*/
	public function validarnumfacturasduplicadas()
	{
		$sql="SELECT numfactura FROM compromisos";
		return ejecutarConsulta($sql);
	}


	/*---------------------------------*
	| FUNCION PARA MOSTRAR COMPROMISOS |
	.---------------------------------*/
	public function mostrar($idcompromisos)
	{
		$sql="SELECT
					 q.idcompromisos,
					 DATE(q.fecha_hora) as fecha,
					 q.tipo_registro,
					 q.idprograma,
					 w.nombrep as programa,
					 q.idproveedores,
					 e.casa_comercial as proveedor,
					 q.numfactura,
					 q.total_compra,
					 q.condicion
					FROM compromisos as q INNER JOIN programa as w
					ON q.idprograma=w.idprograma
					INNER JOIN proveedores as e
					ON q.idproveedores = e.idproveedores WHERE idcompromisos='$idcompromisos'";
		return ejecutarConsultaSimpleFila($sql);
	}


	/*----------------------------------------------*
	| FUNCION PARA LISTAR EL DETALLE DE COMPROMISOS |
	.----------------------------------------------*/
	public function listarDetalle($idcompromisos)
	{
		$sql="SELECT
		dc.idcompromisos,
		dc.idpresupuesto_disponible,
		r.nombre_objeto,
		r.codigo,
		dc.valor as valor
		FROM detalle_compromisos dc INNER JOIN presupuesto_disponible r ON
		dc.idpresupuesto_disponible=r.idpresupuesto_disponible
		WHERE dc.idcompromisos='$idcompromisos'";
		return ejecutarConsulta($sql);
	}


	/*--------------------------------*
	| FUNCION PARA LISTAR COMPROMISOS |
	.--------------------------------*/
	public function listar()
	{
		$sql="SELECT
					 q.idcompromisos,
					 DATE(q.fecha_hora) as fecha,
					 DATE(q.fecha_registro) as fechareg,
					 q.tipo_registro,
					 q.idprograma,
					 w.nombrep as programa,
					 q.idproveedores,
					 e.casa_comercial as proveedor,
					 q.numfactura,
					 FORMAT(q.total_compra,2) as total_compra,
					 q.condicion
					FROM compromisos as q INNER JOIN programa as w
					ON q.idprograma=w.idprograma
					INNER JOIN proveedores as e
					ON q.idproveedores = e.idproveedores ORDER BY q.idcompromisos desc";
		return ejecutarConsulta($sql);
	}


	/*--------------------------------------------*
	| FUNCION PARA LISTAR COMPROMISOS ALTERNATIVO |
	.--------------------------------------------*/
	public function listarCompromisos()
	{
		$sql="SELECT
			    c.idcompromisos,
			    c.idprograma,
			    c.idproveedores,
			    c.fecha_hora,
					c.tipo_registro,
			    c.numfactura,
			    c.total_compra,
			    c.condicion,
			    pgr.codigop,
			    pgr.codigop,
			    pr.casa_comercial as proveedor
					FROM
					    compromisos c
					INNER JOIN programa pgr ON
					    c.idprograma = pgr.idprograma
					INNER JOIN proveedores pr ON
					    c.idproveedores = pr.idproveedores
					WHERE
			    c.condicion in (1,3)";
		return ejecutarConsulta($sql);
	}
}

?>

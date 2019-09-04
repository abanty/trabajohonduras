<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Transferidoctaspg
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(

		$idusuario,
		$fecha_hora,
		$numexpediente,
		$numtransferencia,
		$valor_transferido,



		$idtransferidoctaspg,
		$idctasbancarias,
		$num_precompromiso,
		$valor)
	{
		$sql="INSERT INTO transferidoctaspg (
		idusuario,
		fecha_hora,
		numexpediente,
		numtransferencia,
		valor_transferido,
		estado)
		VALUES (
		'$idusuario',
		'$fecha_hora',
		'$numexpediente',
		'$numtransferencia',
		'$valor_transferido',
		'Aceptado')";
		//return ejecutarConsulta($sql);
		$idtransferidoctaspgnew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		// $total = (int)$valor_transferido;
		// $idpresupuesto = (int)$idctasbancarias;



		if($idtransferidoctaspgnew!=0){

		while ($num_elementos < count($idctasbancarias))
		{
			$idpresupuesto = (int)$idctasbancarias[$num_elementos];

			$sql= " UPDATE ctasbancarias
					SET `fondos_disponibles` = (fondos_disponibles + '$valor[$num_elementos]')
					WHERE `idctasbancarias` = $idctasbancarias[$num_elementos]";
			ejecutarConsulta($sql);

			$sql_detalle = "INSERT INTO dtransf_ctaspg(
			idtransferidoctaspg,
			idctasbancarias,
			num_precompromiso,
			valor)
			VALUES (
			'$idtransferidoctaspgnew',
			'$idctasbancarias[$num_elementos]',
			'$num_precompromiso[$num_elementos]',
			'$valor[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}return $sw;



	}else
	{
		return false;
	}


	}



	//Implementamos un método para anular categorías
	public function anular($idtransferidoctaspg)
	{
		$sql="UPDATE ctasbancarias as a INNER JOIN dtransf_ctaspg b
			on a.idctasbancarias = b.idctasbancarias
			INNER JOIN transferidoctaspg c on c.idtransferidoctaspg=b.idtransferidoctaspg
			SET a.fondos_disponibles = (a.fondos_disponibles-c.valor_transferido)
			WHERE c.idtransferidoctaspg=$idtransferidoctaspg";
			ejecutarConsulta($sql);
		$sql="DELETE FROM dtransf_ctaspg WHERE idtransferidoctaspg='$idtransferidoctaspg'";
		 ejecutarConsulta($sql);
		$sql="DELETE FROM transferidoctaspg WHERE idtransferidoctaspg='$idtransferidoctaspg'";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idtransferidoctaspg)
	{
		$sql="SELECT i.idtransferidoctaspg,DATE(i.fecha_hora) as fecha,u.nombre as usuario,i.tipo_transf,
		i.numexpediente,i.numtransferencia,FORMAT(i.valor_transferido, 2) as valor_transferido,i.estado
		FROM transferidoctaspg i 	INNER JOIN usuario u ON
		i.idusuario=u.idusuario
		WHERE i.idtransferidoctaspg='$idtransferidoctaspg'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarDetalle($idtransferidoctaspg)
	{
		$sql="
		SELECT
		di.idtransferidoctaspg,
		di.idctasbancarias,
		a.cuentapg,
		a.bancopg,
		a.tipoctapg,
		a.numctapg,
		di.num_precompromiso,
		di.valor as valor
		FROM dtransf_ctaspg di INNER JOIN ctasbancarias a on
		di.idctasbancarias=a.idctasbancarias
		where di.idtransferidoctaspg='$idtransferidoctaspg'";
		return ejecutarConsulta($sql);
	}



	//Implementar un método para listar los registros
	public function tipotransf($idtransferidoctaspg)
	{
		$sql="	SELECT tipo_transf FROM transferidoctaspg WHERE idtransferidoctaspg = '$idtransferidoctaspg'";
		return ejecutarConsulta($sql);
	}




	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="
		SELECT
		i.idtransferidoctaspg,
		DATE(i.fecha_hora) as fecha,
		u.nombre as usuario,
		i.numexpediente,
		i.numtransferencia,
		FORMAT(i.valor_transferido, 2) as valor_transferido,
		i.estado
		FROM transferidoctaspg i 	INNER JOIN usuario u ON
		i.idusuario=u.idusuario
		ORDER BY i.idtransferidoctaspg desc";

		return ejecutarConsulta($sql);
	}

}

?>

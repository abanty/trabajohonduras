<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ingreso
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario,$tipo_presupuesto,$fecha_hora,$numf01,$total_importe,$idpresupuesto_disponible,$anypres,$actividad,$monto)
	{
		$sql="INSERT INTO ingreso (idusuario, tipo_presupuesto, fecha_hora,	numf01,	total_importe,	estado)
		VALUES ('$idusuario','$tipo_presupuesto','$fecha_hora','$numf01','$total_importe','Aceptado')";
		//return ejecutarConsulta($sql);
		$idingresonew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		switch ($tipo_presupuesto) {
			case 'siafi':
				$var = 'pres_siafi';
			break;

			case 'inicial':
				$var = 'pres_inicial';
			break;

			case 'disminuciones':
				$var = 'pres_disminuciones';
			break;

			case 'congelamientos':
				$var = 'pres_congelamientos';
			break;

			case 'aumentos':
				$var = '	pres_aumentos';
			break;

			default:
				// code...
				break;
		}

		while ($num_elementos < count($idpresupuesto_disponible))
		{
			$sql_detalle = "INSERT INTO detalle_ingreso(idingreso,idpresupuesto_disponible,$var,actividad,monto)
			VALUES ('$idingresonew','$idpresupuesto_disponible[$num_elementos]','$anypres[$num_elementos]','$actividad[$num_elementos]','$monto[$num_elementos]')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;

		}

		return $sw;
	}


	//Implementamos un método para anular categorías
	public function anular($idingreso)
	{
		$sql="UPDATE presupuesto_disponible as a INNER JOIN detalle_ingreso b
			on a.idpresupuesto_disponible = b.idpresupuesto_disponible
			INNER JOIN ingreso c on c.idingreso=b.idingreso
			SET a.fondos_disponibles = (a.fondos_disponibles-b.monto)
			WHERE c.idingreso=$idingreso and b.idpresupuesto_disponible = a.idpresupuesto_disponible";
			ejecutarConsulta($sql);
		$sql="DELETE FROM ingreso WHERE idingreso='$idingreso'";
		 ejecutarConsulta($sql);
		$sql="DELETE FROM detalle_ingreso WHERE idingreso='$idingreso'";
		return ejecutarConsulta($sql);

	}
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idingreso)
	{
		$sql="SELECT i.idingreso,DATE(i.fecha_hora) as fecha,u.nombre as usuario,i.numf01,FORMAT(i.total_importe, 2) as total_importe,i.estado
		FROM ingreso i 	INNER JOIN usuario u ON
		i.idusuario=u.idusuario
		WHERE i.idingreso='$idingreso'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarDetalle($idingreso)
	{
		$sql="
		SELECT
		di.idingreso,
		di.idpresupuesto_disponible,
		a.nombre_objeto,
		a.codigo,
		di.monto as monto
		FROM detalle_ingreso di INNER JOIN presupuesto_disponible a on
		di.idpresupuesto_disponible=a.idpresupuesto_disponible
		where di.idingreso='$idingreso'";
		return ejecutarConsulta($sql);
	}


	public function listaPresupuestoDetallado(){
		$sql="SELECT di.idpresupuesto_disponible,YEAR(i.fecha_hora) as fecha_hora,pd.nombre_objeto,pd.grupo,pd.subgrupo,pd.codigo,sum(di.pres_inicial) as pres_init,
		sum(di.pres_siafi) as pres_siafi,sum(di.pres_congelamientos) as pres_cong,sum(di.pres_aumentos) as pres_aum,
		sum(di.pres_disminuciones) as pres_dis,sum(di.monto) as monto
		FROM detalle_ingreso di INNER JOIN ingreso i ON di.idingreso = i.idingreso
		INNER JOIN presupuesto_disponible pd ON di.idpresupuesto_disponible = pd.idpresupuesto_disponible
		GROUP BY di.idpresupuesto_disponible,YEAR(i.fecha_hora)";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="
		SELECT
		i.idingreso,
		DATE(i.fecha_hora) as fecha,

		u.nombre as usuario,
		i.numf01,
		FORMAT(i.total_importe, 2) as total_importe,
		i.estado


		FROM ingreso i 	INNER JOIN usuario u ON
		i.idusuario=u.idusuario
		ORDER BY i.idingreso desc";

		return ejecutarConsulta($sql);
	}

}

?>

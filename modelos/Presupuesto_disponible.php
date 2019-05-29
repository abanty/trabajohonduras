<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Presupuesto_disponible
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre_objeto,$grupo,$subgrupo,$codigo,$presupuesto_anual,$fondos_disponibles)
	{
		$sql="INSERT INTO presupuesto_disponible (nombre_objeto,grupo,subgrupo,codigo,presupuesto_anual,fondos_disponibles,condicion)
		VALUES ('$nombre_objeto','$grupo','$subgrupo','$codigo','$presupuesto_anual','$fondos_disponibles','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idpresupuesto_disponible,$nombre_objeto,$grupo,$subgrupo,$codigo,$presupuesto_anual,$fondos_disponibles)
	{
		$sql="UPDATE presupuesto_disponible SET nombre_objeto='$nombre_objeto', grupo='$grupo', subgrupo='$subgrupo', codigo='$codigo',
		presupuesto_anual='$presupuesto_anual', fondos_disponibles='$fondos_disponibles' WHERE idpresupuesto_disponible='$idpresupuesto_disponible'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idpresupuesto_disponible)
	{
		$sql="UPDATE presupuesto_disponible SET condicion='0' WHERE idpresupuesto_disponible='$idpresupuesto_disponible'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idpresupuesto_disponible)
	{
		$sql="UPDATE presupuesto_disponible SET condicion='1' WHERE idpresupuesto_disponible='$idpresupuesto_disponible'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpresupuesto_disponible)
	{
		$sql="SELECT * FROM presupuesto_disponible WHERE idpresupuesto_disponible='$idpresupuesto_disponible'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idpresupuesto_disponible,	nombre_objeto,	codigo,	grupo,subgrupo,FORMAT( presupuesto_anual, 2) as presupuesto_anual,
		FORMAT( fondos_disponibles, 2) as fondos_disponibles,	condicion
		FROM presupuesto_disponible";
		return ejecutarConsulta($sql);
	}

		//Implementar un método para listar los registros activos
	public function listarPresupuestoActivos()
	{
		$sql="SELECT idpresupuesto_disponible, nombre_objeto,	grupo, subgrupo, codigo,
		FORMAT( presupuesto_anual, 2) as presupuesto_anual,
		FORMAT( fondos_disponibles, 2) as fondos_disponibles,
		condicion
		FROM presupuesto_disponible
		WHERE condicion='1'";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosAdministar_ordenes()
	{
		$sql="SELECT
		idpresupuesto_disponible,
		nombre_objeto,
		codigo,
		fondos_disponibles,
		    (SELECT monto FROM detalle_ingreso WHERE idpresupuesto_disponible=a.idpresupuesto_disponible order by iddetalle_ingreso desc limit 0,1) as monto, c.nombre_objeto,c.codigo,a.condicion FROM presupuesto_disponible a INNER JOIN presupuesto_anual c ON a.idpresupuesto_anual=c.idpresupuesto_anual WHERE a.condicion='1'";
		return ejecutarConsulta($sql);
	}
}

?>

<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Proveedores
{
  //Implementamos nuestro constructor
  public function __construct()
  {

  }

  /*--------------------------------*
  | FUNCION PARA INSERTAR REGISTROS |
  .--------------------------------*/
  public function insertar(
    $casa_comercial,
    $rtn,
    $nombre_banco,
    $num_cuenta,
    $tipo_cuenta,
    $imagen)
  {
    $sql="INSERT INTO proveedores(casa_comercial,rtn,nombre_banco,num_cuenta,tipo_cuenta,imagen,condicion)
    VALUES ('$casa_comercial','$rtn','$nombre_banco','$num_cuenta','$tipo_cuenta','$imagen','1')";
    return ejecutarConsulta($sql);
  }


  /*------------------------------*
  | FUNCION PARA EDITAR REGISTROS |
  .-------------------------------*/
  public function editar(
    $idproveedores,
    $casa_comercial,
    $rtn,
    $nombre_banco,
    $num_cuenta,
    $tipo_cuenta,
    $imagen)
  {
    $sql="UPDATE proveedores SET casa_comercial='$casa_comercial',rtn='$rtn',nombre_banco='$nombre_banco',num_cuenta='$num_cuenta',
    tipo_cuenta='$tipo_cuenta',imagen='$imagen'
    WHERE idproveedores='$idproveedores'";
    return ejecutarConsulta($sql);
  }


  /*----------------------------------*
  | FUNCION PARA DESACTIVAR REGISTROS |
  .----------------------------------*/
  public function desactivar($idproveedores)
  {
    $sql="UPDATE proveedoresSET condicion='0' WHERE idproveedores='$idproveedores'";
    return ejecutarConsulta($sql);
  }


  /*-------------------------------*
  | FUNCION PARA ACTIVAR REGISTROS |
  .-------------------------------*/
  public function activar($idproveedores)
  {
    $sql="UPDATE proveedoresSET condicion='1' WHERE idproveedores='$idproveedores'";
    return ejecutarConsulta($sql);
  }


  /*----------------------------------*
	| FUNCION PARA MOSTRAR FILAS POR ID |
	.-----------------------------------*/
  public function mostrar($idproveedores)
  {
    $sql="SELECT * FROM proveedores WHERE idproveedores='$idproveedores'";
    return ejecutarConsultaSimpleFila($sql);
  }


  /*--------------------------------*
	| FUNCION PARA LISTAR PROVEEDORES |
	.---------------------------------*/
  public function select_proveedor()
  {
    $sql="SELECT * FROM proveedores where condicion=1 and idproveedores not in (1)";
    return ejecutarConsulta($sql);
  }


  /*------------------------------*
  | FUNCION PARA LISTAR REGISTROS |
  .-------------------------------*/
  public function listar()
  {
    $sql="SELECT * FROM proveedores WHERE idproveedores NOT IN (1)";
    return ejecutarConsulta($sql);
  }


  /*---------------------------------------*
  | FUNCION PARA TRAER DATOS DEL PROVEEDOR |
  .----------------------------------------*/
  public function get_rtn_proveedor($idproveedores)
  {
    $sql="SELECT rtn FROM proveedores WHERE idproveedores='$idproveedores'";
    return ejecutarConsultaSimpleFila($sql);
  }
}

?>

<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Proveedores
{
  //Implementamos nuestro constructor
  public function __construct()
  {

  }

  //Implementamos un método para insertar registros
  public function insertar(
    $casa_comercial,
    $rtn,
    $nombre_banco,

    $num_cuenta,
    $tipo_cuenta,
    $imagen)
  {
    $sql="INSERT INTO proveedores(
    casa_comercial,
    $nombre_banco,
    $rtn,
    num_cuenta,
    tipo_cuenta,
    imagen,
    condicion)
    VALUES (
    '$casa_comercial',
    '$rtn',
    '$nombre_banco',

    '$num_cuenta',
    '$tipo_cuenta',
    '$imagen',
    '1')";
    return ejecutarConsulta($sql);
  }

  //Implementamos un método para editar registros
  public function editar(
    $idproveedores,
    $casa_comercial,
    $rtn,
    $nombre_banco,

    $num_cuenta,
    $tipo_cuenta,
    $imagen)
  {
    $sql="
    UPDATE proveedores
    SET
    casa_comercial='$casa_comercial',
    rtn='$rtn',
    nombre_banco='$nombre_banco',

    num_cuenta='$num_cuenta',
    tipo_cuenta='$tipo_cuenta',
    imagen='$imagen'
    WHERE idproveedores='$idproveedores'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un método para desactivar registros
  public function desactivar($idproveedores)
  {
    $sql="UPDATE proveedoresSET condicion='0' WHERE idproveedores='$idproveedores'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un método para activar registros
  public function activar($idproveedores)
  {
    $sql="UPDATE proveedoresSET condicion='1' WHERE idproveedores='$idproveedores'";
    return ejecutarConsulta($sql);
  }

  //Implementar un método para mostrar los datos de un registro a modificar
  public function mostrar($idproveedores)
  {
    $sql="SELECT * FROM proveedores WHERE idproveedores='$idproveedores'";
    return ejecutarConsultaSimpleFila($sql);
  }
//Implementar un método para listar los registros y mostrar en el select
  public function select_proveedor()
  {
    $sql="SELECT * FROM proveedores where condicion=1";
    return ejecutarConsulta($sql);
  }
  //Implementar un método para listar los registros
  public function listar()
  {
    $sql="SELECT * FROM proveedores";
    return ejecutarConsulta($sql);
  }
}

?>

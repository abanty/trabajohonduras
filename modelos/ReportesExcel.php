<?php

require "../config/Conexion.php";

Class ReportesExcel
{

  public function __construct()
  {
    // Empty
  }


  /*-----------------------------------------------*
  | FUNCION REPORTE DE COMPROMISOS POR PROVEEDORES |
  .-----------------------------------------------*/
  public function compromisosprovedores(){

    $sqlexcel = "SELECT DATE(c.fecha_hora) as fecha, c.tipo_registro, c.idprograma,
		p.nombrep, pr.casa_comercial, c.numfactura, c.total_compra, DATE(c.fecha_registro) as fecharegistro,
		c.condicion
		FROM compromisos c
		INNER JOIN programa p ON p.idprograma = c.idprograma
		INNER JOIN proveedores pr ON pr.idproveedores = c.idproveedores
		WHERE c.condicion NOT IN (2,3)
    ORDER BY fecha asc";
    return ejecutarConsulta($sqlexcel);

  }

  /*-----------------------------------------------*
  | FUNCION REPORTE DE COMPROMISOS POR PROVEEDORES |
  .-----------------------------------------------*/
  public function compromisosrenglones(){

    $sqlexcel = "SELECT DATE(c.fecha_hora) as fecha, c.tipo_registro, c.idprograma,
    p.nombrep, pr.casa_comercial, c.numfactura, c.total_compra, DATE(c.fecha_registro) as fecharegistro,
    c.condicion
    FROM compromisos c
    INNER JOIN programa p ON p.idprograma = c.idprograma
    INNER JOIN proveedores pr ON pr.idproveedores = c.idproveedores
    WHERE c.condicion NOT IN (2,3)
    ORDER BY fecha asc";
    return ejecutarConsulta($sqlexcel);

  }


}
?>

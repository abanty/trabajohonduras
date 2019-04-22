<?php
//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1)
  session_start();

if (!isset($_SESSION["nombre"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['admonoc']==1)
{
//Incluímos el archivo Factura.php
require('ExSolicitudbch.php');

//Establecemos los datos de la empresa
$logo1 = "logo1.jpg";
$ext_logo1 = "jpg";
$logo2 = "logo2.jpg";
$ext_logo2 = "jpg";

//Obtenemos los datos de la cabecera de la comprobante actual
require_once "../modelos/Transferenciabch.php";
$solicitud= new Transferenciabch();

$rsptac = $solicitud->solicitud_transferencias($_GET["id"]);
//Recorremos todos los valores obtenidos
$regv = $rsptac->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();

//Enviamos los datos de la empresa al método adsdSociete de la clase Factura
$pdf->titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2);

$pdf->addClientAdresse($regv->fecha_hora, $regv->num_transf, $regv->numctapg, $regv->cuentapg , $regv->monto_acreditar,
$regv->tp_prov, $regv->num_cuenta, $regv->nombre_banco ,$regv->descripcion);

//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_acreditar,"\n"."LEMPIRAS EXACTAS"));
$pdf->addCadreTVAs($con_letra);

$pdf->Output('Solicitud de Transferencias.pdf','I');
$pdf->Close();

}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>

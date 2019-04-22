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
require('Orden.php');

//Establecemos los datos de la empresa
// $logo = "logobra.jpg";
// $ext_logo = "jpg";
$tittle1 = "SECRETARIA DE ESTADO EN EL DESPACHO DE DEFENSA NACIONAL";
$tittle2 = "FUERZAS ARMADAS DE HONDURAS";
$tittle3 = "FUERZA NAVAL DE HONDURAS";
$tittle4 = "ORDEN DE COMPRA";

//Obtenemos los datos de la cabecera de la venta actual
require_once "../modelos/Administrar_ordenes.php";
$venta= new Administrar_ordenes();
$rsptav = $venta->administrar_ordenes_cabecera($_GET["id"]);
//Recorremos todos los valores obtenidos
$regv = $rsptav->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'Letter' );
$pdf->AddPage();

//Enviamos los datos de la empresa al método adsdSociete de la clase Factura
$pdf->addSociete(utf8_decode($tittle1),utf8_decode($tittle2),utf8_decode($tittle3),utf8_decode($tittle4));



$pdf->fact_dev("O/C No."," $regv->num_orden-$regv->num_comprobante" );
// $pdf->temporaire( "ORDER DE COMPRA" );
$pdf->addDate_MontoGeneral_TituloOrden($regv->fecha,$regv->monto_total,$regv->titulo_orden );

//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv->proveedor),utf8_decode($regv->programa),utf8_decode($regv->proveedor));

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "Cod"=>14,
             "Unidad"=>15,
             "Cantidad"=>17,
             "Descripcion"=>81,
             "P.Unitario"=>25,
             "SubTotal"=>22,
             "Total"=>22);
$pdf->addCols( $cols);
$cols=array( "Cod"=>"L",
             "Unidad"=>"C",
             "Cantidad"=>"C",
            "Descripcion"=>"C",
             "P.Unitario"=>"C",
             "SubTotal"=>"C",
           "Total"=>"C");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 61;

//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->administrar_ordenes_detalle($_GET["id"]);

while ($regd = $rsptad->fetch_object()) {
  $line = array( "Cod"=> "$regd->codigo",
                "Unidad"=> utf8_decode("$regd->unidad"),
                "Cantidad"=> "$regd->cantidad",
                "Descripcion" => utf8_decode("$regd->descripcion"),
                "P.Unitario"=> number_format("$regd->precio_unitario", 2, '.', ','),
                "SubTotal"=> number_format("$regd->subtot", 2, '.', ','),
                "Total"=> number_format("$regd->subtot", 2, '.', ','));
                // ,
                // "Total"=> "$regv->monto_total"
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
}

//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_total,"\n"."LEMPIRAS EXACTOS"));
$pdf->addCadreTVAs("*** ".$con_letra,$regv->descripcion_orden);

//Mostramos el impuesto
$pdf->addTVAs( $regv->subtotal_origen,$regv->descuento_total,$regv->subtotal, $regv->impuesto, $regv->monto_total,"");

$var="";
if ($regv->tipo_impuesto="0.15") {
  $var = "ISV";
}else {
  $var = "ISR";
}

$pdf->addCadreEurosFrancs("$var"." $regv->tipo_impuesto %");
$pdf->Output('Documento de Orden.pdf','I');
$pdf->Close();


}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>

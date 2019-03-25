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
require('exComprobante.php');

//Establecemos los datos de la empresa
// $logo = "logobra.jpg";
// $ext_logo = "jpg";
$tittle1 = "SECRETARIA DE ESTADO EN EL DESPACHO DE DEFENSA NACIONAL";
$tittle2 = "FUERZAS ARMADAS DE HONDURAS";
$tittle3 = "FUERZA NAVAL DE HONDURAS";
$tittle4 = "COMPROBANTE DE PAGO";
$tittle5 = "De conformidad a las Facturas, Recibidas de más documentos que se adjuntan se le está :";
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
$pdf->titulos_encabezados(utf8_decode($tittle1),utf8_decode($tittle2),utf8_decode($tittle3),utf8_decode($tittle4),utf8_decode($tittle5));



// $pdf->fact_dev("O/C No."," $regv->num_orden-$regv->num_comprobante" );
// $pdf->temporaire( "ORDER DE COMPRA" );
// $pdf->addDate_MontoGeneral_TituloOrden($regv->fecha,$regv->monto_total,$regv->titulo_orden );

//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv->proveedor),utf8_decode($regv->programa),utf8_decode($regv->proveedor));

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "Factura"=>21,
             "Fecha"=>20,
             "Valor"=>25,
            );
$pdf->addCols( $cols);

// $pdf->addLineFormat( $cols);



// SEGUNDA COLUMNA DETALLES Factura



$cols2=array( "Factura"=>21,
             "Fecha"=>20,
             "Valor"=>25,
            );
$pdf->addCols2( $cols2);

// $pdf->addLineFormat( $cols2);



//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 85;


$y2= 85;
// listarFactura_orden
//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->administrar_ordenes_detalle($_GET["id"]);

$rsptad2 = $venta->administrar_ordenes_detalle($_GET["id"]);
// $regd->codigo
// $regd->cantidad
// $regd->precio_unitario
while ($regd = $rsptad->fetch_object()) {
  $line = array( "Factura"=> "Acuerdos",
                "Fecha"=> "24/03/2019",
                "Valor"=> "180 000.00",
            );

            $size = $pdf->addLine( $y, $line );
            $y   += $size + 0;
}


while ($regd2 = $rsptad2->fetch_object()) {
  $line2 = array( "Factura"=> "    //",
                "Fecha"=> "    //",
                "Valor"=> "      //",
                );

            $size2 = $pdf->addLine2( $y2, $line2 );
            $y2   += $size2 + 0;
  }

//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_total,"\n"."LEMPIRAS EXACTOS"));
$pdf->addCadreTVAs("*** ".$con_letra);

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

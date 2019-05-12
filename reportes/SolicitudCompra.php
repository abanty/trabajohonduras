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
require('Scompra.php');

//Establecemos los datos de la empresa
$tittle1 = "SECRETARIA DE ESTADO EN EL DESPACHO DE DEFENSA NACIONAL";
$tittle2 = "FUERZAS ARMADAS DE HONDURAS";
$tittle3 = "FUERZA NAVAL DE HONDURAS";
$tittle4 = "SOLICITUD DE COMPRA";

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

$pdf->fact_dev("S/C No. ",$regv->num_orden);
// $pdf->temporaire( "ORDER DE COMPRA" );
$pdf->addDate_MontoGeneral_TituloOrden($regv->fecha,$regv->monto_total,$regv->titulo_orden);

//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv->proveedor),utf8_decode($regv->programa),utf8_decode($regv->proveedor));

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "Cod"=>13,
             "Unidad"=>27,
             "Cantidad"=>17,
             "Descripcion"=>70,
             "P.Unitario"=>25,
             "SubTotal"=>22,
             "Total"=>22);
$pdf->addCols( $cols);
$cols=array( "Cod"=>"L",
             "Unidad"=>"C",
             "Cantidad"=>"C",
            "Descripcion"=>"L",
             "P.Unitario"=>"R",
             "SubTotal"=>"R",
           "Total"=>"R");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 88;

//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->administrar_ordenes_detalle_grouping($_GET["id"]);

while ($regd = $rsptad->fetch_object()) {

  $line = array( "Cod"=> "$regd->cod",
                "Unidad"=> utf8_decode("$regd->uni"),
                "Cantidad"=> "$regd->cant",
                "Descripcion" => utf8_decode("$regd->descripcion"),
                "P.Unitario"=> number_format("$regd->precu", 2, '.', ','),
                "SubTotal"=> number_format("$regd->subtot", 2, '.', ','),
                "Total"=> number_format("$regd->total", 2, '.', ','));
                // ,
                // "Total"=> "$regv->monto_total"
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;

            // $line = array( "Cod"=> "$regd->codigo",
            //               "Total"=> number_format("$regd->subtot", 2, '.', ','));
            // $size = $pdf->addLine( $y, $line );
            // $y   += $size + 2;
}


$pdf->Ln(15);
$pdf->SetWidths(array(70));

$pdf->SetFont('Arial','B',7.5);
$pdf->SetX(25);
$pdf->Rowedit(array($texta));
$pdf->Ln(-3);

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(80,4, "SUBTOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(95,4, number_format($regv->subtotal_origen, 2, '.', ','),0,0,'R');
$pdf->Cell(22,4, number_format($regv->subtotal_origen, 2, '.', ','),0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(80,4, "DESCUENTO Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(95,4, number_format($regv->descuento_total, 2, '.', ','),0,0,'R');
$pdf->Cell(22,4,'',0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(80,4, "SUBTOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(95,4, number_format($regv->subtotal, 2, '.', ','),0,0,'R');
$pdf->Cell(22,4,'',0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(80,4, "IMPUESTO Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(95,4, number_format($regv->impuesto, 2, '.', ','),0,0,'R');
$pdf->Cell(22,4,'',0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(80,4, "TOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(95,4, number_format($regv->monto_total, 2, '.', ','),0,0,'R');
$pdf->Cell(22,4, number_format($regv->monto_total, 2, '.', ','),0,1,'R');
$pdf->Ln(10);

$pdf->SetLineWidth(0.2);
$pdf->SetX(8);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(200,4, 'PAGADOR GENERAL DE LA F.N.H.',1,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,4, 'CAPITAN DE GRAGATA C.G',1,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,15, '',1,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,4, 'ERNESTO ANTONIO AVILA KATTAN',1,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,4, "NOTA: ".utf8_decode($regv->descripcion_orden),1,'L');
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

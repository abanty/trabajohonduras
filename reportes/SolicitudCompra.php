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
require('controladores_fpdf/Scompra.php');

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
$cols=array( "OJB"=>13,
             "UNIDAD"=>27,
             "CANTIDAD"=>17,
             "DESCRIPCION"=>70,
             "P.UNIT"=>25,
             "S/TOTAL"=>22,
             "TOTAL"=>22);
$pdf->addCols( $cols);

$cols=array( "OJB"=>"L",
             "UNIDAD"=>"C",
             "CANTIDAD"=>"C",
            "DESCRIPCION"=>"L",
             "P.UNIT"=>"R",
             "S/TOTAL"=>"R",
           "TOTAL"=>"R");

$pdf->addLineFormat($cols);
$pdf->addLineFormat( $cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 88;

//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->administrar_ordenes_detalle($_GET["id"]);

while ($regd = $rsptad->fetch_object()) {


  $line = array("OJB"=> "$regd->codigo",
                "UNIDAD"=> utf8_decode("$regd->unidad"),
                "CANTIDAD"=> "$regd->cantidad",

                "DESCRIPCION" => utf8_decode("$regd->descripcion"),

                "P.UNIT"=> number_format("$regd->precio_unitario", 2, '.', ','),
                "S/TOTAL"=> number_format("$regd->subtot", 2, '.', ','),
                "TOTAL"=> number_format("", 2, '.', ','));
                // ,
                // "Total"=> "$regv->monto_total"





                // if ($line[3]) {
                //   $pdf->SetFont('','U');
                // }



            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;

            // $line = array( "Cod"=> "$regd->codigo",
            //               "Total"=> number_format("$regd->subtot", 2, '.', ','));
            // $size = $pdf->addLine( $y, $line );
            // $y   += $size + 2;
}








$pdf->SetWidths(array(70));

$pdf->SetFont('Arial','B',7.5);
$pdf->SetX(25);
$pdf->Rowedit(array($texta));
$pdf->Ln(-3);

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "SUBTOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format($regv->subtotal_origen, 2, '.', ','),0,0,'R');
$pdf->Cell(26,4, number_format($regv->subtotal_origen, 2, '.', ','),0,1,'R');

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "VALOR EXENTO Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format('', 2, '.', ','),0,0,'R');
$pdf->Cell(26,4, number_format('', 2, '.', ','),0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "SUBTOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format($regv->subtotal_origen, 2, '.', ','),0,0,'R');
$pdf->Cell(26,4, number_format($regv->subtotal_origen, 2, '.', ','),0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "DESCUENTO Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format($regv->descuento_total, 2, '.', ','),0,0,'R');
$pdf->Cell(26,4,'',0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "SUBTOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format($regv->subtotal, 2, '.', ','),0,0,'R');
$pdf->Cell(26,4,'',0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "15% IMPTO Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format($regv->impuesto, 2, '.', ','),0,0,'R');
$pdf->Cell(26,4,'',0,1,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(107,4, "TOTAL Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(64,4, number_format($regv->monto_total, 2, '.', ','),0,0,'R');
$pdf->Cell(26,4, number_format($regv->monto_total, 2, '.', ','),0,1,'R');
$pdf->Ln(10);

$pdf->SetLineWidth(0.2);
$pdf->SetX(8);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(200,4, 'PAGADOR GENERAL DE LA F.N.H.',0,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,4, 'CAPITAN DE GRAGATA C.G',0,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,15, '',0,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,10, 'ERNESTO ANTONIO AVILA KATTAN',0,'C');
$pdf->SetX(8);
$pdf->MultiCell(200,4, "NOTA:        ".utf8_decode($regv->descripcion_orden),0,'L');
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

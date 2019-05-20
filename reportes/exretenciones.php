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
require('RetencionesControler.php');

//Establecemos los datos de la empresa
$tittle1 = "FUERZA NAVAL DE HONDURAS";
$tittle2 = "PAGADURIA GENERAL";
$tittle3 = "COMPROBANTE DE RETENCIÓN DE IMPUESTOS";
$tittle4 = "Tel: (504) 2234-6288 E-mail pagaduria@fnh.mil.hn";
$tittle5 = "Aldea las casitas Km5, carretera a Mateo, Comayaguela M.D.C, Honduras C.A.";
//Obtenemos los datos de la cabecera de la venta actual
require_once "../modelos/Administrar_ordenes.php";
$venta= new Administrar_ordenes();
$rsptav = $venta->administrar_ordenes_cabecera($_GET["id"]);
//Recorremos todos los valores obtenidos
$regv = $rsptav->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'Letter' );
$pdf->AddPage();

$logo1 = "logo1.jpg";
$ext_logo1 = "jpg";
$logo2 = "logo2.jpg";
$ext_logo2 = "jpg";

$pdf->titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2);

//Enviamos los datos de la empresa al método adsdSociete de la clase Factura
$pdf->addSociete(utf8_decode($tittle1),utf8_decode($tittle2),utf8_decode($tittle3),utf8_decode($tittle4),utf8_decode($tittle5));

// $pdf->fact_dev("S/C No. ",$regv->num_orden);
// $pdf->temporaire( "ORDER DE COMPRA" );
// $pdf->addDate_MontoGeneral_TituloOrden($regv->fecha,$regv->monto_total,$regv->titulo_orden);

//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv->proveedor),utf8_decode($regv->programa),utf8_decode($regv->proveedor));

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "N°"=>12,
             "Descripcion del impuesto retenido"=>80,
             "Base imponible"=>30,
             "Porcentaje de Impuesto"=>35,
             "Impuesto Total Retenido"=>39
             );
$pdf->addCols( $cols);



$cols=array( "N°"=>"L",
             "Descripcion del impuesto retenido"=>"C",
             "Base imponible"=>"C",
            "Porcentaje de Impuesto"=>"L",
             "Impuesto Total Retenido"=>"R"
            );

// $cols=array( "N°"=>"R",
//              "Descripcion del impuesto retenido"=>"R",
//              "Base imponible"=>"R",
//             "Porcentaje de Impuesto"=>"L",
//              "Impuesto Total Retenido"=>"R"
//             );
//
//             $pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
$pdf->addLineFormat( $cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 109.2;

//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->administrar_ordenes_detalle($_GET["id"]);

while ($regd = $rsptad->fetch_object()) {


  $line = array("N°"=> "$regd->codigo",
                "Descripcion del impuesto retenido"=> utf8_decode("$regd->descripcion"),
                "Base imponible"=> "$regd->cantidad",

                "Porcentaje de Impuesto" => utf8_decode("$regd->descripcion"),

                "Impuesto Total Retenido"=> number_format("$regd->precio_unitario", 2, '.', ',')
                );
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








$pdf->SetWidths(array(196));

$pdf->SetFont('Arial','B',7.5);
$pdf->SetX(10);
$pdf->Rowedit(array(''));

    $pdf->Ln(3);
$pdf->SetFont('Arial','B',8.5);


$pdf->Cell(107,4, "SUBTOTAL Lps  :",1,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format($regv->subtotal_origen, 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4, number_format($regv->subtotal_origen, 2, '.', ','),0,1,'R');
//
// $pdf->Ln(5);
// $pdf->SetFont('Arial','B',8.5);
// $pdf->Cell(107,4, "VALOR EXENTO Lps  :",0,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format('', 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4, number_format('', 2, '.', ','),0,1,'R');
//
// $pdf->SetFont('Arial','B',8.5);
// $pdf->Cell(107,4, "SUBTOTAL Lps  :",0,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format($regv->subtotal_origen, 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4, number_format($regv->subtotal_origen, 2, '.', ','),0,1,'R');
//
// $pdf->SetFont('Arial','B',8.5);
// $pdf->Cell(107,4, "DESCUENTO Lps  :",0,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format($regv->descuento_total, 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4,'',0,1,'R');
//
// $pdf->SetFont('Arial','B',8.5);
// $pdf->Cell(107,4, "SUBTOTAL Lps  :",0,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format($regv->subtotal, 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4,'',0,1,'R');
//
// $pdf->SetFont('Arial','B',8.5);
// $pdf->Cell(107,4, "15% IMPTO Lps  :",0,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format($regv->impuesto, 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4,'',0,1,'R');
//
// $pdf->SetFont('Arial','B',8.5);
// $pdf->Cell(107,4, "TOTAL Lps  :",0,0,'R');
// $pdf->SetFont('Arial','',8.5);
// $pdf->Cell(64,4, number_format($regv->monto_total, 2, '.', ','),0,0,'R');
// $pdf->Cell(26,4, number_format($regv->monto_total, 2, '.', ','),0,1,'R');
$pdf->Ln(5);

$pdf->SetLineWidth(0.2);
$pdf->SetX(8);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(200,4, '____________________________',0,'R');
$pdf->SetX(8);
$pdf->MultiCell(190,4, 'FIRMA Y SELLO',0,'R');
// $pdf->SetX(8);
// $pdf->MultiCell(200,15, '',0,'C');
// $pdf->MultiCell(200,4, "NOTA:        ".utf8_decode($regv->descripcion_orden),0,'L');
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

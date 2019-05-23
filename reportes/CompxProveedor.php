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
require('controladores_fpdf/RetencionesControler.php');

//Establecemos los datos de la empresa
$tittle1 = "FUERZA NAVAL DE HONDURAS";
$tittle2 = "PAGADURIA GENERAL";
$tittle3 = "COMPROMISOS PENDIENTE DE PAGO POR PROVEEDOR";

//Obtenemos los datos de la cabecera de la venta actual
require_once "../modelos/Retenciones.php";
$retencion= new Retenciones();

$rsptareten = $retencion->pdf_retenciones($_GET["id"]);
$regre = $rsptareten->fetch_object();

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
//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->SetY(65);
//Obtenemos todos los detalles de la venta actual
$rsptad2 = $retencion->pdf_detalle_compromiso($_GET["id"]);
while ($regd2 = $rsptad2->fetch_object()) {
  $linex = array($regd2->fecha_hora,"",$regd2->numfactura);
  $pdf->SetWidths(array(60,35,60));
$pdf->SetX(49);
  $pdf->Rowdefault($linex);

}

$pdf->addClientAdresse(utf8_decode($regre->proveedor),utf8_decode($regre->rtn),utf8_decode($regre->numdocumento),utf8_decode($regre->fecha));
//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "N°"=>7,
             "Descripcion del impuesto retenido"=>80,
             "Base imponible"=>35,
             "Porcentaje de Impuesto"=>35,
             "Impuesto Total Retenido"=>39
             );

$pdf->addCols( $cols);


$cols2=array( "N°"=>"C",
             "Descripcion del impuesto retenido"=>"C",
             "Base imponible"=>"C",
            "Porcentaje de Impuesto"=>"C",
             "Impuesto Total Retenido"=>"C"
            );

$cols=array( "N°"=>'R',
             "Descripcion del impuesto retenido"=>'R',
             "Base imponible"=>'R',
            "Porcentaje de Impuesto"=>'R',
             "Impuesto Total Retenido"=>0
            );

$pdf->addLineFormat( $cols,$cols2);


//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 98;

//Obtenemos todos los detalles de la venta actual
$rsptad = $retencion->pdf_detalle_retenciones($_GET["id"]);

while ($regd = $rsptad->fetch_object()) {


  $line = array("N°"=> "1",
                "Descripcion del impuesto retenido"=> utf8_decode("$regd->descripcion"),
                "Base imponible"=>"L. ".number_format("$regd->base_imponible", 2, '.', ',') ,

                "Porcentaje de Impuesto" => "$regd->impuesto"."%",

                "Impuesto Total Retenido"=> "L. ".number_format("$regd->imp_retenido", 2, '.', ',')
                );


}

$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

$pdf->SetWidths(array(196));

$pdf->SetFont('Arial','B',7.5);
$pdf->SetX(10);
$pdf->Rowedit(array(''));

    $pdf->Ln(0);
$pdf->SetFont('Arial','',8.5);


$pdf->Cell(107,4, "Rango Autorizado: 004-001-05-00002601 al 004-001-05-00003800",0,1,'L');
$pdf->Cell(107,4, "Fecha Limite de Emision: 23/05/2019",0,0,'L');
$pdf->Cell(90,4, "____________________________",0,0,'R');
$pdf->Ln(5);

$pdf->SetLineWidth(0.2);
$pdf->SetX(8);
$pdf->MultiCell(187,4, 'FIRMA Y SELLO',0,'R');
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

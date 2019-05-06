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
$tittle1 = "SECRETARIA DE ESTADO EN EL DESPACHO DE DEFENSA NACIONAL";
$tittle2 = "FUERZAS ARMADAS DE HONDURAS";
$tittle3 = "FUERZA NAVAL DE HONDURAS";
$tittle4 = "SOLICITUD DE COMPRA No.";

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

$pdf->fact_dev("O/C No. ",$regv->num_orden);
// $pdf->temporaire( "ORDER DE COMPRA" );
$pdf->addDate_MontoGeneral_TituloOrden($regv->fecha,$regv->monto_total,$regv->titulo_orden );

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
$y= 63;

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

$pdf->SetFont( "Arial", "B", 8);
$pdf->Ln(10);
$pdf->SetX(55);
$pdf->Cell(80,4, "IMPORTE TOTAL CON LETRA",0,1);
require_once "Letras.php";
$V=new EnLetras();
$pdf->SetFont( "Arial", "", 8);
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_total,"\n"."LEMPIRAS EXACTOS"));
$pdf->SetX(55);
$pdf->MultiCell(90,4, $con_letra,0);
$pdf->SetX(55);
$pdf->MultiCell(95,4, "************************************* U.L **************************************",0);
$pdf->Ln(1);
$pdf->SetX(55);
$pdf->MultiCell(90,3, "NOTA: ".$regv->descripcion_orden,0);
$pdf->Ln(15);
$texta = strtoupper($regv->cargar);

// $pdf->SetX(55);
$pdf->SetWidths(array(70));

$pdf->SetFont('Arial','B',7.5);
$pdf->SetX(25);
$pdf->Rowedit(array($texta));
$pdf->Ln(-3);

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(172,4, "SubTotal Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->MultiCell(25,4, number_format($regv->subtotal_origen, 2, '.', ','),0,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(172,4, "Descuento Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->MultiCell(25,4, number_format($regv->descuento_total, 2, '.', ','),0,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(172,4, "SubTotal Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->MultiCell(25,4, number_format($regv->subtotal, 2, '.', ','),0,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(172,4, "Impuesto Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->MultiCell(25,4, number_format($regv->impuesto, 2, '.', ','),0,'R');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(172,4, "Total Lps  :",0,0,'R');
$pdf->SetFont('Arial','',8.5);
$pdf->MultiCell(25,4, number_format($regv->monto_total, 2, '.', ','),0,'R');
$pdf->Ln(10);

$pdf->SetLineWidth(0.2);
$pdf->SetX(160);
$pdf->SetFont('Arial','I',8.5);
$pdf->MultiCell(39,4, 'PAGADOR GENERAL DE LA F.N.H.','T','L');

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

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
//Obtenemos los datos de la cabecera de la comprobante actual
require_once "../modelos/Administrar_ordenes.php";
$comprobante= new Administrar_ordenes();

$rsptac = $comprobante->mostrar_datos_comprobante($_GET["id"]);
//Recorremos todos los valores obtenidos
$regv = $rsptac->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'Letter' );
$pdf->AddPage();

//Enviamos los datos de la empresa al método adsdSociete de la clase Factura
$pdf->titulos_encabezados(utf8_decode($tittle1),utf8_decode($tittle2),utf8_decode($tittle3),utf8_decode($tittle4),utf8_decode($tittle5));

$pdf->addClientAdresse(utf8_decode($regv->proveedor),utf8_decode($regv->banco),utf8_decode($regv->tipo_pago),$regv->numero_transferencia,$regv->subtotal_origen,
$regv->codigop,$regv->usuario,$regv->num_orden,$regv->descripcion_orden,$regv->tipo_documento);

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la comprobante
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
$y= 84.2;
$y2= 84.2;
$y3=132.4;

//Obtenemos todos los detalles de la comprobante actual
$rsptad = $comprobante->listarFactura_orden_10firts($_GET["id"]);

$rsptad2 = $comprobante->listarFactura_orden_10next($_GET["id"]);


while ($regd = $rsptad->fetch_object()) {
  $line = array( "Factura"=> "$regd->num_factura",
                "Fecha"=> "$regd->fecha_factura",
                "Valor"=> number_format("$regd->valor_factura", 2, '.', ','),
            );

            $size = $pdf->addLine( $y, $line );
            $y   += $size + 0;
}


while ($regd2 = $rsptad2->fetch_object()) {
  $line2 = array( "Factura"=> "$regd2->num_factura",
                "Fecha"=> "$regd2->fecha_factura",
                "Valor"=> number_format("$regd2->valor_factura", 2, '.', ','),
                );

            $size2 = $pdf->addLine2( $y2, $line2 );
            $y2   += $size2 + 0;
  }



//

// // DETALLE CONTABILIDAD
// $cols3=array( "Grupo"=>13,
//              "Subgrupo"=>20,
//              "No. Objeto"=>22,
//              "INTERIORES"=>35,
//             );
//
// $pdf->addCols3( $cols3);
//
// $cols3=array( "Grupo"=>"C",
//              "Subgrupo"=>"C",
//              "No. Objeto"=>"C",
//              "INTERIORES"=>"R",
//             );
// $pdf->addLineFormat( $cols3);


//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_total,"\n"."LEMPIRAS EXACTOS"));
$pdf->addCadreTVAs("*** ".$con_letra);
//
// //Mostramos el impuesto
// $pdf->addTVAs($regv->subtotal_origen,$regv->descuento_total,$regv->subtotal, $regv->impuesto, $regv->monto_total,"");
//

$pdf->SetFont( "Arial", "B", 8);
$pdf->SetXY(10,125);
$pdf->Cell(23,5, "Programa",1,0,'C');
$pdf->Cell(13,5, "Grupo",1,0,'C');
$pdf->Cell(20,5, "Subgrupo",1,0,'C');
$pdf->Cell(22,5, utf8_decode("N° Objetos"),1,0,'C');
$pdf->Cell(35,5, "INTERIORES",1,0,'C');
$pdf->Cell(35,5, "VALOR",1,0,'C');
$pdf->Cell(49,5, "CUENTA DE BALANCE",1,1,'C');
$pdf->SetFont( "Arial", "", 8);

$rsptad3 = $comprobante->administrar_ordenes_detalle($_GET["id"]);

while ($regd3 = $rsptad3->fetch_object()) {

            $text1 = '';
            $text2 = $regd3->grupo;
            $text3 = $regd3->subgrupo;
            $text4 = $regd3->codigo;
            $text5 = $regd3->subtot;
            $text6 = '';
            $text7 = '';

            $pdf->SetWidths(array(23,13,20,22,35,35,49));
            $pdf->SetAligns(array('C','C','C','C','R','R','R'));
            $pdf->Roweditcomprobante(array($text1,$text2,$text3,$text4,$text5,$text6,$text7));
  }


  $pdf->Cell(23,5, "",'LRB',0);
  $pdf->Cell(13,5, "",'LRB',0);
  $pdf->Cell(20,5, "",'LRB',0);
  $pdf->Cell(22,5, "",'LRB',0);
  $pdf->Cell(35,5, "",'LRB',0);
  $pdf->Cell(35,5, "1,100.55",'LRB',0,'R');
  $pdf->Cell(49,5, "",'LRB',1);
// $pdf->MultiCell(197,4, "as",1);
// $var="";
// if ($regv->tipo_impuesto="0.15") {
//   $var = "ISV";
// }else {
//   $var = "ISR";
// }
//
// $pdf->addCadreEurosFrancs("$var"." $regv->tipo_impuesto %");
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

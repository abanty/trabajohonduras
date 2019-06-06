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
require('controladores_fpdf/exComprobante.php');

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

$pdf->addClientAdresse(utf8_decode($regv->proveedor),utf8_decode($regv->banco),utf8_decode($regv->tipo_pago),$regv->numero_transferencia,$regv->monto_total,
$regv->codigop,$regv->usuario,$regv->num_orden,$regv->descripcion_orden,$regv->tipo_documento,$regv->fecha);

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

//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 84.2;
$y2= 84.2;

//Obtenemos todos los detalles de la comprobante actual
$rsptad = $comprobante->listarFactura_orden_10firts($_GET["id"]);

$rsptad2 = $comprobante->listarFactura_orden_10next($_GET["id"]);

// for ($i=0; $i < 10; $i++) {
//   $n_fact = '//';
//   $fec_fac = '//';
//   $valfact = '//';
//
// $linemine = array( "Factura"=> "$n_fact",
//                 "Fecha"=> "$fec_fac",
//                 "Valor"=> "$valfact"
//             );
//
// $size = $pdf->addLine( $y, $linemine );
// $y   += $size + 0;
//
// }

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

//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_total,""."LEMPIRAS EXACTOS"));
$pdf->addCadreTVAs("*** ".$con_letra);
//
// //Mostramos el impuesto
// $pdf->addTVAs($regv->subtotal_origen,$regv->descuento_total,$regv->subtotal, $regv->impuesto, $regv->monto_total,"");
//
;
$pdf->SetFont( "Arial", "B", 8);
$pdf->SetXY(157.5,25);
$pdf->Cell(49,5, "C/P No.".$regv->num_comprobante,0,1,'R');
$pdf->SetXY(10,125);

$pdf->Cell(23,5, "Programa",1,0,'C');
$pdf->Cell(13,5, "Grupo",1,0,'C');
$pdf->Cell(20,5, "Subgrupo",1,0,'C');
$pdf->Cell(22,5, utf8_decode("N° Objetos"),1,0,'C');
$pdf->Cell(35,5, "INTERIORES",1,0,'C');
$pdf->Cell(35,5, "VALOR",1,0,'C');
$pdf->Cell(49,5, "CUENTA DE BALANCE",1,1,'C');
$pdf->SetFont( "Arial", "", 8);

$rsptad3 = $comprobante->administrar_ordenes_detalle_sum($_GET["id"]);

while ($regd3 = $rsptad3->fetch_object()) {

            $text1 = '';
            $text2 = $regd3->grupo;
            $text3 = $regd3->subgrupo;
            $text4 = $regd3->codigo;
            $text5 = number_format($regd3->total, 2, '.', ',');
            $text6 = '';
            // number_format($regd3->total, 2, '.', ',');
            $text7 = '';


            $pdf->SetWidths(array(23,13,20,22,35,35,49));
            $pdf->SetAligns(array('C','C','C','C','R','R','R'));
            $data = array($text1,$regd3->grupo,$regd3->subgrupo,$regd3->codigo, number_format($regd3->total, 2, '.', ','),$text6,$text7);

            $pdf->Roweditcomprobante($data);

  }

  $pdf->Cell(23,-4, "",0,0);
  $pdf->Cell(13,-4, "",0,0);
  $pdf->Cell(20,-4, "",0,0);
  $pdf->Cell(22,-4, "",0,0);
  $pdf->Cell(35,-4, "",0,0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,-4,number_format($regv->subtotal_inicial."", 2, '.', ','),0,0,'R');
  $pdf->Cell(49,-4, "",'T',1);
  $pdf->Ln(4);
  // DETALLE - DEBITOS - CREDITOS
  // ESPACIO O MARGEN TOP
  $pdf->Cell(148,2,'','TL',0,'L',0);
  $pdf->Cell(49,2,'','RL',1,'C',0);
  // 1er ROW
  $pdf->SetFont( "Arial", "B", 8);
  $pdf->Cell(78,5,'CMDCIA GRAL.','L',0,'L',0);
  $pdf->Cell(35,5,'SUBTOTAL L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->subtotal_inicial, 2, '.', ','),0,0,'R',0);
  $pdf->SetFont( "Arial", "B", 10);
  $pdf->Cell(49,5,'D  E  B  I  T  O  S','RL',1,'C',0);
  $pdf->SetFont( "Arial", "B", 8);
  // 2do ROW
  $pdf->Cell(78,5,'FNH','L',0,'L',0);
  $pdf->Cell(35,5,'DESCUENTO L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->descuento_total, 2, '.', ','),0,0,'R',0);
  $pdf->Cell(49,5,'GASTO DE FUNCIONAMIENTO','RL',1,'C',0);
  $pdf->SetFont( "Arial", "B", 8);
  // 3ro ROW
  $pdf->Cell(78,5,'','L',0,'L',0);
  $pdf->Cell(35,5,'SUBTOTAL L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->subtotal, 2, '.', ','),0,0,'R',0);
  $pdf->Cell(49,5,'','RL',1,'C',0);
  $pdf->SetFont( "Arial", "", 8);
  // 4to ROW
  $pdf->Cell(78,5,$regv->tasa_sv.'%   de  '.number_format($regv->valor_sv, 2, '.', ','),'L',0,'R',0);
  $pdf->SetFont( "Arial", "B", 8);
  $pdf->Cell(35,5,'IMPUESTO S/V L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->impuesto_sv, 2, '.', ','),0,0,'R',0);
  $pdf->Cell(49,5,'','RL',1,'C',0);
  $pdf->SetFont( "Arial", "", 8);
  // 5to ROW
  $pdf->Cell(78,5,$regv->tasa_imp.'%   de  '.number_format($regv->valor_impuesto, 2, '.', ','),'L',0,'R',0);
  $pdf->SetFont( "Arial", "B", 8);
  $pdf->Cell(35,5,'IMPUESTO L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->impuesto, 2, '.', ','),0,0,'R',0);
  $pdf->SetFont( "Arial", "B", 10);
  $pdf->Cell(49,5,'C  R  E  D  I  T  O  S','RL',1,'C',0);
  $pdf->SetFont( "Arial", "B", 8);
  // 6to ROW
  $pdf->Cell(78,5,'','L',0,'L',0);
  $pdf->Cell(35,5,'TOTAL L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->monto_total, 2, '.', ','),0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(49,5,'CAJAS Y BANCOS','RL',1,'C',0);
  $pdf->SetFont( "Arial", "", 8);
  // 7to ROW
  $pdf->Cell(78,5,$regv->tasa_retencion_isv.'%   de  '.number_format($regv->valor_isv, 2, '.', ','),'L',0,'R',0);
  $pdf->SetFont( "Arial", "B", 8);
  $pdf->Cell(35,5,'RETENCION ISV L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->retencion_isv, 2, '.', ','),0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(49,5,'','RL',1,'C',0);
  $pdf->SetFont( "Arial", "", 8);
  // 8vo ROW tasa_retencion_isr
  $pdf->Cell(78,5,$regv->tasa_retencion_isr.'%   de  '.number_format($regv->valor_isr, 2, '.', ','),'L',0,'R',0);
  $pdf->SetFont( "Arial", "B", 8);
  $pdf->Cell(35,5,'RETENCION ISR L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->retencion_isr, 2, '.', ','),0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(49,5,'','RL',1,'C',0);
  $pdf->SetFont( "Arial", "B", 9);
  // 9no ROW
  $pdf->Cell(78,5,'','L',0,'L',0);
  $pdf->Cell(35,5,'NETO A PAGAR L.',0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(35,5,number_format($regv->total_neto, 2, '.', ','),0,0,'R',0);
  $pdf->SetFont( "Arial", "", 8);
  $pdf->Cell(49,5,'','RL',1,'C',0);
  $pdf->SetFont( "Arial", "B", 8);

  $pdf->Cell(65.7,5,'Responsable','RLT',0,'L',0);
  $pdf->Cell(65.6,5,'Responsable','RLT',0,'L',0);
  $pdf->Cell(65.7,5,utf8_decode('Recibí conforme'),'RLT',1,'L',0);

  $pdf->SetFont( "Arial", "", 8);
  $texta = $regv->usuario;
  $textb = '';
  $textc = '';


  // $pdf->SetCellMargin(array(7,6,7));
  $pdf->SetWidths(array(65.7,65.6,65.7));
  $pdf->SetAligns(array('L','L','L'));
  $pdf->SetBorders(array('RLB','RLB','RLB'));
  $pdf->Rowdefault(array($texta,$textb,$textc));

  $pdf->MultiCell(197, 4,'','T');
  $pdf->SetY(130);
  $pdf->Cell(23,5, $regv->codigop,0,1,'C');

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

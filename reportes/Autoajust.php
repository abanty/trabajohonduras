<?php
require('PDF_MC_Table.php');

$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->SetTopMargin(10);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(190,60,60));
$pdf->setCellMargin(10);
$pdf->SetTopMargin(10);


srand(microtime()*1000000);
for($i=0;$i<1;$i++)
    $pdf->Row(array('DIEZ MILLONES MAS CARACTERES DIEZ MIL CIENTO ONCE LEMPIRAS EXACTAS CON QUINCE CENTAVOS (15/100) M.N DIEZ MILLÓNES MAS CARACTERES DIEZ'));
  
    $pdf->MultiCell(190,5,"",0,C);

    $pdf->SetWidths(array(190));

    $pdf->Row(array('DEBITESE'));
    $pdf->SetWidths(array(63.3,63.3,63.3));
    $pdf->Row(array('sda','asd','dsadsa'));


$pdf->Output();
?>

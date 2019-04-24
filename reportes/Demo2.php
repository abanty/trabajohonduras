<?php
require('Mc_indent.php');

$InterLigne = 4;

$pdf=new PDF();

$pdf->AddPage();
$pdf->SetMargins(10,10,30);
$pdf->SetFont('Arial','',11);

$txt = "Cher Pierre";
$txtLen = $pdf->GetStringWidth($txt);
$milieu = (210-$txtLen)/2;
$pdf->SetX($milieu);
$pdf->Write(5,$txt);
// $pdf->setCellMargin(5);
$pdf->ln(30);
$pdf->SetFont( "Arial", "B", 10.8);
// $pdf->SetXY(10, 20);
 $pdf->Ln();
 // MAS CARACTERES DIEZ MIL CIENTO ONCE LEMPIRAS EXACTAS CON QUINCE CENTAVOS (15/100) M.N	DIEZ MILLÓNES MAS CARACTERES DIEZ
$txt = utf8_decode("\n"."DIEZ MILLÓNES"."\n"." ");
$pdf->MultiCell(190,$InterLigne,$txt,1,'C',0);
$txt = "DEBITESE";
$pdf->SetFillColor(184, 215, 232);
$pdf->ln(5);
$pdf->MultiCell(190,6,$txt,1,'C',true);
$pdf->SetFont( "Arial", "", 10.5);
$pdf->Cell(63.3,5,'NUMERO DE CUENTA',1,0,'C',0);
$pdf->Cell(63.3,5,'NOMBRE DE LA CUENTA',1,0,'C',0);
$pdf->Cell(63.3,5,'VALOR EN NUMEROS',1,1,'C',0);




$txt = utf8_decode("\n"."215-990-007-350"."\n"." ");
$pdf->setCellMargin(0);
$pdf->SetFont( "Arial", "B", 10.5);
$pdf->MultiCell(63.3,$InterLigne,$txt,1,'C',0);


$txt = utf8_decode("\n"."PAGADURIA FUERZA NAVAL"."\n"." ");
// $pdf->SetXY(73.3, 73);
$pdf->MultiCell(63.3,$InterLigne,$txt,1,'C',0);

$txt = utf8_decode("\n"."L. 1,010,111.15L"."\n"." ");
// $pdf->SetXY(136.6, 73);
$pdf->MultiCell(63.3,$InterLigne,$txt,1,'C',0);





$txt = "ACREDITESE";
$pdf->SetFillColor(184, 215, 232);
$pdf->ln(5);
$pdf->MultiCell(190,6,$txt,1,'C',true);

$pdf->Output();
?>

<!-- $y = $pdf->GetY();
$x = $pdf->GetX();
$width = 60;
$pdf->MultiCell($width, 6, 'particular', 1, 'L', FALSE);
$pdf->SetXY($x + $width, $y);
$pdf->Cell(40,50, 'quantity', 1, 0, "l"); -->
























// $pdf->ln(10);
// $txt = "Je me permets de te rappeler que cette licence est obligatoire et nécessaire à la pratique de notre sport favori, tant à l'occasion de nos entraînements qu'à toutes autres manifestations auxquelles tu peux participer telles que compétitions, cours fédéraux ou visites amicales dans un autre club.";
// $pdf->MultiCell(0,$InterLigne,$txt,0,'J',0,15);
//
// $pdf->ln(10);
// $txt = "Dès lors, je te saurais gré de bien vouloir me retourner le certificat d'aptitude dûment complété par le médecin accompagné de ton paiement de 31 € ou de la preuve de celui-ci par virement bancaire. Le tout dans les plus brefs délais afin de ne pas interrompre la couverture de ladite assurance et par la même occasion de t'empêcher de participer à nos cours le temps de la régularisation. Il y va de ta sécurité.";
// $pdf->MultiCell(0,$InterLigne,$txt,0,'J',0,15);
//
// $pdf->ln(10);
// $txt = "Merci de la confiance que tu mets en notre club pour ton épanouissement sportif.";
// $pdf->MultiCell(0,$InterLigne,$txt,0,'J',0,15);
//
// $pdf->ln(10);
// $txt = "Le comité";
// $pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

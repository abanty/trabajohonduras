<?php
require('mc_indent.php');

$InterLigne = 6;

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetMargins(30,10,30);
$pdf->SetFont('Arial','',12);

$txt = "Cher Pierre";
$txtLen = $pdf->GetStringWidth($txt);
$milieu = (210-$txtLen)/2;
$pdf->SetX($milieu);
$pdf->Write(5,$txt);
$pdf->setCellMargin(10);
$pdf->ln(30);
$txt = "Voicicin.";
$pdf->MultiCell(0,$InterLigne,$txt,1,'J',0);

$pdf->ln(10);
$txt = "Je me permets de te rappeler que cette licence est obligatoire et nécessaire à la pratique de notre sport favori, tant à l'occasion de nos entraînements qu'à toutes autres manifestations auxquelles tu peux participer telles que compétitions, cours fédéraux ou visites amicales dans un autre club.";
$pdf->MultiCell(0,$InterLigne,$txt,0,'J',0,15);

$pdf->ln(10);
$txt = "Dès lors, je te saurais gré de bien vouloir me retourner le certificat d'aptitude dûment complété par le médecin accompagné de ton paiement de 31 € ou de la preuve de celui-ci par virement bancaire. Le tout dans les plus brefs délais afin de ne pas interrompre la couverture de ladite assurance et par la même occasion de t'empêcher de participer à nos cours le temps de la régularisation. Il y va de ta sécurité.";
$pdf->MultiCell(0,$InterLigne,$txt,0,'J',0,15);

$pdf->ln(10);
$txt = "Merci de la confiance que tu mets en notre club pour ton épanouissement sportif.";
$pdf->MultiCell(0,$InterLigne,$txt,0,'J',0,15);

$pdf->ln(10);
$txt = "Le comité";
$pdf->MultiCell(0,$InterLigne,$txt,0,'R',0);

$pdf->Output();
?>

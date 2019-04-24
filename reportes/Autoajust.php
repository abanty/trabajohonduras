<?php
require('PDF_MC_Table.php');
// require('Mc_indent.php');
// function GenerateWord()
// {
//     //Get a random word
//     $nb=rand(3,10);
//     $w='';
//     for($i=1;$i<=$nb;$i++)
//         $w.=chr(rand(ord('a'),ord('z')));
//     return $w;
// }
// function GenerateSentence()
// {
//     //Get a random sentence
//     $nb=rand(1,10);
//     $s='';
//     for($i=1;$i<=$nb;$i++)
//         $s.=GenerateWord().' ';
//     return substr($s,0,-1);
// }


$pdf=new PDF_MC_Table();
// $pdf2 =new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',11);
//Table with 20 rows and 4 columns
$texta = "NOMBRE DE LA CUENTA";
$textb = "NOMBRE DE LA CUENTA";
$textc = "VALOR EN NUMEROS";

$txt1 = "215-990-007-350";
$txt2 = "PAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVALPAGADURIA FUERZA NAVAL";
$txt3 = "L. 1,010,111.15";

$textletras = utf8_decode("\n"."DIEZ MILLÓNES DIEZ MIL CIENTO ONCE LEMPIRAS EXACTAS CON QUINCE CENTAVOS (15/100) M.N	DIEZ MILLÓNES"."\n"." ");
srand(microtime()*1000000);
for($i=0;$i<1;$i++)
    $pdf->SetFont('Arial','B',11);
    $pdf->SetWidths(array(190));
    $pdf->Row(array($textletras));

    $pdf->ln(5);
    $txt = "DEBITESE";
    $pdf->SetFillColor(184, 215, 232);
    $pdf->MultiCell(190,6,$txt,1,'C',true);

    $pdf->SetFont('Arial','',11);
    $pdf->SetWidths(array(63.3,63.3,63.3));
    $pdf->Row(array($texta,$textb,$textc));
    $pdf->SetFont('Arial','B',11);
    $pdf->Row(array($txt1,$txt2,$txt3));
    $pdf->ln(5);

    $txt = "ACREDITESE";
    $pdf->SetFillColor(184, 215, 232);
    $pdf->MultiCell(190,6,$txt,1,'C',true);

$pdf->Output();
?>

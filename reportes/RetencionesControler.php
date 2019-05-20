<?php
require('../fpdf181/fpdf.php');
define('EURO', chr(128) );
define('EURO_VAL', 6.55957 );


//////////////////////////////////////
// Public functions                 //
//////////////////////////////////////
//  function sizeOfText( $texte, $larg )
//  function addSociete( $nom, $adresse )
//  function fact_dev( $libelle, $num )
//  function addDevis( $numdev )
//  function addFacture( $numfact )
//  function addDate( $date )
//  function addClient( $ref )
//  function addPageNumber( $page )
//  function addClientAdresse( $adresse )
//  function addReglement( $mode )
//  function addEcheance( $date )
//  function addNumTVA($tva)
//  function addReference($ref)
//  function addCols( $tab )
//  function addLineFormat( $tab )
//  function lineVert( $tab )
//  function addLine( $ligne, $tab )
//  function addRemarque($remarque)
//  function addCadreTVAs()
//  function addCadreEurosFrancs()
//  function addTVAs( $params, $tab_tva, $invoice )
//  function temporaire( $texte )

class PDF_Invoice extends FPDF
{
// private variables
var $colonnes;
var $format;
var $angle=0;
var $widths;
var $aligns;
// private functions
function RoundedRect($x, $y, $w, $h, $r, $style = '')
{
	$k = $this->k;
	$hp = $this->h;
	if($style=='F')
		$op='f';
	elseif($style=='FD' || $style=='DF')
		$op='B';
	else
		$op='S';
	$MyArc = 4/3 * (sqrt(2) - 1);
	$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
	$xc = $x+$w-$r ;
	$yc = $y+$r;
	$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

	$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
	$xc = $x+$w-$r ;
	$yc = $y+$h-$r;
	$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
	$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
	$xc = $x+$r ;
	$yc = $y+$h-$r;
	$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
	$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
	$xc = $x+$r ;
	$yc = $y+$r;
	$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
	$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
	$this->_out($op);
}

function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
{
	$h = $this->h;
	$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
						$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
}

function Rotate($angle, $x=-1, $y=-1)
{
	if($x==-1)
		$x=$this->x;
	if($y==-1)
		$y=$this->y;
	if($this->angle!=0)
		$this->_out('Q');
	$this->angle=$angle;
	if($angle!=0)
	{
		$angle*=M_PI/180;
		$c=cos($angle);
		$s=sin($angle);
		$cx=$x*$this->k;
		$cy=($this->h-$y)*$this->k;
		$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
	}
}

function _endpage()
{
	if($this->angle!=0)
	{
		$this->angle=0;
		$this->_out('Q');
	}
	parent::_endpage();
}

// public functions
function sizeOfText( $texte, $largeur )
{
	$index    = 0;
	$nb_lines = 0;
	$loop     = TRUE;
	while ( $loop )
	{
		$pos = strpos($texte, "\n");
		if (!$pos)
		{
			$loop  = FALSE;
			$ligne = $texte;
		}
		else
		{
			$ligne  = substr( $texte, $index, $pos);
			$texte = substr( $texte, $pos+1 );
		}
		$length = floor( $this->GetStringWidth( $ligne ) );

if ($largeur == 0) {
	 $largeur = 1;
}

		$res = 1 + floor( $length / $largeur) ;
		$nb_lines += $res;
	}
	return $nb_lines;
}

// Company
function addSociete( $tittle1, $tittle2,$tittle3,$tittle4,$tittle5)
{
	$x1 = 5;
	$y1 = 12;
	//Positionnement en bas
	$this->SetXY( $x1, $y1 );
	$this->SetFont('Arial','B',14);
	$this->Cell( 205, 6, $tittle1,0,1,"C");

  $this->SetX( $x1);
	$this->SetFont('Arial','B',14);
	$this->Cell( 205, 6, $tittle2,0,1,"C");

  $this->SetX( $x1);
	$this->SetFont('Arial','B',10);
	$this->Cell( 205, 6, $tittle3,0,1,"C");

  $this->SetX( $x1);
	$this->SetFont('Arial','',10);
	$this->Cell( 205, 6, $tittle4,0,1,"C");

  $this->SetX( $x1);
  $this->SetFont('Arial','',10);
  $this->Cell( 205, 6, $tittle5,0,1,"C");

  $this->SetLineWidth(0.1);
  $this->SetFillColor(190,190,190,1);

}

// Label and number of invoice/estimate
function fact_dev($lib,$num )
{
    $r1  = $this->w - 50;
    $r2  = $r1 + 50;
    $y1  = 26.5;
    $y2  =0;
    $mid = ($r1 + $r2 ) / 2;

    $texte  = $lib.$num;
    $szfont = 10;
    $loop   = 0;

    while ( $loop == 0 )
    {
       $this->SetFont( "Arial", "B", $szfont );
       $sz = $this->GetStringWidth( $texte );
       if ( ($r1+$sz) > $r2 )
          $szfont --;
       else
          $loop ++;
    }

    $this->SetLineWidth(0.1);
    $this->SetFillColor(190,190,190,1);
    // $this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 2.5, 'DF');
    $this->SetXY( $r1+1, $y1+2);
    $this->Cell($r2-$r1 -1,5, $texte, 0, 0, "C" );
}

// Estimate
function addDevis( $numdev )
{
	$string = sprintf("DEV%04d",$numdev);
	$this->fact_dev( "Devis", $string );
}

// Invoice
function addFacture( $numfact )
{
	$string = sprintf("FA%04d",$numfact);
	$this->fact_dev( "Facture", $string );
}

function addDate_MontoGeneral_TituloOrden( $date,$datototal,$titulo_orden )
{
	$r1  = $this->w - 61;
	$r2  = $r1 + 49;
	$y1  = 55;
	$y2  = $y1 ;
	$mid = $y1 + ($y2 / 2);

	$this->SetXY(160,40 );
	$this->SetFont( "Arial", "B", 9);
	$this->Cell(10,5, "Fecha :", 0, 0, "C");


	$this->SetXY( 192, 40 );
	$this->SetFont( "Arial", "IU", 9.5);
	$this->Cell(10,5,$date, 0,0, "C");

}




function addClient( $ref )
{
	$r1  = $this->w - 31;
	$r2  = $r1 + 19;
	$y1  = 17;
	$y2  = $y1;
	$mid = $y1 + ($y2 / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 3.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1+3 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,5, "CLIENT", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1 + 9 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$ref, 0,0, "C");
}

function addPageNumber( $page )
{
	$r1  = $this->w - 80;
	$r2  = $r1 + 19;
	$y1  = 17;
	$y2  = $y1;
	$mid = $y1 + ($y2 / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 3.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1+3 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,5, "PAGE", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1 + 9 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$page, 0,0, "C");
}

// Client address
function addClientAdresse( $cliente,$domicilio,$proveedor )
{
	$r1     = $this->w - 207;
	$r2     = 100;
	$y1     = 45;
	$this->SetXY( $r1+0.5, $y1);
	$this->SetFont( "Arial", "", 8.5);

	$this->Cell( 130,4,'RTN: 08019001211980',0,0);
  $this->SetFont( "Arial", "B", 16);
  $this->Cell( 65,4,utf8_decode('Nº 004-001-05-0000'),0,1);
  $this->SetFont( "Arial", "", 8.5);
  $this->SetX($r1+0.5);
  $this->Cell( 130,4,utf8_decode('CAI: 463B26-841521-ED4196-C5452D-AF25E6-19'),0,1);
  $this->ln(2);
  $this->SetX($r1+0.5);
  $this->Cell( 130,4,utf8_decode('Fecha de Emisión: _______________________________________________'),0,1);
  $this->ln(2);
  $this->SetX($r1+7);
  $this->Cell( 95,4,utf8_decode('Sr.(a): '),0,0);
  $this->RoundedRect(15, 60, 100, 10, 3.5, '');

  $r1x  = 135;
  $r2x  = $r1x + 60;
  $y1x  = 60;
  $y2x  = $y1x+10;
  $midx = $y1x + (($y2x-$y1x) / 2);
  $this->SetFillColor(190,190,190,1);
  $this->RoundedRect($r1x, $y1x, ($r2x - $r1x), ($y2x-$y1x), 2.5, '');
  $this->Line( $r1x, $midx, $r2x, $midx);
  $this->SetXY( $r1x + ($r2x-$r1x)/2 -5 , $y1x+1 );
  $this->SetFont( "Arial", "B", 10);
  $this->Cell(10,4, "RTN", 0, 0, "C");
  $this->SetXY( $r1x + ($r2x-$r1x)/2 -5 , $y1x + 5 );





$this->RoundedRect(48.8, 75, 60.2, 20, 3.5, '');
$this->RoundedRect(143.8, 75, 60.2, 20, 3.5, '');

  $this->SetFont( "Arial", "", 10);

$this->SetXY($r1+5,75);
  $this->Cell(35,5,'Fecha de Factura', 0,0, "L");
    $this->Cell(60,5,'10/20/2010', 'B',0, "C");
      $this->Cell(35,5,utf8_decode('Nº de factura'), 0,0, "C");
        $this->Cell(60,5,'10/20/2010', 'B',1, "C");
$this->SetX($r1+5);
        $this->Cell(35,5,'Fecha de Factura', 0,0, "L");
          $this->Cell(60,5,'10/20/2010', 'B',0, "C");
            $this->Cell(35,5,utf8_decode('Nº de factura'), 0,0, "C");
              $this->Cell(60,5,'10/20/2010', 'B',1, "C");
$this->SetX($r1+5);
        $this->Cell(35,5,'Fecha de Factura', 0,0, "L");
          $this->Cell(60,5,'10/20/2010', 'B',0, "C");
            $this->Cell(35,5,utf8_decode('Nº de factura'), 0,0, "C");
              $this->Cell(60,5,'10/20/2010', 'B',1, "C");

$this->SetX($r1+5);
        $this->Cell(35,5,'Fecha de Factura', 0,0, "L");
          $this->Cell(60,5,'10/20/2010', '',0, "C");
            $this->Cell(35,5,utf8_decode('Nº de factura'), 0,0, "C");
              $this->Cell(60,5,'10/20/2010', '',0, "C");


  // $this->RoundedRect(140, 60, 60, 10, 1, '');
  // $this->SetX($r1+128);
  // $this->Cell( 95,4,utf8_decode('RTN'),0,1);
  // $this->RoundedRectx(140, 70, 60, 5, 1, '1122', 'DF');

}

// Mode of payment
function addReglement( $mode )
{
	$r1  = 10;
	$r2  = $r1 + 60;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + ($r2-$r1)/2 -5 , $y1+1 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,4, "CLIENTE", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 -5 , $y1 + 5 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$mode, 0,0, "C");
}

// Expiry date
function addEcheance( $documento,$numero )
{
	$r1  = 80;
	$r2  = $r1 + 40;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + ($r2 - $r1)/2 - 5 , $y1+1 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,4, $numero, 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5 , $y1 + 5 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$numero, 0,0, "C");
}

// VAT number
function addNumTVA($tva)
{
	$this->SetFont( "Arial", "B", 10);
	$r1  = $this->w - 80;
	$r2  = $r1 + 70;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + 16 , $y1+1 );
	$this->Cell(40, 4, "DIRECCION", '', '', "C");
	$this->SetFont( "Arial", "", 10);
	$this->SetXY( $r1 + 16 , $y1+5 );
	$this->Cell(40, 5, $tva, '', '', "C");
}

function addReference($ref)
{
	$this->SetFont( "Arial", "", 10);
	$length = $this->GetStringWidth( "References : " . $ref );
	$r1  = 10;
	$r2  = $r1 + $length;
	$y1  = 92;
	$y2  = $y1+5;
	$this->SetXY( $r1 , $y1 );
	$this->Cell($length,4, "References : " . $ref);
}

function addCols( $tab )
{
	global $colonnes;

	$r1  = 9.7;
	$r2  = $this->w - ($r1 * 2) ;
	// $y1  =79.7;
  $y1  =100.7;

	$y2  = $this->h - 195.1 - $y1;

	// $this->SetXY( $r1, $y1 );
	// $this->SetLineWidth(0.7);
	// $this->Rect( $r1, 80, 196.5, $y2, "DO");

	// $this->Line( $r1, $y1+6, $r1+$r2, $y1+6);
	$colX = $r1;
	$colonnes = $tab;
	// $this->SetTextColor(255,255,255);
	$this->SetFont( "Arial", "B", 9.7);
	while ( list( $lib, $pos ) = each ($tab) )
	{

		$this->SetXY( $colX+0.2, $y1+0.3 );
		$this->Cell( $pos, 4.5, $lib, 0, 1, "C",true);
		$colX += $pos;
		// $this->Line( $colX, $y1, $colX, $y1+$y2);
	}
	$this->SetFont( "Arial", "", 9);
}

function addLineFormat( $tab )
{
	global $format, $colonnes;

	while ( list( $lib, $pos ) = each ($colonnes) )
	{
		if ( isset( $tab["$lib"]) )

			$format[ $lib ] = $tab["$lib"];


	}
}

// function lineVert( $tab )
// {
// 	global $colonnes;
//
// 	reset( $colonnes );
// 	$maxSize=0;
// 	while ( list( $lib, $pos ) = each ($colonnes) )
// 	{
// 		$texte = $tab[ $lib ];
// 		$longCell  = $pos -22;
// 		$size = $this->sizeOfText( $texte, $longCell );
// 		if ($size > $maxSize)
// 			$maxSize = $size;
// 	}
// 	return $maxSize;
// }

// add a line to the invoice/estimate
/*    $ligne = array( "REFERENCE"    => $prod["ref"],
                      "DESIGNATION"  => $libelle,
                      "QUANTITE"     => sprintf( "%.2F", $prod["qte"]) ,
                      "P.U. HT"      => sprintf( "%.2F", $prod["px_unit"]),
                      "MONTANT H.T." => sprintf ( "%.2F", $prod["qte"] * $prod["px_unit"]) ,
                      "TVA"          => $prod["tva"] );
*/

function addLine( $ligne, $tab )
{
	global $colonnes, $format;

	$ordonnee     = 10;
	$maxSize      = $ligne;

	$this->SetFont( "Arial", "", 8.5);


	reset( $colonnes );
	while ( list( $lib, $pos ) = each ($colonnes) )
	{
		$longCell  = $pos;
		$texte     = $tab[ $lib ];

		$length    = $this->GetStringWidth( $texte );
		$tailleTexte = $this->sizeOfText( $texte, $length );
		$formText  = $format[ $lib ];


		$this->SetXY( $ordonnee, $ligne-2);
		$this->MultiCell( $longCell, 4 , $texte, 0, $formText);
		if ( $maxSize < ($this->GetY()  ) )
			$maxSize = $this->GetY() ;
		$ordonnee += $pos;
	}
	return ( $maxSize - $ligne );
}

function addRemarque($remarque)
{
	$this->SetFont( "Arial", "", 10);
	$length = $this->GetStringWidth( "Remarque : " . $remarque );
	$r1  = 10;
	$r2  = $r1 + $length;
	$y1  = $this->h - 45.5;
	$y2  = $y1+5;
	$this->SetXY( $r1 , $y1 );
	$this->Cell($length,4, "Remarque : " . $remarque);
}



//
// function addTVAs( $st, $dt,$stdesc,$imp,$total,$moneda )
// {
// 	setlocale(LC_MONETARY, 'en_US');
// 	$this->SetFont('Arial','',8);
//
// 	$re  = $this->w - 40;
// 	$rf  = $this->w - 9;
// 	$y1  = $this->h - 70;
// 	$this->SetFont( "Arial", "", 9.5);
// 	$this->SetXY( $re, $y1+5 );
// 	$this->Cell( 17,4, number_format($st, 2, '.', ','), '', '', 'L');
// 	$this->SetXY( $re, $y1+10 );
// 	$this->Cell( 17,4, number_format($dt, 2, '.', ','), '', '', 'L');
// 	$this->SetXY( $re, $y1+14.8 );
// 	$this->Cell( 17,4, number_format($stdesc, 2, '.', ','), '', '', 'L');
// 	$this->SetXY( $re, $y1+19 );
// 	$this->Cell( 17,4, number_format($imp, 2, '.', ','), '', '', 'L');
// 	$this->SetFont( "Arial", "U", 10);
// 	$this->SetXY( $re, $y1+24 );
// 	$this->Cell( 17,4, number_format($total, 2, '.', ','), '', '', 'L');
//
// }



//COMEINZA CLASE EXTENDIDA

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetCellMargin($margin){
     // Set cell margin
     $this->cMargin = $margin;
 }

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=4*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,4,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}


function Rowedit($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=4*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		// $this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,4,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function Rowdefault($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=6*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->SetFillColor(184, 215, 232);
		$this->MultiCell($w,6,$data[$i],1,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}




function titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2)
{

//LOGO 1
	$this->Image($logo1 , 10 ,10, 25 , 25 , $ext_logo1);
// LOGO 2
	$this->Image($logo2 , 180 ,10, 25 , 23.5 , $ext_logo2);


}

function plot_table($widths, $lineheight, $table, $border=1, $aligns=array(), $fills=array(), $links=array()){
		$func = function($text, $c_width){
				$len=strlen($text);
				$twidth = $this->GetStringWidth($text);
				$split = floor($c_width * $len / $twidth - 0.4 );
				$w_text = explode( "\n", wordwrap( $text, $split, "\n", true));
				return $w_text;
		};
		foreach ($table as $line){
				$line = array_map($func, $line, $widths);
				$maxlines = max(array_map("count", $line));
				foreach ($line as $key => $cell){
						$x_axis = $this->getx();
						$height = $lineheight * $maxlines / count($cell);
						$len = count($line);
						$width = (isset($widths[$key]) === TRUE ? $widths[$key] : $widths / count($line));
						$align = (isset($aligns[$key]) === TRUE ? $aligns[$key] : '');
						$fill = (isset($fills[$key]) === TRUE ? $fills[$key] : false);
						$link = (isset($links[$key]) === TRUE ? $links[$key] : '');
						foreach ($cell as $textline){
								$this->cell($widths[$key],$height,$textline,0,0,$align,$fill,$link);
								$height += 2 * $lineheight * $maxlines / count($cell);
								$this->SetX($x_axis);
						}
						if($key == $len - 1){
								$lbreak=1;
						}
						else{
								$lbreak = 0;
						}
						$this->cell($widths[$key],$lineheight * $maxlines, '',$border,$lbreak);
				}
		}
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}





// add a watermark (temporary estimate, DUPLICATA...)
// call this method first
function temporaire( $texte )
{
	$this->SetFont('Arial','B',50);
	$this->SetTextColor(203,203,203);
	$this->Rotate(45,55,190);
	$this->Text(55,190,$texte);
	$this->Rotate(0);
	$this->SetTextColor(0,0,0);
}

}
?>

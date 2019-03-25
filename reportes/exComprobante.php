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

// FUNCION PARA LOS TIT
function titulos_encabezados( $tittle1, $tittle2, $tittle3, $tittle4, $tittle5 )
{
	$x1 = 37;
	$y1 = 12;

	$this->SetXY( $x1, $y1 );
	$this->SetFont('Arial','B',12);
	$length = $this->GetStringWidth( $tittle1 );
	$this->Cell( $length, 2, $tittle1);


	$this->SetXY( $x1+40, $y1 + 5 );
	$this->SetFont('Arial','',10);
	$this->Cell( $length, 2, $tittle2);

	$this->SetXY( $x1+44, $y1 + 10 );
	$this->SetFont('Arial','',10);
	$this->Cell( $length, 2, $tittle3);

	$this->SetXY( $x1+46, $y1 + 15 );
	$this->SetFont('Arial','B',11);
	$this->Cell( $length, 2, $tittle4);


	$this->SetXY( $x1+15, $y1 + 20 );
	$this->SetFont('Arial','',8);
	$this->Cell( $length, 2, $tittle5);

}

// Label and number of invoice/estimate
function fact_dev($lib,$num )
{
    $r1  = $this->w - 50;
    $r2  = $r1 + 50;
    $y1  = 23.5;
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
	// $this->RoundedRect($r1, $y1, ($r2 - $r1), $y2, 3.5, 'D');
	// $this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY(175,40 );
	$this->SetFont( "Arial", "B", 9);
	$this->Cell(10,5, "Fecha :", 0, 0, "C");
	$this->SetXY( 192, 35 );
	$this->SetFont( "Arial", "I", 9);
	$this->Cell(10,5, "mm/dd/aaaa", 0, 0, "C");
	$this->SetXY( 192, 40 );
	$this->SetFont( "Arial", "IU", 9.5);
	$this->Cell(10,5,$date, 0,0, "C");

	$this->SetXY(171,45 );
	$this->SetFont( "Arial", "B", 9);
	$this->Cell(10,5, "Solicitamos :", 0, 0, "C");

	$this->SetXY( 192, 45 );
	$this->SetFont( "Arial", "IU", 9.5);
	$this->Cell(10,5,"$titulo_orden", 0,0, "C");

	$this->SetXY( 192, 57 );
	$this->SetFont( "Arial", "", 9.5);
	$this->Cell(10,5,"$datototal", 0,0, "C");
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
function addClientAdresse( $cliente,$domicilio,$email )
{
	$r1     = $this->w - 207;
	$r2     = 100;
	$y1     = 36;

	$this->SetXY( 37,35.5);
	$this->SetFont( "Arial", "B", 8.5);
  $this->SetLineWidth(0.4);
	$this->Cell(170,5.5,strtoupper($cliente),1,1,'L',0);

	$this->SetXY( 37, 41);
	$this->SetFont( "Arial", "", 8);
	$this->Cell(110,5.5,strtoupper('                      '.$email),1,0,'L',0);
	$this->Cell(60,5.5,utf8_decode('                          0001'),1,1,'L',0);


	$this->SetXY( 37,46.5);
	$this->SetFont( "Arial", "B", 8.5);
	$this->Cell(40,15,'',1,0,'L',0);
	$this->Cell(130,15,'',1,1,'L',0);

	$this->Ln(3);

	$this->Cell(197,15,'',1,1,'L',0);
	$this->Cell(67,35,'',1,0,'L',0);
	$this->Cell(67,35,'',1,0,'L',0);
	$this->Cell(63,35,'',1,0,'L',0);


	$this->SetXY( $r1+0.5, $y1);
	$this->SetFont( "Arial", "B", 8.5);
	$this->MultiCell( 60, 4, utf8_decode("Pagando al Sr. (a)"));


	$this->SetXY( $r1+1, $y1+5.5);
	$this->SetFont( "Arial", "B", 8.5);
	$this->MultiCell( 120, 4, utf8_decode("Cheque del             Banco (s) " ));

	$this->SetXY( $r1+138, $y1+5.5);
	$this->SetFont( "Arial", "B", 8.5);
	$this->MultiCell( 50, 4, utf8_decode("Cheque N°: " ));


	$this->SetXY( $r1, $y1+11);
	$this->SetFont( "Arial", "B", 8.5);
	$this->MultiCell( 220, 4, utf8_decode("La cantidad de:"));

	$this->SetXY( $r1+28, $y1+11);
	$this->SetFont( "Arial", "B", 8.5);
	$this->MultiCell( 220, 4, utf8_decode("Números  :"));

	$this->SetXY( $r1+28, $y1+16);
	$this->SetFont( "Arial", "B", 8.5);
	$this->MultiCell( 220, 4, utf8_decode("Lps ."));


	$this->SetXY( $r1+35, $y1+16);
	$this->SetFont( "Arial", "", 8.5);
	$this->MultiCell( 220, 4, utf8_decode('180 000.00'));

	$this->SetXY( $r1, $y1+24);
	$this->SetFont( "Arial", "", 7.5);
	$this->MultiCell( 220, 4, utf8_decode('Por lo siguiente:'));

	$this->SetXY( $r1+4, $y1+28);
	$this->SetFont( "Arial", "B", 7.5);
	$this->MultiCell( 220, 8, utf8_decode('Motivo de pago: '));


}

function addCadreTVAs($monto)
{
	$this->SetFont( "Arial", "B", 8);

	$this->SetXY(78, 47.1);
	$this->Cell(80,4, "Letras :");

	$this->SetFont( "Arial", "", 8);
	$this->SetXY( 90, 48);
	$this->MultiCell(100,4, $monto);



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
	$r2  = $this->w - ($r1 * 25) ;
	$y1  = 150.5;
	$y2  = $this->h - 100 - $y1;

	$this->SetXY( $r1, $y1 );
	$this->SetLineWidth(0.7);
	$this->Rect( $r1, $y1, 196.5, $y2, "DO");

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
		if ( isset( $tab["$lib"] ) )
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

	reset( $colonnes );
	while ( list( $lib, $pos ) = each ($colonnes) )
	{
		$longCell  = $pos -2;
		$texte     = $tab[ $lib ];
		$length    = $this->GetStringWidth( $texte );
		$tailleTexte = $this->sizeOfText( $texte, $length );
		$formText  = $format[ $lib ];
		$this->SetXY( $ordonnee, $ligne-1);
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




function addCadreEurosFrancs($impuesto)
{
	$r1  = $this->w - 70;
	$r2  = $r1 + 60;
	$y1  = $this->h - 40;
	$y2  = $y1+20;

	$this->SetFont( "Arial", "B",9);
	$this->SetXY( $r1, $y1-25 );
	$this->Cell(20,4, "SubTotal Lps   :", 0, 0, "L");

	$this->SetFont( "Arial", "B",9);
	$this->SetXY( $r1-2.8, $y1-21 );
	$this->Cell(20,4, "Descuento Lps   :", 0, 0, "L");

	$this->SetFont( "Arial", "B",9);
	$this->SetXY( $r1, $y1-16.5 );
	$this->Cell(20,4, "SubTotal Lps   :", 0, 0, "L");

	$this->SetFont( "Arial", "", 8);
	$this->SetXY( $r1-18, $y1-11.5 );
	$this->Cell(20,4, $impuesto, 0, 0, "L");

	$this->SetFont( "Arial", "B", 9);
	$this->SetXY( $r1-0.6, $y1-11.8 );
	$this->Cell(20,4, "Impuesto Lps   :", 0, 0, "L");

	$this->SetXY( $r1+6, $y1-6 );
	$this->Cell(20,4, "Total Lps   :", 0, 0, "L");



	$this->SetFont( "Arial", "I", 9);
    $this->SetLineWidth(0.1);
	$this->Rect( 150, 252, 40, 0, "D");

	$this->SetXY( $r1+5.4, $y1+15 );
	$this->Cell(12,0, "Comandante General de la" , 0, 0, "L");

	$this->SetXY( $r1+5.4, $y1+19 );
	$this->Cell(12,0, "Fuerza Naval de Honduras" , 0, 0, "L");


}


function addTVAs( $st, $dt,$stdesc,$imp,$total,$moneda )
{
	$this->SetFont('Arial','',8);

	$re  = $this->w - 40;
	$rf  = $this->w - 9;
	$y1  = $this->h - 70;
	$this->SetFont( "Arial", "", 9.5);
	$this->SetXY( $re, $y1+5 );
	$this->Cell( 17,4, $moneda.sprintf("%0.2F", $st), '', '', 'L');
	$this->SetXY( $re, $y1+10 );
	$this->Cell( 17,4, $moneda.sprintf("%0.2F", $dt), '', '', 'L');
	$this->SetXY( $re, $y1+14.8 );
	$this->Cell( 17,4, $moneda.sprintf("%0.2F", $stdesc), '', '', 'L');
	$this->SetXY( $re, $y1+19 );
	$this->Cell( 17,4, $moneda.sprintf("%0.2F", $imp), '', '', 'L');
	$this->SetFont( "Arial", "U", 10);
	$this->SetXY( $re, $y1+24 );
	$this->Cell( 17,4, $moneda.sprintf("%0.2F", $total), '', '', 'L');

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

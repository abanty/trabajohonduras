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
function titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2)
{
	$x1 = 37;
	$y1 = 12;

//LOGO 1
	$this->Image($logo1 , 20 ,10, 25 , 25 , $ext_logo1);
// LOGO 2
	$this->Image($logo2 , 165 ,10, 25 , 23.5 , $ext_logo2);


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
function addClientAdresse($fecha,$num_trans,$numctapg,$cuentapg,$monto_acreditar,$tipoctapg,$num_cuenta,$banco,$descripcion,$serie)
{
	$r1     = $this->w - 207;
	$r2     = 100;
	$y1     = 36;
// 29 de Enero del 2019

		$this->SetFont( "Arial", "", 10.5);
		$this->SetXY(8, 38);
		$this->MultiCell(50,4,"Tegucigalpa M.D.C",0,C);
		$this->SetXY(9, 43);
		$this->MultiCell(50,4,$fecha,0,C);
		$this->SetXY(15, 53);
		$this->MultiCell(80,4,"Jefe Departamento de Sistema de Pagos",0,L);
		$this->SetXY(15, 58);
		$this->MultiCell(50,4,"Banco Central de Honduras",0,L);
		$this->SetXY(15, 63);
		$this->MultiCell(50,4,"Su Oficina",0,L);
		$this->SetXY(146.5, 45);
		$this->SetFont( "Arial", "B", 10.5);
		$this->MultiCell(50,4,"TRANSF.No. ".$serie." - ".$num_trans,0,L);
		$this->SetFont( "Arial", "", 10.8);
		$this->SetXY(15, 72);
		$this->MultiCell(50,4,utf8_decode("Estimados Señores"),0,L);
		$this->SetXY(15, 82);
		$this->MultiCell(180,4,utf8_decode("Autorizamos  al  Banco  Central  de  Honduras  a  efectuar  la  Transferencia  de  Fondos  de  la  siguiente  manera:"),0,L);
		$this->SetFont( "Arial", "B", 11);

		//PRIMERA CELDA CON BORDER
		$this->SetXY(15, 95);
		$this->SetLineWidth(0.3);
		$this->MultiCell(180,10,"",0,L);

		$this->SetXY(15, 110);
		$this->SetFillColor(184, 215, 232);
	  $this->Cell(180,5,'DEBITESE',1,1,'C',1); //PRIMERA CELDA LARGA DEBITESE

		//3 COLUMNAS DEl CUERPO
		$this->SetXY(15, 115);
		$this->SetFont( "Arial", "", 10.5);
		$this->Cell(60,5,'NUMERO DE CUENTA',1,0,'C',0);
		$this->Cell(60,5,'NOMBRE DE LA CUENTA',1,0,'C',0);
		$this->Cell(60,5,'VALOR EN NUMEROS',1,1,'C',0);
		$this->SetXY(15, 120);
		$this->SetFont( "Arial", "B", 10.5);
		$this->Cell(60,20,$numctapg,1,0,'C',0);
		$this->Cell(60,20,'',1,0,'C',0);
		$this->Cell(60,20,'L. '.number_format($monto_acreditar, 2, '.', ','),1,1,'C',0);

		$this->SetXY(15, 145);
		$this->SetFillColor(184, 215, 232);
		$this->Cell(180,5,'ACREDITESE',1,1,'C',1); //SEGUNDA CELDA LARGA ACREDITESE
		$this->SetXY(15, 150);
		$this->SetFont( "Arial", "", 10.5);
		$this->Cell(60,10,'TIPO DE CUENTA',1,0,'C',0);
		$this->Cell(60,5,'NOMBRE DE LA INSTITUCION',1,0,'C',0);
		$this->Cell(60,5,'VALOR EN NUMEROS',1,1,'C',0);
		$this->SetXY(75, 155);
		$this->SetFont( "Arial", "B", 10.5);
		$this->Cell(60,5,$banco,1,0,'C',0);
		$this->Cell(60,5,'L. '.number_format($monto_acreditar, 2, '.', ','),1,1,'C',0);
		$this->SetXY(15, 160);
		$this->Cell(60,20,strtoupper($tipoctapg),1,0,'C',0);
		$this->Cell(60,20,$num_cuenta,1,0,'C',0);
		$this->Cell(60,20,'',1,1,'C',0);

		$this->SetXY(15, 185);
		$this->SetFillColor(184, 215, 232);
		$this->Cell(180,5,'SINOPSIS',1,1,'C',1); //SEGUNDA CELDA LARGA ACREDITESE
		$this->SetXY(15, 190);
		$this->SetFillColor(255, 255, 255);
		$this->SetFont( "Arial", "", 10.5);
		$this->Cell(180,20,'',1,1,'C',1);


		$this->SetXY(15, 215);
		$this->Cell(180,5,'Atentamente:',0,1,'L',1); //SEGUNDA CELDA LARGA ACREDITESE
		$this->SetXY(35, 225);
		$this->Cell(70,5,'Contralmirante:',0,0,'L',1); //SEGUNDA CELDA LARGA ACREDITESE
		$this->Cell(95,5,'Capitan de Fragata C.G.',0,1,'C',1);

		$this->SetXY(15, 245);
		$this->SetFont( "Arial", "B", 10.5);
		$this->Cell(68,5,'EFRAIN MANN HERNANDEZ:',0,0,'C',1); //SEGUNDA CELDA LARGA ACREDITESE
		$this->Cell(30,5,'',0,0,'C',1);
		$this->Cell(80,5,'ERNESTO ANTONIO AVILA KATTAN',0,1,'C',1);
		$this->SetXY(15, 250);
		$this->SetFont( "Arial", "", 10.5);
		$this->Cell(68,5,'Comandante General:',0,0,'C',1); //SEGUNDA CELDA LARGA ACREDITESE
		$this->Cell(30,5,'',0,0,'C',1);
		$this->Cell(80,5,'Pagador General',0,1,'C',1);


		// DATOS AISLADO
		$this->SetXY(15, 195);
		$this->MultiCell(180,5,strtoupper($descripcion),0,'C',0);

		$this->SetXY(75, 120);
		$this->SetFont( "Arial", "B", 10.5);
		$this->MultiCell(60,5,strtoupper($cuentapg),0,C);

		$this->SetXY(135, 167);
		$this->MultiCell(60,5,"PAGADURIA FUERZA NAVAL",0,C);

}

function addCadreTVAs($monto)
{

	$this->SetFont( "Arial", "B", 10.5);
	$this->SetXY( 15, 96);
	$this->MultiCell(180,4, utf8_decode("DIEZ MILLÓNES MAS CARACTERES DIEZ MIL CIENTO ONCE LEMPIRAS EXACTAS CON QUINCE CENTAVOS (15/100) M.N
	DIEZ MILLÓNES MAS CARACTERES DIEZ "),1,C);

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

	$r1  = 5;
	$r2  = $this->w - ($r1 * 12) ;
	$y1  = 160.5;
	$y2  = $this->h - 100 - $y1;

	// $this->SetFillColor(0, 255, 0);


	// $this->Line( $r1, $y1+6, $r1+$r2, $y1+6);
	$colX = $r1;
	$colonnes = $tab;
	// $this->SetTextColor(255,255,255);
	$this->SetFont( "Arial", "B", 8);
	while ( list( $lib, $pos ) = each ($tab) )
	{
		$this->SetXY( $colX+5, $y1-81 );
		$this->Cell( $pos, 5, $lib, 0, 1, "C",false);
		$colX += $pos;
		// $this->Line( $colX, $y1, $colX, $y1+$y2);
	}
	$this->SetFont( "Arial", "", 8);
}



function addCols2( $tab )
{
	global $colonnes;

	$r1  = 5;
	$r2  = $this->w - ($r1 * 12) ;
	$y1  = 160.5;
	$y2  = $this->h - 100 - $y1;

	// $this->SetFillColor(0, 255, 0);


	// $this->Line( $r1, $y1+6, $r1+$r2, $y1+6);
	$colX = $r1;
	$colonnes = $tab;
	// $this->SetTextColor(255,255,255);
	$this->SetFont( "Arial", "B", 8);
	while ( list( $lib, $pos ) = each ($tab) )
	{
		$this->SetXY( $colX+72, $y1-81 );
		$this->Cell( $pos, 5, $lib, 0, 1, "C",false);
		$colX += $pos;
		// $this->Line( $colX, $y1, $colX, $y1+$y2);
	}
	$this->SetFont( "Arial", "", 8);
}


function addCols3( $tab )
{
	global $colonnes;

	$r1  = 0;
	$r2  = $this->w - ($r1 * 12) ;
	$y1  = 156;
	$y2  = $this->h - 50 - $y1;

	$colX = $r1;
	$colonnes = $tab;
	$this->SetFont( "Arial", "B", 8.5);
	while ( list( $lib, $pos ) = each ($tab) )
	{
		$this->SetXY( $colX+33, $y1-30 );
		$this->Cell( $pos, 5, $lib, 0, 1, "C",false);
		$colX += $pos;
	}
	$this->SetFont( "Arial", "", 8);
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


function addLine( $ligne, $tab )
{
	global $colonnes, $format;

	$ordonnee     = 13.5;
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


function addLine2( $ligne, $tab )
{
	global $colonnes, $format;

	$ordonnee     = 82;
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


function addLine3( $ligne, $tab )
{
	global $colonnes, $format;

	$ordonnee     = 34;
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
	$r1  = $this->w - 125;
	$r2  = $r1 + 10;
	$y1  = $this->h - 80;
	$y2  = $y1+20;
}


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

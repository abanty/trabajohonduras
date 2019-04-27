<?php
require('../fpdf181/fpdf.php');


class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

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

function Rowdefault2($data)
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
		$this->SetFillColor(184, 215, 232);
		$this->MultiCell($w,4,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2)
{
	$x1 = 37;
	$y1 = 12;

//LOGO 1
	$this->Image($logo1 , 20 ,10, 25 , 25 , $ext_logo1);
// LOGO 2
	$this->Image($logo2 , 165 ,10, 25 , 23.5 , $ext_logo2);


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
}
?>

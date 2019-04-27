<?php
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
//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');

//Obtenemos los datos de la cabecera de la comprobante actual
require_once "../modelos/Transferenciabch.php";
$solicitud= new Transferenciabch();

$rsptac = $solicitud->solicitud_transferencias($_GET["id"]);
//Recorremos todos los valores obtenidos
$regv = $rsptac->fetch_object();

//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table('P', 'mm', 'A4');

//Agregamos la primera página al documento pdf
$pdf->AddPage();
$pdf->SetMargins(15,10,30);

//Seteamos el inicio del margen superior en 25 pixeles
$y_axis_initial = 0;
$logo1 = "logo1.jpg";
$ext_logo1 = "jpg";
$logo2 = "logo2.jpg";
$ext_logo2 = "jpg";

$date = new DateTime($regv->fecha_hora);
$contactnumtrans = $regv->num_transf.' '.$regv->serie_transf;
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá

$pdf->titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2);
$pdf->SetFont( "Arial", "", 10.5);
$pdf->SetXY(8, 38);
$pdf->MultiCell(50,4,"Tegucigalpa M.D.C",0,C);
$pdf->SetXY(8, 43);
$pdf->MultiCell(50,4,$date->format('j \of F \of Y'),0,C);
$pdf->SetXY(15, 53);
$pdf->MultiCell(80,4,"Jefe Departamento de Sistema de Pagos",0,L);
$pdf->SetXY(15, 58);
$pdf->MultiCell(50,4,"Banco Central de Honduras",0,L);
$pdf->SetXY(15, 63);
$pdf->MultiCell(50,4,"Su Oficina",0,L);
$pdf->SetXY(146.5, 45);
$pdf->SetFont( "Arial", "B", 10.5);
$pdf->MultiCell(50,4,"TRANSF.No. ".$contactnumtrans,0,L);
$pdf->SetFont( "Arial", "", 10.8);
$pdf->SetXY(15, 72);
$pdf->MultiCell(50,4,utf8_decode("Estimados Señores"),0,L);
$pdf->SetXY(15, 82);
$pdf->MultiCell(180,4,utf8_decode("Autorizamos  al  Banco  Central  de  Honduras  a  efectuar  la  Transferencia  de  Fondos  de  la  siguiente  manera:"),0,L);
$pdf->Ln(5);

require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_acreditar,"LEMPIRAS EXACTAS"));

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(180,4,"\n".$con_letra."\n"." ",1,C);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);

 $pdf->SetLineWidth(0.01);
$pdf->SetFillColor(185, 199, 228,1);
$pdf->Cell(180,5,'DEBITESE',1,1,'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(60,6,'NUMERO DE CUENTA',1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('NOMBRE DE LA CUENTA'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('VALOR EN NUMEROS'),1,1,'C',1);


$texta = "\n".$regv->numctapg."\n"." ";
$textb = strtoupper("\n".$regv->cuentapg."\n"." ");
$textc = "\n".number_format($regv->monto_acreditar, 2, '.', ',')."\n"." ";
$textj = "\n".utf8_decode(strtoupper($regv->descripcion))."\n"." ";

$textd = strtoupper($regv->tp_prov);
$texte = strtoupper($regv->nombre_banco);
$textf = number_format($regv->monto_acreditar, 2, '.', ',');

$textg = "";
$texth = $regv->num_cuenta;
$texti = number_format($regv->monto_acreditar, 2, '.', ',');


$pdf->SetWidths(array(60,60,60));

$pdf->SetFont('Arial','',9.5);
$pdf->Row(array($texta,$textb,$textc));

$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(185, 199, 228,1);
$pdf->Cell(180,6,'ACREDITESE',1,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(60,6,'TIPO CUENTA',1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('NOMBRE DE LA INSTITUCIÓN'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('VALOR EN NUMEROS'),1,1,'C',1);
$pdf->SetWidths(array(60,60,60));
$pdf->SetFont('Arial','',9.5);
$pdf->Rowdefault(array($textd,$texte,$textf));
$pdf->Rowdefault(array($textg,$texth,$texti));
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(185, 199, 228,1);
$pdf->Cell(180,6,'SINOPSIS',1,1,'C',1);
$pdf->SetWidths(array(180));
$pdf->SetFont('Arial','',9.5);
$pdf->Rowdefault2(array($textj));


//Mostramos el documento pdf
$pdf->Output('Solicitud de Transferencias.pdf','I');
$pdf->Close();

}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>

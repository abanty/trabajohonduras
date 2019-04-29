# trabajohonduras

#CODIGO DE RESPALDO:

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
setlocale(LC_TIME, 'es_ES');
//Agregamos la primera página al documento pdf
$pdf->AddPage();
$pdf->SetMargins(15,10,30);

//Seteamos el inicio del margen superior en 25 pixeles
$y_axis_initial = 0;
$logo1 = "logo1.jpg";
$ext_logo1 = "jpg";
$logo2 = "logo2.jpg";
$ext_logo2 = "jpg";

// En windows
setlocale(LC_TIME, 'spanish');

// $date = new DateTime($regv->fecha_hora);
$date= date('D, j \d\e F \d\e\l Y', strtotime($regv->fecha_hora));
$inicio = strftime("%d de %B del %Y", strtotime($regv->fecha_hora));

$contactnumtrans = $regv->serie_transf.'-'.$regv->num_transf;
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá

$pdf->titulos_encabezados($logo1,$ext_logo1,$logo2,$ext_logo2);
$pdf->SetFont( "Arial", "", 11);
$pdf->SetXY(8, 38);
$pdf->MultiCell(50,4,"Tegucigalpa M.D.C",0,C);
$pdf->SetXY(8, 43);
$pdf->MultiCell(50,4,$inicio,0,C);
$pdf->SetXY(15, 53);
$pdf->MultiCell(100,4,"Jefe Departamento de Sistema de Pagos",0,L);
$pdf->SetXY(15, 58);
$pdf->MultiCell(100,4,"Banco Central de Honduras",0,L);
$pdf->SetXY(15, 63);
$pdf->MultiCell(100,4,"Su Oficina",0,L);
$pdf->SetXY(146.5, 45);
$pdf->SetFont( "Arial", "B", 11);
$pdf->MultiCell(60,4,"TRANSF.No. ".$contactnumtrans,0,L);
$pdf->SetFont( "Arial", "", 11);
$pdf->SetXY(15, 72);
$pdf->MultiCell(50,4,utf8_decode("Estimados Señores"),0,L);
$pdf->SetXY(15, 82);
$pdf->MultiCell(180,4,utf8_decode("Autorizamos  al  Banco  Central  de  Honduras  a  efectuar  la  Transferencia  de  Fondos  de  la  siguiente  manera:"),0,L);
$pdf->Ln(5);

require_once "Letras.php";
$V=new EnLetras();
$con_letra=strtoupper($V->ValorEnLetras($regv->monto_acreditar,"DE LEMPIRAS"));

$pdf->SetFont('Arial','',11);
$pdf->MultiCell(180,4,"\n".utf8_decode($con_letra)."\n"." ",1,C);




$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);

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

$textd = "";
$texte = strtoupper($regv->nombre_banco."");
$textf = number_format($regv->monto_acreditar, 2, '.', ',');

$textg = strtoupper($regv->tp_prov);
$texth = $regv->num_cuenta;
$texti = $regv->casa_comercial."";


$pdf->SetWidths(array(60,60,60));

$pdf->SetFont('Arial','',11);
$pdf->Row(array($texta,$textb,$textc));

$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(185, 199, 228,1);
$pdf->Cell(180,6,'ACREDITESE',1,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(60,11,'TIPO CUENTA','LT',0,'C',0);
$pdf->Cell(60,6,utf8_decode('NOMBRE DE LA INSTITUCIÓN'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('VALOR EN NUMEROS'),1,1,'C',1);
$pdf->SetWidths(array(60,60,60));
$pdf->SetFont('Arial','',11);
$pdf->experimentrow(array($textd,$texte,$textf));
$pdf->Rowdefault(array($textg,$texth,$texti));
$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(185, 199, 228,1);
$pdf->Cell(180,6,'SINOPSIS',1,1,'C',1);
$pdf->SetWidths(array(180));
$pdf->SetFont('Arial','',11);
$pdf->Rowdefault2(array($textj));
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(180,6,'Atentamente ',0,1,'L',1);
//Mostramos el documento pdf
$textfirma1 = "Contralmirante" ;
$textfirma2 =  "Capitan de Fragata C.G";
$textfirma3 = strtoupper("EFRAIN MANN HERNANDEZ");
$textfirma4 =  strtoupper("ERNESTO ANTONIO AVILA KATTAN");
$textfirma5 = "Comandante General";
$textfirma6 =  "Pagador General";

$pdf->Ln(5);
$pdf->SetWidths(array(90,90));
$pdf->SetFont('Arial','',11);

$pdf->Rowdefaultnoline(array($textfirma1,$textfirma2));
$pdf->Ln(20);
$pdf->SetFont('Arial','B',11);
$pdf->Rowdefaultnoline(array($textfirma3,$textfirma4));
$pdf->Ln(1);
$pdf->SetFont('Arial','',11);
$pdf->Rowdefaultnoline(array($textfirma5,$textfirma6));

// $pdf->SetFillColor(255, 255,255,255);
// $pdf->SetXY(15, 160 );
// $pdf->MultiCell(60,4,"AAAAAAAAAAAAARRRRRRRRRRRRRRRRRE",1,C,1);


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

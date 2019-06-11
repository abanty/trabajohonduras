<?php
//Incluir AUTOLOAD
require('../vendor/autoload.php');

//Incluir phpspreadsheet class usando namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);

$spreadsheet
    ->getProperties()
    ->setCreator("Aquí va el creador, como cadena")
    ->setLastModifiedBy('Parzibyte') // última vez modificado por
    ->setTitle('Mi primer documento creado con PhpSpreadSheet')
    ->setSubject('El asunto')
    ->setDescription('Este documento fue generado para parzibyte.me')
    ->setKeywords('etiquetas o palabras clave separadas por espacios')
    ->setCategory('La categoría');

$spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);

$sheet->setCellValue('A1', 'REPORTE DE SISTEMA FNH DE LA MARINA DE HONDURAS');
$spreadsheet->getActiveSheet()->mergeCells("A1:F2");

$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->getSize(25);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

// $spreadsheet->getActiveSheet()->getColumnDimension('A')->SetWidth();
// $spreadsheet->getActiveSheet()->getColumnDimension('B')->SetWidth();
// $spreadsheet->getActiveSheet()->getColumnDimension('C')->SetWidth();

$sheet->setCellValue('A4', '#');
$sheet->setCellValue('B4', 'NOMBRENOMBRENOMBRE  ');
$sheet->setCellValue('C4', 'RHFN');


require_once "../modelos/Uuss.php";
$excel = new Uuss();
$rsptac = $excel->datosphpexcel();
  $n = 4;
  while ($regd = $rsptac->fetch_object()) {
      $rowNum = $n+1;
      $spreadsheet->getActiveSheet()->getStyle('A'.$rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->setCellValue('A'.$rowNum, $n);
      $sheet->setCellValue('B'.$rowNum, $regd->nombreuuss);
      $sheet->setCellValue('C'.$rowNum, $regd->rhfn);
      $n++;
    }


$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment;filename="result.xlsx"');
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="Reporte por Proveedor.xlsx"');
      header('Cache-Control: max-age=0');
      // If you're serving to IE 9, then the following may be needed
      header('Cache-Control: max-age=1');

      // If you're serving to IE over SSL, then the following may be needed
      header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
      header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header('Pragma: public'); // HTTP/1.0
// Guardar en una salida de php
$writer->save('php://output');
exit;


 ?>

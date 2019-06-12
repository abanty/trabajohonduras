<?php
//Incluir AUTOLOAD
require('../vendor/autoload.php');

//Incluir phpspreadsheet class usando namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load("controladores_fpdf/template_compromisos.xlsx");
// $spreadsheet = new Spreadsheet();

// $sheet = $spreadsheet->getActiveSheet();

require_once "../modelos/ReportesExcel.php";
$excel = new ReportesExcel();
$rsptac = $excel->compromisosprovedores();

$contentStartRow = 5;
$currentContentRow = 5;

// ($regd->condicion = 0 && $regd->condicion = 1) ? $regd->condicion = 'Pendiente': $regd->condicion = 'INVALIDO';


  while ($regd = $rsptac->fetch_object()) {

(($regd->condicion == 0)||($regd->condicion == 1) )? $varcontent = 'Pendiente': $varcontent = 'Invalido';


    $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow+1,1);

    $spreadsheet->getActiveSheet()
                ->setCellValue('A'.$currentContentRow, $currentContentRow-4)
                ->setCellValue('B'.$currentContentRow, $regd->fecha)
                ->setCellValue('C'.$currentContentRow, $regd->tipo_registro)
                ->setCellValue('D'.$currentContentRow, $regd->nombrep)
                ->setCellValue('E'.$currentContentRow, $regd->casa_comercial)
                ->setCellValue('F'.$currentContentRow, $regd->numfactura)
                ->setCellValue('G'.$currentContentRow, $regd->total_compra)
                ->setCellValue('H'.$currentContentRow, $regd->fecharegistro)
                ->setCellValue('I'.$currentContentRow, $varcontent);
                $currentContentRow++;
    }

    $spreadsheet->getActiveSheet()->removeRow($currentContentRow,2);



    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte por Proveedor.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment;filename="result.xlsx"');

      // header('Cache-Control: max-age=0');
      // // If you're serving to IE 9, then the following may be needed
      // header('Cache-Control: max-age=1');
      //
      // // If you're serving to IE over SSL, then the following may be needed
      // header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      // header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
      // header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      // header('Pragma: public'); // HTTP/1.0
// Guardar en una salida de php
$writer->save('php://output');
exit;


?>

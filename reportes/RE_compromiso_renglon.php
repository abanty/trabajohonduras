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
$spreadsheet = $reader->load("controladores_fpdf/template_compromisos_renglon.xlsx");
// $spreadsheet = new Spreadsheet();

// $sheet = $spreadsheet->getActiveSheet();

require_once "../modelos/ReportesExcel.php";
$excel = new ReportesExcel();
$rsptac = $excel->compromisosrenglones();

$contentStartRow = 5;
$currentContentRow = 5;

  while ($regd = $rsptac->fetch_object()) {

    (($regd->condicion == 0)||($regd->condicion == 1) )? $varcontent = 'Pendiente': $varcontent = 'Invalido';

    $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow+1,1);

    $spreadsheet->getActiveSheet()
                ->setCellValue('A'.$currentContentRow, $currentContentRow-4)
                ->setCellValue('B'.$currentContentRow, $regd->nombre_objeto)
                ->setCellValue('C'.$currentContentRow, $regd->codigo)
                ->setCellValue('D'.$currentContentRow, $regd->total_valores)
                ->setCellValue('E'.$currentContentRow, $regd->condicion);
                $currentContentRow++;
    }

    $spreadsheet->getActiveSheet()->removeRow($currentContentRow,2);



    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte Compromisos Pendiente Por Renglon.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
// Guardar en una salida de php
$writer->save('php://output');
exit;


?>

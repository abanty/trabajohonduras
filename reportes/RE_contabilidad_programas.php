<?php
//Incluir AUTOLOAD
require('../vendor/autoload.php');

//Incluir phpspreadsheet class usando namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
// use PhpOffice\PhpSpreadsheet\Helper\Html as HtmlHelper;

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load("controladores_fpdf/template_contabilidad_programas.xlsx");

$styleArraybotton = [
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'hex' => '#ffffff',
        ],
        'endColor' => [
            'hex' => '#9dc4e6',
        ],
    ],
];

$styleArraytop = [
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 270,
        'startColor' => [
          'hex' => '#ffffff',
        ],
        'endColor' => [
					'hex' => '#9dc4e6',
        ],
    ],
];

$spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getStyle('A8:O8')->applyFromArray($styleArraybotton);
$spreadsheet->getActiveSheet()->getStyle('A7:O7')->applyFromArray($styleArraytop);

require_once "../modelos/Consultas.php";
$excel = new Consultas();

$año = $_GET['año'];
// $fecha_fin = $_GET['fecha_fin_excel'];
// $fecha_inicio,$fecha_fin
$rsptac = $excel->contabilidad_programas($año);

$contentStartRow = 9;
$currentContentRow = 9;

  while ($regd = $rsptac->fetch_object()) {

        // $html1 = '<b><u>'.strtoupper($regd->proveedor).'</u></b><b> : </b><p>'.strtoupper($regd->descripcion).'</p> ';
        // $wizard = new HtmlHelper();

        $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow+1,1);
		    $spreadsheet->getActiveSheet()
				->setCellValue('A'.$currentContentRow, $currentContentRow-8)
				->setCellValue('B'.$currentContentRow, $regd->PROGRAMA)
				->setCellValue('C'.$currentContentRow, $regd->ENERO)
				->setCellValue('D'.$currentContentRow, $regd->FEBRERO)
				->setCellValue('E'.$currentContentRow, $regd->MARZO)
				->setCellValue('F'.$currentContentRow, $regd->ABRIL)
				->setCellValue('G'.$currentContentRow, $regd->MAYO)
				->setCellValue('H'.$currentContentRow, $regd->JUNIO)
				->setCellValue('I'.$currentContentRow, $regd->JULIO)
        ->setCellValue('J'.$currentContentRow, $regd->AGOSTO)
				->setCellValue('K'.$currentContentRow, $regd->SEPTIEMBRE)
				->setCellValue('L'.$currentContentRow, $regd->OCTUBRE)
				->setCellValue('M'.$currentContentRow, $regd->NOVIEMBRE)
        ->setCellValue('N'.$currentContentRow, $regd->DICIEMBRE)
        ->setCellValue('O'.$currentContentRow, $regd->ACUMULADO);
        $currentContentRow++;

    }

    $spreadsheet->getActiveSheet()->removeRow($currentContentRow,2);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de Consolidado por Programas.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
// Guardar en una salida de php
$writer->save('php://output');

exit;

?>

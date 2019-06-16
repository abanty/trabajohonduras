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
$spreadsheet = $reader->load("controladores_fpdf/template_contabilidad_1.xlsx");
// $spreadsheet = new Spreadsheet();

// $sheet = $spreadsheet->getActiveSheet();

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

$spreadsheet->getActiveSheet()->getStyle('A9:L9')->applyFromArray($styleArraybotton);

$spreadsheet->getActiveSheet()->getStyle('A7:L7')->applyFromArray($styleArraytop);


require_once "../modelos/Consultas.php";
$excel = new Consultas();
// $fecha_inicio=$_REQUEST["fecha_inicio"];
// $fecha_fin=$_REQUEST["fecha_fin"];
$rsptac = $excel->consolidado_ctas_generales2();

$contentStartRow = 10;
$currentContentRow = 10;

  while ($regd = $rsptac->fetch_object()) {

		    $spreadsheet->getActiveSheet()
				->setCellValue('A'.$currentContentRow, $currentContentRow-9)
				->setCellValue('B'.$currentContentRow, $regd->fecha)
				->setCellValue('C'.$currentContentRow, $regd->unidad_superficie)
				->setCellValue('D'.$currentContentRow, $regd->cheque)
				->setCellValue('E'.$currentContentRow, strtoupper ($regd->proveedor.': '.$regd->descripcion))
				->setCellValue('F'.$currentContentRow, $regd->oc)
				->setCellValue('G'.$currentContentRow, $regd->cp)
				->setCellValue('H'.$currentContentRow, $regd->acdo)
				->setCellValue('I'.$currentContentRow, $regd->unidadbase)
				->setCellValue('J'.$currentContentRow, $regd->num_trans)
				->setCellValue('K'.$currentContentRow, $regd->objeto_gastp)
				->setCellValue('L'.$currentContentRow, $regd->monto_total);
        $currentContentRow++;

    }

    $spreadsheet->getActiveSheet()->removeRow($currentContentRow,2);



    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte de Contabilidad.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
// Guardar en una salida de php
$writer->save('php://output');
exit;


?>

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
use PhpOffice\PhpSpreadsheet\Helper\Html as HtmlHelper;

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load("controladores_fpdf/template_contabilidad_1.xlsx");

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
$spreadsheet->getActiveSheet()->getStyle('A9:L9')->applyFromArray($styleArraybotton);
$spreadsheet->getActiveSheet()->getStyle('A7:L7')->applyFromArray($styleArraytop);

require_once "../modelos/Consultas.php";
$excel = new Consultas();

$fecha_inicio = $_GET['fecha_inicio_excel'];
$fecha_fin = $_GET['fecha_fin_excel'];
$rsptac = $excel->consolidado_ctas_generales($fecha_inicio,$fecha_fin);

// $year = substr($fecha_inicio, 0, 4);

$contentStartRow = 10;
$currentContentRow = 10;

  while ($regd = $rsptac->fetch_object()) {

        $html1 = '<b><u>'.strtoupper($regd->proveedor).'</u></b><b> : </b><p>'.strtoupper($regd->descripcion).'</p> ';
        $wizard = new HtmlHelper();

        $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow+1,1);
		    $spreadsheet->getActiveSheet()
				->setCellValue('A'.$currentContentRow, $currentContentRow-9)
				->setCellValue('B'.$currentContentRow, $regd->fecha)
				->setCellValue('C'.$currentContentRow, $regd->unidad_superficie)
				->setCellValue('D'.$currentContentRow, $regd->cheque)
				->setCellValue('E'.$currentContentRow, $wizard->toRichTextObject($html1))
				->setCellValue('F'.$currentContentRow, $regd->oc)
				->setCellValue('G'.$currentContentRow, $regd->cp)
				->setCellValue('H'.$currentContentRow, $regd->acdo)
				->setCellValue('I'.$currentContentRow, $regd->unidadbase)
				->setCellValue('J'.$currentContentRow, $regd->num_trans)
				->setCellValue('K'.$currentContentRow, $regd->objeto_gasto)
				->setCellValue('L'.$currentContentRow, $regd->subtotal);
        $currentContentRow++;
        // $ax = $currentContentRow + 2;
    }
    // $spreadsheet->getActiveSheet()->setCellValue('E'.$ax, ' '.$year);
    $spreadsheet->getActiveSheet()->removeRow($currentContentRow,2);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de Consolidado Ctas Generales.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
// Guardar en una salida de php
$writer->save('php://output');

exit;

?>

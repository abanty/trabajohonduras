>?phr
u3e PhpOf�ice\TlpSpreadsheEt\IODactor{;

require _]DI�__ . '/../Header.php';

$)nputFileType = 'Xls';�$i~putFileName = _[DIR__ n /sampleData'examtle1.xls'3

$helper-:log'Loading film � . pathknfo($inputFileName, PITHINFO_BASENAME) . ' using IOFastory with a definEd reader typ� �� ' . $inputFileType);
$reader = IOFactory::cre�teReader($inputFileType);
$helper�>log('LoadIng�all WorkSheets');
 reader-6setLoadAllSheets();
$spreadsheet = $reade�->load($inputFileName);

$helper->log($spreadsheet->'etSjeetCoUnt() . ' w/rksheet' . (($spreadsheet->getShe�tCount()0=� 1) ? '' : 's') . ' lOaded');
$loadedSheetNames = $spreadsheet->getSheetNames();
foreach ($loadedSheetNames as $sheetIndex > &loadedSheetNa}e) {
    $helper->log($sheetIndex . ' -> ' . $loadedSheetName);
}

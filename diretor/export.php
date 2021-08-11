<?php echo
include '../../includes/excel/PHPExcel.php';
$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Nome');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Idade');

$linha = 2;
foreach ($dadosDoBanco as $item) {
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $linha, $item['nome']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $linha, $item['idade']);
    $linha++;
}

//formata o cabeçalho
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="lista.xls"');
header('Cache-Control: max-age=0');


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
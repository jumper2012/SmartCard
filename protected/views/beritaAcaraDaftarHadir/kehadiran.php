<?php

set_time_limit(0);
//
//$file_path = dirname(__FILE__) . '\Jadual.xlsx';
//
//$sheet_array = Yii::app()->yexcel->readActiveSheet($file_path);
//
//echo "<table>";
//
//foreach ($sheet_array as $row) {
//    echo "<tr>";
//    foreach ($row as $column)
//        echo "<td>$column.'BOS</td>";
//    echo "</tr>";
//}
//
//echo "</table>";
//or
//echo first cell of excel file

$file = $path;


Yii::import('application.vendors.phpexcel.PHPExcel', true);
$objReader = PHPExcel_IOFactory::createReader('Excel5');
//$objReader->setReadDataOnly('true');
$objPHPExcel = $objReader->load($file); //$file --> your filepath and filename
//$objWorksheet = $objPHPExcel->getActiveSheet();
//$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
//$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
//$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
//echo '<table>' . "\n";
//for ($row = 1; $row <= $highestRow; ++$row) {
//    echo '<tr>' . "\n";
//    for ($col = 0; $col <= $highestColumnIndex; ++$col) {
//        echo '<td>' . $objWorksheet->getCellByColumnAndRow($col, $row)->getValue() . '</td>' . "\n";
//    }
//    echo '</tr>' . "\n";
//}
//echo '</table>' . "\n";
$counter = 0;
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

    $worksheetTitle = $worksheet->getTitle();
//    if ($worksheetTitle == "31B") {
//        break;
//    }

    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $highestRow = $worksheet->getHighestRow(); // e.g. 10

    $kehadiran;
    for ($i = 2; $i <= $highestRow; $i++) {
        echo "<BR/>";
//        echo "Tanggal : " . PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow(1, $i)->getValue(), "YYYY-MM-DD");
        //echo $masterjadwal->KELAS . "<BR>";
//        $masterjadwal->TANGGAL = PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow(1, $i)->getValue(), "YYYY-MM-DD");
        //echo $masterjadwal->TANGGAL;


        for ($col = 0; $col < $highestColumnIndex; ++$col) {
//            $detail_jadwal[$col] = $worksheet->getCellByColumnAndRow($col, $j)->getValue();

            if ($col == 3) {
                echo PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow($col, $i)->getValue(), 'YYYY-MM-DD');
                $kehadiran[$col] = PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow($col, $i)->getValue(), 'YYYY-MM-DD');
            } else
            if ($col == 4) {
                echo PHPExcel_Style_NumberFormat::toFormattedString($worksheet->getCellByColumnAndRow($col, $i)->getCalculatedValue(), 'hh:mm:ss');
                $kehadiran[$col] = PHPExcel_Style_NumberFormat::toFormattedString($worksheet->getCellByColumnAndRow($col, $i)->getCalculatedValue(), 'hh:mm:ss');
            } else if ($col == 1 || $col == 5) {
                echo $worksheet->getCellByColumnAndRow($col, $i)->getValue();
                $kehadiran[$col] = $worksheet->getCellByColumnAndRow($col, $i)->getValue();
            }
//                echo "<BR>";
        }
//            $this->cekMaster($masterjadwal);
        $this->cekDaftarhadir($kehadiran);
    }
    $this->kehadiran();
}
//$this->jadwal();
?>

<?php ?>



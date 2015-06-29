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
//DEARDSADS
$objReader = IOFactory::createReader('Excel2007');
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
//
//
//
//    $beritahadir = new BeritaAcaraDaftarHadir;
//
//    $highestRow = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
//    $nrColumns = ord($highestColumn) - 64;
//
//    echo "<br>The worksheet " . $worksheetTitle . " has ";
//
//    echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
//    echo ' and ' . $highestRow . ' row.';
//    echo '<br>Data: <table border="1"><tr>';
//
//
//    for ($row = 1; $row <= $highestRow; ++$row) {
//        echo '<tr>';
//        for ($col = 0; $col < $highestColumnIndex; ++$col) {
//            $cell = $worksheet->getCellByColumnAndRow($col, $row);
//            $val = $cell->getValue();
//            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
//
//            $masterjadwal = new MJadwal;
//            $masterjadwal->KELAS = $worksheetTitle;
//            $masterjadwal->WEEK = $worksheet->getCellByColumnAndRow(1, 1)->getValue();
//            $masterjadwal->TA = $worksheet->getCellByColumnAndRow(1, 2)->getValue();
//            $masterjadwal->ID_KUR = $worksheet->getCellByColumnAndRow(1, 3)->getValue();
//
//            if (PHPExcel_Shared_Date::isDateTime($worksheet->getCellByColumnAndRow($col, $row))) {
//                echo '<td>' . PHPExcel_Style_NumberFormat::ToFormattedString($cell->getValue(), "YYYY-MM-DD") . '</td>';
//                $masterjadwal->TANGGAL = PHPExcel_Style_NumberFormat::ToFormattedString($cell->getValue(), "YYYY-MM-DD");
////$masterjadwal->save();
//                $row = $row + 2;
//                $col = $col - 2;
//                echo '<tr></tr>';
//            } elseif ($dataType != "null" && $val != "Tanggal") {
//                if ($row == 1 || $row == 2 || $row == 3) {
//                    continue;
//                }
//
////                echo '<td>' . $val . " " . $row . " " . $col . " " . '</td>';
////                while ($counter >= 8) {
////                    echo "if41" . $counter ;
////                    echo '<td>' . $val . " " . $row . " " . $col . " " . '</td>';
////                    $counter++;
////                }
////                $counter = 0;
////                $detailjadwal = new DJadwal;
////                $detailjadwal->ID_JADWAL = $masterjadwal->ID;
////                if ($col == 0) {
////                    $detailjadwal->SESSION = $val;
////                } elseif ($col == 1) {
////                    $detailjadwal->KODE_MK = $val;
////                } elseif ($col == 2) {
////                    $detailjadwal->RUANGAN = $val;
////                } else {
////                    $detailjadwal->AKTIFITAS = $detailjadwal->getAktifitas($val);
////                }
////
////                $beritakuliah = new BeritaAcaraKuliah;
//            }
//        }
//        echo '</tr>';
//    }
//    echo '</table>';
    $detail_jadwal;
    for ($i = 5; $i < 50; $i = $i + 11) {
        echo "<BR/>";
//        echo "Tanggal : " . PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow(1, $i)->getValue(), "YYYY-MM-DD");
        $masterjadwal = new MJadwal;
        $masterjadwal->KELAS = $worksheetTitle;
        $masterjadwal->WEEK = $worksheet->getCellByColumnAndRow(1, 1)->getValue();
        $masterjadwal->TA = $worksheet->getCellByColumnAndRow(1, 2)->getValue();
        $masterjadwal->ID_KUR = $worksheet->getCellByColumnAndRow(1, 3)->getValue();
        //echo $masterjadwal->KELAS . "<BR>";
        $masterjadwal->TANGGAL = PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow(1, $i)->getValue(), "YYYY-MM-DD");
        //echo $masterjadwal->TANGGAL;
        $masterjadwal->save();

        for ($j = $i + 2; $j < $i + 10; $j++) {
            for ($col = 0; $col < $highestColumnIndex; ++$col) {
                
                $detail_jadwal[$col] = $worksheet->getCellByColumnAndRow($col, $j)->getValue();
//                echo $worksheet->getCellByColumnAndRow($col, $j)->getValue();
//                echo "<BR>";
            }
//            $this->cekMaster($masterjadwal);
            $this->createJadwal($detail_jadwal, $masterjadwal);
        }
    }
}
$this->jadwal();
?>

<?php ?>



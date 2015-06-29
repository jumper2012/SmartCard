<?php

set_time_limit(0);
$file = dirname(__FILE__) . '\Jadual.xlsx';

Yii::import('application.vendors.phpexcel.PHPExcel', true);
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($file); //$file --> your filepath and filename
$counter = 0;
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

    $worksheetTitle = $worksheet->getTitle();
    if ($worksheetTitle == "31B") {
        break;
    }
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $detail_jadwal;
    for ($i = 5; $i < 50; $i = $i + 11) {
        echo "<BR/>";
        $masterjadwal = new MJadwal;
        $masterjadwal->KELAS = $worksheetTitle;
        $masterjadwal->WEEK = $worksheet->getCellByColumnAndRow(1, 1)->getValue();
        $masterjadwal->TA = $worksheet->getCellByColumnAndRow(1, 2)->getValue();
        $masterjadwal->ID_KUR = $worksheet->getCellByColumnAndRow(1, 3)->getValue();
        echo $masterjadwal->KELAS . "<BR>";
        $masterjadwal->TANGGAL = PHPExcel_Style_NumberFormat::ToFormattedString($worksheet->getCellByColumnAndRow(1, $i)->getValue(), "YYYY-MM-DD");
        echo $masterjadwal->TANGGAL;
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
?>

<?php
?>



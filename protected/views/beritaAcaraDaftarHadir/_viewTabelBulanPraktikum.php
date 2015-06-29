<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$tempMessg = explode("_", $data);
$message = $tempMessg[0];
$message2 = $tempMessg[1];

$temp = explode("-", $message);
$Kode = $temp[0];
$Kelas = $temp[1];
$TA = $temp[2];
?>
<?php

$mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode));
//echo $mk->NAMA_KUL_IND;
//$date = "2014-07-22";
//$date = date('Y-m-d');
$date = $message2;
$timestamp = strtotime($date);
$day = date('l', $timestamp);



$senin = array(0,0,0,0,0,0,0,0);
$selasa = array(0,0,0,0,0,0,0,0);
$rabu = array(0,0,0,0,0,0,0,0);
$kamis = array(0,0,0,0,0,0,0,0);
$jumat = array(0,0,0,0,0,0,0,0);

$seninX = array(0,0,0,0,0,0,0,0);
$selasaX = array(0,0,0,0,0,0,0,0);
$rabuX = array(0,0,0,0,0,0,0,0);
$kamisX = array(0,0,0,0,0,0,0,0);
$jumatX = array(0,0,0,0,0,0,0,0);



if ($day == 'Monday') {
    $b=1;
    for ($a = 0; $a <= 7; $a++) {

        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $senin[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $seninX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
}

if ($day == 'Tuesday') {
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $selasa[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $selasaX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-1 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $senin[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $seninX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
}
if ($day == 'Wednesday') {
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $rabu[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $rabuX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-1 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $selasa[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $selasaX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-2 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $senin[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $seninX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
}
if ($day == 'Thursday') {
    //echo $date."<br>"; 
    $b =1;
    for ($a = 0; $a <= 7; $a++) {

        //  echo $b;
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $kamis[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $kamisX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-1 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    //echo $daynow;
    $b =1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b;' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            echo $rabu[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            echo $rabuX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-2 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    //echo $daynow;
    $b =1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b;' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $selasa[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $selasaX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-3 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b =1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $senin[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $seninX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }

}
if ($day == 'Friday') {
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $jumat[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$date' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $jumatX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-1 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $kamis[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $kamisX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-2 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $rabu[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $rabuX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
    $newdate = strtotime('-3 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $selasa[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $selasaX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }

    $newdate = strtotime('-4 day', strtotime($date));
    $daynow = date('Y-m-d', $newdate);
    $b=1;
    for ($a = 0; $a <= 7; $a++) {
        $hadir[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'H'")->queryAll();
        foreach ($hadir[$a] as $item) {
            $senin[$a] = (int) $item["COUNT(*)"];
        }

        $absen[$a] = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                                WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode' AND DJ.`SESSION` = '$b' AND mj.`KELAS` = '$Kelas' AND mj.`TANGGAL` LIKE '$daynow' AND STATUS LIKE 'A'")->queryAll();
        foreach ($absen[$a] as $item) {
            $seninX[$a] = (int) $item["COUNT(*)"];
        }
        $b++;
    }
}

/* $hasil = BeritaAcaraDaftarHadir::model()->findAllBySql(" 
  SELECT * FROM berita_acara_daftar_hadir badh JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID` JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
  WHERE mj.`TA`= '$T_A' AND dj.`KODE_MK` = '$KODE_MK_form' AND mj.`KELAS` = '$Kelas_form'");

 */
?>

<?php
$tempDate = explode("-", $message2);
$bulan = $tempDate[1];
$indKehadiran = 0;
$indSesi = 0;

$session = array();
$sessionTemp = array();
$kehadiran = array();
$indSesi = 0;
$ListSesi = array();
$ListHadir = array();
$ListAbsen = array();
$ListSesiPz = array();
$indListSesiT = 0;
$indListSesiP = 0;
$indListHadir = 0;
$indListHadir2 = 0;
$indekDinHadirT = 0;
$indekDinHadirP = 0;

$sesiQuery = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                        JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                        WHERE mj.TANGGAL LIKE '%$bulan%'"
)->queryAll();
//var_dump($sesiQuery);

$tanggalQuery = Yii::app()->db->createCommand("SELECT TANGGAL FROM m_jadwal mj
                                                           WHERE mj.`TA`= '$TA' AND mj.`KELAS` = '$Kelas'
                                                           AND mj.`TANGGAL` LIKE '%$bulan%'
            ")->queryAll();
if($tanggalQuery){
    foreach($tanggalQuery as $itemTanggal)
    {
        $tanggal_X = $itemTanggal["TANGGAL"];
        $timestamp = strtotime($tanggal_X);
        $day = date('d', $timestamp);

        $sesiQueryT = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                        JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                        WHERE mj.TANGGAL LIKE '$tanggal_X'
                                                        and dj.AKTIFITAS = 'Teori'"
        )->queryAll();
        $sesiQueryP = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                        JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                        WHERE mj.TANGGAL LIKE '$tanggal_X'
                                                        and dj.AKTIFITAS = 'Praktikum'"
        )->queryAll();
        foreach($sesiQueryT as $itemSesi)
        {
            $ListSesiT[$indListSesiT] = $day." - ".$itemSesi['SESSION'];
            $ListSesiTz[$indListSesiT] = $tanggal_X." / ".$itemSesi['SESSION'];
            $indListSesiT++;
        }

        foreach($sesiQueryP as $itemSesi)
        {
            $ListSesiP[$indListSesiP] = $day." - ".$itemSesi['SESSION'];
            $ListSesiPz[$indListSesiP] = $tanggal_X." / ".$itemSesi['SESSION'];
            $indListSesiP++;
        }

        for($sesi = 1; $sesi <=8; $sesi++){
            $cekT[$indSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_X' and dj.AKTIFITAS = 'Teori'"
            )->queryAll();
            $cekP[$indSesi] = Yii::app()->db->createCommand("SELECT distinct ID_DETAIL_JADWAL FROM berita_acara_daftar_hadir badh
                                                            JOIN d_jadwal dj ON badh.`ID_DETAIL_JADWAL`=dj.`ID`
                                                            JOIN m_jadwal mj ON dj.`ID_JADWAL`=mj.`ID`
                                                            WHERE mj.`TA`= '$TA' AND dj.`KODE_MK` = '$Kode'
                                                            AND DJ.`SESSION` = '$sesi' AND mj.`KELAS` = '$Kelas'
                                                            AND mj.`TANGGAL` LIKE '$tanggal_X' and dj.AKTIFITAS = 'Praktikum'"
            )->queryAll();

            if($cekT[$indSesi])
            {
                //var_dump($cek[$indSesi]);
                foreach($cekT[$indSesi] as $itemAbc)
                {
                    $itemDef = $itemAbc["ID_DETAIL_JADWAL"];
                    $hadirDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$itemDef, 'STATUS'=>'H'));
                    $absenDinT[$indekDinHadirT] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$itemDef, 'STATUS'=>'A'));
                    $indekDinHadirT++;
                }
            }
            if($cekP[$indSesi])
            {
                //var_dump($cek[$indSesi]);
                foreach($cekP[$indSesi] as $itemAbc)
                {
                    $itemDef = $itemAbc["ID_DETAIL_JADWAL"];
                    $hadirDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$itemDef, 'STATUS'=>'H'));
                    $absenDinP[$indekDinHadirP] = (int)BeritaAcaraDaftarHadir::model()->countByAttributes(array('ID_DETAIL_JADWAL'=>$itemDef, 'STATUS'=>'A'));
                    $indekDinHadirP++;
                }
            }
            $indSesi++;
        }
    }
} else {
    $ListSesiPz = null;
    $hadirDinT = null;
    $absenDinT = null;
}
?>


<?php if($ListSesiPz){ ?>
<table>
<tr>
    <td colspan="2" align="center" valign="middle">
        <center>
            <h2><u>Tabel Grafik Bulan ini (Praktikum)</u></h2>
            <table border="1">
                <tr>
                    <td>No.</td>
                    <td>Tanggal / Sesi</td>
                    <td>Jumlah Mhs Hadir</td>
                    <td>Jumlah Mhs Absen</td>
                </tr>
                <?php
                $nomor = 1;
                foreach($ListSesiPz as $itemSesiP){
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $itemSesiP; ?></td>
                        <td><?php echo $hadirDinP[$nomor-1]; ?></td>
                        <td><?php echo $absenDinP[$nomor-1]; ?></td>
                    </tr>
                    <?php
                    $nomor++;
                }
                ?>
            </table>
        </center>
    </td>
</tr>
</table>
<?php } else {echo "Data tidak ditemukan";}?>
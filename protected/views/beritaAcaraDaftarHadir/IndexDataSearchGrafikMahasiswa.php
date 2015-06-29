<?php

$temp = explode("-", $message);
$Kode = $temp[0];
$NIM = $temp[1];

$nama_temp = Dim::model()->findByAttributes(array('NIM' => $NIM));
$nama_mhs = $nama_temp->NAMA;


$kelas_temp = Registrasi::model()->findByAttributes(array('NIM' => $NIM));
$kelas = $kelas_temp->KELAS;
$mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode));
$nama_MK = $mk->NAMA_KUL_IND;

$tes = Yii::app()->db->createCommand("SELECT * FROM registrasi reg WHERE NIM = '$NIM' GROUP BY SEM DESC LIMIT 1"
        )->queryAll();

//   var_dump($tes);
//echo $tes[0]["SEM"];


$weektot = Yii::app()->db->createCommand("SELECT COUNT(DISTINCT WEEK) FROM m_jadwal mj JOIN d_jadwal dj ON mj.ID = dj.ID_JADWAL JOIN berita_acara_daftar_hadir badh ON badh.ID_DETAIL_JADWAL = dj.ID WHERE badh.NIM = '$NIM' AND dj.KODE_MK = '$Kode'"
        )->queryAll();
$weekisi = Yii::app()->db->createCommand("SELECT DISTINCT WEEK FROM m_jadwal mj JOIN d_jadwal dj ON mj.ID = dj.ID_JADWAL JOIN berita_acara_daftar_hadir badh ON badh.ID_DETAIL_JADWAL = dj.ID WHERE badh.NIM = '$NIM' AND dj.KODE_MK = '$Kode'"
        )->queryAll();
//echo var_dump($weektot)."<br>";
// echo var_dump($weekisi);
$listWeek = array();
$listCount = array();
$listCountAbsen = array();
$indWeek = 0;
$indCount = 0;
$indCountAbsen = 0;
foreach ($weekisi as $hitung) {
    $testtemp = $hitung["WEEK"];
    $listWeek[$indWeek] = "Week " . $testtemp;
    $tempcount = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh 
        JOIN d_jadwal dj 
        ON badh.ID_DETAIL_JADWAL = dj.ID
        JOIN m_jadwal mj
        ON dj.ID_JADWAL = mj.ID
        WHERE NIM = '$NIM' AND mj.WEEK = '$testtemp' AND dj.KODE_MK = '$Kode' AND badh.STATUS = 'H'"
            )->queryAll();

    $absencount = Yii::app()->db->createCommand("SELECT COUNT(*) FROM berita_acara_daftar_hadir badh 
        JOIN d_jadwal dj 
        ON badh.ID_DETAIL_JADWAL = dj.ID
        JOIN m_jadwal mj
        ON dj.ID_JADWAL = mj.ID
        WHERE NIM = '$NIM' AND mj.WEEK = '$testtemp' AND dj.KODE_MK = '$Kode' AND badh.STATUS = 'A'"
            )->queryAll();

    //var_dump($tempcount);
    foreach ($tempcount as $abc) {
        $listCount[$indCount] = (int) $abc['COUNT(*)'];
        $indCount++;
    }
    foreach ($absencount as $xyz) {
        $listCountAbsen[$indCountAbsen] = (int) $xyz['COUNT(*)'];
        $indCountAbsen++;
    }

    $indWeek++;
}


//var_dump($listWeek)."<br>";
//var_dump($listCountAbsen);

$this->widget(
'booster.widgets.TbHighCharts',
 array(
'options' => array(
'title' => array(
'text' => 'Grafik Kehadiran Bulan ini',
 'x' => 0 //center
),
 'subtitle' => array(
'text' => 'Nama : '.$nama_mhs.'<br>Kelas : '.$kelas.'<br>Matakuliah : '.$nama_MK,
 'x' -20
),
 'xAxis' => array(
'categories' => $listWeek

),
 'yAxis' => array(
'title' => array(
'text' => 'Banyak Mahasiswa',
 ),
 'plotLines' => [
[
'value' => 0,
 'width' => 1,
 'color' => '#808080'
]
],
 ),
 'tooltip' => array(
'valueSuffix' => ' kali'
),
 'legend' => array(
'layout' => 'vertical',
 'align' => 'right',
 'verticalAlign' => 'middle',
 'borderWidth' => 0
),
 'series' => array(
[
'name' => 'Kehadiran',
 'data' => $listCount,
],
 [
'name' => 'Ketidakhadiran',
 'data' => $listCountAbsen,
],
 )
),
 'htmlOptions' => array(
'style' => 'min-width: 310px; height: 400px; margin: 0 auto'
)
)
);
?>
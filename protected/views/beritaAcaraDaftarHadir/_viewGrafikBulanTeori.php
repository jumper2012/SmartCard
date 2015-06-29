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
$ListSesiT = array();
$indListSesiT = 0;
$indListSesiP = 0;
$indListHadir = 0;
$indListHadir2 = 0;
$indekDinHadirT = 0;
$indekDinHadirP = 0;

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
    $ListSesiT = null;
    $hadirDinT = null;
    $absenDinT = null;
}
?>

<?php if($ListSesiT){?>
<table>
<tr>
    <td width="1300">
        <?php
        $this->widget(
            'booster.widgets.TbHighCharts',
            array(
                'options' => array(
                    'title' => array(
                        'text' => 'Grafik Kehadiran Bulan '.$bulan.' (Teori) <br>'.$TA . " / " . $Kelas,
                        'x' => 0 //center
                    ),
                    'subtitle' => array(
                        'text' => 'Matakuliah: '.$mk->NAMA_KUL_IND,
                        'x' -20
                    ),
                    'xAxis' => array(
                        'categories' => $ListSesiT
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
                        'valueSuffix' => 'orang'
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
                            'data' => $hadirDinT
                        ],

                        [
                            'name' => 'Ketidakhadiran',
                            'data' => $absenDinT
                        ],

                    )
                ),
                'htmlOptions' => array(
                    'style' => 'min-width: 310px; height: 400px; margin: 0 auto'
                )
            )
        );
        ?>
    </td>
</tr>
</table>
<?php } else { echo "Data tidak ditemukan"; }?>
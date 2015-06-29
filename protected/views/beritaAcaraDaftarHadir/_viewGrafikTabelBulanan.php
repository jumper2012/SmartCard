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

<table>
<tr>
<td width="1300">
<?php
$tempDate = explode("-", $message2);
$bulan = $tempDate[1];
$indKehadiran = 0;
$indSesi = 0;

$session = array();
$sessionTemp = array();
$kehadiran = array();

$sesiQuery = Yii::app()->db->createCommand("SELECT SESSION FROM d_jadwal dj
                                                        JOIN m_jadwal mj ON mj.ID = dj.ID_JADWAl
                                                        WHERE mj.TANGGAL LIKE '%$bulan%'"
)->queryAll();
//var_dump($sesiQuery);

$tanggalQuery = Yii::app()->db->createCommand("SELECT TANGGAL FROM m_jadwal mj
                                                           WHERE mj.`TA`= '$TA' AND mj.`KELAS` = '$Kelas'
                                                           AND mj.`TANGGAL` LIKE '%$bulan%'
            ")->queryAll();

$indSesi = 0;
$ListSesi = array();
$ListHadir = array();
$ListAbsen = array();
$indListSesiT = 0;
$indListSesiP = 0;
$indListHadir = 0;
$indListHadir2 = 0;
$indekDinHadirT = 0;
$indekDinHadirP = 0;
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
?>
</td>
</tr>
<tr>
    <td colspan="2" align="center" valign="middle" width="1300">
        <?php
        $data = $message."_".$message2;
        $this->widget('zii.widgets.jui.CJuiAccordion', array(
            'panels'=>array(
                'Grafik Teori' => $this->renderPartial('_viewGrafikBulanTeori',$data,true),
                'Tabel Teori' => $this->renderPartial('_viewTabelBulanTeori',$data,true),
                'Grafik Praktikum' => $this->renderPartial('_viewGrafikBulanPraktikum',$data,true),
                'Tabel Praktikum' => $this->renderPartial('_viewTabelBulanPraktikum',$data,true),
            ),
            'options'=>array(
                'animated'=>'bounceslide',
            ),
        ));
        ?>
    </td>
</tr>
</table>
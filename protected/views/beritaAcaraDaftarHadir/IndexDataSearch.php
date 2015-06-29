<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$temp = explode("-", $message);
$Kode = $temp[0];
$Kelas = $temp[1];
$TA = $temp[2];
?>
<h2><center><u>BERITA ACARA KULIAH</u></center></h2>
<table>
    <tr>
        <td width="180">Mata Kuliah</td>
        <td> : </td>
        <td>
            <?php
            $mk = Kurikulum::model()->findByAttributes(array('KODE_MK' => $Kode));
            echo $mk->NAMA_KUL_IND;
            ?>
        </td>
    </tr>
    <tr>
        <td>Nama Dosen</td>
        <td> : </td>
        <td>
            <?php
            $pengajar = Pengajar::model()->findByAttributes(array('KODE_MK' => $Kode));
            $pegawai = Pegawai::model()->findByAttributes(array('ID' => $pengajar->DOSEN_ID));
            echo $pegawai->NAMA;
            ?>
        </td>
    </tr>
    <tr>
        <td>Semester</td>
        <td> : </td>
        <td>
            <?php
            echo $mk->SEM;
            ?>
        </td>
    </tr>
    <tr>
        <td>Angkatan / Kelas</td>
        <td>: </td>
        <td><?php echo $TA . " / " . $Kelas; ?></td>
    </tr>
</table>

<?php
$dataProvider = new CActiveDataProvider('BeritaAcaraDaftarHadir', array(
    'criteria' => array(
        'join' => "JOIN d_jadwal dj ON t.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID",
        'condition' => "mj.TA LIKE '$TA' AND dj.KODE_MK LIKE '$Kode' AND mj.KELAS LIKE '$Kelas' ",
    ),
    'pagination' => array('pageSize' => 10,)));
//echo $count = BeritaAcaraDaftarHadir::model()->countByAttributes(array('KODE_MK'=>$Kode));
?>

<?php
//$dataProvider = BeritaAcaraKuliah::model()->findAllByAttributes(array('TA'=>$TA, 'KODE_MK'=>$Kode, 'KELAS'=>$Kode));
//$criteria = new CDbCriteria;
//$criteria->condition = 'TA = "' . $TA . '" and KODE_MK = "' . $Kode . '" and KELAS = "' . $Kelas . '"and SEM = "' . $Sem . '"';
//$dataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array('criteria' => $criteria));
$this->widget(
        'booster.widgets.TbGridView', array(
    'type' => 'striped',
    'dataProvider' => $dataProvider,
    'enablePagination' => false,
    'template' => "{items}",
    'columns' => array(
        'NIM', 'STATUS',
        array(
            'header' => 'Minggu',
            'value' => '$data->iddetailjadwal->idjadwal->WEEK',
        ),
        array(
            'header' => 'Tanggal',
            'value' => '$data->iddetailjadwal->idjadwal->TANGGAL',
        ),
        array(
            'header' => 'Sesi',
            'value' => '$data->iddetailjadwal->SESSION',
        ),
        array(
            'header' => 'Kelas',
            'value' => '$data->iddetailjadwal->idjadwal->KELAS',
        ),
        array(
            'header' => 'Mata Kuliah',
            'value' => '$data->iddetailjadwal->kodemk->SHORT_NAME',
        ),
    ),)
);
?><br/>
<H3>Summary : </H3>
<table BORDER='2' WIDTH="250">
    <tr>
        <td>

            <?php echo "Total Mahasiswa Hadir : " . $wew; ?><br>
            <?php echo "Total Mahasiswa Absen : " . $wow; ?>
        </td>
    </tr>
</table>
<br><br>
<?php
echo CHtml::Button('Cetak Berita Laporan Ini (.pdf)', array('submit' => array('/BeritaAcaraDaftarHadir/CetakLaporan', 'id' => $message . "-" . $mk->SEM)));
?>
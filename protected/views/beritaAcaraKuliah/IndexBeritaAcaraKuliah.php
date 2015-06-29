<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$temp = explode("-", $message);
$TA = $temp[0];
$Kode = $temp[1];
$Kelas = $temp[2];
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
        <td><?php echo " / " . $Kelas; ?></td>
    </tr>
</table>

<?php
//$dataProvider = BeritaAcaraKuliah::model()->findAllByAttributes(array('TA'=>$TA, 'KODE_MK'=>$Kode, 'KELAS'=>$Kode));
$dataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array(
    'criteria' => array(
        'join' => "JOIN d_jadwal dj ON t.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID",
        'condition' => "mj.TA LIKE '$TA' AND dj.KODE_MK LIKE '$Kode' AND mj.KELAS LIKE '$Kelas' ",
        )));
//$gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array(
//    'criteria' => array(
//        'join' => "JOIN d_jadwal dj ON t.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID",
//        'condition' => "mj.TANGGAL LIKE '$date'",
//    ),
//        ));

$this->widget(
        'booster.widgets.TbGridView', array(
    'type' => 'striped',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array(
            'header' => 'Kelas',
            'value' => '$data->iddetailjadwal->idjadwal->KELAS',
        ),
        array(
            'header' => 'Sesi',
            'value' => '$data->iddetailjadwal->SESSION',
        ),
        array(
            'header' => 'Mata Kuliah',
            'value' => '$data->iddetailjadwal->kodemk->SHORT_NAME',
        ),
        array(
            'header' => 'Ruangan',
            'value' => '$data->iddetailjadwal->RUANGAN',
        ),
        array(
            'header' => 'Aktifitas',
            'value' => '$data->iddetailjadwal->AKTIFITAS',
        ),
        array(
            'header' => 'Tanggal',
            'value' => '$data->iddetailjadwal->idjadwal->TANGGAL',
        ),
        array(
            'header' => 'Minggu',
            'value' => '$data->iddetailjadwal->idjadwal->WEEK',
        ),
        array(
            'header' => 'Waktu Mulai',
            'value' => '$data->iddetailjadwal->START_TIME',
        ),
        array(
            'header' => 'Waktu Selesai',
            'value' => '$data->iddetailjadwal->END_TIME',
        ),
        array(
            'header' => 'Aktifitas',
            'value' => '$data->iddetailjadwal->AKTIFITAS',
        ),
        'TIPE_KULIAH',
        array(
            'header' => 'Pengajar',
            'value' => '$data->iddetailjadwal->pic->NAMA',
        ),
    ),)
);
?>

<br/>
<?php
echo CHtml::Button('Cetak Berita Laporan Ini (.pdf)', array('submit' => array('/BeritaAcaraKuliah/CetakBeritaAcaraKuliahPdf', 'id' => $message . "-" . $mk->SEM)));
?>
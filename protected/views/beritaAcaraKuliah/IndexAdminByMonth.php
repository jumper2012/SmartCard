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
$Sem = $temp[3];
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
            echo $Sem;
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
$criteria = new CDbCriteria;
$criteria->condition = 'TA = "' . $TA . '" and KODE_MK = "' . $Kode . '" and KELAS = "' . $Kelas . '"and SEM = "' . $Sem . '"';
$dataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array('criteria' => $criteria));
$this->widget(
        'booster.widgets.TbGridView', array(
    'type' => 'striped',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array('TANGGAL', 'WEEK', 'SESSION', 'RUANGAN', 'START_TIME', 'END_TIME', 'AKTIFITAS', 'TIPE_KULIAH', 'PIC'
    ),)
);
?>

<br/>
<?php
echo CHtml::Button('Cetak Berita Laporan Ini Lapet (.pdf)');
?>